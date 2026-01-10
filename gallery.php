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
    <h2 class="text-center mb-4">Galeria</h2>

    <!-- ============================================================
         TABELA RESPONSIVA
         A classe "table-responsive" permite scroll horizontal em ecrãs pequenos.
         ============================================================ -->
    <div class="table-responsive">

        <!-- Tabela Bootstrap -->
        <table class="table table-dark table-bordered table-hover align-middle text-center">

            <!-- Cabeçalho da tabela -->
            <thead class="table-warning text-dark">
                <tr>
                    <th>Imagem</th>
                    <th>Descrição</th>
                </tr>
            </thead>

            <!-- Corpo da tabela -->
            <tbody>

                <!-- Linha 1 -->
                <tr>
                    <td>
                        <!-- Imagem externa temporária -->
                        <img src="https://images.pexels.com/photos/1954521/pexels-photo-1954521.jpeg"
                             class="img-fluid rounded"
                             style="max-width: 250px;"
                             alt="Ginásio moderno">
                    </td>
                    <td>Área de musculação com equipamentos modernos.</td>
                </tr>

                <!-- Linha 2 -->
                <tr>
                    <td>
                        <img src="https://images.pexels.com/photos/1552242/pexels-photo-1552242.jpeg"
                             class="img-fluid rounded"
                             style="max-width: 250px;"
                             alt="Treino com pesos">
                    </td>
                    <td>Treinos de força com acompanhamento profissional.</td>
                </tr>

                <!-- Linha 3 -->
                <tr>
                    <td>
                        <img src="https://images.pexels.com/photos/3823037/pexels-photo-3823037.jpeg"
                             class="img-fluid rounded"
                             style="max-width: 250px;"
                             alt="Aulas de grupo">
                    </td>
                    <td>Aulas de grupo dinâmicas para todos os níveis.</td>
                </tr>

                <!-- Linha 4 -->
                <tr>
                    <td>
                        <img src="https://images.pexels.com/photos/7676400/pexels-photo-7676400.jpeg"
                             class="img-fluid rounded"
                             style="max-width: 250px;"
                             alt="Personal Trainer">
                    </td>
                    <td>Personal Trainers certificados para treinos personalizados.</td>
                </tr>

                <!-- Linha 5 -->
                <tr>
                    <td>
                        <img src="https://images.pexels.com/photos/1640770/pexels-photo-1640770.jpeg"
                             class="img-fluid rounded"
                             style="max-width: 250px;"
                             alt="Nutrição">
                    </td>
                    <td>Consultas de nutrição para otimizar resultados.</td>
                </tr>

            </tbody>
        </table>
    </div>
</div>

<?php
// Inclui o footer global (scripts + fecho do HTML)
include 'includes/footer.php';
?>
