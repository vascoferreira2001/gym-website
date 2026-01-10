<?php
// ============================================================
// PROTEÇÃO DE PÁGINA — Apenas utilizadores autenticados
// ============================================================
session_start(); // Inicia a sessão para aceder às variáveis de sessão

// Verifica se o utilizador está autenticado (existe user_id na sessão)
if (!isset($_SESSION['user_id'])) {
    // Se não estiver autenticado, redireciona para o login
    header("Location: login.php");
    exit; // Termina o script para evitar execução do resto da página
}
?>

<?php include 'includes/header.php'; ?>

<div class="container mt-5">
    <h1 class="text-center">Página em construção</h1>
</div>

<?php include 'includes/footer.php'; ?>
