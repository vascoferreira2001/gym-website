<?php
/**
 * ============================================================
 * FICHEIRO: about.php
 * OBJETIVO: Página "Sobre" do ginásio
 * ============================================================
 * Apresenta informações sobre o ginásio, equipa e missão.
 * Utiliza Bootstrap 5 para layout responsivo e visual moderno.
 * Comentários detalhados para explicação académica.
 */
include 'includes/header.php'; // Inclui o cabeçalho comum
?>

<main class="container py-4">
    <section class="bg-dark text-light p-4 rounded mb-4 border border-warning">
        <h2 class="text-warning">Sobre o Ginásio</h2>
        <p>O nosso ginásio oferece um ambiente motivador, equipamentos premium e uma equipa dedicada ao teu sucesso. Acreditamos que cada pessoa pode superar os seus limites com o apoio certo.</p>
    </section>
    <section class="row g-4">
        <div class="col-md-6">
            <div class="bg-dark text-light p-3 rounded border border-warning">
                <h3 class="text-warning">Missão</h3>
                <p>Promover saúde, bem-estar e motivação através de aulas inovadoras e acompanhamento profissional.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="bg-dark text-light p-3 rounded border border-warning">
                <h3 class="text-warning">Equipa</h3>
                <p>Instrutores certificados, experientes e apaixonados pelo fitness, prontos para ajudar em cada etapa.</p>
            </div>
        </div>
    </section>
</main>

<?php
include 'includes/footer.php'; // Inclui o rodapé comum
?>
