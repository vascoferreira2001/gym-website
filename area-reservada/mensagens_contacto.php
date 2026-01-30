<?php
// Gestão de mensagens de contacto
include '../includes/header.php';
@include '../includes/db.php';
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'gestor_ginasio') {
    header('Location: /area-reservada/login.php');
    exit;
}
$msg = "";
// Apagar mensagem
if (isset($_GET['eliminar']) && is_numeric($_GET['eliminar'])) {
    $id = intval($_GET['eliminar']);
    $conn->query("DELETE FROM contacts WHERE id = $id");
    $msg = '<div class="alert alert-success">Mensagem eliminada com sucesso.</div>';
}
// Buscar mensagens
$msgs = $conn->query("SELECT id, name, email, message, created_at FROM contacts ORDER BY created_at DESC");
?>
<div class="container mt-5">
    <h2 class="fw-bold mb-4" style="color:#ff6633;">Mensagens de Contacto</h2>
    <?= $msg ?>
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Mensagem</th>
                    <th>Data</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php while ($m = $msgs->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($m['name']) ?></td>
                    <td><?= htmlspecialchars($m['email']) ?></td>
                    <td><?= htmlspecialchars($m['message']) ?></td>
                    <td><?= htmlspecialchars($m['created_at']) ?></td>
                    <td>
                        <a href="?eliminar=<?= $m['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Eliminar esta mensagem?');">Eliminar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include '../includes/footer.php'; ?>
