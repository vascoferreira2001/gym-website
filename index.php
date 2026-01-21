
<?php 
// ============================================================
// INDEX.PHP — HOMEPAGE DO PROJETO MAIA GYM
// Cumpre todos os requisitos do enunciado: carousel, cards, botões, responsividade
// ============================================================
include 'includes/header.php'; 
?>

<!-- CAROUSEL PRINCIPAL (Bootstrap) -->
<section class="container py-5">
    <div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">
        <!-- Indicadores -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="2"></button>
            <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="3"></button>
        </div>
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <img src="https://images.pexels.com/photos/3768913/pexels-photo-3768913.jpeg?auto=compress&fit=crop&w=800&q=80" class="d-block w-100" alt="Fitness Maia GYM">
                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded">
                    <h5>Bem-vindo ao Maia GYM</h5>
                    <p>Treina com os melhores profissionais e equipamentos modernos.</p>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item">
                <img src="https://images.pexels.com/photos/3823039/pexels-photo-3823039.jpeg?auto=compress&fit=crop&w=800&q=80" class="d-block w-100" alt="Personal Trainer">
                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded">
                    <h5>Personal Trainer</h5>
                    <p>Acompanhamento individualizado para atingir os teus objetivos.</p>
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="carousel-item">
                <img src="https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg?auto=compress&fit=crop&w=800&q=80" class="d-block w-100" alt="Nutrição Maia GYM">
                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded">
                    <h5>Nutrição Desportiva</h5>
                    <p>Planos alimentares completos e personalizados.</p>
                </div>
            </div>
            <!-- Slide 4 -->
            <div class="carousel-item">
                <img src="https://images.pexels.com/photos/1954524/pexels-photo-1954524.jpeg?auto=compress&fit=crop&w=800&q=80" class="d-block w-100" alt="Aulas de Grupo Maia GYM">
                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded">
                    <h5>Aulas de Grupo</h5>
                    <p>CrossFit, Cycling, Yoga e muito mais.</p>
                </div>
            </div>
        </div>
        <!-- Controles de navegação -->
        <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</section>

<!-- CARDS DE SERVIÇOS CENTRALIZADOS -->
<section class="services-main py-5">
    <div class="container">
        <div class="row justify-content-center g-4">
            <!-- Card 1 -->
            <div class="col-md-3">
                <div class="card service-card text-center">
                    <img src="https://images.pexels.com/photos/3823039/pexels-photo-3823039.jpeg?auto=compress&fit=crop&w=600&q=80" class="card-img-top" alt="Personal Trainer">
                    <div class="card-body">
                        <h5 class="card-title">Personal Trainer</h5>
                        <p class="card-text">Acompanhamento individualizado.</p>
                        <button class="btn btn-warning" type="button" data-bs-toggle="collapse" data-bs-target="#info1">Expandir</button>
                        <div class="collapse mt-2" id="info1">
                            <p class="text-light">Sessões personalizadas, plano de treino e acompanhamento contínuo.</p>
                        </div>
                        <a href="booking.php" class="btn btn-outline-light ms-2">Reservar</a>
                    </div>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="col-md-3">
                <div class="card service-card text-center">
                    <img src="https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg?auto=compress&fit=crop&w=600&q=80" class="card-img-top" alt="Nutrição">
                    <div class="card-body">
                        <h5 class="card-title">Nutrição</h5>
                        <p class="card-text">Planos alimentares completos.</p>
                        <button class="btn btn-warning" type="button" data-bs-toggle="collapse" data-bs-target="#info2">Expandir</button>
                        <div class="collapse mt-2" id="info2">
                            <p class="text-light">Consultas de nutrição desportiva e acompanhamento nutricional.</p>
                        </div>
                        <a href="booking.php" class="btn btn-outline-light ms-2">Reservar</a>
                    </div>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="col-md-3">
                <div class="card service-card text-center">
                    <img src="https://images.pexels.com/photos/1954524/pexels-photo-1954524.jpeg?auto=compress&fit=crop&w=600&q=80" class="card-img-top" alt="Aulas de Grupo">
                    <div class="card-body">
                        <h5 class="card-title">Aulas de Grupo</h5>
                        <p class="card-text">CrossFit, Cycling, Yoga e muito mais.</p>
                        <button class="btn btn-warning" type="button" data-bs-toggle="collapse" data-bs-target="#info3">Expandir</button>
                        <div class="collapse mt-2" id="info3">
                            <p class="text-light">Aulas dinâmicas para todos os níveis e objetivos.</p>
                        </div>
                        <a href="booking.php" class="btn btn-outline-light ms-2">Reservar</a>
                    </div>
                </div>
            </div>
            <!-- Card 4 -->
            <div class="col-md-3">
                <div class="card service-card text-center">
                    <img src="https://images.pexels.com/photos/2261485/pexels-photo-2261485.jpeg?auto=compress&fit=crop&w=600&q=80" class="card-img-top" alt="Musculação">
                    <div class="card-body">
                        <h5 class="card-title">Musculação</h5>
                        <p class="card-text">Equipamentos modernos e treino de força.</p>
                        <button class="btn btn-warning" type="button" data-bs-toggle="collapse" data-bs-target="#info4">Expandir</button>
                        <div class="collapse mt-2" id="info4">
                            <p class="text-light">Treinos de força com acompanhamento profissional.</p>
                        </div>
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


