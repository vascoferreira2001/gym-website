<?php
// recuperar.php — Recuperação de senha
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require_once '../includes/db.php';
include '../includes/header.php';
$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recuperar'])) {
    $email = trim($_POST['email']);
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows === 1) {
        // Gerar nova password provisória
        $nova_pass = bin2hex(random_bytes(4));
        $hash = password_hash($nova_pass, PASSWORD_DEFAULT);
        $stmt->close();
        $up = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
        $up->bind_param('ss', $hash, $email);
        if ($up->execute()) {
            $msg = '<div class="alert alert-success text-center">Nova password provisória: <b>' . $nova_pass . '</b><br>Altere após login.</div>';
        } else {
            $msg = '<div class="alert alert-danger text-center">Erro ao atualizar password.</div>';
        }
        $up->close();
    } else {
        $msg = '<div class="alert alert-warning text-center">Email não encontrado.</div>';
    }
    $stmt->close();
}
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-12">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h2 class="text-center mb-4 fw-bold" style="color:#ff6633;">Recuperar Password</h2>
                    <?php if ($msg) echo $msg; ?>
                    <form method="post" autocomplete="off">
                        <input type="hidden" name="recuperar" value="1">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn fw-bold text-white" style="background:#ff6633;">Recuperar</button>
                        </div>
                    </form>
                </div>
                <div class="mt-3 text-center">
                    <a href="login.php">Voltar ao login</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include '../includes/footer.php'; ?>
