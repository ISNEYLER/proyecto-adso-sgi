<?php 
use \Mdi\Mdi;
Mdi::withIconsPath(__DIR__ . '/../../../node_modules/@mdi/svg/svg/'); 
?>

<?php echo $this->extend('templates/layout'); ?>

<?php echo $this->section('content'); ?>

<!-- Encabezado -->
<div class="bg-gradient-to-r from-cyan-50 to-sky-50 rounded-2xl p-8 border-l-4 border-[#0891B2] shadow-md mb-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-4xl font-bold text-cyan-700">Existencias</h1>
            <p class="text-gray-600 mt-2 flex items-center gap-2">
                <svg class="w-5 h-5 text-cyan-500" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('warehouse'); ?></svg>
                Inventario actual de productos en almacén
            </p>
        </div>
        <div class="hidden md:block">
            <svg class="w-16 h-16 text-cyan-200 opacity-50" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('warehouse'); ?></svg>
        </div>
    </div>
</div>

<div class="flex flex-wrap justify-between items-center gap-4 mb-8">
  <div class="relative w-full md:w-1/3">
    <svg class="absolute left-4 top-1/2 -translate-y-1/2 text-cyan-400 w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('magnify'); ?></svg>
    <input type="text" placeholder="Buscar productos..." class="w-full pl-12 pr-4 py-3 border-2 border-cyan-100 rounded-xl bg-cyan-50 focus:outline-none focus:border-[#0891B2] focus:ring-2 focus:ring-cyan-300 focus:bg-white font-medium text-gray-700 placeholder-gray-400 transition-all duration-300">
  </div>
  <a href="<?= base_url('inventory_adjustment/create')?>" class="flex items-center gap-2 bg-gradient-to-r from-[#0891B2] to-[#06B6D4] hover:from-[#0E7490] hover:to-[#0A8DA8] text-cyan-50 px-6 py-3 rounded-xl shadow-lg hover:shadow-xl font-semibold transition-all duration-300 transform hover:scale-105">
    <?php echo Mdi::mdi('plus'); ?>
    Ajuste de Stock
  </a>
</div>
  <div class="bg-white rounded-2xl shadow-xl border-t-4 border-cyan-500 overflow-hidden">
    <div class="overflow-x-auto">
      <table class="w-full text-sm">
        <thead class="bg-gradient-to-r from-cyan-50 to-sky-50">
          <tr class="border-b-2 border-cyan-200">
            <th class="px-6 py-4 text-left text-cyan-700 font-bold">Producto</th>
            <th class="px-6 py-4 text-left text-cyan-700 font-bold">Cantidad</th>
            <th class="px-6 py-4 text-left text-cyan-700 font-bold">Ubicación</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($stocks as $stock): ?>
            <tr class="border-b border-gray-100 hover:bg-cyan-50 transition-colors duration-200">
              <td class="px-6 py-4">
                <div class="flex items-center gap-3">
                  <svg class="w-5 h-5 text-sky-500" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('package'); ?></svg>
                  <span class="font-semibold text-gray-800"><?= esc($stock->producto); ?></span>
                </div>
              </td>
              <td class="px-6 py-4">
                <span class="inline-flex items-center px-3 py-1 rounded-lg text-sm font-bold bg-cyan-100 text-cyan-700 border border-cyan-300">
                  <?= esc($stock->cantidad); ?>
                </span>
              </td>
              <td class="px-6 py-4">
                <span class="text-gray-700 font-medium"><?= esc($stock->ubicacion." / ".$stock->nombre_almacen); ?></span>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
<?php echo $this->endSection(); ?>