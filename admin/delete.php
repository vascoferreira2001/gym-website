
<?php
/**
 * ============================================================
 * ADMIN/DELETE.PHP — Eliminar Registos (Maia GYM)
 *
 * OBJETIVO:
 * - Mostrar o registo em formulário com campos desativados
 * - Dois botões: "Continuar e Apagar" e "Cancelar"
 * ============================================================
 */

include '../includes/db.php'; // Ligação à base de dados
include '../includes/header.php'; // Header global

$type = $_GET['type'] ?? null;
$id   = $_GET['id']   ?? null;

// Se faltar algum parâmetro, não prosseguir
if (!$type || !$id) {
    die("Parâmetros inválidos.");
}

// Definir query para buscar o registo
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

// Buscar o registo
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();

// Se o formulário for submetido (POST), apagar o registo
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm_delete'])) {
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
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    header("Location: $redirect");
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cancel'])) {
    header("Location: $redirect");
    exit;
}

?>
<div class="container mt-5">
    <h2 class="text-center mb-4">Confirmar Eliminação</h2>
    <div class="alert alert-warning text-center">
        Atenção: Esta ação é irreversível.<br>
        Confirma que queres eliminar o seguinte registo?
    </div>
    <form method="POST" class="bg-dark text-white p-4 rounded">
        <?php if ($type === 'classes'): ?>
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
        <div class="d-flex gap-2">
            <button type="submit" name="confirm_delete" class="btn btn-danger w-50">Continuar e Apagar</button>
            <button type="submit" name="cancel" class="btn btn-secondary w-50">Cancelar</button>
        </div>
    </form>
</div>
<?php include '../includes/footer.php'; ?>
