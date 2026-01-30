<?php
/**
 * ============================================================
 * LOGIN.PHP — Página de Autenticação de Utilizadores (Maia GYM)
 * Agora dentro de /area-reservada
 * ============================================================
 */

// Ativar erros para debugging (apenas em desenvolvimento)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
@include '../includes/db.php'; // Ligação à base de dados
include '../includes/header.php'; // Header global

$loginError = "";
$db_connected = (isset($conn) && $conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_input = trim($_POST['user_input']); // Email ou identificador
    $password = $_POST['password'];           // Password
    if ($db_connected) {
        $sql = "SELECT * FROM users WHERE email = ? OR identifier = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $user_input, $user_input);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password']) || $user['password'] === hash('sha256', $password)) {
                $_SESSION['user_id']   = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_role'] = $user['role'];
                // Redirecionar para o dashboard único
                header("Location: dashboard.php");
                exit;
            } else {
                $loginError = "Password incorreta.";
            }
        } else {
            $loginError = "Utilizador não encontrado.";
        }
        $stmt->close();
    } else {
        $loginError = "Base de dados indisponível.";
    }
}
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-12">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h2 class="text-center mb-4 fw-bold" style="color:#ff6633;">Área Reservada</h2>
                    <?php if ($loginError): ?>
                        <div class="alert alert-danger text-center"><?= $loginError ?></div>
                    <?php endif; ?>
                    <form method="post" autocomplete="off">
                        <div class="mb-3">
                            <label for="user_input" class="form-label">Email ou Identificador</label>
                            <input type="text" class="form-control" id="user_input" name="user_input" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn fw-bold text-white" style="background:#ff6633;">Entrar</button>
                        </div>
                    </form>
                </div>

                <div class="mt-3 text-center">
                    <a href="recuperar.php">Recuperar password</a> |
                    <a href="registar.php">Criar nova conta de cliente</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
