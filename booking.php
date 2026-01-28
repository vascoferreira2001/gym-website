
<?php
/**
 * ============================================================
 * BOOKING.PHP — Página de Marcação de Aulas (Maia GYM)
 *
 * OBJETIVO:
 * - Permitir ao utilizador autenticado reservar uma aula
 * - Formulário moderno, responsivo e simples
 * ============================================================
 */

// ============================================================
// PROTEÇÃO DE PÁGINA — Apenas utilizadores autenticados
// ============================================================
session_start(); // Inicia a sessão para aceder às variáveis de sessão

// Verifica se o utilizador está autenticado (existe user_id na sessão)
if (!isset($_SESSION['user_id'])) {
    // Se não estiver autenticado, redireciona para o login
    header("Location: login.php");
    exit; // Termina o script para evitar execução do resto da página
}

include 'includes/header.php'; // Inclui o header global (layout + menu)

?>

<!-- ============================================================
     FORMULÁRIO DE MARCAÇÃO DE AULA
     ============================================================ -->
<div class="container mt-5 mb-5">
    <!-- Título da página -->
    <h2 class="text-center mb-4 fw-bold" style="color:#ff6633;">Marca a tua Aula</h2>
    <!-- Formulário de reserva de aula -->
    <form class="mx-auto" style="max-width: 500px;">
        <!-- Campo Nome -->
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <!-- Campo Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <!-- Seleção da Aula -->
        <div class="mb-3">
            <label for="class" class="form-label">Aula</label>
            <select class="form-select" id="class" name="class" required>
                <option value="">Seleciona uma aula</option>
                <option>Personal Trainer</option>
                <option>Nutrição</option>
                <option>Aulas de Grupo</option>
                <option>Musculação</option>
            </select>
        </div>
        <!-- Seleção da Data -->
        <div class="mb-3">
            <label for="date" class="form-label">Data</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <!-- Botão de submissão -->
        <button type="submit" class="btn btn-warning w-100 fw-bold" style="background:#ff6633; border:none;">Reservar</button>
    </form>
</div>

<?php 
// Inclui o footer global
include 'includes/footer.php'; 
?>
