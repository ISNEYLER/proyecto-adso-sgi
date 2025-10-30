<?php echo $this->extend('templates/layout'); ?>

<?php echo $this->section('content'); ?>
  <div class="p-4">
    <div class="d-flex justify-content-between">
      <div class="d-flex">
        <H4>Stock</H4>
      </div>
      <div class="d-flex gap-2">
        <a class="btn btn-success btn" href="<?= base_url('inventory_adjustment')?>">Crear ajuste de Stock</a>
        <input type="text" class="form-control form-control-sm w-auto" id="exampleFormControlInput1" placeholder="Buscar">
    </div>
  </div>
  <div class="table-responsive py-4">
    <table class="table table-striped table-hover">
      <thead class="table-light">
        <tr>
          <th>Producto</th>
          <th>Cantidad</th>
          <th>Ubicacion</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($stocks as $stock): ?>
          <tr>
            <td><?= esc($stock->producto); ?></td>
            <td><?= esc($stock->cantidad); ?></td>
            <td><?= esc($stock->ubicacion); ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
<?php echo $this->endSection(); ?>