<?php
/**
 * ============================================================
 * FICHEIRO: gallery.php
 * OBJETIVO: Página de galeria de imagens do ginásio
 * ============================================================
 * Exibe imagens das instalações e aulas do ginásio.
 * Utiliza Bootstrap 5 para grid responsivo e visual moderno.
 * Comentários detalhados para explicação académica.
 */
include 'includes/header.php'; // Inclui o cabeçalho comum
?>

<main class="container py-4">
    <h2 class="text-warning mb-4">Galeria</h2>
    <div class="row g-4">
        <!-- Imagem 1 -->
        <div class="col-md-4">
            <div class="card bg-dark border-warning">
                <img src="assets/images/gallery1.jpg" class="card-img-top" alt="Instalações 1">
            </div>
        </div>
        <!-- Imagem 2 -->
        <div class="col-md-4">
            <div class="card bg-dark border-warning">
                <img src="assets/images/gallery2.jpg" class="card-img-top" alt="Instalações 2">
            </div>
        </div>
        <!-- Imagem 3 -->
        <div class="col-md-4">
            <div class="card bg-dark border-warning">
                <img src="assets/images/gallery3.jpg" class="card-img-top" alt="Aula de grupo">
            </div>
        </div>
    </div>
</main>

<?php
include 'includes/footer.php'; // Inclui o rodapé comum
?>
