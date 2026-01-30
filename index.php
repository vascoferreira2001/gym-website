
<?php
/**
 * ============================================================
 * INDEX.PHP — HOMEPAGE DO MAIA GYM
 *
 * Página inicial do site. Apresenta:
 * - Carousel premium com 4 slides (Swiper.js)
 * - Secção de destaque com Personal Trainer
 * - Cards de serviços com expand/collapse
 * - Secção de app móvel e ringue de combate
 *
 * Todo o layout é responsivo e utiliza Bootstrap 5.
 * ============================================================
 */

include 'includes/header.php'; // Inclui o header global (menu, Bootstrap, início do HTML)
?>


<!-- ============================= -->
<!-- SLIDE SWIPER PREMIUM (4 slides)
     SLIDE principal da homepage, com 4 slides ilustrativos dos serviços do ginásio.
     Cada slide tem imagem de fundo, título, descrição e botão de ação.
-->
<!-- Swiper CSS (carregado via CDN) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<section class="hero-main p-0" style="background:none;">
  <div class="swiper mySwiper">
    <div class="swiper-wrapper">
      <!-- Slide 1: Treina com os melhores -->
      <!-- Slide com imagem de fundo, título, descrição e botão -->
      <div class="swiper-slide d-flex align-items-center justify-content-center" style="background:url('https://images.pexels.com/photos/3768913/pexels-photo-3768913.jpeg?auto=compress&fit=crop&w=1500&q=80') center/cover no-repeat; min-height:60vh;">
        <div class="container text-center text-white py-5" style="background: rgba(0,0,0,0.45); border-radius: 18px; max-width: 600px;">
          <h1 class="display-4 fw-bold mb-3">Treina com os melhores</h1>
          <p class="lead mb-4">Profissionais, equipamentos modernos e acompanhamento personalizado.</p>
          <a href="/area-reservada/login.php" class="btn btn-warning btn-lg fw-bold px-5 py-2" style="background:#ff6633; border:none;">Saber Mais</a>
        </div>
      </div>
      <!-- Slide 2: Personal Trainer -->
      <div class="swiper-slide d-flex align-items-center justify-content-center" style="background:url('https://images.pexels.com/photos/3823039/pexels-photo-3823039.jpeg?auto=compress&fit=crop&w=1500&q=80') center/cover no-repeat; min-height:60vh;">
        <div class="container text-center text-white py-5" style="background: rgba(0,0,0,0.45); border-radius: 18px; max-width: 600px;">
          <h1 class="display-4 fw-bold mb-3">Personal Trainer</h1>
          <p class="lead mb-4">Acompanhamento individualizado para atingir os teus objetivos.</p>
          <a href="/area-reservada/login.php" class="btn btn-warning btn-lg fw-bold px-5 py-2" style="background:#ff6633; border:none;">Saber Mais</a>
        </div>
      </div>
      <!-- Slide 3: Nutrição Desportiva -->
      <div class="swiper-slide d-flex align-items-center justify-content-center" style="background:url('https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg?auto=compress&fit=crop&w=1500&q=80') center/cover no-repeat; min-height:60vh;">
        <div class="container text-center text-white py-5" style="background: rgba(0,0,0,0.45); border-radius: 18px; max-width: 600px;">
          <h1 class="display-4 fw-bold mb-3">Nutrição Desportiva</h1>
          <p class="lead mb-4">Planos alimentares completos e personalizados.</p>
          <a href="/area-reservada/login.php" class="btn btn-warning btn-lg fw-bold px-5 py-2" style="background:#ff6633; border:none;">Saber Mais</a>
        </div>
      </div>
      <!-- Slide 4: Aulas de Grupo -->
      <div class="swiper-slide d-flex align-items-center justify-content-center" style="background:url('https://images.pexels.com/photos/1954524/pexels-photo-1954524.jpeg?auto=compress&fit=crop&w=1500&q=80') center/cover no-repeat; min-height:60vh;">
        <div class="container text-center text-white py-5" style="background: rgba(0,0,0,0.45); border-radius: 18px; max-width: 600px;">
          <h1 class="display-4 fw-bold mb-3">Aulas de Grupo</h1>
          <p class="lead mb-4">CrossFit, Cycling, Yoga e muito mais.</p>
          <a href="/area-reservada/login.php" class="btn btn-warning btn-lg fw-bold px-5 py-2" style="background:#ff6633; border:none;">Saber Mais</a>
        </div>
      </div>
    </div>
    <!-- Controles Swiper: paginação e navegação (setas e bolinhas) -->
    <div class="swiper-pagination"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
  </div>
</section>
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
  // Inicialização do Swiper com autoplay, loop e navegação
  const swiper = new Swiper('.mySwiper', {
    loop: true,
    autoplay: { delay: 5000 },
    navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
    pagination: { el: '.swiper-pagination', clickable: true },
  });
</script>

<!-- ÁREA DE DESTAQUE INSPIRADORA: PERSONAL TRAINER INÊS SILVA -->
<section class="py-5 bg-white">
  <div class="container">
    <div class="row align-items-center g-4">
      <!-- Texto inspirador -->
      <div class="col-md-6 col-12 d-flex flex-column justify-content-center">
        <h2 class="fw-bold mb-2" style="font-family:'Poppins',sans-serif; color:#1a2b2b; font-size:2.3rem;">Faz como a Personal Trainer Inês Silva<br>visita o Maia GYM!</h2>
        <div style="width:40px; height:4px; background:#ffd600; margin-bottom:1rem;"></div>
        <p class="mb-4" style="font-size:1.2rem; color:#233;">Descobre a tua melhor versão, supera-te e inspira quem está à tua volta.<br>O Maia GYM é o teu espaço para crescer, evoluir e conquistar resultados.</p>
        <a href="/area-reservada/login.php" class="btn btn-warning fw-bold text-white" style="background:#ff6633; border:none; max-width:200px;">SABER MAIS</a>
      </div>
      <!-- Imagem de destaque -->
      <div class="col-md-6 col-12 text-center">
        <img src="assets/images/PersonalTrainer-Ines.jpeg" alt="Personal Trainer Inês Silva Maia GYM" class="img-fluid rounded-4 shadow" style="max-width: 480px;">
      </div>
    </div>
  </div>
</section>


<!-- ============================= -->
<!-- SECÇÃO DE SERVIÇOS/VALORES COM CARDS EXPAND/COLLAPSE
  Cada card representa um serviço do ginásio.
  O botão "Mais info" expande uma descrição detalhada usando Bootstrap Collapse.
  O botão "Reservar" leva para a página de marcação.
-->
<!-- Fim dos cards com expand/collapse -->
<!--
  Observações:
  - O expand/collapse dos cards usa Bootstrap Collapse (data-bs-toggle="collapse").
  - O Swiper.js é carregado via CDN e inicializado no script acima.
  - Todo o código está comentado para facilitar manutenção e compreensão.
-->
<section class="services-main py-5">
  <div class="container">
    <div class="row justify-content-center g-4">

      <!-- Card 1: Aula de Pilates -->
      <div class="col-md-3 col-12">
        <div class="card service-card text-center h-100">
          <img src="https://images.pexels.com/photos/414029/pexels-photo-414029.jpeg?auto=compress&fit=crop&w=600&q=80" class="card-img-top mx-auto mt-3" alt="Aula de Pilates" style="width:90px; height:90px; object-fit:cover; border-radius:50%; border:3px solid #ff6633;">
          <div class="card-body">
            <h5 class="card-title fw-bold">Aula de Pilates</h5>
            <p class="card-text">Melhora a flexibilidade, postura e bem-estar físico e mental.</p>
            <div class="d-flex justify-content-center gap-2 mb-2">
              <button class="btn btn-info fw-bold px-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCard1" aria-expanded="false" aria-controls="collapseCard1">Saber Mais</button>
              <a href="/area-reservada/login.php" class="btn btn-outline-warning fw-bold px-3 reservar-btn" style="color:#ff6633; border:2px solid #ff6633; background:none;">Reservar</a>
            </div>
            <div class="collapse text-start mt-2" id="collapseCard1">
              <p class="small">Aula focada em alongamentos, fortalecimento do core e melhoria da postura. Ideal para todas as idades.</p>
            </div>
          </div>
        </div>
      </div>
      <!-- Card 2: Aulas de Yoga -->
      <div class="col-md-3 col-12">
        <div class="card service-card text-center h-100">
          <img src="https://images.pexels.com/photos/3822622/pexels-photo-3822622.jpeg?auto=compress&fit=crop&w=600&q=80" class="card-img-top mx-auto mt-3" alt="Aulas de Yoga" style="width:90px; height:90px; object-fit:cover; border-radius:50%; border:3px solid #ff6633;">
          <div class="card-body">
            <h5 class="card-title fw-bold">Aulas de Yoga</h5>
            <p class="card-text">Equilíbrio, relaxamento, energia e bem-estar para corpo e mente.</p>
            <div class="d-flex justify-content-center gap-2 mb-2">
              <button class="btn btn-info fw-bold px-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCard2" aria-expanded="false" aria-controls="collapseCard2">Saber Mais</button>
              <a href="/area-reservada/login.php" class="btn btn-outline-warning fw-bold px-3 reservar-btn" style="color:#ff6633; border:2px solid #ff6633; background:none;">Reservar</a>
            </div>
            <div class="collapse text-start mt-2" id="collapseCard2">
              <p class="small">Sessões de Yoga para todos os níveis, promovendo relaxamento, flexibilidade e bem-estar mental.</p>
            </div>
          </div>
        </div>
      </div>
      <!-- Card 3: Aula de CrossFit -->
      <div class="col-md-3 col-12">
        <div class="card service-card text-center h-100">
          <img src="https://images.pexels.com/photos/1552242/pexels-photo-1552242.jpeg?auto=compress&fit=crop&w=600&q=80" class="card-img-top mx-auto mt-3" alt="Aula de CrossFit" style="width:90px; height:90px; object-fit:cover; border-radius:50%; border:3px solid #ff6633;">
          <div class="card-body">
            <h5 class="card-title fw-bold">Aula de CrossFit</h5>
            <p class="card-text">Treino funcional de alta intensidade, força e resistência.</p>
            <div class="d-flex justify-content-center gap-2 mb-2">
              <button class="btn btn-info fw-bold px-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCard3" aria-expanded="false" aria-controls="collapseCard3">Saber Mais</button>
              <a href="/area-reservada/login.php" class="btn btn-outline-warning fw-bold px-3 reservar-btn" style="color:#ff6633; border:2px solid #ff6633; background:none;">Reservar</a>
            </div>
            <div class="collapse text-start mt-2" id="collapseCard3">
              <p class="small">Aula dinâmica com exercícios variados, ideal para quem procura desafio, força e resistência.</p>
            </div>
          </div>
        </div>
      </div>
      <!-- Card 4: Aula de Spinning -->
      <div class="col-md-3 col-12">
        <div class="card service-card text-center h-100">
          <img src="https://images.pexels.com/photos/1552106/pexels-photo-1552106.jpeg?auto=compress&fit=crop&w=600&q=80" class="card-img-top mx-auto mt-3" alt="Aula de Spinning" style="width:90px; height:90px; object-fit:cover; border-radius:50%; border:3px solid #ff6633;">
          <div class="card-body">
            <h5 class="card-title fw-bold">Aula de Spinning</h5>
            <p class="card-text">Cardio intenso, energia e motivação ao som de música.</p>
            <div class="d-flex justify-content-center gap-2 mb-2">
              <button class="btn btn-info fw-bold px-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCard4" aria-expanded="false" aria-controls="collapseCard4">Saber Mais</button>
              <a href="/area-reservada/login.php" class="btn btn-outline-warning fw-bold px-3 reservar-btn" style="color:#ff6633; border:2px solid #ff6633; background:none;">Reservar</a>
            </div>
            <div class="collapse text-start mt-2" id="collapseCard4">
              <p class="small">Aula de ciclismo indoor, motivadora, ideal para queimar calorias e melhorar a resistência cardiovascular.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<style>
  .reservar-btn:hover, .reservar-btn:focus {
    background: none !important;
    color: #ff6633 !important;
    border: 2px solid #ff6633 !important;
    box-shadow: none !important;
  }
</style>
<!-- Fim dos cards com expand/collapse -->

<!-- SECÇÃO DE DESTAQUE: APP MÓVEL & RINGUE DE COMBATE (INSPIRADO NA REFERÊNCIA) -->
<section class="py-5" style="background:#f5f5f5;">
  <div class="container">
    <div class="row g-4 align-items-stretch">
      <!-- APP MÓVEL -->
      <div class="col-md-6 col-12 d-flex">
        <div class="bg-white rounded-4 shadow-sm p-4 d-flex flex-column justify-content-center w-100 h-100">
          <h3 class="fw-bold mb-2" style="font-family: 'Poppins',sans-serif; color:#1a2b2b;">APP MÓVEL</h3>
          <div style="width:40px; height:4px; background:#ffd600; margin-bottom:1rem;"></div>
          <p class="mb-4">Descarrega a aplicação e mergulha no universo Maia GYM.</p>
          <div class="d-flex flex-column gap-2">
            <a href="#" class="btn btn-warning fw-bold text-white" style="background:#ff6633; border:none; border-radius:2rem; max-width:200px; text-align:left;">
              <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/googleplay.svg" alt="Google Play" style="width:22px; margin-right:8px; vertical-align:middle;"> GOOGLE PLAY
            </a>
            <a href="#" class="btn btn-warning fw-bold text-white" style="background:#ff6633; border:none; border-radius:2rem; max-width:200px; text-align:left;">
              <img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/apple.svg" alt="App Store" style="width:22px; margin-right:8px; vertical-align:middle;"> APP STORE
            </a>
          </div>
        </div>
      </div>
      <!-- RINGUE DE COMBATE -->
      <div class="col-md-6 col-12 d-flex">
        <div class="rounded-4 shadow-sm p-4 d-flex flex-column justify-content-center w-100 h-100" style="background:#2d4b4b url('https://images.pexels.com/photos/4761790/pexels-photo-4761790.jpeg?auto=compress&fit=crop&w=800&q=80') right center/cover no-repeat; min-height:320px; position:relative;">
          <div style="position:relative; z-index:2;">
            <h3 class="fw-bold mb-2 text-white" style="font-family: 'Poppins',sans-serif;">RINGUE DE COMBATE</h3>
            <div style="width:40px; height:4px; background:#ffd600; margin-bottom:1rem;"></div>
            <p class="mb-4 text-white">Faz KO às tuas desculpas e enfrenta a zona de combate.</p>
            <a href="#" class="btn btn-warning fw-bold text-white" style="background:#ff6633; border:none; border-radius:2rem; max-width:220px;">EXPERIMENTA GRÁTIS</a>
          </div>
          <div style="position:absolute; inset:0; background:rgba(45,75,75,0.75); border-radius:inherit;"></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- SECÇÃO DE DESTAQUE: 4 COMENTÁRIOS DE UTILIZADORES (INSPIRADO NA REFERÊNCIA) -->
<section class="py-5" style="background:#0d2b2f;">
  <div class="container">
    <div class="row justify-content-center g-4">
      <!-- Comentário 1 -->
      <div class="col-md-3 col-12 d-flex justify-content-center">
        <div class="bg-light rounded-4 shadow-sm p-4 w-100" style="max-width:320px; min-width:220px;">
          <h4 class="fw-bold text-center mb-3" style="font-family:'Poppins',sans-serif; color:#444;">MARIA</h4>
          <div class="d-flex justify-content-center mb-2">
            <div class="bg-dark rounded-pill px-4 py-2">
              <span style="color:#ffd600; font-size:1.3rem;">★ ★ ★ ★ ★</span>
            </div>
          </div>
          <div class="text-center text-secondary mb-2" style="font-size:1rem;">MAIA GYM - CENTRO</div>
          <div class="d-flex justify-content-center mb-2">
            <div style="width:40px; height:4px; background:#ffd600;"></div>
          </div>
          <div class="text-center text-muted" style="font-size:1.1rem;">Excelentes profissionais.</div>
        </div>
      </div>
      <!-- Comentário 2 -->
      <div class="col-md-3 col-12 d-flex justify-content-center">
        <div class="bg-light rounded-4 shadow-sm p-4 w-100" style="max-width:320px; min-width:220px;">
          <h4 class="fw-bold text-center mb-3" style="font-family:'Poppins',sans-serif; color:#444;">JOÃO</h4>
          <div class="d-flex justify-content-center mb-2">
            <div class="bg-dark rounded-pill px-4 py-2">
              <span style="color:#ffd600; font-size:1.3rem;">★ ★ ★ ★ ★</span>
            </div>
          </div>
          <div class="text-center text-secondary mb-2" style="font-size:1rem;">MAIA GYM - NORTE</div>
          <div class="d-flex justify-content-center mb-2">
            <div style="width:40px; height:4px; background:#ffd600;"></div>
          </div>
          <div class="text-center text-muted" style="font-size:1.1rem;">Ambiente motivador e equipamentos top!</div>
        </div>
      </div>
      <!-- Comentário 3 -->
      <div class="col-md-3 col-12 d-flex justify-content-center">
        <div class="bg-light rounded-4 shadow-sm p-4 w-100" style="max-width:320px; min-width:220px;">
          <h4 class="fw-bold text-center mb-3" style="font-family:'Poppins',sans-serif; color:#444;">SOFIA</h4>
          <div class="d-flex justify-content-center mb-2">
            <div class="bg-dark rounded-pill px-4 py-2">
              <span style="color:#ffd600; font-size:1.3rem;">★ ★ ★ ★ ★</span>
            </div>
          </div>
          <div class="text-center text-secondary mb-2" style="font-size:1rem;">MAIA GYM - SUL</div>
          <div class="d-flex justify-content-center mb-2">
            <div style="width:40px; height:4px; background:#ffd600;"></div>
          </div>
          <div class="text-center text-muted" style="font-size:1.1rem;">Aulas de grupo fantásticas e staff simpático.</div>
        </div>
      </div>
      <!-- Comentário 4 -->
      <div class="col-md-3 col-12 d-flex justify-content-center">
        <div class="bg-light rounded-4 shadow-sm p-4 w-100" style="max-width:320px; min-width:220px;">
          <h4 class="fw-bold text-center mb-3" style="font-family:'Poppins',sans-serif; color:#444;">CARLOS</h4>
          <div class="d-flex justify-content-center mb-2">
            <div class="bg-dark rounded-pill px-4 py-2">
              <span style="color:#ffd600; font-size:1.3rem;">★ ★ ★ ★ ★</span>
            </div>
          </div>
          <div class="text-center text-secondary mb-2" style="font-size:1rem;">MAIA GYM - CENTRO</div>
          <div class="d-flex justify-content-center mb-2">
            <div style="width:40px; height:4px; background:#ffd600;"></div>
          </div>
          <div class="text-center text-muted" style="font-size:1.1rem;">Recomendo a todos! Resultados visíveis.</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- SECÇÃO DE VANTAGENS E DESCONTOS (APENAS TEXTO) -->
<section class="py-5 bg-white">
  <div class="container">
    <div class="row justify-content-center mb-4">
      <div class="col-12 text-center">
        <h2 class="fw-bold mb-2" style="font-family:'Poppins',sans-serif; color:#133; font-size:2.3rem; text-transform:uppercase;">Vantagens e Descontos a Pensar em Ti</h2>
        <div style="width:40px; height:4px; background:#ffd600; margin:0 auto 1.5rem auto;"></div>
        <p class="lead" style="color:#1a2b2b; font-size:1.2rem;">Já fazes parte da Tribo Maia GYM? Temos vantagens e descontos exclusivos.</p>
        <a href="contact.php" class="btn btn-warning fw-bold text-white" style="background:#ff6633; border:none;">QUERO FAZER PARTE</a>
      </div>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>


