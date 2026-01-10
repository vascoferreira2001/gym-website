<?php
/**
 * ============================================================
 * FICHEIRO: contact.php
 * OBJETIVO: Página de contacto do ginásio
 * ============================================================
 * Permite ao utilizador enviar mensagem para o ginásio.
 * Utiliza Bootstrap 5 para formulário responsivo e visual moderno.
 * Comentários detalhados para explicação académica.
 */
include 'includes/header.php'; // Inclui o cabeçalho comum
?>

<main class="container py-4">
    <h2 class="text-warning mb-4">Contacte-nos</h2>
    <form action="contact.php" method="post" class="bg-dark text-light p-4 rounded border border-warning">
        <div class="mb-3">
            <label for="name" class="form-label text-warning">Nome</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label text-warning">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label text-warning">Mensagem</label>
            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-warning w-100">Enviar</button>
    </form>
    <?php
    // Processamento do formulário de contacto
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Inclui ligação à base de dados
        include 'includes/db.php';
        // Sanitiza os dados recebidos
        $nome = $conn->real_escape_string($_POST['name']);
        $email = $conn->real_escape_string($_POST['email']);
        $mensagem = $conn->real_escape_string($_POST['message']);
        // Insere na tabela contacts
        $sql = "INSERT INTO contacts (name, email, message) VALUES ('$nome', '$email', '$mensagem')";
        if ($conn->query($sql) === TRUE) {
            echo '<div class="alert alert-success mt-3">Mensagem enviada com sucesso!</div>';
        } else {
            echo '<div class="alert alert-danger mt-3">Erro ao enviar mensagem: ' . $conn->error . '</div>';
        }
        $conn->close();
    }
    ?>
</main>

<?php
include 'includes/footer.php'; // Inclui o rodapé comum
?>
