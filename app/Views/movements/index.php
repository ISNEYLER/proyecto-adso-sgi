<?php
use \Mdi\Mdi;
Mdi::withIconsPath(__DIR__ . '/../../../node_modules/@mdi/svg/svg/');
?>

<?php echo $this->extend('templates/layout'); ?>

<?php echo $this->section('content'); ?>
<div class="flex flex-wrap justify-between items-center gap-4 mb-6"> <!-- Buscador con ícono -->
  <div class="relative w-full md:w-1/3">
    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
      <i class="mdi mdi-magnify text-lg"><?php echo Mdi::mdi('magnify'); ?></i>
    </span>
    <input type="text" placeholder="Buscar..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-blue-400">
  </div>

  <!-- Botón principal -->
  <a
    href="<?= base_url('movements/new') ?>" class="flex items-center gap-2 bg-blue-600 hover:bg-blue-800 text-white px-5 py-2 rounded-lg shadow transition">
    <?php echo Mdi::mdi('plus'); ?>
    Crear Movimiento
  </a>
</div>
<div class="overflow-x-auto bg-white rounded-lg shadow">
  <table class="min-w-full text-sm">
    <thead class="bg-gray-100 text-gray-700">
      <tr>
        <th class="px-4 py-3 text-center">ID</th>
        <th class="px-4 py-3 text-center">Fecha</th>
        <th class="px-4 py-3 text-center">Producto</th>
        <th class="px-4 py-3 text-center">Tipo</th>
        <th class="px-4 py-3 text-center">Origen</th>
        <th class="px-4 py-3 text-center">Destino</th>
        <th class="px-4 py-3 text-center">Cantidad</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($movements as $movement): ?>
        <tr class="hover:bg-gray-50">
          <td class="px-4 py-3 text-center"><?= esc($movement->id); ?></td>
          <td class="px-4 py-3 text-center"><?= esc($movement->fecha); ?></td>
          <td class="px-4 py-3 text-center"><?= esc($movement->producto); ?></td>
          <td class="px-4 py-3 text-center">
          <?php
              $color = match ($movement->tipo) {
                  'Entrada'  => 'bg-green-100 text-green-700',
                  'Traslado' => 'bg-blue-100 text-blue-700',
                  'Salida', 'Desecho' => 'bg-red-100 text-red-700',
                  'Ajuste de Stock' => 'bg-purple-100 text-purple-700',
                  default    => 'bg-gray-100 text-gray-700'
              };
          ?>
          <span class="<?= $color ?> px-2 py-1 rounded text-xs font-semibold">
              <?= esc($movement->tipo) ?>
          </span>
          </td>
          <td class="px-4 py-3 text-center"><?= esc($movement->nombre_almacen_origen." / " .$movement->ubicacion_origen); ?></td>
          <td class="px-4 py-3 text-center"><?= esc($movement->nombre_almacen_destino." / " .$movement->ubicacion_destino); ?></td>
          <td class="px-4 py-3 text-center"><?= esc($movement->cantidad); ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<?php echo $this->endSection(); ?>
