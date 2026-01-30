

<?php
// registar.php — Registo de novos clientes
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require_once '../includes/db.php';
include '../includes/header.php';
if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit;
}
$msg = '';
$password_gerada = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['registar'])) {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $telemovel = trim($_POST['telemovel']);
    $idade = intval($_POST['idade']);
    $morada = trim($_POST['morada']);
    $password_gerada = bin2hex(random_bytes(4));
    $hash = password_hash($password_gerada, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (name, email, telemovel, idade, morada, password, role) VALUES (?, ?, ?, ?, ?, ?, 'cliente')");
    $stmt->bind_param('sssiss', $nome, $email, $telemovel, $idade, $morada, $hash);
    if ($stmt->execute()) {
        $msg = '<div class="alert alert-success text-center">Conta criada com sucesso!<br>Sua senha provisória: <b>' . $password_gerada . '</b></div>';
    } else {
        $msg = '<div class="alert alert-danger text-center">Erro ao criar conta. Email já registado?</div>';
    }
    $stmt->close();
}
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-12">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h2 class="text-center mb-4 fw-bold" style="color:#ff6633;">Criar Conta de Cliente</h2>
                    <?php if ($msg) echo $msg; ?>
                    <form method="post" autocomplete="off">
                        <input type="hidden" name="registar" value="1">
                        <div class="mb-3">
                            <label class="form-label">Nome</label>
                            <input type="text" class="form-control" name="nome" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Telemóvel</label>
                            <input type="text" class="form-control" name="telemovel" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Idade</label>
                            <input type="number" class="form-control" name="idade" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Morada</label>
                            <input type="text" class="form-control" name="morada" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn fw-bold text-white" style="background:#ff6633;">Criar Conta</button>
                        </div>
                    </form>
                </div>
                <div class="mt-3 text-center">
                    <a href="login.php">Já tenho conta</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include '../includes/footer.php'; ?>
