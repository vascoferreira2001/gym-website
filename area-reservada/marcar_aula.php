<?php
// Processa marcação de aula pelo cliente
session_start();
@include '../includes/db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'cliente') {
    header('Location: /area-reservada/login.php');
    exit;
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $class_id = intval($_POST['class_id']);
    $date = $_POST['date'];
    $time = $_POST['time'];
    $notes = trim($_POST['notes'] ?? '');
    // Buscar dados do utilizador
    $stmt = $conn->prepare('SELECT name, email FROM users WHERE id = ?');
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $stmt->bind_result($name, $email);
    $stmt->fetch();
    $stmt->close();
    // Inserir marcação
    $stmt2 = $conn->prepare('INSERT INTO bookings (class_id, name, email, date, time, notes) VALUES (?, ?, ?, ?, ?, ?)');
    $stmt2->bind_param('isssss', $class_id, $name, $email, $date, $time, $notes);
    if ($stmt2->execute()) {
        header('Location: dashboard.php?msg=success');
        exit;
    } else {
        header('Location: dashboard.php?msg=erro');
        exit;
    }
}
header('Location: dashboard.php');
exit;
