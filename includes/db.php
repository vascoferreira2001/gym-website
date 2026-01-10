
<?php
/**
 * ============================================================
 * FICHEIRO: db.php
 * OBJETIVO: Criar ligação à base de dados MySQL
 * ============================================================
 */

$host = "localhost";   // Servidor da BD
$user = "root";        // Utilizador MySQL
$pass = "";            // Password MySQL
$dbname = "gym_db";    // Nome da BD criada

// Criar ligação
$conn = new mysqli($host, $user, $pass, $dbname);

/**
 * Verificar se a ligação falhou
 * mysqli_connect_errno() devolve um código de erro
 */
if ($conn->connect_error) {
    die("Erro na ligação à base de dados: " . $conn->connect_error);
}

// Caso chegue aqui, a ligação foi bem-sucedida
?>
