<?php
/**
 * HEADER GLOBAL DO SITE
 * Layout premium inspirado em FitnessUp
 * Inclui navbar responsiva e moderna
 */
if (session_status() === PHP_SESSION_NONE) session_start();
?>
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
        <?php if (!isset($_SESSION)) session_start(); ?>
        <?php
        $request_uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
        $is_area_reservada = strpos($request_uri, '/area-reservada/') === 0;
        $is_autenticado = isset($_SESSION['user_id']);
        $is_area_reservada_autenticado = $is_area_reservada && $is_autenticado && isset($_SESSION['user_role']) && in_array($_SESSION['user_role'], ['cliente','personal_trainer','gestor_ginasio']);
        $is_dashboard = $is_area_reservada && strpos($_SERVER['REQUEST_URI'], '/area-reservada/dashboard.php') !== false;
        ?>
        <?php if ($is_autenticado && (!$is_area_reservada || !$is_dashboard)) : ?>
            <!-- Mostra o botão Voltar à Área Reservada em todas as páginas exceto no dashboard -->
            <li class="nav-item">
              <a class="btn fw-bold px-3 py-2 me-2" href="/area-reservada/dashboard.php" style="background:#ff6633; color:#fff; border-radius:8px; font-size:1rem; letter-spacing:1px;">Voltar à Área Reservada</a>
            </li>
        <?php endif; ?>
        <?php if ($is_autenticado && ($is_area_reservada_autenticado || !$is_dashboard)) : ?>
            <li class="nav-item">
              <a class="btn fw-bold px-3 py-2" href="/logout.php" style="background:#222; color:#fff; border-radius:8px; font-size:1rem; letter-spacing:1px;">Logout</a>
            </li>
        <?php else: ?>
            <li class="nav-item"><a class="nav-link" href="/index.php">Início</a></li>
            <li class="nav-item"><a class="nav-link" href="/gallery.php">Galeria</a></li>
            <li class="nav-item"><a class="nav-link" href="/aulas.php">Aulas Disponíveis</a></li>
            <li class="nav-item"><a class="nav-link" href="/about.php">Sobre Nós</a></li>
            <li class="nav-item"><a class="nav-link" href="/contact.php">Contacto</a></li>
            <?php if (!$is_autenticado): ?>
                <!-- Botão Área Reservada aponta sempre para login -->
                <li class="nav-item">
                  <a class="btn fw-bold px-3 py-2" href="/area-reservada/login.php" style="background:#ff6633; color:#fff; border-radius:8px; font-size:1rem; letter-spacing:1px;">
            Área Reservada</a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                  <a class="nav-link fw-bold" href="/area-reservada/login.php">Área Reservada</a>
                </li>
                <li class="nav-item">
                  <span class="nav-link">Olá, <?= htmlspecialchars($_SESSION['user_name']) ?></span>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/logout.php">Logout</a>
                </li>
            <?php endif; ?>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
