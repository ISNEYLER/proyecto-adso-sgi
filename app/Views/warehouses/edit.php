<?php 
use \Mdi\Mdi;
Mdi::withIconsPath(__DIR__ . '/../../../node_modules/@mdi/svg/svg/'); 
?>

<?php echo $this->extend('templates/layout'); ?>
<?php echo $this->section('content'); ?>

<div class="max-w-5xl mx-auto">

    <!-- Encabezado -->
    <div class="bg-gradient-to-r from-orange-50 to-amber-50 rounded-2xl p-8 border-l-4 border-[#F97316] shadow-md mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-4xl font-bold text-orange-700">Editar Almacén</h1>
                <p class="text-gray-600 mt-2 flex items-center gap-2">
                    <svg class="w-5 h-5 text-orange-500" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('pencil'); ?></svg>
                    Actualice los detalles del almacén
                </p>
            </div>
            <div class="flex gap-2">
                <button type="submit" form="formEditWarehouse"
                    class="flex items-center gap-2 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-6 py-3 rounded-xl shadow-lg hover:shadow-xl font-semibold transition-all duration-300 transform hover:scale-105">
                    <?php echo Mdi::mdi('check-circle'); ?>
                    Guardar
                </button>

                <a href="<?= base_url('warehouses/') ?>"
                    class="flex items-center gap-2 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white px-6 py-3 rounded-xl shadow-lg hover:shadow-xl font-semibold transition-all duration-300 transform hover:scale-105">
                    <?php echo Mdi::mdi('trash-can'); ?>
                    Descartar
                </a>
            </div>
        </div>
    </div>

    <!-- Contenedor del Formulario -->
    <div class="bg-white rounded-2xl shadow-xl border-t-4 border-orange-500 p-8">
        <form id="formEditWarehouse" action="<?= base_url('warehouses/update/'.$storage->id) ?>" method="post" autocomplete="off" class="grid grid-cols-1 md:grid-cols-12 gap-6">
            <!-- Nombre -->
            <div class="md:col-span-4">
                <label class="block text-sm font-bold text-gray-700 mb-2 flex items-center gap-2">
                    <svg class="w-4 h-4 text-orange-500" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('warehouse'); ?></svg>
                    Nombre del Almacén
                </label>
                <input type="text" name="nombre" placeholder="Ej: Almacén Central" value="<?= $storage->nombre; ?>" class="w-full rounded-xl border-2 px-4 py-3 focus:outline-none transition-all duration-300
                <?= isset($validation) && $validation->hasError('nombre')
                                               ? 'border-red-500 focus:border-red-600 focus:ring-2 focus:ring-red-200'
                                               : (old('nombre') ? 'border-green-500 focus:border-green-600 focus:ring-2 focus:ring-green-200' : 'border-gray-200 focus:border-orange-500 focus:ring-2 focus:ring-orange-200') ?>">
                <?php if (isset($validation) && $validation->hasError('nombre')): ?>
                    <p class="text-sm text-red-600 mt-2 flex items-center gap-1"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('alert-circle'); ?></svg><?= $validation->getError('nombre') ?></p>
                <?php endif; ?>
            </div>
            
            <!-- Código -->
            <div class="md:col-span-4">
                <label class="block text-sm font-bold text-gray-700 mb-2 flex items-center gap-2">
                    <svg class="w-4 h-4 text-amber-500" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('barcode'); ?></svg>
                    Código
                </label>
                <input type="text" name="codigo" placeholder="Ej: ALM-001" value="<?= $storage->codigo; ?>" class="w-full rounded-xl border-2 px-4 py-3 focus:outline-none transition-all duration-300
                <?= isset($validation) && $validation->hasError('codigo')
                                               ? 'border-red-500 focus:border-red-600 focus:ring-2 focus:ring-red-200'
                                               : (old('codigo') ? 'border-green-500 focus:border-green-600 focus:ring-2 focus:ring-green-200' : 'border-gray-200 focus:border-orange-500 focus:ring-2 focus:ring-orange-200') ?>">
                <?php if (isset($validation) && $validation->hasError('codigo')): ?>
                    <p class="text-sm text-red-600 mt-2 flex items-center gap-1"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('alert-circle'); ?></svg><?= $validation->getError('codigo') ?></p>
                <?php endif; ?>
            </div>

            <!-- Dirección -->
            <div class="md:col-span-4">
                <label class="block text-sm font-bold text-gray-700 mb-2 flex items-center gap-2">
                    <svg class="w-4 h-4 text-orange-600" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('map-marker'); ?></svg>
                    Dirección
                </label>
                <input type="text" name="direccion" placeholder="Ej: Calle Principal 123" value="<?= $storage->direccion; ?>" class="w-full rounded-xl border-2 px-4 py-3 focus:outline-none transition-all duration-300
                <?= isset($validation) && $validation->hasError('direccion')
                                               ? 'border-red-500 focus:border-red-600 focus:ring-2 focus:ring-red-200'
                                               : (old('direccion') ? 'border-green-500 focus:border-green-600 focus:ring-2 focus:ring-green-200' : 'border-gray-200 focus:border-orange-500 focus:ring-2 focus:ring-orange-200') ?>">
                <?php if (isset($validation) && $validation->hasError('direccion')): ?>
                    <p class="text-sm text-red-600 mt-2 flex items-center gap-1"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('alert-circle'); ?></svg><?= $validation->getError('direccion') ?></p>
                <?php endif; ?>
            </div>
        </form>
    </div>
</div>

<?php echo $this->endSection(); ?>
