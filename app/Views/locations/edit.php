<?php 
use \Mdi\Mdi;
Mdi::withIconsPath(__DIR__ . '/../../../node_modules/@mdi/svg/svg/'); 
?>

<?php echo $this->extend('templates/layout'); ?>
<?php echo $this->section('content'); ?>

<div class="max-w-5xl mx-auto">

    <!-- Encabezado -->
    <div class="bg-gradient-to-r from-emerald-50 to-teal-50 rounded-2xl p-8 border-l-4 border-[#059669] shadow-md mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-4xl font-bold text-emerald-700">Editar Ubicación</h1>
                <p class="text-gray-600 mt-2 flex items-center gap-2">
                    <svg class="w-5 h-5 text-emerald-500" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('pencil'); ?></svg>
                    Actualice los detalles de la ubicación
                </p>
            </div>
            <div class="flex gap-2">
                <button type="submit" form="formCreateLocation"
                    class="flex items-center gap-2 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-6 py-3 rounded-xl shadow-lg hover:shadow-xl font-semibold transition-all duration-300 transform hover:scale-105">
                    <?php echo Mdi::mdi('check-circle'); ?>
                    Guardar
                </button>

                <a href="<?= base_url('locations/') ?>"
                    class="flex items-center gap-2 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white px-6 py-3 rounded-xl shadow-lg hover:shadow-xl font-semibold transition-all duration-300 transform hover:scale-105">
                    <?php echo Mdi::mdi('trash-can'); ?>
                    Descartar
                </a>
            </div>
        </div>
    </div>

    <!-- Contenedor del Formulario -->
    <div class="bg-white rounded-2xl shadow-xl border-t-4 border-emerald-500 p-8">
        <form id="formCreateLocation" action="<?= base_url('locations/update/'.$location->id) ?>" method="post" autocomplete="off" class="grid grid-cols-1 md:grid-cols-12 gap-4">
            <!-- Almacén -->
            <div class="md:col-span-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Almacén</label>
                <select name="id_almacen" class="w-full rounded-lg border px-3 py-2 focus:outline-none focus:ring-2
                <?= isset($validation) && $validation->hasError('id_almacen')
                                                ? 'border-red-500 focus:ring-red-400'
                                                : (old('id_almacen') ? 'border-green-500 focus:ring-green-400' : 'border-gray-300 focus:ring-blue-400') ?>">
                    <?php if(isset($storages)): ?>
                        <?php foreach($storages as $storage): ?>
                            <option value="<?= $storage->id ?>"
                                <?= $storage->id == $location->id_almacen ? 'selected' : '' ?>>
                                <?= esc($storage->nombre) ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
                <?php if (isset($validation) && $validation->hasError('id_almacen')): ?>
                    <p class="text-sm text-red-600 mt-1"><?= $validation->getError('id_almacen') ?></p>
                <?php endif; ?>
            </div>

            <!-- Nombre de la ubicación -->
            <div class="md:col-span-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Nombre de la ubicación</label>
                <input type="text" name="nombre" placeholder="Estantería A - Pasillo 2" value="<?= $location->nombre; ?>" class="w-full rounded-lg border px-3 py-2 focus:outline-none focus:ring-2
                    <?= isset($validation) && $validation->hasError('nombre')
                                               ? 'border-red-500 focus:ring-red-400'
                                               : (old('nombre') ? 'border-green-500 focus:ring-green-400' : 'border-gray-300 focus:ring-blue-400') ?>">
                    <?php if (isset($validation) && $validation->hasError('nombre')): ?>
                        <p class="text-sm text-red-600 mt-1"><?= $validation->getError('nombre') ?></p>
                    <?php endif; ?>
            </div>


            <!-- Codigo de la ubicación -->
            <div class="md:col-span-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Código de la ubicación</label>
                <input type="text" name="codigo" placeholder="A2" value="<?= $location->codigo; ?>" class="w-full rounded-lg border px-3 py-2 focus:outline-none focus:ring-2
                    <?= isset($validation) && $validation->hasError('codigo')
                                               ? 'border-red-500 focus:ring-red-400'
                                               : (old('codigo') ? 'border-green-500 focus:ring-green-400' : 'border-gray-300 focus:ring-blue-400') ?>">
                    <?php if (isset($validation) && $validation->hasError('codigo')): ?>
                        <p class="text-sm text-red-600 mt-1"><?= $validation->getError('codigo') ?></p>
                    <?php endif; ?>
            </div>
        </form>
    </div>
</div>

<?php echo $this->endSection(); ?>
