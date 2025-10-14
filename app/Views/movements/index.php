<?php echo $this->extend('templates/layout'); ?>

<?php echo $this->section('content'); ?>
  <div class="p-4">
    <div class="d-flex justify-content-between">
      <div class="d-flex">
        <H4>Movimientos</H4>
      </div>
      <div class="d-flex gap-2">
        <a class="btn btn-success btn" href="<?= base_url('movements/create')?>">Crear Movimiento</a>
        <input type="text" class="form-control form-control-sm w-auto" id="exampleFormControlInput1" placeholder="Buscar">
    </div>
  </div>
  <div class="table-responsive py-4">
    <table class="table table-striped">
      <thead class="table-light">
        <tr>
          <th>Fecha</th>
          <th>ID</th>
          <th>Producto</th>
          <th>Origen</th>
          <th>Destino</th>
          <th>Cantidad</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($movements as $movement): ?>
          <tr>
            <td><?=esc($movement->creado_el);?></td>
            <td><?=esc($movement->id);?></td>
            <td><?=esc($movement->id);?></td>
            <td><?=esc($movement->id_ubicacion_origen);?></td>
            <td><?=esc($movement->id_ubicacion_destino);?></td>
            <td><?=esc($movement->id_ubicacion_destino);?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
<?php echo $this->endSection(); ?>