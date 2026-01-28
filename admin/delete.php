<?php
/**
 * ============================================================
 * ADMIN/DELETE.PHP — Eliminar Registos (Maia GYM)
 *
 * OBJETIVO:
 * - Mostrar o registo em formulário com campos desativados para confirmação
 * - Dois botões: "Continuar e Apagar" (confirma e elimina) e "Cancelar" (volta atrás)
 * - Suporta eliminação de aulas (classes), marcações (bookings) e contactos (contacts)
 * ============================================================
 */

// Inclui ligação à base de dados e header global
include '../includes/db.php';
include '../includes/header.php';

// Obtém o tipo de registo e o ID a eliminar a partir dos parâmetros GET
$type = $_GET['type'] ?? null;
$id   = $_GET['id']   ?? null;

// Se faltar algum parâmetro obrigatório, termina o script
if (!$type || !$id) {
    die("Parâmetros inválidos.");
}

// Define a query SQL e a página de redirecionamento conforme o tipo de registo
switch ($type) {
    case 'classes':
        $sql = "SELECT * FROM classes WHERE id = ?";
        $redirect = "list.php?type=classes";
        break;
    case 'bookings':
        $sql = "SELECT * FROM bookings WHERE id = ?";
        $redirect = "list.php?type=bookings";
        break;
    case 'contacts':
        $sql = "SELECT * FROM contacts WHERE id = ?";
        $redirect = "list.php?type=contacts";
        break;
    default:
        die("Tipo inválido.");
}

// Busca o registo a eliminar na base de dados
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();

// Se o formulário for submetido e o utilizador confirmar a eliminação
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm_delete'])) {
    // Define a query de eliminação conforme o tipo
    switch ($type) {
        case 'classes':
            $sql = "DELETE FROM classes WHERE id = ?";
            break;
        case 'bookings':
            $sql = "DELETE FROM bookings WHERE id = ?";
            break;
        case 'contacts':
            $sql = "DELETE FROM contacts WHERE id = ?";
            break;
    }
    // Executa a query de eliminação
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    // Redireciona para a listagem após eliminar
    header("Location: $redirect");
    exit;
}

// Se o utilizador clicar em "Cancelar", volta para a listagem
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cancel'])) {
    header("Location: $redirect");
    exit;
}

?>

<!-- =============================== -->
<!-- FORMULÁRIO DE CONFIRMAÇÃO DE ELIMINAÇÃO -->
<!-- Mostra os dados do registo a eliminar, todos os campos desativados -->
<div class="container mt-5">
    <h2 class="text-center mb-4">Confirmar Eliminação</h2>
    <div class="alert alert-warning text-center">
        Atenção: Esta ação é irreversível.<br>
        Confirma que queres eliminar o seguinte registo?
    </div>
    <form method="POST" class="bg-dark text-white p-4 rounded">
        <?php if ($type === 'classes'): ?>
            <!-- Dados da aula (classe) -->
            <div class="mb-3">
                <label class="form-label">Nome da Aula</label>
                <input type="text" class="form-control" value="<?= htmlspecialchars($row['name']) ?>" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Descrição</label>
                <textarea class="form-control" disabled><?= htmlspecialchars($row['description']) ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Horário</label>
                <input type="text" class="form-control" value="<?= htmlspecialchars($row['schedule']) ?>" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Imagem</label>
                <input type="text" class="form-control" value="<?= htmlspecialchars($row['image']) ?>" disabled>
            </div>
        <?php elseif ($type === 'bookings'): ?>
            <!-- Dados da marcação -->
            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text" class="form-control" value="<?= htmlspecialchars($row['name']) ?>" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" value="<?= htmlspecialchars($row['email']) ?>" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Data</label>
                <input type="text" class="form-control" value="<?= htmlspecialchars($row['date']) ?>" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Hora</label>
                <input type="text" class="form-control" value="<?= htmlspecialchars($row['time']) ?>" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Notas</label>
                <textarea class="form-control" disabled><?= htmlspecialchars($row['notes']) ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Newsletter</label>
                <input type="text" class="form-control" value="<?= $row['newsletter'] ? 'Sim' : 'Não' ?>" disabled>
            </div>
        <?php elseif ($type === 'contacts'): ?>
            <!-- Dados do contacto -->
            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text" class="form-control" value="<?= htmlspecialchars($row['name']) ?>" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" value="<?= htmlspecialchars($row['email']) ?>" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Mensagem</label>
                <textarea class="form-control" disabled><?= htmlspecialchars($row['message']) ?></textarea>
            </div>
        <?php endif; ?>
        <!-- Botões de ação: confirmar eliminação ou cancelar -->
        <div class="d-flex gap-2">
            <button type="submit" name="confirm_delete" class="btn btn-danger w-50">Continuar e Apagar</button>
            <button type="submit" name="cancel" class="btn btn-secondary w-50">Cancelar</button>
        </div>
    </form>
</div>
<!-- Fim do formulário de confirmação -->

<?php include '../includes/footer.php'; ?>
