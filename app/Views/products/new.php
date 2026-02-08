<?php 
use \Mdi\Mdi;
Mdi::withIconsPath(__DIR__ . '/../../../node_modules/@mdi/svg/svg/'); 
?>

<?php echo $this->extend('templates/layout'); ?>
<?php echo $this->section('content'); ?>

    <div class="max-w-5xl mx-auto">
    
    <!-- Encabezado -->
    <div class="bg-gradient-to-r from-blue-50 to-cyan-50 rounded-2xl p-8 border-l-4 border-[#3B82F6] shadow-md mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-4xl font-bold text-blue-700">Crear Producto</h1>
                <p class="text-gray-600 mt-2 flex items-center gap-2">
                    <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('plus-circle'); ?></svg>
                    Agregue un nuevo producto al catálogo
                </p>
            </div>
            <div class="flex gap-2">
                <button type="submit" form="formCreateProduct" class="flex items-center gap-2 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-6 py-3 rounded-xl shadow-lg hover:shadow-xl font-semibold transition-all duration-300 transform hover:scale-105">
                    <?php echo Mdi::mdi('check-circle'); ?>
                    Guardar
                </button>
                <a href="<?= base_url('products/') ?>" class="flex items-center gap-2 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white px-6 py-3 rounded-xl shadow-lg hover:shadow-xl font-semibold transition-all duration-300 transform hover:scale-105">
                    <?php echo Mdi::mdi('trash-can'); ?>
                    Descartar
                </a>
            </div>
        </div>
    </div>

    <!-- Contenedor del Formulario -->
    <div class="bg-white rounded-2xl shadow-xl border-t-4 border-blue-500 p-8">

        <form
            id="formCreateProduct" action="<?= base_url('products/save') ?>" method="post" autocomplete="off" class="grid grid-cols-1 md:grid-cols-12 gap-6">

            <!-- Producto -->
            <div class="md:col-span-12">
                <label class="block text-sm font-bold text-gray-700 mb-2 flex items-center gap-2">
                    <svg class="w-4 h-4 text-blue-500" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('package'); ?></svg>
                    Nombre del Producto
                </label>
                <input
                type="text" name="nombre" placeholder="Ej: Bicicleta de Montaña" value="<?= set_value('nombre') ?>" class="w-full rounded-xl border-2 px-4 py-3 focus:outline-none transition-all duration-300
                                           <?= isset($validation) && $validation->hasError('nombre')
                                               ? 'border-red-500 focus:border-red-600 focus:ring-2 focus:ring-red-200'
                                               : (old('nombre') ? 'border-green-500 focus:border-green-600 focus:ring-2 focus:ring-green-200' : 'border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200') ?>">

                <?php if (isset($validation) && $validation->hasError('nombre')): ?>
                    <p class="text-sm text-red-600 mt-2 flex items-center gap-1"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('alert-circle'); ?></svg><?= $validation->getError('nombre') ?></p>
                <?php endif; ?>
            </div>

            <!-- Valor -->
            <div class="md:col-span-4">
                <label class="block text-sm font-bold text-gray-700 mb-2 flex items-center gap-2">
                    <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('currency-usd'); ?></svg>
                    Valor de Venta
                </label>
                <input
                type="number" step="0.01" name="valor" value="<?= set_value('valor', 0) ?>" class="w-full rounded-xl border-2 px-4 py-3 focus:outline-none transition-all duration-300
                                           <?= isset($validation) && $validation->hasError('valor')
                                               ? 'border-red-500 focus:border-red-600 focus:ring-2 focus:ring-red-200'
                                               : (old('valor') ? 'border-green-500 focus:border-green-600 focus:ring-2 focus:ring-green-200' : 'border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200') ?>">

                <?php if (isset($validation) && $validation->hasError('valor')): ?>
                    <p class="text-sm text-red-600 mt-2 flex items-center gap-1"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('alert-circle'); ?></svg><?= $validation->getError('valor') ?></p>
                <?php endif; ?>
            </div>

            <!-- Costo -->
            <div class="md:col-span-4">
                <label class="block text-sm font-bold text-gray-700 mb-2 flex items-center gap-2">
                    <svg class="w-4 h-4 text-orange-500" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('cash'); ?></svg>
                    Costo
                </label>
                <input
                type="number" step="0.01" name="costo" value="<?= set_value('costo', 0) ?>" class="w-full rounded-xl border-2 px-4 py-3 focus:outline-none transition-all duration-300
                                           <?= isset($validation) && $validation->hasError('costo')
                                               ? 'border-red-500 focus:border-red-600 focus:ring-2 focus:ring-red-200'
                                               : (old('costo') ? 'border-green-500 focus:border-green-600 focus:ring-2 focus:ring-green-200' : 'border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200') ?>">

                <?php if (isset($validation) && $validation->hasError('costo')): ?>
                    <p class="text-sm text-red-600 mt-2 flex items-center gap-1"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('alert-circle'); ?></svg><?= $validation->getError('costo') ?></p>
                <?php endif; ?>
            </div>

            <!-- SKU -->
            <div class="md:col-span-4">
                <label class="block text-sm font-bold text-gray-700 mb-2 flex items-center gap-2">
                    <svg class="w-4 h-4 text-purple-500" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('barcode'); ?></svg>
                    SKU
                </label>
                <input
                type="text" name="sku" value="<?= set_value('sku') ?>" class="w-full rounded-xl border-2 px-4 py-3 focus:outline-none transition-all duration-300
                                           <?= isset($validation) && $validation->hasError('sku')
                                               ? 'border-red-500 focus:border-red-600 focus:ring-2 focus:ring-red-200'
                                               : (old('sku') ? 'border-green-500 focus:border-green-600 focus:ring-2 focus:ring-green-200' : 'border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200') ?>">

                <?php if (isset($validation) && $validation->hasError('sku')): ?>
                    <p class="text-sm text-red-600 mt-2 flex items-center gap-1"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('alert-circle'); ?></svg><?= $validation->getError('sku') ?></p>
                <?php endif; ?>
            </div>

            <!-- Código de barras -->
            <div class="md:col-span-4">
                <label class="block text-sm font-bold text-gray-700 mb-2 flex items-center gap-2">
                    <svg class="w-4 h-4 text-indigo-500" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('barcode-scan'); ?></svg>
                    Código de Barras
                </label>
                <input
                type="text" name="codigo_barras" value="<?= set_value('codigo_barras') ?>" class="w-full rounded-xl border-2 px-4 py-3 focus:outline-none transition-all duration-300
                                           <?= isset($validation) && $validation->hasError('codigo_barras')
                                               ? 'border-red-500 focus:border-red-600 focus:ring-2 focus:ring-red-200'
                                               : (old('codigo_barras') ? 'border-green-500 focus:border-green-600 focus:ring-2 focus:ring-green-200' : 'border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200') ?>">

                <?php if (isset($validation) && $validation->hasError('codigo_barras')): ?>
                    <p class="text-sm text-red-600 mt-2 flex items-center gap-1"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('alert-circle'); ?></svg><?= $validation->getError('codigo_barras') ?></p>
                <?php endif; ?>
            </div>

            <!-- Categoría -->
            <div class="md:col-span-4">
                <label class="block text-sm font-bold text-gray-700 mb-2 flex items-center gap-2">
                    <svg class="w-4 h-4 text-pink-500" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('tag'); ?></svg>
                    Categoría
                </label>
                <select
                    name="categoria" class="w-full rounded-xl border-2 px-4 py-3 focus:outline-none transition-all duration-300 bg-white cursor-pointer
                                                <?= isset($validation) && $validation->hasError('categoria')
                                                    ? 'border-red-500 focus:border-red-600 focus:ring-2 focus:ring-red-200'
                                                    : (old('categoria') ? 'border-green-500 focus:border-green-600 focus:ring-2 focus:ring-green-200' : 'border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200') ?>">
                    <option value="">-- Seleccionar Categoría --</option>
                    <?php foreach ($categories as $category): ?>
                        <option
                            value="<?= esc($category->id); ?>" <?= old('categoria') == $category->id ? 'selected' : '' ?>><?= esc($category->nombre); ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <?php if (isset($validation) && $validation->hasError('categoria')): ?>
                    <p class="text-sm text-red-600 mt-2 flex items-center gap-1"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('alert-circle'); ?></svg><?= $validation->getError('categoria') ?></p>
                <?php endif; ?>
            </div>

            <!-- Descripción -->
            <div class="md:col-span-12">
                <label class="block text-sm font-bold text-gray-700 mb-2 flex items-center gap-2">
                    <svg class="w-4 h-4 text-teal-500" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('text-box'); ?></svg>
                    Descripción
                </label>
                <textarea name="descripcion" rows="5" placeholder="Descripción detallada del producto..." class="w-full rounded-xl border-2 px-4 py-3 focus:outline-none transition-all duration-300 resize-none
                                              <?= isset($validation) && $validation->hasError('descripcion')
                                                  ? 'border-red-500 focus:border-red-600 focus:ring-2 focus:ring-red-200'
                                                  : (old('descripcion') ? 'border-green-500 focus:border-green-600 focus:ring-2 focus:ring-green-200' : 'border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200') ?>"><?= set_value('descripcion') ?></textarea>
                
                <?php if (isset($validation) && $validation->hasError('descripcion')): ?>
                    <p class="text-sm text-red-600 mt-2 flex items-center gap-1"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('alert-circle'); ?></svg><?= $validation->getError('descripcion') ?></p>
                <?php endif; ?>
            </div>

        </form>
    </div>
</div>

<?php echo $this->endSection(); ?>

