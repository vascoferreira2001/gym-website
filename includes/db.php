
<?php
/**
 * ============================================================
 * DB.PHP — Ligação à base de dados MySQL (Maia GYM)
 *
 * OBJETIVO:
 * - Criar ligação à base de dados MySQL
 * - Disponibilizar a variável $conn para uso global
 * ============================================================
 */

$host = "localhost";      // Servidor da base de dados
$user = "maiagym";        // Utilizador da base de dados
$pass = "BDUqh8afi@2kvn*1"; // Password do utilizador
$dbname = "maiagym";      // Nome da base de dados

// Criar ligação MySQL
$conn = @new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    // Se falhar, $conn fica a null
    $conn = null;
}
// Caso chegue aqui, a ligação foi bem-sucedida (ou $conn é null)
?>
