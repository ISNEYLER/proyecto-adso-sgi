<?php echo $this->extend('templates/layout'); ?>
<?php echo $this->section('content'); ?>

    <div class="max-w-5xl mx-auto"> <!-- Encabezado -->
    <div class="flex justify-between items-center p-4">
        <h4 class="text-xl font-semibold text-gray-800">Crear categoria</h4>

        <div class="flex gap-2">
            <button type="submit" form="formCreateCategory" class="px-4 py-2 bg-green-600 text-white text-sm rounded-lg hover:bg-green-700 transition">
                Guardar
            </button>

            <a href="<?= base_url('categories/') ?>" class="px-4 py-2 bg-gray-500 text-white text-sm rounded-lg hover:bg-gray-600 transition">
                Descartar
            </a>
        </div>
    </div>

    <!-- Card -->
    <div class="bg-white rounded-xl shadow p-6 mt-4">
        <form id="formCreateCategory" action="<?= base_url('categories/save') ?>" method="post" autocomplete="off" class="grid grid-cols-1 md:grid-cols-12 gap-4">
            <!-- Producto -->
            <div class="md:col-span-12">
                <label class="block text-sm font-medium text-gray-700 mb-1">Nombre de la Categoria</label>
                <input type="text" name="nombre" placeholder="Ropa" value="<?= 0 ?>" class="w-full rounded-lg border px-3 py-2 focus:outline-none focus:ring-2">
            </div>
        </form>
    </div>
</div>

<?php echo $this->endSection(); ?>

