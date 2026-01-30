<?php
// criar_aula.php - Criação de novas aulas (Gestor e PT)
session_start();
require_once '../includes/db.php';

if (!isset($_SESSION['user_id']) || !in_array($_SESSION['user_role'], ['gestor_ginasio','personal_trainer'])) {
    header('Location: login.php');
    exit;
}

$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $schedule = trim($_POST['schedule']);
    $image = trim($_POST['image']);
    $pt_id = null;
    if ($_SESSION['user_role'] === 'gestor_ginasio') {
        $pt_id = isset($_POST['personal_trainer_id']) ? intval($_POST['personal_trainer_id']) : null;
    } else {
        $pt_id = $_SESSION['user_id'];
    }
    $stmt = $conn->prepare('INSERT INTO classes (name, description, schedule, image, personal_trainer_id) VALUES (?, ?, ?, ?, ?)');
    $stmt->bind_param('ssssi', $name, $description, $schedule, $image, $pt_id);
    if ($stmt->execute()) {
        $msg = '<div class="alert alert-success">Aula criada com sucesso.</div>';
    } else {
        $msg = '<div class="alert alert-danger">Erro ao criar aula.</div>';
    }
}
// Se gestor, buscar lista de personal trainers
$personal_trainers = [];
if ($_SESSION['user_role'] === 'gestor_ginasio') {
    $res = $conn->query("SELECT id, name FROM users WHERE role = 'personal_trainer'");
    while ($row = $res->fetch_assoc()) {
        $personal_trainers[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <title>Criar Nova Aula</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Criar Nova Aula</h2>
    <?= $msg ?>
    <form method="post">
        <div class="mb-3">
            <label class="form-label">Nome da Aula</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Descrição</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Horário</label>
            <input type="text" name="schedule" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Imagem (URL)</label>
            <input type="text" name="image" class="form-control">
        </div>
        <?php if ($_SESSION['user_role'] === 'gestor_ginasio'): ?>
        <div class="mb-3">
            <label class="form-label">Personal Trainer</label>
            <select name="personal_trainer_id" class="form-select">
                <option value="">-- Não Associado --</option>
                <?php foreach ($personal_trainers as $pt): ?>
                    <option value="<?= $pt['id'] ?>"><?= htmlspecialchars($pt['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <?php endif; ?>
        <button type="submit" class="btn btn-success">Criar Aula</button>
        <a href="gerir_aulas.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
