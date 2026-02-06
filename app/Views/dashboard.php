<?php echo $this->extend('templates/layout'); ?>

<?php echo $this->section('content'); ?>

<?= $this->extend('templates/layout'); ?>

<?= $this->section('content'); ?>

<div class="space-y-8">

    <!-- Título -->
    <div class="bg-gradient-to-r from-blue-50 to-cyan-50 rounded-2xl p-8 border-l-4 border-[#3B82F6] shadow-md">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-4xl font-bold bg-gradient-to-r from-[#3B82F6] to-[#0EA5E9] bg-clip-text text-transparent">Dashboard</h1>
                <p class="text-gray-600 mt-2 flex items-center gap-2">
                    <svg class="w-5 h-5 text-cyan-500" fill="currentColor" viewBox="0 0 24 24"><?= \Mdi\Mdi::mdi('chart-box'); ?></svg>
                    Resumen general del inventario
                </p>
            </div>
            <div class="hidden md:block">
                <svg class="w-16 h-16 text-blue-200 opacity-50" fill="currentColor" viewBox="0 0 24 24"><?= \Mdi\Mdi::mdi('view-dashboard'); ?></svg>
            </div>
        </div>
    </div>

    <!-- CARDS -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- Total productos -->
        <div class="group relative bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 border-t-4 border-[#3B82F6] shadow-lg hover:shadow-2xl hover:scale-105 transition-all duration-300 overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-blue-400/10 to-cyan-400/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
            <div class="relative flex items-center justify-between">
                <div>
                    <p class="text-sm text-blue-600 font-semibold uppercase tracking-wide">Total productos</p>
                    <h2 class="text-4xl font-bold text-blue-900 mt-2"><a href="<?= base_url(relativePath: 'products') ?>" class="hover:text-[#2563EB] transition-colors"><?= $totalProductos ?? 0 ?></a></h2>
                </div>
                <div class="bg-gradient-to-br from-blue-400 to-blue-600 text-white p-4 rounded-2xl shadow-lg group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24"><?= \Mdi\Mdi::mdi('package-variant-closed'); ?></svg>
                </div>
            </div>
        </div>

        <!-- Total movimientos -->
        <div class="group relative bg-gradient-to-br from-cyan-50 to-teal-100 rounded-2xl p-6 border-t-4 border-[#0EA5E9] shadow-lg hover:shadow-2xl hover:scale-105 transition-all duration-300 overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-cyan-400/10 to-teal-400/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
            <div class="relative flex items-center justify-between">
                <div>
                    <p class="text-sm text-cyan-600 font-semibold uppercase tracking-wide">Movimientos</p>
                    <h2 class="text-4xl font-bold text-cyan-900 mt-2"><a href="<?= base_url(relativePath: 'movements') ?>" class="hover:text-[#0EA5E9] transition-colors"><?= $totalMovimientos ?? 0 ?></a></h2>
                </div>
                <div class="bg-gradient-to-br from-cyan-400 to-teal-600 text-white p-4 rounded-2xl shadow-lg group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24"><?= \Mdi\Mdi::mdi('swap-horizontal'); ?></svg>
                </div>
            </div>
        </div>

        <!-- Existencias bajas -->
        <div class="group relative bg-gradient-to-br from-red-50 to-orange-100 rounded-2xl p-6 border-t-4 border-[#EF4444] shadow-lg hover:shadow-2xl hover:scale-105 transition-all duration-300 overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-red-400/10 to-orange-400/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
            <div class="relative flex items-center justify-between">
                <div>
                    <p class="text-sm text-red-600 font-semibold uppercase tracking-wide">Sin stock</p>
                    <h2 class="text-4xl font-bold text-red-900 mt-2"><?= $totalSinStock ?></h2>
                </div>
                <div class="bg-gradient-to-br from-red-400 to-orange-600 text-white p-4 rounded-2xl shadow-lg group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24"><?= \Mdi\Mdi::mdi('alert-circle-outline'); ?></svg>
                </div>
            </div>
        </div>

    </div>

    <!-- TABLAS -->
    <div class="grid grid-cols-1 xl:grid-cols-2 gap-8">

        <!-- Últimos movimientos -->
        <div class="bg-white rounded-2xl shadow-lg p-6 border-t-4 border-blue-400 hover:shadow-xl transition-shadow">
            <h2 class="text-lg font-semibold mb-4 flex items-center gap-2 text-gray-800">
                <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 24 24"><?= \Mdi\Mdi::mdi('clock-outline'); ?></svg>
                Últimos movimientos
            </h2>

            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead>
                        <tr class="text-left border-b-2 border-blue-200 bg-blue-50">
                            <th class="py-3 px-2 text-blue-900 font-semibold">Producto</th>
                            <th class="py-3 px-2 text-blue-900 font-semibold">Tipo</th>
                            <th class="py-3 px-2 text-blue-900 font-semibold">Cantidad</th>
                            <th class="py-3 px-2 text-blue-900 font-semibold">Fecha</th>
                        </tr>
                    </thead>
                    <tbody class="space-y-2">

<?php if (!empty($ultimosMovimientos)) : ?>
    
    <?php foreach ($ultimosMovimientos as $movimiento) : ?>
        <tr class="border-b hover:bg-blue-50 transition-colors">
            <td class="py-3 px-2">
                <?= esc($movimiento->producto) ?>
            </td>

            <td class="py-3 px-2">
                <?php
                    $color = match ($movimiento->tipo) {
                        'Entrada' => 'bg-emerald-100 text-emerald-700',
                        'Traslado' => 'bg-cyan-100 text-cyan-700',
                        'Desecho' => 'bg-red-100 text-red-700',
                        default => 'bg-gray-100 text-gray-700',
                    };
                ?>
                <span class="<?= $color ?> px-3 py-1 rounded-full text-xs font-semibold">
                    <?= esc($movimiento->tipo) ?>
                </span>
            </td>

            <td class="py-3 px-2 font-semibold text-gray-800">
                <?= $movimiento->tipo === 'Entrada' ? '+' : '' ?>
                <?= esc($movimiento->cantidad) ?>
            </td>

            <td class="py-3 px-2 text-gray-600">
                <?= date('Y-m-d', strtotime($movimiento->fecha)) ?>
            </td>
        </tr>
    <?php endforeach; ?>

<?php else : ?>
    <tr>
        <td colspan="4" class="text-center text-gray-500 py-6">
            No hay movimientos registrados
        </td>
    </tr>
<?php endif; ?>

</tbody>

                </table>
            </div>

        </div>

        <!-- Productos con poco stock -->
        <div class="bg-white rounded-2xl shadow-lg p-6 border-t-4 border-orange-400 hover:shadow-xl transition-shadow">
            <h2 class="text-lg font-semibold mb-4 flex items-center gap-2 text-gray-800">
                <svg class="w-5 h-5 text-orange-500" fill="currentColor" viewBox="0 0 24 24"><?= \Mdi\Mdi::mdi('warehouse'); ?></svg>
                Productos sin stock
            </h2>

            <div class="space-y-3">
            <?php foreach($productosSinStock as $producto): ?>
                <div class="flex items-center justify-between p-4 bg-gradient-to-r from-orange-50 to-red-50 border-l-4 border-orange-400 rounded-lg hover:shadow-md transition-all">
                    <div>
                        <p class="font-medium text-gray-800"><?= $producto->nombre; ?></p>
                        <p class="text-xs text-gray-500 mt-1">Stock agotado</p>
                    </div>
                    <span class="bg-red-200 text-red-700 px-3 py-1 rounded-full text-sm font-semibold">Crítico</span>
                </div>
            <?php endforeach ?>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection(); ?>
<?php echo $this->endSection(); ?>