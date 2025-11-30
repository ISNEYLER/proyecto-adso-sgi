<?php echo $this->extend('templates/layout'); ?>

<?php echo $this->section('content'); ?>
<div class="w-full">

    <div class="max-w-5xl mx-auto"> <!-- Encabezado -->
    <div class="flex justify-between items-center p-4">
        <h4 class="text-xl font-semibold text-gray-800">Crear ajuste de Stock</h4>

        <div class="flex gap-2">
            <button type="submit" form="formCreateAdjust" class="px-4 py-2 bg-green-600 text-white text-sm rounded-lg hover:bg-green-700 transition">
                Guardar
            </button>

            <a href="<?= base_url('stocks/') ?>" class="px-4 py-2 bg-gray-500 text-white text-sm rounded-lg hover:bg-gray-600 transition">
                Descartar
            </a>
        </div>
    </div>

    <!-- Card / Formulario -->
    <div class="bg-white rounded-xl shadow p-6 max-w-4xl mx-auto">

        <form class="grid grid-cols-1 md:grid-cols-2 gap-4" id="formCreateAdjust" action="<?= base_url('inventory_adjustment/save') ?>" method="post">

            <!-- Ubicación -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Ubicación
                </label>
                <select id="locationSelect" name="ubicacion_origen"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">

                    <?php foreach($locations as $location): ?>
                        <option value="<?= $location->id ?>">
                            <?= $location->nombre ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Producto -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Producto
                </label>
                <select id="productSelect" name="producto"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">

                    <?php foreach($products as $product): ?>
                        <option value="<?= $product->id ?>">
                            <?= $product->nombre ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Cantidad a mano -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Cantidad actual
                </label>
                <input 
                    type="number" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" id="stockActual" readonly>
            </div>

            <!-- Cantidad contada -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Cantidad contada
                </label>
                <input type="number" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" id="stockContado">
            </div>

            <!-- Diferencia -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Diferencia
                </label>
                <input type="number" class="w-full border border-gray-300 rounded-lg px-3 py-2 bg-gray-50 text-gray-700" id="diferencia" name="cantidad">
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
