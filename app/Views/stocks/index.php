<?php 
use \Mdi\Mdi;
Mdi::withIconsPath(__DIR__ . '/../../../node_modules/@mdi/svg/svg/'); 
?>

<?php echo $this->extend('templates/layout'); ?>

<?php echo $this->section('content'); ?>
  <!-- <div class="p-4">
    <div class="d-flex justify-content-between">
      <div class="d-flex">
        <H4>Stock</H4>
      </div>
      <div class="d-flex gap-2">
        <a class="btn btn-success btn" href="<?= base_url('inventory_adjustment/create')?>">Crear ajuste de Stock</a>
        <input type="text" class="form-control form-control-sm w-auto" id="exampleFormControlInput1" placeholder="Buscar">
    </div> -->

  
  <div class="flex flex-wrap justify-between items-center gap-4 mb-6"> <!-- Buscador con ícono -->
    <div class="relative w-full md:w-1/3">
      <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
        <i class="mdi mdi-magnify text-lg"><?php echo Mdi::mdi('magnify'); ?></i>
      </span>
      <input type="text" placeholder="Buscar..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-blue-400">
    </div>
    <a
      href="<?= base_url('inventory_adjustment/create')?>" class="flex items-center gap-2 bg-blue-600 hover:bg-blue-800 text-white px-5 py-2 rounded-lg shadow transition">
      <?php echo Mdi::mdi('plus'); ?>
      Crear ajuste de Stock
    </a>
  </div>
  
  </div>
  <div class="overflow-x-auto bg-white rounded-lg shadow">
    <table class="min-w-full text-sm">
      <thead class="bg-gray-100 text-gray-700">
        <tr>
          <th class="px-4 py-3 text-center">Producto</th>
          <th class="px-4 py-3 text-center">Cantidad</th>
          <th class="px-4 py-3 text-center">Ubicacion</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($stocks as $stock): ?>
          <tr class="hover:bg-gray-50">
            <td class="px-4 py-3 text-center"><?= esc($stock->producto); ?></td>
            <td class="px-4 py-3 text-center"><?= esc($stock->cantidad); ?></td>
            <td class="px-4 py-3 text-center"><?= esc($stock->ubicacion); ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
<?php echo $this->endSection(); ?>