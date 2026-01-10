<?php
/**
 * HEADER GLOBAL DO SITE
 * Este ficheiro é incluído em todas as páginas para evitar repetição de código.
 * Contém o menu e o carregamento do Bootstrap.
 */
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GoGym - Ginásio</title>
  <!-- Bootstrap 5 CSS via CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <!-- CSS personalizado do projeto (caminho absoluto para evitar erros de includes) -->
  <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>

<!-- ============================================================
     MENU DE NAVEGAÇÃO GLOBAL
     O menu é responsivo e usa classes Bootstrap para visual moderno.
     ============================================================ -->
<?php if (!isset($_SESSION)) session_start(); ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <!-- Logo/Brand do ginásio -->
    <a class="navbar-brand" href="/index.php">GoGym</a>
    <!-- Botão para menu mobile -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Itens do menu -->
    <div class="collapse navbar-collapse" id="menu">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="/index.php">Início</a></li>
        <li class="nav-item"><a class="nav-link" href="/gallery.php">Galeria</a></li>
        <li class="nav-item"><a class="nav-link" href="/booking.php">Aulas</a></li>
        <li class="nav-item"><a class="nav-link" href="/about.php">Sobre Nós</a></li>
        <li class="nav-item"><a class="nav-link" href="/contact.php">Contacto</a></li>
        <!-- Bloco dinâmico de autenticação -->
        <?php if (!isset($_SESSION['user_id'])): ?>
            <!-- Utilizador não autenticado -->
            <li class="nav-item">
                <a class="nav-link" href="/login.php">Login</a>
            </li>
        <?php else: ?>
            <!-- Utilizador autenticado -->
            <li class="nav-item">
                <span class="nav-link">Olá, <?= htmlspecialchars($_SESSION['user_name']) ?></span>
            </li>
            <?php if ($_SESSION['user_role'] === 'gestor_ginasio'): ?>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/index.php">Admin</a>
                </li>
            <?php endif; ?>
            <li class="nav-item">
                <a class="nav-link" href="/logout.php">Logout</a>
            </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
