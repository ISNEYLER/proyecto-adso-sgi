<?php echo $this->extend('templates/layout'); ?>

<?php echo $this->section('content'); ?>
  <div class="p-4">
    <div class="d-flex justify-content-between">
      <div class="d-flex">
        <H4>Productos</H4>
      </div>
      <div class="d-flex gap-2">
        <a class="btn btn-success btn" href="<?= base_url('products/new')?>">Añadir Producto</a>
        <input type="text" class="form-control form-control-sm w-auto" id="exampleFormControlInput1" placeholder="Buscar">
    </div>
  </div>
  <div class="table-responsive py-4">
    <table class="table table-striped table-hover">
      <thead class="table-light">
        <tr>
          <th>Producto</th>
          <th>Precio</th>
          <th>Costo</th>
          <th>Cantidad</th>
          <th>Opciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($products as $producto): ?>
          <tr>
            <td><?= esc($producto->nombre); ?></td>
            <td><?= $producto->sku; ?></td>
            <td><?= $producto->codigo_barras; ?></td>
            <td><?= $producto->valor; ?></td>
            <td><a class="btn btn-warning" href="<?= base_url('products/edit/' . $producto->id) ?>">Editar</a></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
<?php echo $this->endSection(); ?>