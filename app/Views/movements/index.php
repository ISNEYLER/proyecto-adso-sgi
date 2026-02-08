<?php
use \Mdi\Mdi;
Mdi::withIconsPath(__DIR__ . '/../../../node_modules/@mdi/svg/svg/');
?>

<?php echo $this->extend('templates/layout'); ?>

<?php echo $this->section('content'); ?>

<!-- Encabezado -->
<div class="bg-gradient-to-r from-purple-50 to-violet-50 rounded-2xl p-8 border-l-4 border-[#7C3AED] shadow-md mb-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-4xl font-bold text-purple-700">Movimientos</h1>
            <p class="text-gray-600 mt-2 flex items-center gap-2">
                <svg class="w-5 h-5 text-violet-500" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('transfer'); ?></svg>
                Registro de movimientos de inventario
            </p>
        </div>
        <div class="hidden md:block">
            <svg class="w-16 h-16 text-purple-200 opacity-50" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('transfer'); ?></svg>
        </div>
    </div>
</div>

<div class="flex flex-wrap justify-between items-center gap-4 mb-8">
  <div class="relative w-full md:w-1/3">
    <svg class="absolute left-4 top-1/2 -translate-y-1/2 text-purple-400 w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('magnify'); ?></svg>
    <input type="text" placeholder="Buscar movimientos..." class="w-full pl-12 pr-4 py-3 border-2 border-purple-100 rounded-xl bg-purple-50 focus:outline-none focus:border-[#7C3AED] focus:ring-2 focus:ring-purple-300 focus:bg-white font-medium text-gray-700 placeholder-gray-400 transition-all duration-300">
  </div>
  <a href="<?= base_url('movements/new') ?>" class="flex items-center gap-2 bg-gradient-to-r from-[#7C3AED] to-[#A78BFA] hover:from-[#6D28D9] hover:to-[#9333EA] text-purple-50 px-6 py-3 rounded-xl shadow-lg hover:shadow-xl font-semibold transition-all duration-300 transform hover:scale-105">
    <?php echo Mdi::mdi('plus'); ?>
    Crear Movimiento
  </a>
</div>
<div class="bg-white rounded-2xl shadow-xl border-t-4 border-purple-500 overflow-hidden">
  <div class="overflow-x-auto">
    <table class="w-full text-sm">
      <thead class="bg-gradient-to-r from-purple-50 to-violet-50">
        <tr class="border-b-2 border-purple-200">
          <th class="px-6 py-4 text-left text-purple-700 font-bold">ID</th>
          <th class="px-6 py-4 text-left text-purple-700 font-bold">Fecha</th>
          <th class="px-6 py-4 text-left text-purple-700 font-bold">Producto</th>
          <th class="px-6 py-4 text-left text-purple-700 font-bold">Tipo</th>
          <th class="px-6 py-4 text-left text-purple-700 font-bold">Origen</th>
          <th class="px-6 py-4 text-left text-purple-700 font-bold">Destino</th>
          <th class="px-6 py-4 text-left text-purple-700 font-bold">Cantidad</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($movements as $movement): ?>
          <tr class="border-b border-gray-100 hover:bg-purple-50 transition-colors duration-200">
            <td class="px-6 py-4">
              <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-purple-100 text-purple-700 border border-purple-300">
                <?= esc($movement->id); ?>
              </span>
            </td>
            <td class="px-6 py-4">
              <span class="text-gray-700 font-medium"><?= esc($movement->fecha); ?></span>
            </td>
            <td class="px-6 py-4">
              <div class="flex items-center gap-2">
                <svg class="w-4 h-4 text-purple-500" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('package'); ?></svg>
                <span class="font-semibold text-gray-800"><?= esc($movement->producto); ?></span>
              </div>
            </td>
            <td class="px-6 py-4">
              <?php
                  $config = match ($movement->tipo) {
                      'Entrada'  => ['bg' => 'bg-green-100', 'text' => 'text-green-700', 'icon' => 'arrow-down-circle', 'border' => 'border-green-300'],
                      'Traslado' => ['bg' => 'bg-blue-100', 'text' => 'text-blue-700', 'icon' => 'transfer', 'border' => 'border-blue-300'],
                      'Salida' => ['bg' => 'bg-red-100', 'text' => 'text-red-700', 'icon' => 'arrow-up-circle', 'border' => 'border-red-300'],
                      'Desecho' => ['bg' => 'bg-orange-100', 'text' => 'text-orange-700', 'icon' => 'trash-can', 'border' => 'border-orange-300'],
                      'Ajuste de Stock' => ['bg' => 'bg-indigo-100', 'text' => 'text-indigo-700', 'icon' => 'tune', 'border' => 'border-indigo-300'],
                      default    => ['bg' => 'bg-gray-100', 'text' => 'text-gray-700', 'icon' => 'circle', 'border' => 'border-gray-300']
                  };
              ?>
              <span class="inline-flex items-center gap-1 px-3 py-1 rounded-lg text-xs font-bold <?= $config['bg'] ?> <?= $config['text'] ?> border <?= $config['border'] ?>">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi($config['icon']); ?></svg>
                <?= esc($movement->tipo) ?>
              </span>
            </td>
            <td class="px-6 py-4">
              <span class="text-gray-700 font-medium"><?= esc($movement->nombre_almacen_origen." / ".$movement->ubicacion_origen); ?></span>
            </td>
            <td class="px-6 py-4">
              <span class="text-gray-700 font-medium"><?= esc($movement->nombre_almacen_destino." / ".$movement->ubicacion_destino); ?></span>
            </td>
            <td class="px-6 py-4">
              <span class="inline-flex items-center px-3 py-1 rounded-lg text-sm font-bold bg-violet-100 text-violet-700 border border-violet-300">
                <?= esc($movement->cantidad); ?>
              </span>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
<?php echo $this->endSection(); ?>
