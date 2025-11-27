<?php
use \Mdi\Mdi;
Mdi::withIconsPath(__DIR__ . '/../../../node_modules/@mdi/svg/svg/');
?>

<?php echo $this->extend('templates/layout'); ?>

<?php echo $this->section('content'); ?>
<div class="overflow-x-auto bg-white rounded-lg shadow">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
    <div class="w-full md:w-1/2">
      <form class="flex items-center">
        <label for="simple-search" class="sr-only">Buscar</label>
        <div class="relative w-full">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">

          </div>
          <input type="text" name="" id="" placeholder="Buscar" class="bg-blue-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2">
        </div>
      </form>
    </div>
    <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
      <button class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
    </div>
  </div>
  <table class="min-w-full text-sm">
    <thead class="bg-gray-100 text-gray-700">
      <tr>
        <th class="px-4 py-3 text-left">Producto</th>
        <th class="px-4 py-3 text-left">Precio</th>
        <th class="px-4 py-3 text-left">Costo</th>
        <th class="px-4 py-3 text-left">Cantidad</th>
        <th class="px-4 py-3 text-center">Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($products as $producto): ?>
        <tr class="hover:bg-gray-50">
          <td class="px-4 py-3"><?= esc($producto->nombre); ?></td>
          <td class="px-4 py-3"><?= $producto->valor; ?></td>
          <td class="px-4 py-3"><?= $producto->costo; ?></td>
          <td class="px-4 py-3"><?= $producto->cantidad; ?></td>
          <td class="px-4 py-3">
            <div class="flex item-center justify-center">
              <a class="text-blue-600 hover:text-blue-800" href="<?= base_url('products/edit/' . $producto->id) ?>">
                <?php echo Mdi::mdi('pencil'); ?>
              </a>
              <a class="btn btn-danger" href="<?= base_url('products/delete/' . $producto->id) ?>">
                <?php echo Mdi::mdi(icon: 'delete'); ?>
              </a>
              <a class="btn btn-success" href="">
                <?php echo Mdi::mdi('arrow-right-bold'); ?>
              </a>
            </div>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>



<?php echo $this->endSection(); ?>