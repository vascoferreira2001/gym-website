<?php
/**
 * ============================================================
 * CONTACT.PHP — Página de Contacto (Maia GYM)
 *
 * Esta página:
 * - Apresenta um formulário para o utilizador enviar uma mensagem
 * - Guarda a mensagem na tabela "contacts" da base de dados
 * - Mostra mensagens de sucesso ou erro
 *
 * O objetivo é permitir que os utilizadores entrem em contacto
 * com o ginásio Maia GYM de forma simples e rápida.
 * ============================================================
 */

include 'includes/header.php'; // Inclui o menu e o layout inicial
include 'includes/db.php';     // Ligação à base de dados

// Variáveis de feedback
$successMessage = "";
$errorMessage = "";

/**
 * ============================================================
 * PROCESSAMENTO DO FORMULÁRIO
 * Este bloco só é executado quando o utilizador envia o formulário.
 * ============================================================
 */
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Recolher dados do formulário
    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $message = $_POST['message'];

    // Query SQL para inserir a mensagem
    $sql = "INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)";

    // Preparar a query para evitar SQL Injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $message);

    // Executar e verificar resultado
    if ($stmt->execute()) {
        $successMessage = "A tua mensagem foi enviada com sucesso!";
    } else {
        $errorMessage = "Ocorreu um erro ao enviar a mensagem. Tenta novamente.";
    }

    $stmt->close();
}

?>

<!-- ============================================================
     SECÇÃO DO FORMULÁRIO DE CONTACTO
     ============================================================ -->
<div class="container mt-5">

    <h2 class="text-center mb-4">Contacta-nos</h2>

    <!-- Mensagens de feedback -->
    <?php if ($successMessage): ?>
        <div class="alert alert-success text-center">
            <?= $successMessage ?>
        </div>
    <?php endif; ?>

    <?php if ($errorMessage): ?>
        <div class="alert alert-danger text-center">
            <?= $errorMessage ?>
        </div>
    <?php endif; ?>

    <!-- Formulário -->
    <form method="POST" class="bg-dark text-white p-4 rounded">

        <!-- Nome -->
        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <!-- Mensagem -->
        <div class="mb-3">
            <label class="form-label">Mensagem</label>
            <textarea name="message" class="form-control" rows="4" required></textarea>
        </div>

        <!-- Botões -->
        <button type="submit" class="btn btn-warning w-100 mb-2">Enviar</button>
        <button type="reset" class="btn btn-outline-light w-100">Limpar</button>

    </form>

    <!-- Imagem ilustrativa (opcional) -->
    <div class="text-center mt-4">
        <img src="https://images.pexels.com/photos/1552249/pexels-photo-1552249.jpeg"
             class="img-fluid rounded shadow"
             style="max-width: 400px;"
             alt="Contacto GoGym">
    </div>

</div>

<?php
// Inclui o footer global (scripts + fecho do HTML)
include 'includes/footer.php';
?>
