<?php
use \Mdi\Mdi;
Mdi::withIconsPath(__DIR__ . '/../../../node_modules/@mdi/svg/svg/');
?>

<?php echo $this->extend('templates/layout'); ?>

<?php echo $this->section('content'); ?>

<!-- Encabezado -->
<div class="bg-gradient-to-r from-blue-50 to-cyan-50 rounded-2xl p-8 border-l-4 border-[#3B82F6] shadow-md mb-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-4xl font-bold text-blue-700">Productos</h1>
            <p class="text-gray-600 mt-2 flex items-center gap-2">
                <svg class="w-5 h-5 text-cyan-500" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('package'); ?></svg>
                Gestión de productos y catálogo
            </p>
        </div>
        <div class="hidden md:block">
            <svg class="w-16 h-16 text-blue-200 opacity-50" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('warehouse'); ?></svg>
        </div>
    </div>
</div>

<div class="flex flex-wrap justify-between items-center gap-4 mb-8">
  <div class="relative w-full md:w-1/3">
    <svg class="absolute left-4 top-1/2 -translate-y-1/2 text-blue-400 w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('magnify'); ?></svg>
    <input type="text" placeholder="Buscar productos..." class="w-full pl-12 pr-4 py-3 border-2 border-blue-100 rounded-xl bg-blue-50 focus:outline-none focus:border-[#3B82F6] focus:ring-2 focus:ring-blue-300 focus:bg-white font-medium text-gray-700 placeholder-gray-400 transition-all duration-300">
  </div>
  <a href="<?= base_url('products/new') ?>" class="flex items-center gap-2 bg-gradient-to-r from-[#3B82F6] to-[#0EA5E9] hover:from-[#2563EB] hover:to-[#00D9FF] text-white px-6 py-3 rounded-xl shadow-lg hover:shadow-xl font-semibold transition-all duration-300 transform hover:scale-105">
    <?php echo Mdi::mdi('plus'); ?>
    Nuevo Producto
  </a>
</div>

<?php if (session()->getFlashdata('error')): ?>
  <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-400 text-red-700 rounded-lg text-sm font-medium flex items-center gap-2">
      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/></svg>
      <?= session()->getFlashdata('error') ?>
  </div>
<?php endif; ?>

<?php if (session()->getFlashdata('msg')): ?>
  <div class="mb-6 p-4 bg-emerald-50 border-l-4 border-emerald-400 text-emerald-700 rounded-lg text-sm font-medium flex items-center gap-2">
      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
      <?= session()->getFlashdata('msg') ?>
  </div>
<?php endif; ?>

<div class="bg-white rounded-2xl shadow-lg border-t-4 border-blue-400 overflow-hidden hover:shadow-xl transition-shadow">
  <table class="min-w-full text-sm">
    <thead class="bg-gradient-to-r from-blue-50 to-cyan-50 border-b-2 border-blue-200">
      <tr>
        <th class="px-6 py-4 text-left font-bold text-blue-900 uppercase tracking-wide">Producto</th>
        <th class="px-6 py-4 text-center font-bold text-blue-900 uppercase tracking-wide">Precio</th>
        <th class="px-6 py-4 text-center font-bold text-blue-900 uppercase tracking-wide">Costo</th>
        <th class="px-6 py-4 text-center font-bold text-blue-900 uppercase tracking-wide">Cantidad</th>
        <th class="px-6 py-4 text-center font-bold text-blue-900 uppercase tracking-wide">Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($products as $producto): ?>
        <tr class="border-b border-blue-100 hover:bg-blue-50 transition-colors duration-200">
          <td class="px-6 py-4 text-left">
            <div class="flex items-center gap-3">
              <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-blue-400 to-cyan-400 flex items-center justify-center text-white shadow-md">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('package'); ?></svg>
              </div>
              <span class="font-semibold text-gray-800"><?= esc($producto->nombre); ?></span>
            </div>
          </td>
          <td class="px-6 py-4 text-center">
            <span class="bg-gradient-to-r from-emerald-100 to-cyan-100 text-emerald-700 px-3 py-1 rounded-full font-bold text-sm">$<?= $producto->valor; ?></span>
          </td>
          <td class="px-6 py-4 text-center">
            <span class="bg-gradient-to-r from-orange-100 to-yellow-100 text-orange-700 px-3 py-1 rounded-full font-bold text-sm">$<?= $producto->costo; ?></span>
          </td>
          <td class="px-6 py-4 text-center">
            <span class="inline-block bg-gradient-to-r from-blue-100 to-indigo-100 text-blue-700 px-3 py-1 rounded-full font-bold text-sm"><?= $producto->cantidad; ?></span>
          </td>
          <td class="px-6 py-4 text-center">
            <div class="flex items-center justify-center gap-3">
              <a class="inline-flex items-center gap-1 px-3 py-2 bg-blue-100 text-blue-700 hover:bg-blue-600 hover:text-white rounded-lg transition-all duration-200 font-semibold text-sm" href="<?= base_url('products/edit/' . $producto->id) ?>">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('pencil'); ?></svg>
                Editar
              </a>
              <button onclick="openDeleteModal(<?= $producto->id ?>, '<?= esc($producto->nombre) ?>')" class="inline-flex items-center gap-1 px-3 py-2 bg-red-100 text-red-700 hover:bg-red-600 hover:text-white rounded-lg transition-all duration-200 font-semibold text-sm">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('delete'); ?></svg>
                Eliminar
              </button>
            </div>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<!-- MODAL ELIMINAR -->
<div id="deleteModal" class="fixed inset-0 hidden items-center justify-center z-50 backdrop-blur-sm bg-black/30">

    <div class="bg-white rounded-2xl w-full max-w-md p-8 shadow-2xl border-t-4 border-red-400">
        <div class="flex items-center justify-center w-12 h-12 rounded-full bg-red-100 mx-auto mb-4">
            <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 24 24"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"/></svg>
        </div>
        
        <h2 class="text-2xl font-bold text-center mb-2 text-gray-900">
            Eliminar Producto
        </h2>

        <p class="text-center text-gray-600 mb-6">
            ¿Está seguro que desea eliminar el producto
            <span id="deleteName" class="font-bold text-red-600"></span>? Esta acción no se puede deshacer.
        </p>

        <form id="deleteForm" method="POST" action="">
        <?= csrf_field() ?>
            <div class="flex justify-end gap-3 mt-8">

                <button 
                    type="button"
                    onclick="closeDeleteModal()"
                    class="px-6 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg font-semibold transition-all duration-200"
                >
                    Cancelar
                </button>

                <button 
                    type="submit"
                    class="px-6 py-2 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white rounded-lg font-semibold transition-all duration-200 transform hover:scale-105"
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

