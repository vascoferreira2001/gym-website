
<?php 
// ============================================================
// INDEX.PHP — HOMEPAGE DO PROJETO MAIA GYM
// Estrutura limpa: apenas um header, um bloco hero, um bloco de cards e um footer
// ============================================================
include 'includes/header.php'; 
?>

    <!-- HERO PRINCIPAL -->
    <section class="hero-main">
        <div class="container">
            <div class="row align-items-center justify-content-between" style="min-height: 80vh;">
                <!-- COLUNA ESQUERDA: TEXTO HERO -->
                <div class="col-lg-6 col-md-7 col-12 py-5">
                    <h1 class="hero-title">3 MESES GRÁTIS</h1>
                    <h3 class="hero-subtitle">SEM FIDELIZAÇÃO</h3>
                    <p class="hero-desc">Aproveita a campanha de boas-vindas do Maia GYM e começa já a treinar sem compromisso!</p>
                    <a href="booking.php" class="btn btn-hero">SABER MAIS</a>
                </div>
                <!-- COLUNA DIREITA: IMAGEM FITNESS -->
                <div class="col-lg-5 col-md-5 d-none d-md-flex justify-content-end align-items-center">
                    <img src="https://images.pexels.com/photos/3768913/pexels-photo-3768913.jpeg?auto=compress&fit=crop&w=600&q=80" alt="Fitness Maia GYM" class="hero-img">
                </div>
            </div>
        </div>
        <!-- Formas geométricas decorativas -->
        <div class="hero-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
        </div>
    </section>

    <!-- CARDS DE SERVIÇOS CENTRALIZADOS -->
    <section class="services-main py-5">
        <div class="container">
            <div class="row justify-content-center g-4">
                <!-- Card 1 -->
                <div class="col-md-4">
                    <div class="card service-card text-center">
                        <img src="https://images.pexels.com/photos/3823039/pexels-photo-3823039.jpeg?auto=compress&fit=crop&w=600&q=80" class="card-img-top" alt="Personal Trainer">
                        <div class="card-body">
                            <h5 class="card-title">Personal Trainer</h5>
                            <p class="card-text">Acompanhamento individualizado.</p>
                            <a href="#" class="btn btn-warning">INFO</a>
                            <a href="booking.php" class="btn btn-outline-light ms-2">Reservar</a>
                        </div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col-md-4">
                    <div class="card service-card text-center">
                        <img src="https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg?auto=compress&fit=crop&w=600&q=80" class="card-img-top" alt="Nutrição">
                        <div class="card-body">
                            <h5 class="card-title">Nutrição</h5>
                            <p class="card-text">Planos alimentares completos.</p>
                            <a href="#" class="btn btn-warning">INFO</a>
                            <a href="booking.php" class="btn btn-outline-light ms-2">Reservar</a>
                        </div>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="col-md-4">
                    <div class="card service-card text-center">
                        <img src="https://images.pexels.com/photos/1954524/pexels-photo-1954524.jpeg?auto=compress&fit=crop&w=600&q=80" class="card-img-top" alt="Aulas de Grupo">
                        <div class="card-body">
                            <h5 class="card-title">Aulas de Grupo</h5>
                            <p class="card-text">CrossFit, Cycling, Yoga e muito mais.</p>
                            <a href="#" class="btn btn-warning">INFO</a>
                            <a href="booking.php" class="btn btn-outline-light ms-2">Reservar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER FIXO AO FUNDO -->
    <footer class="footer-main bg-dark text-light py-3 mt-auto">
        <div class="container text-center">
            © 2026 Maia GYM — Todos os direitos reservados.
        </div>
    </footer>


