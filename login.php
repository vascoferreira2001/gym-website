
<?php
/**
 * ============================================================
 * LOGIN.PHP — Página de Autenticação de Utilizadores (Maia GYM)
 *
 * OBJETIVO:
 * - Permitir login por email ou identificador
 * - Redirecionar para a área correta consoante o papel do utilizador
 * ============================================================
 */

// Ativar erros para debugging (apenas em desenvolvimento)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Iniciar sessão para gerir autenticação
session_start();
@include 'includes/db.php'; // Ligação à base de dados
include 'includes/header.php'; // Header global

// Variável para mensagens de erro
$loginError = "";
$db_connected = (isset($conn) && $conn);

// ============================================================
// PROCESSAMENTO DO FORMULÁRIO DE LOGIN
// ============================================================
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_input = trim($_POST['user_input']); // Email ou identificador
    $password = $_POST['password'];           // Password
    if ($db_connected) {
        // Procurar utilizador por email ou identificador
        $sql = "SELECT * FROM users WHERE email = ? OR identifier = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $user_input, $user_input);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            // Verificar password (hash seguro ou legacy sha256)
            if (password_verify($password, $user['password']) || $user['password'] === hash('sha256', $password)) {
                // Guardar dados do utilizador na sessão
                $_SESSION['user_id']   = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_role'] = $user['role'];
                // Redirecionar consoante o papel
                switch ($user['role']) {
                    case 'gestor_ginasio':
                        header("Location: admin/index.php"); break;
                    case 'gestora_clientes':
                        header("Location: admin/list.php?type=bookings"); break;
                    case 'professor':
                        header("Location: area-reservada/professor.php"); break;
                    case 'personal_trainer':
                        header("Location: area-reservada/professor.php"); break;
                    case 'socio':
                        header("Location: area-reservada/socio.php"); break;
                    case 'cliente':
                    default:
                        header("Location: index.php"); break;
                }
                exit;
            } else {
                $loginError = "Password incorreta.";
            }
        } else {
            $loginError = "Identificador ou email não encontrado.";
        }
        $stmt->close();
    } else {
        $loginError = "Base de dados indisponível. Tente mais tarde.";
    }
}
?>


<style>
/* ============================================================
   ESTILOS DA PÁGINA DE LOGIN
   ============================================================ */
.login-bg {
    min-height: 80vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(120deg, #fff 60%, #ff6633 100%);
}
.login-card {
    background: #181b1f;
    border-radius: 18px;
    box-shadow: 0 4px 32px rgba(0,0,0,0.10);
    padding: 2.5rem 2rem 2rem 2rem;
    max-width: 420px;
    width: 100%;
    margin: 0 auto;
}
.login-title {
    color: #ff6633;
    font-weight: 800;
    letter-spacing: 1px;
    text-align: center;
    margin-bottom: 2rem;
    font-size: 2.2rem;
    text-transform: uppercase;
}
.login-card .form-label {
    color: #fff;
    font-weight: 600;
    letter-spacing: 0.5px;
}
.login-card .form-control {
    background: #23262b;
    color: #fff;
    border: none;
    border-radius: 8px;
    font-size: 1.1rem;
    margin-bottom: 1.2rem;
}
.login-card .form-control:focus {
    box-shadow: 0 0 0 2px #ff6633;
    border: none;
}
.login-card .btn-warning {
    background: #ffdd00;
    color: #181b1f;
    font-weight: 800;
    font-size: 1.15rem;
    border-radius: 8px;
    border: none;
    letter-spacing: 1px;
    margin-top: 0.5rem;
    transition: background 0.2s;
}
.login-card .btn-warning:hover {
    background: #ffb300;
    color: #fff;
}
.login-card .input-group-text {
    background: #23262b;
    color: #ff6633;
    border: none;
    border-radius: 8px 0 0 8px;
    font-size: 1.3rem;
}
@media (max-width: 600px) {
    .login-card { padding: 1.2rem 0.5rem; }
    .login-title { font-size: 1.3rem; }
}
</style>

<!-- ============================================================
     FORMULÁRIO DE LOGIN
     ============================================================ -->
<div class="login-bg">
  <div class="login-card">
    <!-- Título do formulário -->
    <div class="login-title">Login</div>
    <!-- Mensagem de erro, se existir -->
    <?php if ($loginError): ?>
      <div class="alert alert-danger text-center mb-3 py-2">
        <?= $loginError ?>
      </div>
    <?php endif; ?>
        <form method="POST" autocomplete="on">
            <!-- Campo para identificador ou email -->
            <div class="mb-3">
                <label class="form-label" for="login-user-input">Identificador ou Email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" name="user_input" id="login-user-input" class="form-control" required autocomplete="username">
                </div>
            </div>
            <!-- Campo para password -->
            <div class="mb-3">
                <label class="form-label" for="login-password">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" name="password" id="login-password" class="form-control" required autocomplete="current-password">
                </div>
            </div>
            <!-- Botão de submissão -->
            <button type="submit" class="btn btn-warning w-100">Entrar</button>
        </form>
  </div>
</div>

<?php 
// Inclui o footer global
include 'includes/footer.php'; 
?>
