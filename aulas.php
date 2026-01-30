
<?php
/**
 * ============================================================
 * AULAS.PHP — Página de visualização de aulas marcadas
 *
 * OBJETIVO:
 * - Apresentar uma tabela com as aulas criadas por Personal Trainers
 * - Permitir reserva via pop-up
 * ============================================================
 */

include 'includes/header.php';
@include 'includes/db.php';
session_start();
$is_cliente = isset($_SESSION['user_id']) && isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'cliente';
// Buscar todas as aulas criadas (por Personal Trainers ou gestor)
$aulas = [];
$res = $conn->query("SELECT c.id, c.name, c.schedule, c.description, u.name AS professor FROM classes c LEFT JOIN users u ON c.personal_trainer_id = u.id ORDER BY c.schedule DESC");
while ($row = $res->fetch_assoc()) {
  $aulas[] = $row;
}
?>

<!-- ============================================================
     SECÇÃO PRINCIPAL — TABELA DE AULAS MARCADAS
     ============================================================ -->
<div class="container mt-5">
    <h2 class="text-center mb-4 fw-bold" style="color:#ff6633;">Aulas Disponíveis</h2>
    <div class="row justify-content-center">
        <div class="col-lg-10 col-12">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Modalidade</th>
                                <th>Professor</th>
                                <th>Horário</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($aulas as $aula): ?>
                            <tr>
                                <td><?= htmlspecialchars($aula['name']) ?></td>
                                <td><?= htmlspecialchars($aula['professor']) ?></td>
                                <td><?= htmlspecialchars($aula['schedule']) ?></td>
                                <td>
                                    <?php if ($is_cliente): ?>
                                        <button class="btn btn-warning fw-bold text-white" style="background:#ff6633; border:none;" data-bs-toggle="modal" data-bs-target="#modalReserva" data-id="<?= $aula['id'] ?>" data-nome="<?= htmlspecialchars($aula['name']) ?>">Reservar Agora</button>
                                    <?php else: ?>
                                        <a href="/area-reservada/login.php" class="btn btn-warning fw-bold text-white" style="background:#ff6633; border:none;">Login para Reservar</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal de Reserva -->
    <?php if ($is_cliente): ?>
    <div class="modal fade" id="modalReserva" tabindex="-1" aria-labelledby="modalReservaLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form method="post" action="area-reservada/marcar_aula.php">
            <div class="modal-header">
              <h5 class="modal-title" id="modalReservaLabel">Reservar Aula</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
              <input type="hidden" id="modal_class_id" name="class_id" value="">
              <div class="mb-3">
                <label class="form-label">Modalidade</label>
                <input type="text" class="form-control" id="modal_class_nome" readonly>
              </div>
              <div class="mb-3">
                <label for="date" class="form-label">Data</label>
                <input type="date" class="form-control" id="date" name="date" required>
              </div>
              <div class="mb-3">
                <label for="time" class="form-label">Hora</label>
                <input type="time" class="form-control" id="time" name="time" required>
              </div>
              <div class="mb-3">
                <label for="notes" class="form-label">Notas (opcional)</label>
                <textarea class="form-control" id="notes" name="notes" rows="2"></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Reservar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script>
    var modalReserva = document.getElementById('modalReserva');
    modalReserva.addEventListener('show.bs.modal', function (event) {
      var button = event.relatedTarget;
      var classId = button.getAttribute('data-id');
      var classNome = button.getAttribute('data-nome');
      document.getElementById('modal_class_id').value = classId;
      document.getElementById('modal_class_nome').value = classNome;
    });
    </script>
    <?php endif; ?>
</div>

<?php 
// Inclui o footer global
include 'includes/footer.php'; 
?>
