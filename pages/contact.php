<?php
/**
 * ============================================================
 * PAGES/CONTACT.PHP — Página de Contactos (Maia GYM)
 *
 * Esta página apresenta um formulário de contacto simples (não funcional).
 * Serve para fins de demonstração e estrutura académica.
 * ============================================================
 */

include '../includes/header.php'; // Inclui o menu e o layout inicial
?>
<main class="container mt-5 mb-5">
  <!-- Título da página -->
  <h2 class="text-center mb-4 fw-bold" style="color:#ff6633;">Contactos</h2>
  <!-- Formulário de contacto (apenas visual) -->
  <form class="mx-auto" style="max-width: 500px;">
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
</main>
<?php
include '../includes/footer.php'; // Inclui o rodapé global
?>
