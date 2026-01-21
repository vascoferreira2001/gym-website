<?php
/**
 * ============================================================
 * GALLERY.PHP — Página de Galeria de Imagens (Maia GYM)
 *
 * Esta página apresenta:
 * - Uma tabela responsiva com imagens do ginásio Maia GYM
 * - Layout simples e elegante usando Bootstrap
 * - Imagens externas temporárias (Pexels)
 *
 * O objetivo é cumprir o requisito do enunciado:
 * "A página Gallery deve apresentar uma tabela responsiva com imagens."
 * ============================================================
 */

include 'includes/header.php'; // Inclui o menu e o layout inicial
?>

<!-- ============================================================
     TÍTULO DA PÁGINA
     ============================================================ -->
<div class="container mt-5">
    <h2 class="text-center mb-4 fw-bold" style="color:#ff6633;">Galeria</h2>

    <!-- ============================================================
         GALERIA DE IMAGENS
         O layout premium apresenta as imagens em cartões elegantes.
         ============================================================ -->
    <div class="row g-4 justify-content-center">

        <!-- Imagem 1 -->
        <div class="col-md-4 col-12">
            <div class="card shadow-sm border-0">
                <img src="https://images.pexels.com/photos/3768913/pexels-photo-3768913.jpeg?auto=compress&fit=crop&w=600&q=80"
                     class="card-img-top rounded"
                     alt="Galeria Maia GYM">
            </div>
        </div>

        <!-- Imagem 2 -->
        <div class="col-md-4 col-12">
            <div class="card shadow-sm border-0">
                <img src="https://images.pexels.com/photos/3823039/pexels-photo-3823039.jpeg?auto=compress&fit=crop&w=600&q=80"
                     class="card-img-top rounded"
                     alt="Galeria Maia GYM">
            </div>
        </div>

        <!-- Imagem 3 -->
        <div class="col-md-4 col-12">
            <div class="card shadow-sm border-0">
                <img src="https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg?auto=compress&fit=crop&w=600&q=80"
                     class="card-img-top rounded"
                     alt="Galeria Maia GYM">
            </div>
        </div>

    </div>
</div>

<?php
// Inclui o footer global (scripts + fecho do HTML)
include 'includes/footer.php';
?>
