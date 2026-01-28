
<?php
/**
 * ============================================================
 * ÁREA-RESERVADA/SOCIO.PHP — Área reservada do sócio
 *
 * OBJETIVO:
 * - Permitir ao sócio inscrever-se em aulas (máx. 20 inscrições por aula)
 * - Listar aulas disponíveis (a implementar)
 * ============================================================
 */

include '../includes/header.php'; // Inclui o header global (layout + menu)
@include '../includes/db.php';    // Inclui a ligação à base de dados

// Iniciar sessão para verificar autenticação
session_start();
// Verificar se o utilizador tem o papel de 'cliente' (sócio)
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'cliente') {
    // Se não for sócio, redireciona para o login
    header('Location: /login.php');
    exit;
}

?>
<div class="container mt-5 mb-5">
  <!-- Título da área reservada do sócio -->
  <h2 class="text-center mb-4 fw-bold" style="color:#ff6633;">Área do Sócio</h2>
  <!-- Card com listagem de aulas disponíveis para inscrição -->
  <div class="card p-4 shadow-sm">
    <h4 class="mb-3">Aulas Disponíveis</h4>
    <div id="aulas-disponiveis">
      <!-- Conteúdo dinâmico a implementar (listagem e inscrição em aulas) -->
      <p class="text-muted">(Funcionalidade de inscrição e controlo de limite será implementada nos próximos passos.)</p>
    </div>
  </div>
</div>

<?php 
// Inclui o footer global
include '../includes/footer.php'; 
?>
