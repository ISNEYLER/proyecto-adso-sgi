<?php echo $this->extend('templates/layout'); ?>
<?php echo $this->section('content'); ?>

<div class="max-w-5xl mx-auto">

    <!-- Encabezado -->
    <div class="flex justify-between items-center p-4">
        <div class="flex flex-col">
            <h4 class="text-xl font-semibold text-gray-800">Crear movimiento</h4>
        </div>

        <div class="flex gap-2">
            <button type="submit" form="formCreateMovement" class="px-4 py-2 bg-green-600 text-white text-sm rounded-lg hover:bg-green-700 transition">Guardar</button>
            <a href="<?= base_url('movements/') ?>"class="px-4 py-2 bg-gray-500 text-white text-sm rounded-lg hover:bg-gray-600 transition">Descartar</a>
        </div>
    </div>

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
