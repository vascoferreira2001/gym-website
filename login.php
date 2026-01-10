<?php
/**
 * ============================================================
 * LOGIN.PHP — Página de Autenticação
 *
 * Esta página:
 * - Apresenta um formulário de login
 * - Valida credenciais na tabela "users"
 * - Cria sessão PHP
 * - Redireciona consoante o tipo de utilizador
 * ============================================================
 */

session_start();                // Iniciar sessão
include 'includes/db.php';      // Ligação à BD
include 'includes/header.php';  // Header global

$loginError = "";               // Mensagem de erro (se existir)

/**
 * ============================================================
 * PROCESSAMENTO DO FORMULÁRIO
 * ============================================================
 */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Recolher dados do formulário
    $email    = $_POST['email'];
    $password = $_POST['password'];

    // Query para buscar utilizador pelo email
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    // Verificar se o utilizador existe
    if ($result->num_rows === 1) {

        $user = $result->fetch_assoc();

        // Verificar password encriptada
        if ($user['password'] === hash('sha256', $password)) {

            // Guardar dados na sessão
            $_SESSION['user_id']   = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_role'] = $user['role'];

            // ============================================================
            // Redirecionamento do utilizador consoante o seu cargo (role)
            // ============================================================
            switch ($user['role']) {
                case 'gestor_ginasio':
                    // Gestor principal do ginásio: acesso ao dashboard admin
                    header("Location: admin/index.php");
                    break;
                case 'gestora_clientes':
                    // Gestora de clientes: acesso direto à gestão de marcações
                    header("Location: admin/list.php?type=bookings");
                    break;
                case 'professor':
                    // Professor: acesso à gestão/listagem de aulas
                    header("Location: admin/list.php?type=classes");
                    break;
                case 'personal_trainer':
                    // Personal trainer: acesso à gestão/listagem de marcações
                    header("Location: admin/list.php?type=bookings");
                    break;
                case 'cliente':
                default:
                    // Cliente ou perfil desconhecido: redireciona para homepage
                    header("Location: index.php");
                    break;
            }
            exit; // Termina o script após o redirecionamento

        } else {
            $loginError = "Password incorreta.";
        }

    } else {
        $loginError = "Email não encontrado.";
    }

    $stmt->close();
}
?>

<div class="container mt-5">

    <h2 class="text-center mb-4">Login</h2>

    <!-- Mensagem de erro -->
    <?php if ($loginError): ?>
        <div class="alert alert-danger text-center">
            <?= $loginError ?>
        </div>
    <?php endif; ?>

    <!-- Formulário de Login -->
    <form method="POST" class="bg-dark text-white p-4 rounded">

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-warning w-100">Entrar</button>

    </form>

</div>

<?php include 'includes/footer.php'; ?>
