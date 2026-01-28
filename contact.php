<?php
// ============================================================
// CONTACT.PHP — Página de Contacto do Maia GYM
// Permite ao utilizador enviar uma mensagem para o ginásio.
// O formulário é validado em JS e processado em PHP (envio por email).
// ============================================================

include 'includes/header.php'; // Inclui o header global
$successMessage = ""; // Mensagem de sucesso
$errorMessage = "";   // Mensagem de erro

// Processamento do formulário de contacto
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name    = $_POST['name'];   // Nome do utilizador
    $email   = $_POST['email'];  // Email do utilizador
    $message = $_POST['message']; // Mensagem
    $to = "info@maiagym.pt"; // Email de destino
    $subject = "Novo contacto do site Maia GYM";
    $body = "Nome: $name\nEmail: $email\nMensagem:\n$message";
    $headers = "From: $email\r\nReply-To: $email\r\n";
    // Tenta enviar o email
    if (mail($to, $subject, $body, $headers)) {
        $successMessage = "Mensagem enviada com sucesso!";
    } else {
        $errorMessage = "Erro ao enviar mensagem.";
    }
}
?>

<!-- =============================== -->
<!-- FORMULÁRIO DE CONTACTO -->
<div class="container mt-5 mb-5">
    <h2 class="text-center mb-4 fw-bold" style="color:#ff6633;">Contacte-nos</h2>
    <!-- Mensagem de sucesso ou erro -->
    <?php if ($successMessage): ?>
        <div class="alert alert-success text-center">
            <?= $successMessage ?>
        </div>
    <?php elseif ($errorMessage): ?>
        <div class="alert alert-danger text-center">
            <?= $errorMessage ?>
        </div>
    <?php endif; ?>
    <!-- Formulário de contacto -->
    <form method="POST" class="mx-auto" style="max-width: 500px;">
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Mensagem</label>
            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-warning w-100 fw-bold" style="background:#ff6633; border:none;">Enviar</button>
    </form>
</div>
<!-- Fim do formulário de contacto -->

<?php include 'includes/footer.php'; ?>
