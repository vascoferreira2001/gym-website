<?php 
// Inclui o header global (menu + bootstrap + início do HTML)
include 'includes/header.php'; 
?>

<!-- ============================================================
     CAROUSEL PRINCIPAL
     ============================================================ -->
<div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">

    <!-- Indicadores (bolinhas) -->
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="2"></button>
        <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="3"></button>
    </div>

    <!-- Slides -->
    <div class="carousel-inner">

        <!-- Slide 1 -->
        <div class="carousel-item active">
            <img src="assets/images/gym1.jpg" class="d-block w-100" alt="Ginásio 1">
            <div class="carousel-caption d-none d-md-block">
                <?php 
                /**
                 * ============================================================
                 * INDEX.PHP — HOMEPAGE DO PROJETO
                 * Esta página apresenta:
                 * - Carousel com 4 imagens externas (Pexels)
                 * - Cards com efeito collapse
                 * - Botões de navegação para Booking
                 * O header e footer são incluídos através de includes para evitar repetição de código.
                 * ============================================================
                 */
                include 'includes/header.php'; 
                ?>

                <!-- ============================================================
                     CAROUSEL PRINCIPAL
                     ============================================================ -->
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
                            <img src="https://images.pexels.com/photos/1552242/pexels-photo-1552242.jpeg" class="d-block w-100" alt="Ginásio 1">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Treina com Energia</h5>
                                <p>Equipamentos modernos e ambiente motivador.</p>
                            </div>
                        </div>
                        <!-- Slide 2 -->
                        <div class="carousel-item">
                            <img src="https://images.pexels.com/photos/1954524/pexels-photo-1954524.jpeg" class="d-block w-100" alt="Aulas de Grupo">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Aulas de Grupo</h5>
                                <p>CrossFit, Cycling, Yoga e muito mais.</p>
                            </div>
                        </div>
                        <!-- Slide 3 -->
                        <div class="carousel-item">
                            <img src="https://images.pexels.com/photos/3823039/pexels-photo-3823039.jpeg" class="d-block w-100" alt="Personal Trainer">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Personal Trainers</h5>
                                <p>Planos personalizados para os teus objetivos.</p>
                            </div>
                        </div>
                        <!-- Slide 4 -->
                        <div class="carousel-item">
                            <img src="https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg" class="d-block w-100" alt="Nutrição">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Nutrição e Saúde</h5>
                                <p>Acompanhamento completo para melhores resultados.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Botões de navegação -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>


                <!-- ============================================================
                     CARDS DE SERVIÇOS
                     Cada card usa uma imagem externa (pexels) para garantir que aparece sempre.
                     O layout é responsivo e todos os blocos estão comentados para explicação académica.
                     ============================================================ -->
                <div class="container mt-5">
                    <h2 class="text-center mb-4">Os Nossos Serviços</h2>
                    <div class="row g-4">
                        <!-- CARD 1: Musculação -->
                        <div class="col-md-3">
                            <div class="card bg-dark text-white h-100">
                                <!-- Imagem externa de musculação -->
                                <img src="https://images.pexels.com/photos/1552242/pexels-photo-1552242.jpeg" class="card-img-top" alt="Musculação">
                                <div class="card-body">
                                    <h5 class="card-title">Musculação</h5>
                                    <p class="card-text">Equipamentos modernos para treinos completos.</p>
                                    <!-- Botão para expandir info -->
                                    <button class="btn btn-warning w-100 mb-2" data-bs-toggle="collapse" data-bs-target="#info1">Info</button>
                                    <!-- Texto expandido -->
                                    <div id="info1" class="collapse text-white">Treina com máquinas de última geração e acompanhamento profissional.</div>
                                    <!-- Botão reservar -->
                                    <a href="booking.php" class="btn btn-outline-light w-100 mt-2">Reservar</a>
                                </div>
                            </div>
                        </div>
                        <!-- CARD 2: Aulas de Grupo -->
                        <div class="col-md-3">
                            <div class="card bg-dark text-white h-100">
                                <img src="https://images.pexels.com/photos/1954524/pexels-photo-1954524.jpeg" class="card-img-top" alt="Aulas de Grupo">
                                <div class="card-body">
                                    <h5 class="card-title">Aulas de Grupo</h5>
                                    <p class="card-text">CrossFit, Cycling, Yoga e muito mais.</p>
                                    <button class="btn btn-warning w-100 mb-2" data-bs-toggle="collapse" data-bs-target="#info2">Info</button>
                                    <div id="info2" class="collapse text-white">Aulas dinâmicas para todos os níveis e objetivos.</div>
                                    <a href="booking.php" class="btn btn-outline-light w-100 mt-2">Reservar</a>
                                </div>
                            </div>
                        </div>
                        <!-- CARD 3: Personal Trainer -->
                        <div class="col-md-3">
                            <div class="card bg-dark text-white h-100">
                                <img src="https://images.pexels.com/photos/3823039/pexels-photo-3823039.jpeg" class="card-img-top" alt="Personal Trainer">
                                <div class="card-body">
                                    <h5 class="card-title">Personal Trainer</h5>
                                    <p class="card-text">Acompanhamento individualizado.</p>
                                    <button class="btn btn-warning w-100 mb-2" data-bs-toggle="collapse" data-bs-target="#info3">Info</button>
                                    <div id="info3" class="collapse text-white">Planos personalizados para resultados rápidos e seguros.</div>
                                    <a href="booking.php" class="btn btn-outline-light w-100 mt-2">Reservar</a>
                                </div>
                            </div>
                        </div>
                        <!-- CARD 4: Nutrição -->
                        <div class="col-md-3">
                            <div class="card bg-dark text-white h-100">
                                <img src="https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg" class="card-img-top" alt="Nutrição">
                                <div class="card-body">
                                    <h5 class="card-title">Nutrição</h5>
                                    <p class="card-text">Planos alimentares completos.</p>
                                    <button class="btn btn-warning w-100 mb-2" data-bs-toggle="collapse" data-bs-target="#info4">Info</button>
                                    <div id="info4" class="collapse text-white">Consultas com nutricionistas especializados em desporto.</div>
                                    <a href="booking.php" class="btn btn-outline-light w-100 mt-2">Reservar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php include 'includes/footer.php'; ?>

        <!-- CARD 2 -->
        <div class="col-md-3">
            <div class="card bg-dark text-white h-100">
                <img src="assets/images/card2.jpg" class="card-img-top" alt="Aulas de Grupo">
                <div class="card-body">
                    <h5 class="card-title">Aulas de Grupo</h5>
                    <p class="card-text">CrossFit, Cycling, Yoga e muito mais.</p>

                    <button class="btn btn-warning w-100 mb-2" data-bs-toggle="collapse" data-bs-target="#info2">
                        Info
                    </button>

                    <div id="info2" class="collapse text-white">
                        Aulas dinâmicas para todos os níveis e objetivos.
                    </div>

                    <a href="booking.php" class="btn btn-outline-light w-100 mt-2">Reservar</a>
                </div>
            </div>
        </div>

        <!-- CARD 3 -->
        <div class="col-md-3">
            <div class="card bg-dark text-white h-100">
                <img src="assets/images/card3.jpg" class="card-img-top" alt="Personal Trainer">
                <div class="card-body">
                    <h5 class="card-title">Personal Trainer</h5>
                    <p class="card-text">Acompanhamento individualizado.</p>

                    <button class="btn btn-warning w-100 mb-2" data-bs-toggle="collapse" data-bs-target="#info3">
                        Info
                    </button>

                    <div id="info3" class="collapse text-white">
                        Planos personalizados para resultados rápidos e seguros.
                    </div>

                    <a href="booking.php" class="btn btn-outline-light w-100 mt-2">Reservar</a>
                </div>
            </div>
        </div>

        <!-- CARD 4 -->
        <div class="col-md-3">
            <div class="card bg-dark text-white h-100">
                <img src="assets/images/card4.jpg" class="card-img-top" alt="Nutrição">
                <div class="card-body">
                    <h5 class="card-title">Nutrição</h5>
                    <p class="card-text">Planos alimentares completos.</p>

                    <button class="btn btn-warning w-100 mb-2" data-bs-toggle="collapse" data-bs-target="#info4">
                        Info
                    </button>

                    <div id="info4" class="collapse text-white">
                        Consultas com nutricionistas especializados em desporto.
                    </div>

                    <a href="booking.php" class="btn btn-outline-light w-100 mt-2">Reservar</a>
                </div>
            </div>
        </div>

    </div>
</div>

<?php 
// Inclui o footer global (scripts + fecho do HTML)
include 'includes/footer.php'; 
?>
