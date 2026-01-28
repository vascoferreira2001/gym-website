<?php
/**
 * HEADER GLOBAL DO SITE
 * Layout premium inspirado em FitnessUp
 * Inclui navbar responsiva e moderna
 */
?>
<!DOCTYPE html>

<?php
/**
 * ============================================================
 * HEADER.PHP — Header global do site Maia GYM
 *
 * OBJETIVO:
 * - Incluir o layout premium e responsivo
 * - Apresentar a navbar moderna com autenticação dinâmica
 * ============================================================
 */
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Maia GYM - Ginásio</title>
  <!-- Bootstrap 5 CSS via CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <!-- CSS personalizado do projeto -->
  <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>

<!-- ============================================================
     NAVBAR MODERNA E RESPONSIVA
     ============================================================ -->
<nav class="navbar navbar-expand-lg navbar-light shadow-sm py-3" style="background:#fff !important; border-bottom:none !important;">
  <div class="container">
    <!-- Logotipo à esquerda -->
    <a class="navbar-brand fw-bold text-uppercase" href="/index.php" style="color:#ff6633; letter-spacing:1px; font-size:2rem;">Maia GYM</a>
    <!-- Botão para menu mobile -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Menu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Itens do menu à direita -->
    <div class="collapse navbar-collapse justify-content-end" id="menu">
      <ul class="navbar-nav mb-2 mb-lg-0 align-items-lg-center gap-lg-3">
        <li class="nav-item"><a class="nav-link" href="/index.php">Início</a></li>
        <li class="nav-item"><a class="nav-link" href="/gallery.php">Galeria</a></li>
        <li class="nav-item"><a class="nav-link" href="/aulas.php">Aulas Marcadas</a></li>
        <li class="nav-item"><a class="nav-link" href="/about.php">Sobre Nós</a></li>
        <li class="nav-item"><a class="nav-link" href="/contact.php">Contacto</a></li>
        <!-- Bloco dinâmico de autenticação -->
        <?php if (!isset($_SESSION)) session_start(); ?>
        <?php if (!isset($_SESSION['user_id'])): ?>
            <!-- Se não estiver autenticado, mostra botão de login -->
            <li class="nav-item">
                <a class="btn fw-bold px-3 py-2" href="/login.php" style="background:#ff6633; color:#fff; border-radius:8px; font-size:1rem; letter-spacing:1px;">
Área Reservada</a>
            </li>
        <?php else: ?>
            <!-- Se autenticado, mostra nome e opções -->
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
