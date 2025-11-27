<?php echo $this->extend('templates/layout'); ?>

<?php echo $this->section('content'); ?>
  <!-- <div class="p-4">
    <div class="d-flex justify-content-between">
      <div class="d-flex">
        <H4>Movimientos</H4>
      </div>
      <div class="d-flex gap-2">
        <a class="btn btn-success btn" href="<?= base_url('movements/new')?>">Crear Movimiento</a>
        <input type="text" class="form-control form-control-sm w-auto" id="exampleFormControlInput1" placeholder="Buscar">
    </div>
  </div> -->
  <div class="overflow-x-auto bg-white rounded-lg shadow">
    <table class="min-w-full text-sm">
      <thead class="bg-gray-100 text-gray-700">
        <tr>
          <th class="px-4 py-3 text-left">ID</th>
          <th class="px-4 py-3 text-left">Fecha</th>
          <th class="px-4 py-3 text-left">Producto</th>
          <th class="px-4 py-3 text-left">Origen</th>
          <th class="px-4 py-3 text-left">Destino</th>
          <th class="px-4 py-3 text-left">Cantidad</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($movements as $movement): ?>
          <tr class="hover:bg-gray-50">
            <td class="px-4 py-3"><?=esc($movement->id);?></td>
            <td class="px-4 py-3"><?=esc($movement->fecha);?></td>
            <td class="px-4 py-3"><?=esc($movement->producto);?></td>
            <td class="px-4 py-3"><?=esc($movement->ubicacion_origen);?></td>
            <td class="px-4 py-3"><?=esc($movement->ubicacion_destino);?></td>
            <td class="px-4 py-3"><?=esc($movement->cantidad);?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
<?php echo $this->endSection(); ?>