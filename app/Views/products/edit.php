<?php echo $this->extend('templates/layout'); ?>
<?php echo $this->section('content'); ?>

<div class="max-w-5xl mx-auto">

    <!-- Encabezado -->
    <div class="flex justify-between items-center p-4">
        <h4 class="text-xl font-semibold text-gray-800">Editar producto</h4>

        <div class="flex gap-2">
            <button type="submit"
                    form="formCreateProduct"
                    class="px-4 py-2 bg-green-600 text-white text-sm rounded-lg hover:bg-green-700 transition">
                Guardar
            </button>

            <a href="<?= base_url('products/') ?>"
               class="px-4 py-2 bg-gray-500 text-white text-sm rounded-lg hover:bg-gray-600 transition">
                Descartar
            </a>
        </div>
    </div>

    <!-- Card -->
    <div class="bg-white rounded-xl shadow p-6 mt-4">

        <form id="formCreateProduct"
              action="<?= base_url('products/update/'.$product->id) ?>"
              method="post"
              class="grid grid-cols-1 md:grid-cols-12 gap-4">

            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="id" value="<?= $product->id ?>">

            <!-- Producto -->
            <div class="md:col-span-12">
                <label class="block text-sm font-medium text-gray-700 mb-1">Producto</label>
                <input type="text"
                       name="nombre"
                       value="<?= $product->nombre ?>"
                       class="w-full rounded-lg border px-3 py-2 focus:outline-none focus:ring-2
                       <?= isset($validation) && $validation->hasError('nombre') 
                            ? 'border-red-500 focus:ring-red-400' 
                            : (old('nombre') ? 'border-green-500 focus:ring-green-400' : 'border-gray-300 focus:ring-blue-400') ?>">

                <?php if(isset($validation) && $validation->hasError('nombre')): ?>
                    <p class="text-sm text-red-600 mt-1">
                        <?= $validation->getError('nombre') ?>
                    </p>
                <?php endif; ?>
            </div>

            <!-- Valor -->
            <div class="md:col-span-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Valor</label>
                <input type="number"
                       name="valor"
                       value="<?= $product->valor ?>"
                       class="w-full rounded-lg border px-3 py-2 focus:outline-none focus:ring-2
                       <?= isset($validation) && $validation->hasError('valor') 
                            ? 'border-red-500 focus:ring-red-400' 
                            : (old('valor') ? 'border-green-500 focus:ring-green-400' : 'border-gray-300 focus:ring-blue-400') ?>">

                <?php if(isset($validation) && $validation->hasError('valor')): ?>
                    <p class="text-sm text-red-600 mt-1">
                        <?= $validation->getError('valor') ?>
                    </p>
                <?php endif; ?>
            </div>

            <!-- Costo -->
            <div class="md:col-span-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Costo</label>
                <input type="number"
                       name="costo"
                       value="<?= $product->costo ?>"
                       class="w-full rounded-lg border px-3 py-2 focus:outline-none focus:ring-2
                       <?= isset($validation) && $validation->hasError('costo') 
                            ? 'border-red-500 focus:ring-red-400' 
                            : (old('costo') ? 'border-green-500 focus:ring-green-400' : 'border-gray-300 focus:ring-blue-400') ?>">

                <?php if(isset($validation) && $validation->hasError('costo')): ?>
                    <p class="text-sm text-red-600 mt-1">
                        <?= $validation->getError('costo') ?>
                    </p>
                <?php endif; ?>
            </div>

            <!-- SKU -->
            <div class="md:col-span-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">SKU</label>
                <input type="text"
                       name="sku"
                       value="<?= $product->sku ?>"
                       class="w-full rounded-lg border px-3 py-2 focus:outline-none focus:ring-2
                       <?= isset($validation) && $validation->hasError('sku') 
                            ? 'border-red-500 focus:ring-red-400' 
                            : (old('sku') ? 'border-green-500 focus:ring-green-400' : 'border-gray-300 focus:ring-blue-400') ?>">

                <?php if(isset($validation) && $validation->hasError('sku')): ?>
                    <p class="text-sm text-red-600 mt-1">
                        <?= $validation->getError('sku') ?>
                    </p>
                <?php endif; ?>
            </div>

            <!-- Código de barras -->
            <div class="md:col-span-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Código de Barras</label>
                <input type="text"
                       name="codigo_barras"
                       value="<?= $product->codigo_barras ?>"
                       class="w-full rounded-lg border px-3 py-2 focus:outline-none focus:ring-2
                       <?= isset($validation) && $validation->hasError('codigo_barras') 
                            ? 'border-red-500 focus:ring-red-400' 
                            : (old('codigo_barras') ? 'border-green-500 focus:ring-green-400' : 'border-gray-300 focus:ring-blue-400') ?>">

                <?php if(isset($validation) && $validation->hasError('codigo_barras')): ?>
                    <p class="text-sm text-red-600 mt-1">
                        <?= $validation->getError('codigo_barras') ?>
                    </p>
                <?php endif; ?>
            </div>

            <!-- Categoría -->
            <div class="md:col-span-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Categoría</label>
                <select name="categoria"
                        class="w-full rounded-lg border px-3 py-2 focus:outline-none focus:ring-2
                        <?= isset($validation) && $validation->hasError('categoria') 
                            ? 'border-red-500 focus:ring-red-400' 
                            : (old('categoria') ? 'border-green-500 focus:ring-green-400' : 'border-gray-300 focus:ring-blue-400') ?>">

                    <?php foreach($categories as $category): ?>
                        <option value="<?= esc($category->id); ?>"
                            <?= $category->id == $product->id_categoria ? 'selected' : '' ?>>
                            <?= esc($category->nombre); ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <?php if(isset($validation) && $validation->hasError('categoria')): ?>
                    <p class="text-sm text-red-600 mt-1">
                        <?= $validation->getError('categoria') ?>
                    </p>
                <?php endif; ?>
            </div>

            <!-- Descripción -->
            <div class="md:col-span-12">
                <label class="block text-sm font-medium text-gray-700 mb-1">Descripción</label>
                <textarea name="descripcion"
                          rows="5"
                          class="w-full rounded-lg border px-3 py-2 focus:outline-none focus:ring-2
                          <?= isset($validation) && $validation->hasError('descripcion') 
                                ? 'border-red-500 focus:ring-red-400' 
                                : (old('descripcion') ? 'border-green-500 focus:ring-green-400' : 'border-gray-300 focus:ring-blue-400') ?>"><?= $product->descripcion ?></textarea>
            </div>

        </form>
    </div>
</div>

<?php echo $this->endSection(); ?>
