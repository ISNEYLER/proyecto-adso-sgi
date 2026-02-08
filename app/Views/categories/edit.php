<?php 
use \Mdi\Mdi;
Mdi::withIconsPath(__DIR__ . '/../../../node_modules/@mdi/svg/svg/'); 
?>

<?php echo $this->extend('templates/layout'); ?>
<?php echo $this->section('content'); ?>

    <div class="max-w-5xl mx-auto">
    
    <!-- Encabezado -->
    <div class="bg-gradient-to-r from-indigo-50 to-purple-50 rounded-2xl p-8 border-l-4 border-[#6366F1] shadow-md mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-4xl font-bold text-indigo-700">Editar Categoría</h1>
                <p class="text-gray-600 mt-2 flex items-center gap-2">
                    <svg class="w-5 h-5 text-indigo-500" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('pencil'); ?></svg>
                    Actualice los detalles de la categoría
                </p>
            </div>
            <div class="flex gap-2">
                <button type="submit" form="formCreateCategory" class="flex items-center gap-2 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-6 py-3 rounded-xl shadow-lg hover:shadow-xl font-semibold transition-all duration-300 transform hover:scale-105">
                    <?php echo Mdi::mdi('check-circle'); ?>
                    Guardar
                </button>

                <a href="<?= base_url('categories/') ?>" class="flex items-center gap-2 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white px-6 py-3 rounded-xl shadow-lg hover:shadow-xl font-semibold transition-all duration-300 transform hover:scale-105">
                    <?php echo Mdi::mdi('trash-can'); ?>
                    Descartar
                </a>
            </div>
        </div>
    </div>

    <!-- Contenedor del Formulario -->
    <div class="bg-white rounded-2xl shadow-xl border-t-4 border-indigo-500 p-8">
        <form id="formCreateCategory" action="<?= base_url('categories/update/'.$category->id) ?>" method="post" autocomplete="off" class="grid grid-cols-1 md:grid-cols-12 gap-6">
            <!-- Nombre de la Categoría -->
            <div class="md:col-span-12">
                <label class="block text-sm font-bold text-gray-700 mb-2 flex items-center gap-2">
                    <svg class="w-4 h-4 text-indigo-500" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('tag'); ?></svg>
                    Nombre de la Categoría
                </label>
                <input type="text" name="nombre" placeholder="Ej: Ropa, Electrónica, Alimentos..." value="<?= $category->nombre ?>" class="w-full rounded-xl border-2 px-4 py-3 focus:outline-none transition-all duration-300 border-gray-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200">
            </div>
        </form>
    </div>
</div>

<?php echo $this->endSection(); ?>

