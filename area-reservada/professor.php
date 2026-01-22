<?php
/**
 * Área Reservada do Professor / Personal Trainer
 * Permite criar aulas, ver inscrições e dados dos sócios
 */
include '../includes/header.php';
@include '../includes/db.php';
session_start();
if (!isset($_SESSION['user_role']) || !in_array($_SESSION['user_role'], ['professor','personal_trainer'])) {
    header('Location: /login.php');
    exit;
}
$success = $error = "";
// Processar criação de aula
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome_aula'])) {
    $nome = $_POST['nome_aula'];
    $data = $_POST['data'];
    $hora = $_POST['hora'];
    $sala = $_POST['sala'];
    if ($conn) {
        $stmt = $conn->prepare("INSERT INTO classes (name, schedule, description, image) VALUES (?, ?, ?, ?)");
        $schedule = $data . ' ' . $hora;
        $desc = 'Aula criada pelo professor';
        $img = '';
        $stmt->bind_param("ssss", $nome, $schedule, $desc, $img);
        if ($stmt->execute()) {
            $success = "Aula criada com sucesso!";
        } else {
            $error = "Erro ao criar aula.";
        }
        $stmt->close();
    } else {
        $error = "Base de dados indisponível.";
    }
}
// Processar criação de sócio
$socio_success = $socio_error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['criar_socio'])) {
    $nome = trim($_POST['nome_socio']);
    $email = trim($_POST['email_socio']);
    $identificador = strtoupper(bin2hex(random_bytes(4)));
    $password = password_hash($_POST['password_socio'], PASSWORD_DEFAULT);
    if ($conn) {
        // Verificar se email já existe
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $socio_error = "Já existe um sócio com este email.";
        } else {
            $stmt->close();
            // Inserir novo sócio
            $stmt2 = $conn->prepare("INSERT INTO users (name, email, identifier, password, role) VALUES (?, ?, ?, ?, 'socio')");
            $stmt2->bind_param("ssss", $nome, $email, $identificador, $password);
            if ($stmt2->execute()) {
                $socio_success = "Sócio criado com sucesso! Identificador: <b>$identificador</b>";
            } else {
                $socio_error = "Erro ao criar sócio.";
            }
            $stmt2->close();
        }
        $stmt->close();
    } else {
        $socio_error = "Base de dados indisponível.";
    }
}
// Listar aulas criadas (todas as aulas)
$aulas = [];
if ($conn) {
    $res = $conn->query("SELECT * FROM classes ORDER BY id DESC");
    while ($row = $res->fetch_assoc()) {
        // Contar inscritos nesta aula
        $stmt2 = $conn->prepare("SELECT COUNT(*) as total FROM bookings WHERE class_id = ?");
        $stmt2->bind_param("i", $row['id']);
        $stmt2->execute();
        $stmt2->bind_result($total_inscritos);
        $stmt2->fetch();
        $stmt2->close();
        // Buscar dados dos sócios inscritos
        $socios = [];
        $stmt3 = $conn->prepare("SELECT name, email FROM bookings WHERE class_id = ?");
        $stmt3->bind_param("i", $row['id']);
        $stmt3->execute();
        $stmt3->bind_result($nome_socio, $email_socio);
        while ($stmt3->fetch()) {
            $socios[] = ["name" => $nome_socio, "email" => $email_socio];
        }
        $stmt3->close();
        $row['total_inscritos'] = $total_inscritos;
        $row['socios'] = $socios;
        $aulas[] = $row;
    }
}
?>
<div class="container mt-5 mb-5">
  <h2 class="text-center mb-4 fw-bold" style="color:#ff6633;">Área do Professor / Personal Trainer</h2>
  <?php if ($success): ?><div class="alert alert-success text-center"><?= $success ?></div><?php endif; ?>
  <?php if ($error): ?><div class="alert alert-danger text-center"><?= $error ?></div><?php endif; ?>
  <!-- Formulário para criar aula -->
  <div class="card mb-4 p-4 shadow-sm">
    <h4 class="mb-3">Criar/Marcar Nova Aula</h4>
    <form method="POST" action="">
      <div class="row g-2">
        <div class="col-md-4 mb-2"><input type="text" name="nome_aula" class="form-control" placeholder="Nome da Aula" required></div>
        <div class="col-md-2 mb-2"><input type="date" name="data" class="form-control" required></div>
        <div class="col-md-2 mb-2"><input type="time" name="hora" class="form-control" required></div>
        <div class="col-md-2 mb-2"><input type="text" name="sala" class="form-control" placeholder="Sala" required></div>
        <div class="col-md-2 mb-2"><button type="submit" class="btn btn-warning w-100 fw-bold" style="background:#ff6633; border:none;">Criar Aula</button></div>
      </div>
    </form>
  </div>
  <!-- Formulário para criação de conta de sócio -->
  <div class="card mb-4 p-4 shadow-sm">
    <h4 class="mb-3">Criar Conta de Sócio</h4>
    <?php if ($socio_success): ?><div class="alert alert-success text-center"><?= $socio_success ?></div><?php endif; ?>
    <?php if ($socio_error): ?><div class="alert alert-danger text-center"><?= $socio_error ?></div><?php endif; ?>
    <form method="POST" action="">
      <input type="hidden" name="criar_socio" value="1">
      <div class="row g-2">
        <div class="col-md-4 mb-2"><input type="text" name="nome_socio" class="form-control" placeholder="Nome do Sócio" required></div>
        <div class="col-md-4 mb-2"><input type="email" name="email_socio" class="form-control" placeholder="Email" required></div>
        <div class="col-md-3 mb-2"><input type="password" name="password_socio" class="form-control" placeholder="Password" required></div>
        <div class="col-md-1 mb-2"><button type="submit" class="btn btn-success w-100 fw-bold">Criar</button></div>
      </div>
      <div class="form-text mt-1">O identificador único será gerado automaticamente.</div>
    </form>
  </div>
  <!-- Listagem de aulas criadas pelo professor -->
  <div class="card p-4 shadow-sm">
    <h4 class="mb-3">Aulas Criadas</h4>
    <div id="aulas-lista">
      <?php if (empty($aulas)): ?>
        <p class="text-muted">Nenhuma aula criada ainda.</p>
      <?php else: ?>
        <div class="table-responsive">
          <table class="table table-bordered align-middle">
            <thead class="table-light">
              <tr>
                <th>Nome</th>
                <th>Data/Hora</th>
                <th>Inscritos</th>
                <th>Dados dos Sócios</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($aulas as $aula): ?>
                <tr>
                  <td><?= htmlspecialchars($aula['name']) ?></td>
                  <td><?= htmlspecialchars($aula['schedule']) ?></td>
                  <td><span class="badge bg-primary fs-6"><?= $aula['total_inscritos'] ?></span></td>
                  <td>
                    <?php if (empty($aula['socios'])): ?>
                      <span class="text-muted">Nenhum sócio inscrito</span>
                    <?php else: ?>
                      <ul class="mb-0 ps-3">
                        <?php foreach ($aula['socios'] as $socio): ?>
                          <li><?= htmlspecialchars($socio['name']) ?> (<?= htmlspecialchars($socio['email']) ?>)</li>
                        <?php endforeach; ?>
                      </ul>
                    <?php endif; ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php include '../includes/footer.php'; ?>
