<?php
/**
 * ============================================================
 * FICHEIRO: db.php
 * OBJETIVO: Criar ligação à base de dados MySQL
 * ============================================================
 */
$host = "localhost";
$user = "maiagym";
$pass = "BDUqh8afi@2kvn*1";
$dbname = "maiagym";
$conn = @new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    $conn = null;
}
// Caso chegue aqui, a ligação foi bem-sucedida (ou $conn é null)
?>
