<?php
    use \Mdi\Mdi;
    Mdi::withIconsPath(__DIR__.'/../../../node_modules/@mdi/svg/svg/');
    $user = auth()->user();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ($title); ?></title>
    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">
    <style>
        * {
            transition: all 0.3s ease;
        }
        body {
            background: linear-gradient(135deg, #ABC8F5 0%, #D6E9FF 100%);
            min-height: 100vh;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="fixed top-0 left-0 right-0 z-30 bg-white shadow-lg h-16 flex items-center border-b-4 border-[#3B82F6]">
        <div class="w-full flex justify-between items-center px-8">

            <!-- Brand -->
            <div class="flex items-center">
                <a href="/" class="flex items-center">
                    <img src="<?= base_url('img/logo.svg') ?>" alt="Logo" class="hidden md:block h-8 mt-1">
                    <img src="" alt="Logo Mobile" class="block md:hidden h-8 mt-1">
                </a>
            </div>

            <!-- Burger -->
            <button class="md:hidden flex flex-col justify-center items-center w-10 h-10 hover:bg-blue-50 rounded-lg">
                <span class="w-5 h-0.5 bg-blue-900 mb-1"></span>
                <span class="w-5 h-0.5 bg-blue-900 mb-1"></span>
                <span class="w-5 h-0.5 bg-blue-900"></span>
            </button>

            <!-- Menu -->
            <div class="hidden md:flex items-center space-x-2">
                <button class="flex items-center justify-center w-10 h-10 rounded-full bg-[#3B82F6] font-bold text-sm uppercase text-white hover:bg-[#2563EB] shadow-md">
                    <?= $user ? substr($user->username ?? $user->email, 0, 1) : '?' ?>
                </button>
            </div>

        </div>
    </nav>

    <!-- main -->
    <div class="flex wrapper min-h-screen pt-16">
        <section class="hidden md:block">
            <aside
                class="w-64 bg-white shadow-lg border-r border-blue-100 sticky top-16 h-full overflow-y-auto">

                <nav class="p-6">
                    <ul class="space-y-2 text-sm">

                        <!-- Dashboard -->
                        <li>
                            <a href="<?= base_url('/') ?>"
                                class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:text-[#2563EB] hover:bg-blue-50 border-l-4 border-[#3B82F6] rounded-r-lg bg-blue-50 font-semibold">
                                <svg class="w-5 h-5 text-[#3B82F6]" fill="currentColor" viewBox="0 0 24 24"><?php echo Mdi::mdi('view-dashboard'); ?></svg>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <!-- Productos -->
                        <li>
                            <a href="<?= base_url('products') ?>"
                                class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:text-[#0EA5E9] hover:bg-cyan-50 rounded-lg">
                                <svg class="w-5 h-5 text-[#0EA5E9]" fill="currentColor" viewBox="0 0 24 24"><?php echo Mdi::mdi('package'); ?></svg>
                                <span>Productos</span>
                            </a>
                            <ul class="ml-4 mt-1 space-y-1">
                                <li>
                                    <a href="<?= base_url(relativePath: 'categories') ?>" class="flex items-center gap-3 px-4 py-2 text-gray-500 hover:text-[#6366F1] hover:bg-indigo-50 rounded-lg text-xs">
                                        <svg class="w-4 h-4 text-[#6366F1]" fill="currentColor" viewBox="0 0 24 24"><?php echo Mdi::mdi('shape-outline'); ?></svg>
                                        <span>Categorías</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Almacenes -->
                        <li>
                            <a href="<?= base_url('warehouses') ?>"
                                class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:text-[#0EA5E9] hover:bg-cyan-50 rounded-lg">
                                <svg class="w-5 h-5 text-[#0EA5E9]" fill="currentColor" viewBox="0 0 24 24"><?php echo Mdi::mdi('warehouse'); ?></svg>
                                <span>Almacenes</span>
                            </a>
                            <ul class="ml-4 mt-1 space-y-1">
                                <li>
                                    <a href="<?= base_url(relativePath: 'locations') ?>" class="flex items-center gap-3 px-4 py-2 text-gray-500 hover:text-[#6366F1] hover:bg-indigo-50 rounded-lg text-xs">
                                        <svg class="w-4 h-4 text-[#6366F1]" fill="currentColor" viewBox="0 0 24 24"><?php echo Mdi::mdi('map-marker-multiple'); ?></svg>
                                        <span>Ubicaciones</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Movimientos -->
                        <li>
                            <a href="<?= base_url('movements') ?>"
                                class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:text-[#2563EB] hover:bg-blue-50 rounded-lg">
                                <svg class="w-5 h-5 text-[#2563EB]" fill="currentColor" viewBox="0 0 24 24"><?php echo Mdi::mdi('swap-horizontal'); ?></svg>
                                <span>Movimientos</span>
                            </a>
                        </li>

                        <!-- Existencias -->
                        <li>
                            <a href="<?= base_url('stocks') ?>"
                                class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:text-[#059669] hover:bg-emerald-50 rounded-lg">
                                <svg class="w-5 h-5 text-[#059669]" fill="currentColor" viewBox="0 0 24 24"><?php echo Mdi::mdi('counter'); ?></svg>
                                <span>Existencias</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </aside>
        </section>
        <main class="bg-transparent flex-1 p-8">
            <div class="bg-white rounded-2xl shadow-md p-8">
                <?php echo ($this->renderSection("content")); ?>
            </div>
        </main>
    </div>

</body>
<script src="<?php echo base_url('lib/jquery/jquery-3.7.1.min.js'); ?>"></script>
<script src="<?php echo base_url('scripts.js'); ?>"></script>
<?php echo ($this->renderSection("scripts")); ?>

</html>