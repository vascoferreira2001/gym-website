<?php
// Página de edição de dados do Personal Trainer
include '../includes/header.php';
@include '../includes/db.php';
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'gestor_ginasio') {
    header('Location: /area-reservada/login.php');
    exit;
}
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: ver_personal_trainers.php');
    exit;
}
$id = intval($_GET['id']);
$msg = "";
// Atualizar dados
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome']);
    $idade = intval($_POST['idade']);
    $email = trim($_POST['email']);
    $telemovel = trim($_POST['telemovel']);
    $morada = trim($_POST['morada']);
    $stmt = $conn->prepare("UPDATE users SET name=?, idade=?, email=?, telemovel=?, morada=? WHERE id=? AND role='personal_trainer'");
    $stmt->bind_param('sisssi', $nome, $idade, $email, $telemovel, $morada, $id);
    if ($stmt->execute()) {
        $msg = '<div class="alert alert-success">Dados atualizados com sucesso.</div>';
    } else {
        $msg = '<div class="alert alert-danger">Erro ao atualizar dados.</div>';
    }
    $stmt->close();
}
// Buscar dados atuais
$stmt = $conn->prepare("SELECT name, idade, email, telemovel, morada FROM users WHERE id=? AND role='personal_trainer'");
$stmt->bind_param('i', $id);
$stmt->execute();
$stmt->bind_result($nome, $idade, $email, $telemovel, $morada);
$stmt->fetch();
$stmt->close();
?>
<div class="container mt-5">
    <h2 class="fw-bold mb-4" style="color:#ff6633;">Editar Personal Trainer</h2>
    <?= $msg ?>
    <form method="post" class="mb-4">
        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" class="form-control" name="nome" value="<?= htmlspecialchars($nome) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Idade</label>
            <input type="number" class="form-control" name="idade" value="<?= htmlspecialchars($idade) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($email) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Telemóvel</label>
            <input type="text" class="form-control" name="telemovel" value="<?= htmlspecialchars($telemovel) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Morada</label>
            <input type="text" class="form-control" name="morada" value="<?= htmlspecialchars($morada) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar Alterações</button>
        <a href="ver_personal_trainers.php" class="btn btn-secondary">Voltar</a>
    </form>
</div>
<?php include '../includes/footer.php'; ?>
