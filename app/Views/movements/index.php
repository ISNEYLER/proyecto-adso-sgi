<?php echo $this->extend('templates/layout'); ?>

<?php echo $this->section('content'); ?>
  <div>
    <div class="d-flex justify-content-between p-4 bg-body">
      <div class="d-flex">
        <H4>Movimientos</H4>
      </div>
      <div class="d-flex gap-2">
        <a class="btn btn-success btn" href="<?= base_url('products/create')?>">Crear Movimiento</a>
        <input type="email" class="form-control form-control-sm w-auto" id="exampleFormControlInput1" placeholder="Buscar">
    </div>
  </div>
  <div class="table-responsive px-4 py-4">
    <table class="table table-striped">
        <thead>
            <tr class="table-dark">
                <th>ID</th>
                <th>Origen</th>
                <th>Destino</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($movements as $movement): ?>
            <tr>
                <td><?=esc($movement->id);?></td>
                <td><?=esc($movement->id_ubicacion_origen);?></td>
                <td><?=esc($movement->id_ubicacion_destino);?></td>
                <td><?=esc($movement->creado_el);?></td>
            </tr>
            <?php endforeach; ?>
      </tbody>
    </table>
  </div>
<?php echo $this->endSection(); ?>