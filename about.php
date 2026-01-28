
<?php
/**
 * ============================================================
 * ABOUT.PHP — Página "Sobre Nós" (Maia GYM)
 *
 * OBJETIVO:
 * - Apresentar texto institucional sobre o ginásio Maia GYM
 * - Mostrar imagens ilustrativas
 * - Botão para navegar para a página Contact
 *
 * O conteúdo é estático, mas totalmente responsivo graças ao Bootstrap.
 * ============================================================
 */

include 'includes/header.php'; // Inclui o menu e o layout inicial
?>


<!-- ============================================================
     SECÇÃO PRINCIPAL "SOBRE NÓS"
     ============================================================ -->
<div class="container mt-5 mb-5">

    <!-- Título da página -->
    <h2 class="text-center mb-4 fw-bold" style="color:#ff6633;">Sobre Nós</h2>

    <!-- Linha com duas colunas: texto + imagem -->
    <div class="row align-items-center mb-5">

        <!-- Coluna do texto institucional -->
        <div class="col-md-6 mb-4 mb-md-0">
            <h4 class="mb-3 fw-bold">A Nossa História</h4>

            <p>
                O Maia GYM nasceu com a missão de transformar vidas através do desporto.
                Acreditamos que o treino físico é mais do que exercício — é disciplina,
                motivação e bem-estar. O nosso espaço foi criado para oferecer uma
                experiência completa, com equipamentos modernos, aulas dinâmicas e
                acompanhamento profissional.
            </p>

            <!-- Botão para navegar para a página de contacto -->
            <a href="contact.php" class="btn btn-warning mt-3" style="background:#ff6633; border:none;">Contactar</a>
        </div>

        <!-- Coluna da imagem ilustrativa -->
        <div class="col-md-6 text-center">
            <img src="https://images.pexels.com/photos/1954524/pexels-photo-1954524.jpeg?auto=compress&fit=crop&w=600&q=80"
                 alt="Sobre Maia GYM"
                 class="img-fluid rounded shadow"
                 style="max-width: 400px;">
        </div>
    </div>
</div>

<?php
// Inclui o footer global (scripts + fecho do HTML)
include 'includes/footer.php';
?>
