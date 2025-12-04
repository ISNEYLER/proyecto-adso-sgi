<?php echo $this->extend('templates/layout'); ?>

<?php echo $this->section('content'); ?>

<?= $this->extend('templates/layout'); ?>

<?= $this->section('content'); ?>

<div class="space-y-8">

    <!-- Título -->
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
        <p class="text-gray-500">Resumen general del inventario</p>
    </div>

    <!-- CARDS -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- Total productos -->
        <div class="bg-white rounded-xl shadow p-6 border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Total productos</p>
                    <h2 class="text-3xl font-bold"><a href="<?= base_url(relativePath: 'products') ?>"><?= $totalProductos ?? 0 ?></a></h2>

                </div>
                <div class="bg-blue-100 text-blue-600 p-3 rounded-full">
                    <?= \Mdi\Mdi::mdi('package-variant-closed'); ?>
                </div>
            </div>
        </div>

        <!-- Total movimientos -->
        <div class="bg-white rounded-xl shadow p-6 border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Movimientos</p>
                    <h2 class="text-3xl font-bold"><a href="<?= base_url(relativePath: 'movements') ?>"><?= $totalMovimientos ?? 0 ?></a></h2>
                </div>
                <div class="bg-green-100 text-green-600 p-3 rounded-full">
                    <?= \Mdi\Mdi::mdi('swap-horizontal'); ?>
                </div>
            </div>
        </div>

        <!-- Existencias bajas -->
        <div class="bg-white rounded-xl shadow p-6 border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Sin stock</p>
                    <h2 class="text-3xl font-bold text-red-500"><?= $totalSinStock ?></h2>
                </div>
                <div class="bg-red-100 text-red-600 p-3 rounded-full">
                    <?= \Mdi\Mdi::mdi('alert-circle-outline'); ?>
                </div>
            </div>
        </div>

    </div>

    <!-- TABLAS -->
    <div class="grid grid-cols-1 xl:grid-cols-2 gap-8">

        <!-- Últimos movimientos -->
        <div class="bg-white rounded-xl shadow p-6 border border-gray-100">
            <h2 class="text-lg font-semibold mb-4 flex items-center gap-2">
                <?= \Mdi\Mdi::mdi('clock-outline'); ?>
                Últimos movimientos
            </h2>

            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead>
                        <tr class="text-left border-b">
                            <th class="py-2">Producto</th>
                            <th class="py-2">Tipo</th>
                            <th class="py-2">Cantidad</th>
                            <th class="py-2">Fecha</th>
                        </tr>
                    </thead>
                    <tbody class="space-y-2">

<?php if (!empty($ultimosMovimientos)) : ?>
    
    <?php foreach ($ultimosMovimientos as $movimiento) : ?>
        <tr class="border-b hover:bg-gray-50">
            <td class="py-2">
                <?= esc($movimiento->producto) ?>
            </td>

            <td class="py-2">
                <?php
                    $color = match ($movimiento->tipo) {
                        'Entrada' => 'bg-green-100 text-green-700',
                        'Traslado' => 'bg-blue-100 text-blue-700',
                        'Desecho' => 'bg-red-100 text-red-700',
                        default => 'bg-gray-100 text-gray-700',
                    };
                ?>
                <span class="<?= $color ?> px-2 py-1 rounded text-xs">
                    <?= esc($movimiento->tipo) ?>
                </span>
            </td>

            <td class="py-2 font-semibold">
                <?= $movimiento->tipo === 'Entrada' ? '+' : '' ?>
                <?= esc($movimiento->cantidad) ?>
            </td>

            <td class="py-2 text-gray-600">
                <?= date('Y-m-d', strtotime($movimiento->fecha)) ?>
            </td>
        </tr>
    <?php endforeach; ?>

<?php else : ?>
    <tr>
        <td colspan="4" class="text-center text-gray-500 py-4">
            No hay movimientos registrados
        </td>
    </tr>
<?php endif; ?>

</tbody>

                </table>
            </div>

        </div>

        <!-- Productos con poco stock -->
        <div class="bg-white rounded-xl shadow p-6 border border-gray-100">
            <h2 class="text-lg font-semibold mb-4 flex items-center gap-2">
                <?= \Mdi\Mdi::mdi('warehouse'); ?>
                Productos sin stock
            </h2>

            <div class="space-y-4">
            <?php foreach($productosSinStock as $producto): ?>
                <div class="flex items-center justify-between p-3 border rounded-lg">
                    <div>
                        <p class="font-medium"><?= $producto->nombre; ?></p>
                    </div>
                </div>
            <?php endforeach ?>
            </div>
        </div>

    </div>

    <!-- Accesos rápidos -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <a href="<?= base_url('products') ?>" class="p-6 bg-blue-600 text-white rounded-xl shadow hover:bg-blue-700 transition">
            <h3 class="text-lg font-semibold mb-2">Ver productos</h3>
            <p class="text-sm opacity-80">Administra tu catálogo completo</p>
        </a>

        <a href="<?= base_url('movements') ?>" class="p-6 bg-green-600 text-white rounded-xl shadow hover:bg-green-700 transition">
            <h3 class="text-lg font-semibold mb-2">Movimientos</h3>
            <p class="text-sm opacity-80">Entradas y salidas de inventario</p>
        </a>

        <a href="<?= base_url('stocks') ?>" class="p-6 bg-purple-600 text-white rounded-xl shadow hover:bg-purple-700 transition">
            <h3 class="text-lg font-semibold mb-2">Existencias</h3>
            <p class="text-sm opacity-80">Consulta el stock disponible</p>
        </a>

    </div>

</div>

<?= $this->endSection(); ?>


<?php echo $this->endSection(); ?>