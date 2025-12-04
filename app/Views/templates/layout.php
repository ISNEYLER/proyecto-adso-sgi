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
</head>

<body>
    <!-- Navbar -->
    <nav class="fixed top-0 left-0 right-0 z-30 bg-white shadow-sm h-14 flex items-center">
        <div class="w-full flex justify-between items-center px-6">

            <!-- Brand -->
            <div class="flex items-center">
                <a href="/" class="flex items-center">
                    <img src="" alt="" class="hidden md:block h-4 mt-1">
                    <img src="" alt="" class="block md:hidden h-6 mt-1">
                    LOGO
                </a>
            </div>

            <!-- Burger -->
            <button class="md:hidden flex flex-col justify-center items-center w-10 h-10 hover:bg-gray-100 rounded">
                <span class="w-5 h-0.5 bg-gray-600 mb-1"></span>
                <span class="w-5 h-0.5 bg-gray-600 mb-1"></span>
                <span class="w-5 h-0.5 bg-gray-600"></span>
            </button>

            <!-- Menu -->
            <div class="hidden md:flex items-center space-x-4">
    <div class="relative group">
        <!-- Avatar -->
        <button class="flex items-center justify-center w-8 h-8 rounded-full bg-gray-300 font-bold text-sm uppercase">
            <?= $user ? substr($user->username ?? $user->email, 0, 1) : '?' ?>
        </button>

        <!-- Dropdown -->
        <div class="absolute right-0 top-full pt-2 w-48 bg-white rounded-lg shadow-lg hidden group-hover:block">
            <a href="/admin/user/profile" class="block px-4 py-3 hover:bg-gray-100">
                <strong><?= esc($user->username ?? 'Usuario') ?></strong>
                <div class="text-xs text-gray-500"><?= esc($user->email) ?></div>
            </a>
            <a href="<?= url_to('logout') ?>" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100">
                <?= Mdi::mdi('logout-variant'); ?> Cerrar sesión
            </a>
        </div>
    </div>
</div>

        </div>
    </nav>

    <!-- main -->
    <div class="flex wrapper min-h-screen pt-14">
        <section class="hidden md:block">
            <aside
                class="w-60 bg-white shadow-sm border-r border-gray-200 sticky top-14 h-full overflow-y-auto">

                <nav class="p-4">
                    <ul class="space-y-3 text-sm">

                        <!-- Dashboard -->
                        <li>
                            <a href="<?= base_url('/') ?>"
                                class="flex items-center gap-2 px-4 py-2 text-gray-700 hover:bg-gray-100 hover:text-blue-600 border-r-4 border-blue-600 bg-gray-50 font-semibold">
                                <i class="mdi mdi-view-dashboard-variant-outline"></i>
                                <?php echo Mdi::mdi('view-dashboard'); ?>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <!-- Productos -->
                        <li>
                            <a href="<?= base_url('products') ?>"
                                class="flex items-center gap-2 px-4 py-2 text-gray-700 hover:bg-gray-100">
                                <?php echo Mdi::mdi('package'); ?>
                                <span>Productos</span>
                            </a>
                            <ul class="ml-4 border-l border-gray-200 mt-2 space-y-1">
                                <li>
                                    <a href="<?= base_url(relativePath: 'categories') ?>" class="flex items-center gap-2 px-4 py-1 text-gray-700 hover:bg-gray-100">
                                        <?php echo Mdi::mdi('mdi-shape-outline'); ?>
                                        <span>Categorias</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Movimientos -->
                        <li>
                            <a href="<?= base_url('movements') ?>"
                                class="flex items-center gap-2 px-4 py-2 text-gray-700 hover:bg-gray-100">
                                <?php echo Mdi::mdi('swap-horizontal'); ?>
                                <span>Movimientos</span>
                            </a>
                            <ul class="ml-4 border-l border-gray-200 mt-2 space-y-1">
                                <li>
                                    <a href="<?= base_url(relativePath: 'locations') ?>" class="flex items-center gap-2 px-4 py-1 text-gray-700 hover:bg-gray-100">
                                        <?php echo Mdi::mdi('mdi-store'); ?>
                                        <span>Ubicaciones</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Existencias -->
                        <li>
                            <a href="<?= base_url('stocks') ?>"
                                class="flex items-center gap-2 px-4 py-2 text-gray-700 hover:bg-gray-100">
                                <i class="mdi mdi-account-multiple"></i>
                                <?php echo Mdi::mdi('warehouse'); ?>
                                <span>Existencias</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </aside>
        </section>
        <main class="bg-white flex-1 p-[30px]">
            <div>
                <?php echo ($this->renderSection("content")); ?>
            </div>
        </main>
    </div>

</body>
<script src="<?php echo base_url('lib/jquery/jquery-3.7.1.min.js'); ?>"></script>
<script src="<?php echo base_url('scripts.js'); ?>"></script>
<?php echo ($this->renderSection("scripts")); ?>

</html>