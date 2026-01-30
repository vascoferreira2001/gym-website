
<?php
/**
 * ============================================================
 * GALLERY.PHP — Página de Galeria de Imagens (Maia GYM)
 *
 * OBJETIVO:
 * - Apresentar uma galeria premium de imagens do ginásio Maia GYM
 * - Layout responsivo, elegante e moderno usando Bootstrap
 * - Imagens reais da pasta assets/images/gallery
 * ============================================================
 */

include 'includes/header.php'; // Inclui o menu e o layout inicial
?>


<!-- ============================================================
     TÍTULO DA PÁGINA
     ============================================================ -->
<div class="container mt-5">
    <!-- Título da galeria -->
    <h2 class="text-center mb-4 fw-bold" style="color:#ff6633;">Galeria</h2>

    <!-- ============================================================
         GALERIA DE IMAGENS DO GINÁSIO
         ============================================================ -->
    <div class="row g-4 justify-content-center">
        <!-- Imagem 1 -->
        <div class="col-lg-3 col-md-4 col-12">
            <div class="card shadow-sm border-0 h-100">
                <img src="/assets/images/maiagym-1.webp"
                     class="card-img-top rounded-3"
                     alt="Ginásio Maia GYM 1">
                <div class="card-body text-center">
                  <h5 class="card-title">Espaço Maia GYM 1</h5>
                </div>
            </div>
        </div>
        <!-- Imagem 2 -->
        <div class="col-lg-3 col-md-4 col-12">
            <div class="card shadow-sm border-0 h-100">
                <img src="/assets/images/maiagym-2.webp"
                     class="card-img-top rounded-3"
                     alt="Ginásio Maia GYM 2">
                <div class="card-body text-center">
                  <h5 class="card-title">Espaço Maia GYM 2</h5>
                </div>
            </div>
        </div>
        <!-- Imagem 3 -->
        <div class="col-lg-3 col-md-4 col-12">
            <div class="card shadow-sm border-0 h-100">
                <img src="/assets/images/maiagym-3.webp"
                     class="card-img-top rounded-3"
                     alt="Ginásio Maia GYM 3">
                <div class="card-body text-center">
                  <h5 class="card-title">Espaço Maia GYM 3</h5>
                </div>
            </div>
        </div>
        <!-- Imagem 4 -->
        <div class="col-lg-3 col-md-4 col-12">
            <div class="card shadow-sm border-0 h-100">
                <img src="/assets/images/maiagym-4.webp"
                     class="card-img-top rounded-3"
                     alt="Ginásio Maia GYM 4">
                <div class="card-body text-center">
                  <h5 class="card-title">Espaço Maia GYM 4</h5>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// Inclui o footer global (scripts + fecho do HTML)
include 'includes/footer.php';
?>
