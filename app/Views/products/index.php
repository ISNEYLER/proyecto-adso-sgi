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
    href="<?= base_url('products/new') ?>" class="flex items-center gap-2 bg-blue-600 hover:bg-blue-800 text-white px-5 py-2 rounded-lg shadow transition">
    <?php echo Mdi::mdi('plus'); ?>
    Nuevo Producto
  </a>
</div>

<?php if (session()->getFlashdata('error')): ?>
  <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-5">
      <?= session()->getFlashdata('error') ?>
  </div>
<?php endif; ?>

<?php if (session()->getFlashdata('msg')): ?>
  <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-5">
      <?= session()->getFlashdata('msg') ?>
  </div>
<?php endif; ?>


<div class="overflow-x-auto bg-white rounded-lg shadow">
  <table class="min-w-full text-sm">
    <thead class="bg-gray-100 text-gray-700">
      <tr>
        <th class="px-4 py-3 text-center">Producto</th>
        <th class="px-4 py-3 text-center">Precio</th>
        <th class="px-4 py-3 text-center">Costo</th>
        <th class="px-4 py-3 text-center">Cantidad</th>
        <th class="px-4 py-3 text-center">Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($products as $producto): ?>
        <tr class="hover:bg-gray-50">
          <td class="px-4 py-3 text-center"><?= esc($producto->nombre); ?></td>
          <td class="px-4 py-3 text-center"><?= $producto->valor; ?></td>
          <td class="px-4 py-3 text-center"><?= $producto->costo; ?></td>
          <td class="px-4 py-3 text-center"><?= $producto->cantidad; ?></td>
          <td class="px-4 py-3 text-center">
            <div class="flex item-center justify-center">
              <a
                class="text-blue-600 hover:text-blue-800" href="<?= base_url('products/edit/' . $producto->id) ?>"><?php echo Mdi::mdi('pencil'); ?>
              </a>
              <button onclick="openDeleteModal(<?= $producto->id ?>, '<?= esc($producto->nombre) ?>')" class="text-red-600 hover:text-red-800">
                <?= Mdi::mdi('delete'); ?>
              </button>
              <a
                class="btn btn-success" href=""><?php echo Mdi::mdi('arrow-right-bold'); ?>
              </a>
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
function openDeleteModal(id, nombre) {

    const modal  = document.getElementById('deleteModal');
    const name   = document.getElementById('deleteName');
    const form   = document.getElementById('deleteForm');

    name.textContent = nombre;
    form.action = "<?= base_url('products/delete/') ?>" + id;

    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeDeleteModal() {

    const modal = document.getElementById('deleteModal');

    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

// Cerrar si hacen click fuera del modal
document.getElementById('deleteModal').addEventListener('click', function(e) {

    if (e.target.id === 'deleteModal') {
        closeDeleteModal();
    }

});
</script>


<?php echo $this->endSection(); ?>

