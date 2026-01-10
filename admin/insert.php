<?php
/**
 * ============================================================
 * ADMIN/INSERT.PHP — Inserir Nova Aula (Tabela: classes)
 *
 * OBJETIVO:
 * - Apresentar um formulário para criar uma nova aula
 * - Inserir o registo na tabela "classes"
 *
 * NOTA:
 * - O campo "image" será um URL (string) para simplificar
 *   (pode ser trocado depois para upload de ficheiros).
 * ============================================================
 */

include '../includes/header.php'; // Header global (layout + menu)
include '../includes/db.php';     // Ligação à base de dados

// Variáveis para mensagens de feedback
$successMessage = "";
$errorMessage   = "";

/**
 * ============================================================
 * PROCESSAMENTO DO FORMULÁRIO (MÉTODO POST)
 * ============================================================
 */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Recolher os dados enviados pelo formulário
    $name        = $_POST['name'];
    $description = $_POST['description'];
    $schedule    = $_POST['schedule'];
    $image       = $_POST['image'];

    // Query SQL com placeholders (para evitar SQL Injection)
    $sql = "INSERT INTO classes (name, description, schedule, image)
            VALUES (?, ?, ?, ?)";

    // Preparar a query
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $description, $schedule, $image);

    // Executar e verificar o resultado
    if ($stmt->execute()) {
        $successMessage = "A aula foi inserida com sucesso.";
    } else {
        $errorMessage = "Ocorreu um erro ao inserir a aula.";
    }

    $stmt->close();
}

?>

<div class="container mt-5">

    <!-- Título da página -->
    <h2 class="text-center mb-4">Inserir Nova Aula</h2>

    <!-- Botão para voltar à listagem de aulas -->
    <div class="mb-3">
        <a href="list.php?type=classes" class="btn btn-secondary">
            Voltar à Listagem
        </a>
    </div>

    <!-- Mensagens de feedback -->
    <?php if ($successMessage): ?>
        <div class="alert alert-success text-center">
            <?= $successMessage ?>
        </div>
    <?php endif; ?>

    <?php if ($errorMessage): ?>
        <div class="alert alert-danger text-center">
            <?= $errorMessage ?>
        </div>
    <?php endif; ?>

    <!-- ============================================================
         FORMULÁRIO DE INSERÇÃO
         ============================================================ -->
    <form method="POST" class="bg-dark text-white p-4 rounded">

        <!-- Nome da aula -->
        <div class="mb-3">
            <label class="form-label">Nome da Aula</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <!-- Descrição da aula -->
        <div class="mb-3">
            <label class="form-label">Descrição</label>
            <textarea name="description" class="form-control" rows="3" required></textarea>
        </div>

        <!-- Horário -->
        <div class="mb-3">
            <label class="form-label">Horário</label>
            <input type="text" name="schedule" class="form-control" 
                   placeholder="Ex: Segunda 18:00" required>
        </div>

        <!-- URL da Imagem -->
        <div class="mb-3">
            <label class="form-label">URL da Imagem (temporário)</label>
            <input type="url" name="image" class="form-control"
                   placeholder="https://exemplo.com/imagem.jpg">
            <div class="form-text text-light">
                Usa um URL direto temporário (ex: Pexels).  
                Mais tarde podes trocar para upload local.
            </div>
        </div>

        <!-- Botões -->
        <button type="submit" class="btn btn-warning w-100 mb-2">Guardar</button>
        <button type="reset" class="btn btn-outline-light w-100">Limpar</button>

    </form>
</div>

<?php
include '../includes/footer.php'; // Footer global
?>
