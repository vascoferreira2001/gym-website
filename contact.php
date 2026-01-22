<?php
include 'includes/header.php';
$successMessage = "";
$errorMessage = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $message = $_POST['message'];
    $to = "info@maiagym.pt";
    $subject = "Novo contacto do site Maia GYM";
    $body = "Nome: $name\nEmail: $email\nMensagem:\n$message";
    $headers = "From: $email\r\nReply-To: $email\r\n";
    if (mail($to, $subject, $body, $headers)) {
        $successMessage = "Mensagem enviada com sucesso!";
    } else {
        $errorMessage = "Erro ao enviar mensagem.";
    }
}
?>
<div class="container mt-5 mb-5">
    <h2 class="text-center mb-4 fw-bold" style="color:#ff6633;">Contacte-nos</h2>
    <?php if ($successMessage): ?>
        <div class="alert alert-success text-center">
            <?= $successMessage ?>
        </div>
    <?php elseif ($errorMessage): ?>
        <div class="alert alert-danger text-center">
            <?= $errorMessage ?>
        </div>
    <?php endif; ?>
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
<?php include 'includes/footer.php'; ?>
