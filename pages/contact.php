<?php
include '../includes/header.php';
?>
<main class="container mt-4">
  <h2>Contactos</h2>
  <form>
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
    <button type="submit" class="btn btn-primary">Enviar</button>
  </form>
</main>
<?php
include '../includes/footer.php';
?>
