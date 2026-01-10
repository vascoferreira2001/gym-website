<?php
/**
 * ============================================================
 * ADMIN/INDEX.PHP — Painel Principal do Administrador
 *
 * Esta página funciona como o "dashboard" do administrador.
 * Aqui o admin pode navegar para:
 * - Gestão de Aulas (CRUD)
 * - Gestão de Marcações (CRUD)
 * - Gestão de Mensagens de Contacto
 *
 * O objetivo é centralizar o acesso às funcionalidades administrativas.
 * ============================================================
 */

include '../includes/header.php'; // Inclui o header global (menu + Bootstrap)
?>

<!-- ============================================================
     SECÇÃO PRINCIPAL DO PAINEL ADMIN
     ============================================================ -->
<div class="container mt-5">

    <!-- Título da página -->
    <h2 class="text-center mb-4">Painel de Administração</h2>

    <!-- Texto introdutório -->
    <p class="text-center text-white mb-4">
        Bem-vindo ao painel de gestão do GoGym.  
        Aqui podes administrar aulas, marcações e mensagens de contacto.
    </p>

    <!-- ============================================================
         CARDS DE NAVEGAÇÃO DO ADMIN
         Cada card leva para uma secção diferente do CRUD.
         ============================================================ -->
    <div class="row g-4">

        <!-- CARD: Gestão de Aulas -->
        <div class="col-md-4">
            <div class="card bg-dark text-white h-100 border-warning">

                <!-- Imagem ilustrativa (temporária) -->
                <img src="https://images.pexels.com/photos/2261485/pexels-photo-2261485.jpeg"
                     class="card-img-top"
                     alt="Gestão de Aulas">

                <div class="card-body">
                    <h5 class="card-title">Gestão de Aulas</h5>
                    <p class="card-text">
                        Inserir, editar, listar e remover aulas disponíveis no ginásio.
                    </p>

                    <!-- Botão que leva para listagem -->
                    <a href="list.php?type=classes" class="btn btn-warning w-100">
                        Gerir Aulas
                    </a>
                </div>
            </div>
        </div>

        <!-- CARD: Gestão de Marcações -->
        <div class="col-md-4">
            <div class="card bg-dark text-white h-100 border-warning">

                <img src="https://images.pexels.com/photos/3823039/pexels-photo-3823039.jpeg"
                     class="card-img-top"
                     alt="Gestão de Marcações">

                <div class="card-body">
                    <h5 class="card-title">Gestão de Marcações</h5>
                    <p class="card-text">
                        Consulta e gestão das marcações feitas pelos utilizadores.
                    </p>

                    <a href="list.php?type=bookings" class="btn btn-warning w-100">
                        Gerir Marcações
                    </a>
                </div>
            </div>
        </div>

        <!-- CARD: Gestão de Contactos -->
        <div class="col-md-4">
            <div class="card bg-dark text-white h-100 border-warning">

                <img src="https://images.pexels.com/photos/1552249/pexels-photo-1552249.jpeg"
                     class="card-img-top"
                     alt="Gestão de Contactos">

                <div class="card-body">
                    <h5 class="card-title">Mensagens de Contacto</h5>
                    <p class="card-text">
                        Consulta das mensagens enviadas através do formulário de contacto.
                    </p>

                    <a href="list.php?type=contacts" class="btn btn-warning w-100">
                        Ver Mensagens
                    </a>
                </div>
            </div>
        </div>

    </div>

</div>

<?php
// Inclui o footer global (scripts + fecho do HTML)
include '../includes/footer.php';
?>
