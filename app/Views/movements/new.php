<?php 
use \Mdi\Mdi;
Mdi::withIconsPath(__DIR__ . '/../../../node_modules/@mdi/svg/svg/'); 
?>

<?php echo $this->extend('templates/layout'); ?>
<?php echo $this->section('content'); ?>

<div class="max-w-5xl mx-auto">

    <!-- Encabezado -->
    <div class="bg-gradient-to-r from-purple-50 to-violet-50 rounded-2xl p-8 border-l-4 border-[#7C3AED] shadow-md mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-4xl font-bold text-purple-700">Crear Movimiento</h1>
                <p class="text-gray-600 mt-2 flex items-center gap-2">
                    <svg class="w-5 h-5 text-purple-500" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('plus-circle'); ?></svg>
                    Registre un nuevo movimiento de inventario
                </p>
            </div>
            <div class="flex gap-2">
                <button type="submit" form="formCreateMovement"
                    class="flex items-center gap-2 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-6 py-3 rounded-xl shadow-lg hover:shadow-xl font-semibold transition-all duration-300 transform hover:scale-105">
                    <?php echo Mdi::mdi('check-circle'); ?>
                    Guardar
                </button>

                <a href="<?= base_url('movements/') ?>"
                    class="flex items-center gap-2 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white px-6 py-3 rounded-xl shadow-lg hover:shadow-xl font-semibold transition-all duration-300 transform hover:scale-105">
                    <?php echo Mdi::mdi('trash-can'); ?>
                    Descartar
                </a>
            </div>
        </div>
    </div>

    <!-- Contenedor del Formulario -->
    <div class="bg-white rounded-2xl shadow-xl border-t-4 border-purple-500 p-8">

    <!-- Card -->
    <div class="bg-white rounded-xl shadow p-6 mt-4">

        <form id="formCreateMovement"
              action="<?= base_url('movements/save') ?>"
              method="post"
              class="grid grid-cols-1 md:grid-cols-12 gap-4">

            <!-- Ubicación Origen -->
            <div class="md:col-span-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Ubicación Origen</label>
                <select name="ubicacion_origen"
                        class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <?php foreach($locations as $location): ?>
                        <option value="<?= $location->id ?>"><?= $location->nombre_almacen." / ".$location->nombre;?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Ubicación Destino -->
            <div class="md:col-span-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Ubicación Destino</label>
                <select name="ubicacion_destino"
                        class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <?php foreach($locations as $location): ?>
                        <option value="<?= $location->id ?>"><?= $location->nombre_almacen." / ".$location->nombre?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Tipo Movimiento -->
            <div class="md:col-span-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Tipo de Movimiento</label>
                <select name="tipo_movimiento"
                        class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <?php foreach($types as $type): ?>
                        <option value="<?= $type->id ?>"><?= $type->nombre ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Producto -->
            <div class="md:col-span-8">
                <label class="block text-sm font-medium text-gray-700 mb-1">Producto</label>
                <select name="producto"
                        class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <?php foreach($products as $product): ?>
                        <option value="<?= $product->id ?>"><?= $product->nombre ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Cantidad -->
            <div class="md:col-span-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Cantidad</label>
                <input type="number"
                       name="cantidad"
                       value="<?= set_value('cantidad') ?>"
                       class="w-full rounded-lg border px-3 py-2 focus:outline-none focus:ring-2
                       <?= isset($validation) && $validation->hasError('cantidad') 
                           ? 'border-red-500 focus:ring-red-400' 
                           : (old('cantidad') ? 'border-green-500 focus:ring-green-400' : 'border-gray-300 focus:ring-blue-400') ?>">

                <?php if(isset($validation) && $validation->hasError('cantidad')): ?>
                    <p class="text-sm text-red-600 mt-1"><?= $validation->getError('cantidad') ?></p>
                <?php endif; ?>
            </div>

        </form>
    </div>
</div>

<?php echo $this->endSection(); ?>
