<?php
/**
 * ============================================================
 * ADMIN/DELETE.PHP — Eliminar Registos
 *
 * OBJETIVO:
 * - Eliminar registos de diferentes tabelas, dependendo do "type":
 *
 *   delete.php?type=classes&id=1   -> apaga aula
 *   delete.php?type=bookings&id=5  -> apaga marcação
 *   delete.php?type=contacts&id=3  -> apaga mensagem
 *
 * Este ficheiro é chamado a partir de:
 * - list.php (botões "Apagar")
 *
 * NOTA:
 * - Aqui não mostramos formulário, apenas tratamos a ação e
 *   fazemos redirect de volta à página de listagem.
 * ============================================================
 */

include '../includes/db.php'; // Ligação à base de dados

// Recolher parâmetros da query string
$type = $_GET['type'] ?? null;
$id   = $_GET['id']   ?? null;

// Se faltar algum parâmetro, não prosseguir
if (!$type || !$id) {
    // Em contexto real, poderíamos redirecionar com mensagem de erro
    die("Parâmetros inválidos.");
}

// Definir query consoante o tipo
switch ($type) {

    case 'classes':
        $sql = "DELETE FROM classes WHERE id = ?";
        $redirect = "list.php?type=classes";
        break;

    case 'bookings':
        $sql = "DELETE FROM bookings WHERE id = ?";
        $redirect = "list.php?type=bookings";
        break;

    case 'contacts':
        $sql = "DELETE FROM contacts WHERE id = ?";
        $redirect = "list.php?type=contacts";
        break;

    default:
        die("Tipo inválido.");
}

// Preparar e executar query
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

$stmt->execute();
$stmt->close();

// Redirecionar de volta para a listagem correspondente
header("Location: " . $redirect);
exit;
