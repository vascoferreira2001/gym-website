<?php
/**
 * ============================================================
 * ADMIN/LIST.PHP — Página de listagem dinâmica (Admin, Maia GYM)
 *
 * Esta página permite ao administrador listar:
 * - Aulas (classes)
 * - Marcações (bookings)
 * - Mensagens de contacto (contacts)
 *
 * O conteúdo listado depende do parâmetro GET "type":
 *   list.php?type=classes
 *   list.php?type=bookings
 *   list.php?type=contacts
 *
 * O objetivo é ter uma única página capaz de listar diferentes
 * tipos de dados do Maia GYM, evitando duplicação de código.
 * ============================================================
 */

include '../includes/header.php'; // Inclui o header global
include '../includes/db.php';     // Inclui a ligação à base de dados

// Verifica se o parâmetro "type" foi enviado na query string
$type = $_GET['type'] ?? null;

// Variáveis para título da página e query SQL
$title = "";
$query = "";

/**
 * ============================================================
 * DEFINIR A QUERY E O TÍTULO CONSOANTE O TIPO DE LISTAGEM
 * ============================================================
 */
switch ($type) {

    case "classes":
        $title = "Gestão de Aulas";
        $query = "SELECT * FROM classes";
        break;

    case "bookings":
        $title = "Gestão de Marcações";
        $query = "SELECT bookings.*, classes.name AS class_name
                  FROM bookings
                  LEFT JOIN classes ON bookings.class_id = classes.id
                  ORDER BY bookings.date DESC";
        break;

    case "contacts":
        $title = "Mensagens de Contacto";
        $query = "SELECT * FROM contacts ORDER BY created_at DESC";
        break;

    default:
        // Se o parâmetro for inválido, mostrar erro e terminar
        echo "<div class='container mt-5'>
                <div class='alert alert-danger text-center'>
                    Tipo de listagem inválido.
                </div>
              </div>";
        include '../includes/footer.php';
        exit;
}

// Executa a query SQL definida acima
$result = $conn->query($query);

?>


<!-- ============================================================
     TÍTULO DA PÁGINA E BOTÃO DE VOLTAR
     ============================================================ -->
<div class="container mt-5">

    <h2 class="text-center mb-4"><?= $title ?></h2>

    <!-- Botão para voltar ao painel admin -->
    <div class="mb-3">
        <a href="index.php" class="btn btn-secondary">Voltar ao Painel</a>
    </div>

    <!-- ============================================================
         TABELA RESPONSIVA DE LISTAGEM
         ============================================================ -->
    <div class="table-responsive">
        <table class="table table-dark table-bordered table-hover align-middle text-center">

            <thead class="table-warning text-dark">
                <tr>
                    <?php if ($type === "classes"): ?>
                        <!-- Cabeçalhos para aulas -->
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Horário</th>
                        <th>Imagem</th>
                        <th>Ações</th>

                    <?php elseif ($type === "bookings"): ?>
                        <!-- Cabeçalhos para marcações -->
                        <th>ID</th>
                        <th>Aula</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Data</th>
                        <th>Hora</th>
                        <th>Notas</th>
                        <th>Newsletter</th>
                        <th>Ações</th>

                    <?php elseif ($type === "contacts"): ?>
                        <!-- Cabeçalhos para contactos -->
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Mensagem</th>
                        <th>Data</th>
                    <?php endif; ?>
                </tr>
            </thead>

            <tbody>

                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>

                        <?php if ($type === "classes"): ?>
                            <!-- Linha de aula -->
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['description'] ?></td>
                            <td><?= $row['schedule'] ?></td>
                            <td>
                                <!-- Mostrar imagem se existir -->
                                <?php if (!empty($row['image'])): ?>
                                    <img src="<?= $row['image'] ?>" class="img-fluid rounded" style="max-width: 120px;">
                                <?php else: ?>
                                    <span class="text-muted">Sem imagem</span>
                                <?php endif; ?>
                            </td>

                            <!-- Botões de ação para aulas -->
                            <td>
                                <a href="edit.php?type=classes&id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="delete.php?type=classes&id=<?= $row['id'] ?>" class="btn btn-danger btn-sm"
                                   onclick="return confirm('Tens a certeza que queres eliminar este registo?')">
                                   Apagar
                                </a>
                            </td>

                        <?php elseif ($type === "bookings"): ?>
                            <!-- Linha de marcação -->
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['class_name'] ?></td>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['date'] ?></td>
                            <td><?= $row['time'] ?></td>
                            <td><?= $row['notes'] ?></td>
                            <td><?= $row['newsletter'] ? "Sim" : "Não" ?></td>

                            <!-- Botão de apagar marcação -->
                            <td>
                                <a href="delete.php?type=bookings&id=<?= $row['id'] ?>" class="btn btn-danger btn-sm"
                                   onclick="return confirm('Eliminar esta marcação?')">
                                   Apagar
                                </a>
                            </td>

                        <?php elseif ($type === "contacts"): ?>
                            <!-- Linha de contacto -->
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['message'] ?></td>
                            <td><?= $row['created_at'] ?></td>

                        <?php endif; ?>

                    </tr>
                <?php endwhile; ?>

            </tbody>
        </table>
    </div>

</div>

<?php
// Inclui o footer global
include '../includes/footer.php';
?>
