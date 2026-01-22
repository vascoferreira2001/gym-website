<?php
/**
 * AULAS.PHP — Página de visualização de aulas marcadas
 * Layout premium, responsivo, igual ao resto do site
 */
include 'includes/header.php';
?>

<div class="container mt-5">
    <h2 class="text-center mb-4 fw-bold" style="color:#ff6633;">Aulas Marcadas</h2>
    <div class="row justify-content-center">
        <div class="col-lg-8 col-12">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Data</th>
                                <th>Hora</th>
                                <th>Professor</th>
                                <th>Modalidade</th>
                                <th>Sala</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Exemplo de aulas marcadas -->
                            <tr>
                                <td>22/01/2026</td>
                                <td>10:00</td>
                                <td>João Silva</td>
                                <td>Crossfit</td>
                                <td>Sala 1</td>
                            </tr>
                            <tr>
                                <td>22/01/2026</td>
                                <td>12:00</td>
                                <td>Inês Costa</td>
                                <td>Pilates</td>
                                <td>Sala 2</td>
                            </tr>
                            <tr>
                                <td>23/01/2026</td>
                                <td>18:00</td>
                                <td>Rui Martins</td>
                                <td>Spinning</td>
                                <td>Sala 3</td>
                            </tr>
                            <tr>
                                <td>24/01/2026</td>
                                <td>09:00</td>
                                <td>Joana Lopes</td>
                                <td>Yoga</td>
                                <td>Sala 2</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
