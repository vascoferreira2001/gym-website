<?php
/**
 * ============================================================
 * ABOUT.PHP — Página "Sobre Nós"
 *
 * Esta página apresenta:
 * - Texto institucional sobre o ginásio
 * - Imagens ilustrativas
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
<div class="container mt-5">

    <!-- Título da página -->
    <h2 class="text-center mb-4">Sobre Nós</h2>

    <!-- Linha com duas colunas: texto + imagem -->
    <div class="row align-items-center mb-5">

        <!-- Coluna do texto -->
        <div class="col-md-6">
            <h4 class="mb-3">A Nossa História</h4>

            <p>
                O GoGym nasceu com a missão de transformar vidas através do desporto.
                Acreditamos que o treino físico é mais do que exercício — é disciplina,
                motivação e bem‑estar. O nosso espaço foi criado para oferecer uma
                experiência completa, com equipamentos modernos, aulas dinâmicas e
                acompanhamento profissional.
            </p>

            <p>
                Com uma equipa dedicada de personal trainers, nutricionistas e instrutores
                certificados, garantimos que cada aluno encontra o seu caminho para atingir
                os seus objetivos, seja ganhar massa muscular, perder peso ou melhorar a
                saúde geral.
            </p>
        </div>

        <!-- Coluna da imagem -->
        <div class="col-md-6">
            <!-- Imagem externa temporária -->
            <img src="https://images.pexels.com/photos/1954521/pexels-photo-1954521.jpeg"
                 class="img-fluid rounded shadow"
                 alt="Ginásio moderno">
        </div>
    </div>

    <!-- Segunda secção com imagem + texto invertidos -->
    <div class="row align-items-center mb-5">

        <!-- Coluna da imagem -->
        <div class="col-md-6">
            <img src="https://images.pexels.com/photos/1552106/pexels-photo-1552106.jpeg"
                 class="img-fluid rounded shadow"
                 alt="Treino funcional">
        </div>

        <!-- Coluna do texto -->
        <div class="col-md-6">
            <h4 class="mb-3">O Que Nos Move</h4>

            <p>
                Acreditamos que cada pessoa tem um potencial único. Por isso, oferecemos
                programas personalizados, aulas de grupo motivadoras e um ambiente seguro
                e acolhedor. O nosso objetivo é que cada treino seja uma experiência
                positiva e transformadora.
            </p>

            <p>
                No GoGym, não és apenas mais um aluno — és parte da nossa comunidade.
                Trabalhamos todos os dias para criar um espaço onde te sintas motivado,
                acompanhado e inspirado.
            </p>
        </div>
    </div>

    <!-- Botão para a página Contact -->
    <div class="text-center mt-4">
        <a href="contact.php" class="btn btn-warning btn-lg">
            Contacta-nos
        </a>
    </div>

</div>

<?php
// Inclui o footer global (scripts + fecho do HTML)
include 'includes/footer.php';
?>
