<?php
/**
 * ============================================================
 * DASHBOARD.PHP — Área reservada dinâmica para todos os cargos
 * ============================================================
 * - Mostra funcionalidades diferentes consoante o papel do utilizador
 * - Gestor: acesso total (admin)
 * - Personal Trainer: gestão de aulas
 * - Cliente: ver e cancelar reservas
 * ============================================================
 */

include '../includes/header.php';
@include '../includes/db.php';

session_start();
if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_role'])) {
    header('Location: /login.php');
    exit;
}

$user_id = $_SESSION['user_id'];
$user_role = $_SESSION['user_role'];
$msg = "";

// =================== CLIENTE: Cancelamento de reserva ===================
if ($user_role === 'cliente' && isset($_GET['cancelar']) && is_numeric($_GET['cancelar'])) {
    $booking_id = intval($_GET['cancelar']);
    $stmt = $conn->prepare("SELECT id FROM bookings WHERE id = ? AND email = (SELECT email FROM users WHERE id = ?)");
    $stmt->bind_param("ii", $booking_id, $user_id);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows === 1) {
        $stmt->close();
        $del = $conn->prepare("DELETE FROM bookings WHERE id = ?");
        $del->bind_param("i", $booking_id);
        if ($del->execute()) {
            header('Location: dashboard.php?cancelado=1');
            exit;
        } else {
            header('Location: dashboard.php?cancelado=0');
            exit;
        }
        $del->close();
    } else {
        header('Location: dashboard.php?cancelado=0');
        exit;
    }
    $stmt->close();
}

?>
<div class="container mt-5">
    <h2 class="fw-bold mb-4 text-center" style="color:#ff6633;">Área Reservada</h2>
    <?= $msg ?>
    <?php if ($user_role === 'gestor_ginasio'): ?>
        <!-- DASHBOARD GESTOR: acesso total -->
        <div class="alert alert-info mb-4">Bem-vindo, gestor! Tem acesso total à administração do ginásio.</div>
        <div class="d-flex gap-3 mb-3 flex-wrap">
            <a href="gerir_aulas.php" class="btn btn-outline-secondary">Gerir Aulas</a>
            <a href="mensagens_contacto.php" class="btn btn-outline-secondary">Mensagens de Contacto</a>
            <a href="ver_clientes.php" class="btn btn-outline-secondary">Ver Clientes</a>
            <a href="ver_personal_trainers.php" class="btn btn-outline-secondary">Ver Personal Trainers</a>
        </div>
    <?php elseif ($user_role === 'personal_trainer'): ?>
        <!-- DASHBOARD PERSONAL TRAINER: gestão de aulas e sócios -->
        <div class="alert alert-info mb-4">Bem-vindo, Personal Trainer! Pode criar aulas, ver inscrições e gerir sócios.</div>
        <div class="d-flex gap-3 mb-3 flex-wrap">
            <a href="criar_aula.php" class="btn btn-success">Criar Nova Aula</a>
            <a href="gerir_aulas.php" class="btn btn-outline-secondary">Gerir Aulas</a>

        </div>

        <?php
        // Buscar aulas atribuídas a este PT
        $stmt = $conn->prepare("SELECT c.name, c.schedule, c.description, c.created_at FROM classes c WHERE c.personal_trainer_id = ? ORDER BY c.created_at DESC");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->bind_result($class_name, $schedule, $desc, $created_at);
        $aulas = [];
        while ($stmt->fetch()) {
            $aulas[] = [
                'name' => $class_name,
                'schedule' => $schedule,
                'desc' => $desc,
                'created_at' => $created_at
            ];
        }
        $stmt->close();
        ?>
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body">
                <h5 class="mb-3">Aulas atribuídas a si</h5>
                <?php if (count($aulas) === 0): ?>
                    <div class="alert alert-info">Ainda não tem aulas atribuídas.</div>
                <?php else: ?>
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Modalidade</th>
                            <th>Horário</th>
                            <th>Descrição</th>
                            <th>Data de Criação</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($aulas as $a): ?>
                        <tr>
                            <td><?= htmlspecialchars($a['name']) ?></td>
                            <td><?= htmlspecialchars($a['schedule']) ?></td>
                            <td><?= htmlspecialchars($a['desc']) ?></td>
                            <td><?= htmlspecialchars($a['created_at']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <?php endif; ?>
            </div>
        </div>
        <!-- Outras funcionalidades específicas -->
        <!-- Aqui pode ser incluída a listagem de aulas criadas e inscrições -->
    <?php elseif ($user_role === 'cliente'): ?>
                <!-- DASHBOARD CLIENTE: ver, marcar e cancelar reservas -->
                <div class="alert alert-info">Bem-vindo! Aqui pode ver as suas aulas marcadas, marcar novas e pedir cancelamento.</div>
                <!-- Botão para abrir pop-up de marcação de aula -->
                <div class="mb-4">
                        <button class="btn fw-bold text-white" style="background:#ff6633; border-radius:8px; font-size:1rem; letter-spacing:1px;" data-bs-toggle="modal" data-bs-target="#modalMarcarAula">Marcar Nova Aula</button>
                </div>
                <?php
                // Buscar reservas do cliente
                $stmt = $conn->prepare("SELECT b.id, c.name, b.date, b.time FROM bookings b JOIN users u ON b.email = u.email JOIN classes c ON b.class_id = c.id WHERE u.id = ? ORDER BY b.date, b.time");
                $stmt->bind_param("i", $user_id);
                $stmt->execute();
                $stmt->bind_result($booking_id, $class_name, $date, $time);
                $reservas = [];
                while ($stmt->fetch()) {
                        $reservas[] = [
                                'id' => $booking_id,
                                'class' => $class_name,
                                'date' => $date,
                                'time' => $time
                        ];
                }
                $stmt->close();
                ?>
                <div class="card shadow-sm border-0 mb-4">
                        <div class="card-body">
                                <h5 class="mb-3">As suas reservas de aulas</h5>
                                <?php if (count($reservas) === 0): ?>
                                        <div class="alert alert-info">Ainda não tem aulas reservadas.</div>
                                <?php else: ?>
                                <table class="table table-hover align-middle mb-0">
                                        <thead class="table-light">
                                                <tr>
                                                        <th>Modalidade</th>
                                                        <th>Data</th>
                                                        <th>Hora</th>
                                                        <th></th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($reservas as $r): ?>
                                                <tr>
                                                        <td><?= htmlspecialchars($r['class']) ?></td>
                                                        <td><?= htmlspecialchars($r['date']) ?></td>
                                                        <td><?= htmlspecialchars($r['time']) ?></td>
                                                        <td>
                                                                <button class="btn btn-sm btn-danger" onclick="if(confirm('Tem a certeza que pretende cancelar esta reserva?')){window.location='dashboard.php?cancelar=<?= $r['id'] ?>';}">Pedir Cancelamento</button>
                                                        </td>
                                                </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                </table>
                                <?php endif; ?>
                        </div>
                </div>
                <!-- Modal para marcação de aula -->
                <div class="modal fade" id="modalMarcarAula" tabindex="-1" aria-labelledby="modalMarcarAulaLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="post" action="marcar_aula.php">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalMarcarAulaLabel">Marcar Nova Aula</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="class_id" class="form-label">Modalidade</label>
                                        <select class="form-select" id="class_id" name="class_id" required>
                                            <option value="">Selecione...</option>
                                            <?php
                                            $res = $conn->query("SELECT id, name FROM classes ORDER BY name");
                                            while ($row = $res->fetch_assoc()): ?>
                                                <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['name']) ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="date" class="form-label">Data</label>
                                        <input type="date" class="form-control" id="date" name="date" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="time" class="form-label">Hora</label>
                                        <input type="time" class="form-control" id="time" name="time" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="notes" class="form-label">Notas (opcional)</label>
                                        <textarea class="form-control" id="notes" name="notes" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Marcar Aula</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
    <?php endif; ?>
</div>

<?php include '../includes/footer.php'; ?>
