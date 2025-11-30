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
    href="<?= base_url('categories/new') ?>" class="flex items-center gap-2 bg-blue-600 hover:bg-blue-800 text-white px-5 py-2 rounded-lg shadow transition">
    <?php echo Mdi::mdi('plus'); ?>
    Crear Categoria
  </a>
</div>

<div class="overflow-x-auto bg-white rounded-lg shadow">
  <table class="min-w-full text-sm">
    <thead class="bg-gray-100 text-gray-700">
      <tr>
        <th class="px-4 py-3 text-center">ID</th>
        <th class="px-4 py-3 text-center">Nombre</th>
        <th class="px-4 py-3 text-center">Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($categories as $categoria): ?>
        <tr class="hover:bg-gray-50">
          <td class="px-4 py-3 text-center"><?= esc($categoria->id); ?></td>
          <td class="px-4 py-3 text-center"><?= $categoria->nombre; ?></td>
          <td class="px-4 py-3 text-center">
            <div class="flex item-center justify-center">
              <a
                class="text-blue-600 hover:text-blue-800" href="<?= base_url('categories/edit/' . $categoria->id) ?>"><?php echo Mdi::mdi('pencil'); ?>
              </a>
              <button onclick="openDeleteModal(<?= $categoria->id ?>, '<?= esc($categoria->nombre) ?>')" class="text-red-600 hover:text-red-800">
                <?= Mdi::mdi('delete'); ?>
              </button>
            </div>
            </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<!-- MODAL ELIMINAR -->
<div id="deleteModal" class="fixed inset-0 hidden items-center justify-center z-50 backdrop-blur-sm bg-black/10">

    <div class="bg-white rounded-xl w-full max-w-md p-6 shadow-lg">
        <h2 class="text-lg font-bold mb-3 text-gray-800">
            Confirmar eliminación
        </h2>

        <p class="text-sm text-gray-600 mb-4">
            ¿Está seguro que desea eliminar el producto
            <span id="deleteName" class="font-bold"></span>?
        </p>

        <form id="deleteForm" method="POST" action="">
        <?= csrf_field() ?>
            <div class="flex justify-end gap-2 mt-6">

                <button 
                    type="button"
                    onclick="closeDeleteModal()"
                    class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300"
                >
                    Cancelar
                </button>

                <button 
                    type="submit"
                    class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700"
                >
                    Eliminar
                </button>

            </div>
        </form>
    </div>

</div>

<script>

</script>


<?php echo $this->endSection(); ?>

