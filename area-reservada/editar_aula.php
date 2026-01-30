<?php
// editar_aula.php - Edição de aulas (apenas gestor pode associar Personal Trainer)
// Comentários em pt-PT
session_start();
require_once '../includes/db.php';

// Verifica se está autenticado e se é gestor ou personal_trainer
if (!isset($_SESSION['user_id']) || !in_array($_SESSION['user_role'], ['gestor_ginasio','personal_trainer'])) {
    header('Location: login.php');
    exit;
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id <= 0) {
    header('Location: gerir_aulas.php');
    exit;
}

// Buscar dados da aula
$stmt = $conn->prepare('SELECT * FROM classes WHERE id = ?');
$stmt->bind_param('i', $id);
$stmt->execute();
$aula = $stmt->get_result()->fetch_assoc();
if (!$aula) {
    header('Location: gerir_aulas.php');
    exit;
}

// Se gestor, buscar lista de personal trainers
$personal_trainers = [];
if ($_SESSION['user_role'] === 'gestor_ginasio') {
    $res = $conn->query("SELECT id, name FROM users WHERE role = 'personal_trainer'");
    while ($row = $res->fetch_assoc()) {
        $personal_trainers[] = $row;
    }
}

// Atualizar aula
$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $schedule = trim($_POST['schedule']);
    $image = trim($_POST['image']);
    $pt_id = isset($_POST['personal_trainer_id']) ? intval($_POST['personal_trainer_id']) : null;

    // Só gestor pode associar PT
    if ($_SESSION['user_role'] === 'gestor_ginasio') {
        $stmt = $conn->prepare('UPDATE classes SET name=?, description=?, schedule=?, image=?, personal_trainer_id=? WHERE id=?');
        $stmt->bind_param('ssssii', $name, $description, $schedule, $image, $pt_id, $id);
    } else {
        $stmt = $conn->prepare('UPDATE classes SET name=?, description=?, schedule=?, image=? WHERE id=?');
        $stmt->bind_param('ssssi', $name, $description, $schedule, $image, $id);
    }
    if ($stmt->execute()) {
        $msg = '<div class="alert alert-success">Aula atualizada com sucesso.</div>';
        // Atualiza dados da aula para mostrar no formulário
        $aula = array_merge($aula, $_POST);
    } else {
        $msg = '<div class="alert alert-danger">Erro ao atualizar aula.</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <title>Editar Aula</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Editar Aula</h2>
    <?= $msg ?>
    <form method="post">
        <div class="mb-3">
            <label class="form-label">Nome da Aula</label>
            <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($aula['name']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Descrição</label>
            <textarea name="description" class="form-control" required><?= htmlspecialchars($aula['description']) ?></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Horário</label>
            <input type="text" name="schedule" class="form-control" value="<?= htmlspecialchars($aula['schedule']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Imagem (URL)</label>
            <input type="text" name="image" class="form-control" value="<?= htmlspecialchars($aula['image']) ?>">
        </div>
        <?php if ($_SESSION['user_role'] === 'gestor_ginasio'): ?>
        <div class="mb-3">
            <label class="form-label">Personal Trainer</label>
            <select name="personal_trainer_id" class="form-select">
                <option value="">-- Não Associado --</option>
                <?php foreach ($personal_trainers as $pt): ?>
                    <option value="<?= $pt['id'] ?>" <?= (isset($aula['personal_trainer_id']) && $aula['personal_trainer_id'] == $pt['id']) ? 'selected' : '' ?>><?= htmlspecialchars($pt['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <?php endif; ?>
        <button type="submit" class="btn btn-success">Guardar Alterações</button>
        <a href="gerir_aulas.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
