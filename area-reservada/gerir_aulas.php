<?php
// Gestão de aulas criadas por Personal Trainers
$msg = "";
session_start();
@include '../includes/db.php';
if (!isset($_SESSION['user_id']) || !in_array($_SESSION['user_role'], ['gestor_ginasio','personal_trainer'])) {
    header('Location: /area-reservada/login.php');
    exit;
}
include __DIR__ . '/../includes/header.php';
$msg = "";
// Apagar aula
if (isset($_GET['eliminar']) && is_numeric($_GET['eliminar'])) {
    $id = intval($_GET['eliminar']);
    // Eliminar todas as marcações associadas à aula
    $conn->query("DELETE FROM bookings WHERE class_id = $id");
    // Agora eliminar a aula
    if ($conn->query("DELETE FROM classes WHERE id = $id")) {
        $msg = '<div class="alert alert-success">Aula eliminada com sucesso.</div>';
    } else {
        $msg = '<div class="alert alert-danger">Erro ao eliminar aula: ' . $conn->error . '</div>';
    }
}
// Buscar aulas
if (!$conn) {
    echo '<div class="alert alert-danger">Erro de ligação à base de dados.</div>';
    exit;
}
$aulas = $conn->query("SELECT c.id, c.name, c.schedule, c.description, u.name as pt_name FROM classes c LEFT JOIN users u ON c.personal_trainer_id = u.id ORDER BY c.schedule DESC");
if ($aulas === false) {
    echo '<div class="alert alert-danger">Erro ao buscar aulas: ' . $conn->error . '</div>';
    exit;
}
?>
<div class="container mt-5">
    <h2 class="fw-bold mb-4" style="color:#ff6633;">Gestão de Aulas</h2>
    <a href="criar_aula.php" class="btn btn-success mb-3">Criar Nova Aula</a>
    <?= $msg ?>
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Modalidade</th>
                    <th>Horário</th>
                    <th>Descrição</th>
                    <th>Personal Trainer</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php while ($aula = $aulas->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($aula['name']) ?></td>
                    <td><?= htmlspecialchars($aula['schedule']) ?></td>
                    <td><?= htmlspecialchars($aula['description']) ?></td>
                    <td><?= $aula['pt_name'] ? htmlspecialchars($aula['pt_name']) : '<span class="text-muted">Não associado</span>' ?></td>
                    <td>
                        <a href="editar_aula.php?id=<?= $aula['id'] ?>" class="btn btn-sm btn-primary">Editar</a>
                        <a href="?eliminar=<?= $aula['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Eliminar esta aula?');">Eliminar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include '../includes/footer.php'; ?>
