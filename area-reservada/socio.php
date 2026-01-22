<?php
/**
 * Área Reservada do Sócio
 * Permite inscrever-se em aulas (máx. 20 inscrições por aula)
 */
include '../includes/header.php';
@include '../includes/db.php';
session_start();
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'cliente') {
    header('Location: /login.php');
    exit;
}
?>
<div class="container mt-5 mb-5">
  <h2 class="text-center mb-4 fw-bold" style="color:#ff6633;">Área do Sócio</h2>
  <!-- Listagem de aulas disponíveis para inscrição -->
  <div class="card p-4 shadow-sm">
    <h4 class="mb-3">Aulas Disponíveis</h4>
    <div id="aulas-disponiveis">
      <!-- Conteúdo dinâmico a implementar -->
      <p class="text-muted">(Funcionalidade de inscrição e controlo de limite será implementada nos próximos passos.)</p>
    </div>
  </div>
</div>
<?php include '../includes/footer.php'; ?>
