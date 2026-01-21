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
 *
 * Layout premium, moderno e responsivo
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
        $successMessage = "Mensagem enviada com sucesso!";
    } else {
        $errorMessage = "Erro ao enviar mensagem.";
    }

    $stmt->close();
}
?>

<!-- ============================================================
     FORMULÁRIO DE CONTACTO
     ============================================================ -->
<div class="container mt-5 mb-5">

    <h2 class="text-center mb-4 fw-bold" style="color:#ff6633;">Contacte-nos</h2>

    <!-- Mensagens de feedback -->
    <?php if ($successMessage): ?>
        <div class="alert alert-success text-center">
            <?= $successMessage ?>
        </div>
    <?php elseif ($errorMessage): ?>
        <div class="alert alert-danger text-center">
            <?= $errorMessage ?>
        </div>
    <?php endif; ?>

    <!-- Formulário -->
    <form method="POST" class="mx-auto" style="max-width: 500px;">

        <!-- Nome -->
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <!-- Mensagem -->
        <div class="mb-3">
            <label for="message" class="form-label">Mensagem</label>
            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
        </div>

        <!-- Botões -->
        <button type="submit" class="btn btn-warning w-100 fw-bold" style="background:#ff6633; border:none;">Enviar</button>

    </form>

</div>

<?php
// Inclui o footer global (scripts + fecho do HTML)
include 'includes/footer.php';
?>
