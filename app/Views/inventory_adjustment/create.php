<?php 
use \Mdi\Mdi;
Mdi::withIconsPath(__DIR__ . '/../../../node_modules/@mdi/svg/svg/'); 
?>

<?php echo $this->extend('templates/layout'); ?>

<?php echo $this->section('content'); ?>

<!-- Encabezado -->
<div class="bg-gradient-to-r from-cyan-50 to-sky-50 rounded-2xl p-8 border-l-4 border-[#0891B2] shadow-md mb-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-4xl font-bold text-cyan-700">Ajuste de Stock</h1>
            <p class="text-gray-600 mt-2 flex items-center gap-2">
                <svg class="w-5 h-5 text-cyan-500" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('clipboard-check'); ?></svg>
                Realice ajustes de inventario por recuento físico
            </p>
        </div>
        <div class="hidden md:block">
            <svg class="w-16 h-16 text-cyan-200 opacity-50" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('warehouse'); ?></svg>
        </div>
    </div>
</div>

<!-- Contenedor del Formulario -->
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-2xl shadow-xl border-t-4 border-cyan-500 p-8">
        
        <!-- Encabezado del Formulario -->
        <div class="flex items-center justify-between pb-6 border-b-2 border-cyan-100 mb-6">
            <div>
                <h2 class="text-2xl font-bold text-cyan-700 flex items-center gap-2">
                    <svg class="w-6 h-6 text-cyan-500" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('plus-circle'); ?></svg>
                    Nuevo Ajuste
                </h2>
                <p class="text-sm text-gray-500 mt-1">Complete los campos para registrar el ajuste</p>
            </div>
            <div class="flex gap-2">
                <button type="submit" form="formCreateAdjust"
                    class="flex items-center gap-2 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-6 py-3 rounded-xl shadow-lg hover:shadow-xl font-semibold transition-all duration-300 transform hover:scale-105">
                    <?php echo Mdi::mdi('check-circle'); ?>
                    Guardar
                </button>

                <a href="<?= base_url('stocks/') ?>"
                    class="flex items-center gap-2 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white px-6 py-3 rounded-xl shadow-lg hover:shadow-xl font-semibold transition-all duration-300 transform hover:scale-105">
                    <?php echo Mdi::mdi('trash-can'); ?>
                    Descartar
                </a>
            </div>
        </div>

        <!-- Formulario -->
        <form class="grid grid-cols-1 md:grid-cols-2 gap-6" id="formCreateAdjust" action="<?= base_url('inventory_adjustment/save') ?>" method="post">

            <!-- Ubicación -->
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2 flex items-center gap-2">
                    <svg class="w-4 h-4 text-cyan-500" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('map-marker'); ?></svg>
                    Ubicación
                </label>
                <select id="locationSelect" name="ubicacion_origen"
                    class="w-full rounded-xl border-2 px-4 py-3 focus:outline-none transition-all duration-300 border-cyan-200 focus:border-cyan-500 focus:ring-2 focus:ring-cyan-200 bg-cyan-50 font-medium text-gray-700">
                    <option value="">Seleccione una ubicación</option>
                    <?php foreach($locations as $location): ?>
                        <option value="<?= $location->id ?>">
                            <?= $location->nombre_almacen." / ".$location->nombre; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Producto -->
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2 flex items-center gap-2">
                    <svg class="w-4 h-4 text-cyan-500" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('package'); ?></svg>
                    Producto
                </label>
                <select id="productSelect" name="producto"
                    class="w-full rounded-xl border-2 px-4 py-3 focus:outline-none transition-all duration-300 border-cyan-200 focus:border-cyan-500 focus:ring-2 focus:ring-cyan-200 bg-cyan-50 font-medium text-gray-700">
                    <option value="">Seleccione un producto</option>
                    <?php foreach($products as $product): ?>
                        <option value="<?= $product->id ?>">
                            <?= $product->nombre ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Cantidad Actual -->
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2 flex items-center gap-2">
                    <svg class="w-4 h-4 text-cyan-500" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('calculator'); ?></svg>
                    Cantidad Actual
                </label>
                <input 
                    type="number" 
                    class="w-full rounded-xl border-2 px-4 py-3 focus:outline-none transition-all duration-300 border-cyan-200 bg-cyan-50 text-gray-700 font-semibold cursor-not-allowed opacity-75" 
                    id="stockActual" 
                    readonly>
            </div>

            <!-- Cantidad Contada -->
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2 flex items-center gap-2">
                    <svg class="w-4 h-4 text-cyan-500" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('list-status'); ?></svg>
                    Cantidad Contada
                </label>
                <input 
                    type="number" 
                    class="w-full rounded-xl border-2 px-4 py-3 focus:outline-none transition-all duration-300 border-cyan-200 focus:border-cyan-500 focus:ring-2 focus:ring-cyan-200 bg-cyan-50 font-medium text-gray-700" 
                    id="stockContado"
                    placeholder="Ingrese la cantidad contada">
            </div>

            <!-- Diferencia -->
            <div class="md:col-span-2">
                <label class="block text-sm font-bold text-gray-700 mb-2 flex items-center gap-2">
                    <svg class="w-4 h-4 text-cyan-500" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('delta'); ?></svg>
                    Diferencia (Ajuste)
                </label>
                <div class="relative">
                    <input 
                        type="number" 
                        class="w-full rounded-xl border-2 px-4 py-3 focus:outline-none transition-all duration-300 border-cyan-200 bg-cyan-50 text-gray-700 font-bold text-lg cursor-not-allowed opacity-75" 
                        id="diferencia" 
                        name="cantidad"
                        readonly>
                    <div class="absolute right-4 top-1/2 -translate-y-1/2">
                        <svg class="w-5 h-5 text-cyan-500" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('information-outline'); ?></svg>
                    </div>
                </div>
                <p class="text-xs text-gray-500 mt-2">Se calcula automáticamente: Cantidad Contada - Cantidad Actual</p>
            </div>

        </form>
    </div>
</div>

<script>
document.getElementById('locationSelect').addEventListener('change', function() {
    const locationId = this.value;
    const productSelect = document.getElementById('productSelect');

    productSelect.innerHTML = `<option value="">Cargando...</option>`;

    fetch(`/inventory/products-by-location/${locationId}`)
        .then(response => response.json())
        .then(data => {
            let options = `<option value="">Seleccione un producto</option>`;

            data.forEach(producto => {
                options += `<option value="${producto.id}">${producto.nombre}</option>`;
            });

            productSelect.innerHTML = options;
        })
        .catch(error => {
            console.error(error);
            productSelect.innerHTML = `<option value="">Error al cargar</option>`;
        });
});

const locationSelect = document.getElementById('locationSelect');
const productSelect  = document.getElementById('productSelect');
const stockActual    = document.getElementById('stockActual');
const stockContado   = document.getElementById('stockContado');
const diferencia     = document.getElementById('diferencia');

// Cuando cambia el producto
productSelect.addEventListener('change', function () {

    const id_producto = this.value;
    const id_ubicacion = locationSelect.value;

    if (!id_producto || !id_ubicacion) {
        stockActual.value = '';
        return;
    }

    fetch(`/inventory/stock/${id_producto}/${id_ubicacion}`)
        .then(res => res.json())
        .then(data => {
            stockActual.value = data.cantidad;
            calcularDiferencia();
        });
});

// Cuando escribe cantidad contada
stockContado.addEventListener('input', calcularDiferencia);

function calcularDiferencia() {
    const actual = parseFloat(stockActual.value) || 0;
    const contado = parseFloat(stockContado.value) || 0;

    diferencia.value = contado - actual;
}
</script>

<?php echo $this->endSection(); ?>
