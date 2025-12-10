<?php echo $this->extend('templates/layout'); ?>
<?php echo $this->section('content'); ?>

<div class="max-w-5xl mx-auto">

    <!-- Encabezado -->
    <div class="flex justify-between items-center p-4">
        <h4 class="text-xl font-semibold text-gray-800">Editar Ubicacion</h4>

        <div class="flex gap-2">
            <button type="submit" form="formCreateLocation"
                class="px-4 py-2 bg-green-600 text-white text-sm rounded-lg hover:bg-green-700 transition">
                Guardar
            </button>

            <a href="<?= base_url('locations/') ?>"
                class="px-4 py-2 bg-gray-500 text-white text-sm rounded-lg hover:bg-gray-600 transition">
                Descartar
            </a>
        </div>
    </div>

    <!-- Card -->
    <div class="bg-white rounded-xl shadow p-6 mt-4">
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
