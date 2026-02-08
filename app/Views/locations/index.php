<?php
use \Mdi\Mdi;
Mdi::withIconsPath(__DIR__ . '/../../../node_modules/@mdi/svg/svg/');
?>

<?php echo $this->extend('templates/layout'); ?>

<?php echo $this->section('content'); ?>

<!-- Encabezado -->
<div class="bg-gradient-to-r from-emerald-50 to-teal-50 rounded-2xl p-8 border-l-4 border-[#059669] shadow-md mb-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-4xl font-bold text-emerald-700">Ubicaciones</h1>
            <p class="text-gray-600 mt-2 flex items-center gap-2">
                <svg class="w-5 h-5 text-teal-500" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('map-marker-multiple'); ?></svg>
                Gestión de ubicaciones de almacén
            </p>
        </div>
        <div class="hidden md:block">
            <svg class="w-16 h-16 text-emerald-200 opacity-50" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('map-marker'); ?></svg>
        </div>
    </div>
</div>

<div class="flex flex-wrap justify-between items-center gap-4 mb-8">
  <div class="relative w-full md:w-1/3">
    <svg class="absolute left-4 top-1/2 -translate-y-1/2 text-emerald-400 w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('magnify'); ?></svg>
    <input type="text" placeholder="Buscar ubicaciones..." class="w-full pl-12 pr-4 py-3 border-2 border-emerald-100 rounded-xl bg-emerald-50 focus:outline-none focus:border-[#059669] focus:ring-2 focus:ring-emerald-300 focus:bg-white font-medium text-gray-700 placeholder-gray-400 transition-all duration-300">
  </div>
  <a href="<?= base_url('locations/new') ?>" class="flex items-center gap-2 bg-gradient-to-r from-[#059669] to-[#0D9488] hover:from-[#047857] hover:to-[#0F766E] text-emerald-50 px-6 py-3 rounded-xl shadow-lg hover:shadow-xl font-semibold transition-all duration-300 transform hover:scale-105">
    <?php echo Mdi::mdi('plus'); ?>
    Crear Ubicación
  </a>
</div>

<!-- Mensajes de Error/Éxito -->
<?php if (session()->getFlashdata('error')): ?>
  <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 rounded-xl shadow-md flex items-center gap-3">
    <svg class="w-6 h-6 text-red-500 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('alert-circle'); ?></svg>
    <p class="text-red-700 font-medium"><?= session()->getFlashdata('error') ?></p>
  </div>
<?php endif; ?>

<?php if (session()->getFlashdata('msg')): ?>
  <div class="mb-6 p-4 bg-emerald-50 border-l-4 border-emerald-500 rounded-xl shadow-md flex items-center gap-3">
    <svg class="w-6 h-6 text-emerald-500 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('check-circle'); ?></svg>
    <p class="text-emerald-700 font-medium"><?= session()->getFlashdata('msg') ?></p>
  </div>
<?php endif; ?>


<!-- Tabla de Ubicaciones -->
<div class="bg-white rounded-2xl shadow-xl border-t-4 border-emerald-500 overflow-hidden">
  <div class="overflow-x-auto">
    <table class="w-full text-sm">
      <thead class="bg-gradient-to-r from-emerald-50 to-teal-50">
        <tr class="border-b-2 border-emerald-200">
          <th class="px-6 py-4 text-left text-emerald-700 font-bold">ID</th>
          <th class="px-6 py-4 text-left text-emerald-700 font-bold">Nombre</th>
          <th class="px-6 py-4 text-left text-emerald-700 font-bold">Código</th>
          <th class="px-6 py-4 text-left text-emerald-700 font-bold">Almacén</th>
          <th class="px-6 py-4 text-center text-emerald-700 font-bold">Operaciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($locations as $location): ?>
          <tr class="border-b border-gray-100 hover:bg-emerald-50 transition-colors duration-200">
            <td class="px-6 py-4">
              <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-emerald-100 text-emerald-700 border border-emerald-300">
                <?= esc($location->id); ?>
              </span>
            </td>
            <td class="px-6 py-4">
              <div class="flex items-center gap-3">
                <svg class="w-5 h-5 text-teal-500" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('map-marker'); ?></svg>
                <span class="font-semibold text-gray-800"><?= $location->nombre; ?></span>
              </div>
            </td>
            <td class="px-6 py-4">
              <span class="inline-flex items-center px-3 py-1 rounded-lg text-xs font-medium bg-teal-100 text-teal-700"><?= $location->codigo; ?></span>
            </td>
            <td class="px-6 py-4">
              <span class="text-gray-700 font-medium"><?= $location->nombre_almacen; ?></span>
            </td>
            <td class="px-6 py-4">
              <div class="flex items-center justify-center gap-2">
                <a href="<?= base_url('locations/edit/' . $location->id) ?>" class="flex items-center gap-1 px-4 py-2 bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-600 hover:to-cyan-600 text-white rounded-lg shadow-md font-semibold transition-all duration-300 transform hover:scale-105">
                  <?php echo Mdi::mdi('pencil'); ?>
                  Editar
                </a>
                <button onclick="openDeleteModal(<?= $location->id ?>, '<?= esc($location->nombre) ?>')" class="flex items-center gap-1 px-4 py-2 bg-gradient-to-r from-red-500 to-orange-500 hover:from-red-600 hover:to-orange-600 text-white rounded-lg shadow-md font-semibold transition-all duration-300 transform hover:scale-105">
                  <?= Mdi::mdi('delete'); ?>
                  Eliminar
                </button>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<!-- MODAL ELIMINAR -->
<div id="deleteModal" class="fixed inset-0 hidden items-center justify-center z-50 backdrop-blur-sm bg-black/20">

    <div class="bg-white rounded-2xl w-full max-w-md p-8 shadow-2xl border-t-4 border-red-500 transform transition-all">
        <div class="flex justify-center mb-4">
            <div class="bg-red-100 rounded-full p-4">
                <svg class="w-8 h-8 text-red-600" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('alert-circle'); ?></svg>
            </div>
        </div>

        <h2 class="text-2xl font-bold text-center mb-2 text-gray-800">
            Confirmar eliminación
        </h2>

        <p class="text-center text-gray-600 mb-6">
            ¿Está seguro que desea eliminar la ubicación <span id="deleteName" class="font-bold text-red-600"></span>? Esta acción no se puede deshacer.
        </p>

        <form id="deleteForm" method="POST" action="">
        <?= csrf_field() ?>
            <div class="flex justify-end gap-3 mt-8">

                <button 
                    type="button"
                    onclick="closeDeleteModal()"
                    class="px-6 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-lg font-semibold transition-colors duration-200"
                >
                    Cancelar
                </button>

                <button 
                    type="submit"
                    class="px-6 py-2 bg-gradient-to-r from-red-500 to-orange-500 hover:from-red-600 hover:to-orange-600 text-white rounded-lg font-semibold shadow-lg transition-all duration-300 transform hover:scale-105"
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
    form.action = "<?= base_url('locations/delete/') ?>" + id;

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

