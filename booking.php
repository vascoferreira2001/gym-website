<?php
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
?>

<?php
/**
 * BOOKING.PHP — Página de Marcação de Aulas (Maia GYM)
 * Layout premium, moderno e responsivo
 */
include 'includes/header.php';
?>

<!-- FORMULÁRIO DE MARCAÇÃO DE AULA -->
<div class="container mt-5 mb-5">
    <h2 class="text-center mb-4 fw-bold" style="color:#ff6633;">Marca a tua Aula</h2>
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
            <label for="class" class="form-label">Aula</label>
            <select class="form-select" id="class" name="class" required>
                <option value="">Seleciona uma aula</option>
                <option>Personal Trainer</option>
                <option>Nutrição</option>
                <option>Aulas de Grupo</option>
                <option>Musculação</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Data</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <button type="submit" class="btn btn-warning w-100 fw-bold" style="background:#ff6633; border:none;">Reservar</button>
    </form>
</div>
<?php include 'includes/footer.php'; ?>
