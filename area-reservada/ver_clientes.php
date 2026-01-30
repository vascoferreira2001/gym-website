<?php
// Debug: mostrar erros PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Página de gestão de Clientes para o Gestor
include '../includes/header.php';
require_once '../includes/db.php';
if (session_status() === PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'gestor_ginasio') {
  header('Location: /area-reservada/login.php');
  exit;
}
$msg = "";
// Eliminar Cliente
if (isset($_GET['eliminar']) && is_numeric($_GET['eliminar'])) {
    $id = intval($_GET['eliminar']);
    $conn->query("DELETE FROM users WHERE id = $id AND role = 'cliente'");
    $msg = '<div class="alert alert-success">Cliente eliminado com sucesso.</div>';
}
// Criar Cliente
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['criar_cliente'])) {
    $nome = trim($_POST['nome']);
    $idade = intval($_POST['idade']);
    $email = trim($_POST['email']);
    $telemovel = trim($_POST['telemovel']);
    $morada = trim($_POST['morada']);
    $password = bin2hex(random_bytes(4));
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (name, idade, email, telemovel, morada, password, role) VALUES (?, ?, ?, ?, ?, ?, 'cliente')");
    $stmt->bind_param('sissss', $nome, $idade, $email, $telemovel, $morada, $hash);
    if ($stmt->execute()) {
        $msg = '<div class="alert alert-success">Cliente criado! Password provisória: <b>' . $password . '</b></div>';
    } else {
        $msg = '<div class="alert alert-danger">Erro ao criar Cliente.</div>';
    }
    $stmt->close();
}
// Buscar Clientes
if (!$conn) {
  die('<div class="alert alert-danger">Erro na ligação à base de dados.</div>');
}
$clientes = $conn->query("SELECT id, name, idade, email, telemovel, morada FROM users WHERE role = 'cliente' ORDER BY name");
?>
<div class="container mt-5">
    <h2 class="fw-bold mb-4" style="color:#ff6633;">Clientes</h2>
    <?= $msg ?>
    <div class="mb-4">
        <button class="btn btn-success fw-bold" data-bs-toggle="modal" data-bs-target="#modalCriarCliente">Criar Cliente</button>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Nome</th>
                    <th>Idade</th>
                    <th>Email</th>
                    <th>Telemóvel</th>
                    <th>Morada</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php
            if ($clientes->num_rows > 0):
              while ($c = $clientes->fetch_assoc()): ?>
              <tr>
                <td><?= htmlspecialchars($c['name']) ?></td>
                <td><?= htmlspecialchars($c['idade']) ?></td>
                <td><?= htmlspecialchars($c['email']) ?></td>
                <td><?= htmlspecialchars($c['telemovel']) ?></td>
                <td><?= htmlspecialchars($c['morada']) ?></td>
                <td>
                  <a href="editar_cliente.php?id=<?= $c['id'] ?>" class="btn btn-sm btn-primary">Editar</a>
                  <a href="?eliminar=<?= $c['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Eliminar este Cliente?');">Eliminar</a>
                </td>
              </tr>
              <?php endwhile;
            else: ?>
              <tr><td colspan="6" class="text-center">Nenhum cliente encontrado.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
    <!-- Modal Criar Cliente -->
    <div class="modal fade" id="modalCriarCliente" tabindex="-1" aria-labelledby="modalCriarClienteLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form method="post">
            <div class="modal-header">
              <h5 class="modal-title" id="modalCriarClienteLabel">Criar Cliente</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
              <input type="hidden" name="criar_cliente" value="1">
              <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text" class="form-control" name="nome" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Idade</label>
                <input type="number" class="form-control" name="idade" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Telemóvel</label>
                <input type="text" class="form-control" name="telemovel" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Morada</label>
                <input type="text" class="form-control" name="morada" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-success">Criar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
<?php include '../includes/footer.php'; ?>
