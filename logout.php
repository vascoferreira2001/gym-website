
<?php
/**
 * ============================================================
 * LOGOUT.PHP — Terminar Sessão do Utilizador
 * ============================================================
 * OBJETIVO:
 * - Destroi a sessão PHP do utilizador
 * - Redireciona para a homepage
 * ============================================================
 */

// Iniciar sessão para poder destruí-la
session_start();

// Remover todas as variáveis de sessão
$_SESSION = array();

// Se existir um cookie de sessão, removê-lo
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(), // Nome do cookie de sessão
        '',             // Valor vazio para eliminar
        time() - 42000, // Expirar no passado
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Destruir a sessão PHP
session_destroy();

// Redirecionar para a homepage
header("Location: index.php");
exit;
