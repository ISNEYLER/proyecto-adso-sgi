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
            overflow-x: hidden;
            margin: 0;
            padding: 0;
        }
        
        /* Main container layout */
        #mainContainer {
            display: block;
            width: 100%;
            min-height: 100vh;
            padding-top: 4rem;
            position: relative;
        }
        
        /* Sidebar - Mobile First (fixed, hidden by default) */
        #sidebar {
            position: fixed;
            top: 4rem;
            left: 0;
            width: 16rem;
            height: calc(100vh - 4rem);
            background: white;
            z-index: 40;
            overflow-y: auto;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            border-right: 1px solid #E5E7EB;
            padding: 0;
            margin: 0;
            transition: transform 0.3s ease;
            transform: translateX(-100%);
        }
        
        #sidebar.show {
            transform: translateX(0) !important;
        }
        
        /* Main content - full width on mobile */
        main {
            width: 100%;
            min-height: calc(100vh - 4rem);
            overflow: auto;
            display: block;
        }
        
        /* Mobile overlay */
        #mobileMenuOverlay {
            position: fixed;
            top: 4rem;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 35;
            display: none;
        }
        
        #mobileMenuOverlay.show {
            display: block;
        }
        
        /* Desktop - Sidebar becomes part of layout */
        @media (min-width: 768px) {
            #mainContainer {
                display: flex;
                flex-direction: row;
            }
            
            #sidebar {
                position: static !important;
                top: auto;
                left: auto !important;
                width: 16rem;
                height: auto;
                background: white;
                z-index: auto;
                transition: none;
                box-shadow: none;
                border-right: 1px solid #E0E7FF;
                flex-shrink: 0;
                overflow-y: auto;
                transform: none !important;
            }
            
            main {
                flex: 1;
                min-width: 0;
                width: auto;
            }
            
            #mobileMenuOverlay {
                display: none !important;
            }
        }
    </style>
</head>

<body>
    <script>
        // Force reset sidebar on load - CRITICAL for mobile navigation
        function resetMenuState() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('mobileMenuOverlay');
            
            if (sidebar) {
                sidebar.classList.remove('show');
                sidebar.style.transform = 'translateX(-100%)';
            }
            if (overlay) {
                overlay.classList.remove('show');
                overlay.style.display = 'none';
            }
            console.log('Menu state reset on page load');
        }
        
        // Reset immediately on DOMContentLoaded
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', resetMenuState);
        } else {
            resetMenuState();
        }
        
        // Also reset on window load
        window.addEventListener('load', resetMenuState);
    </script>

    <!-- Navbar -->
    <nav class="fixed top-0 left-0 right-0 z-30 bg-white shadow-lg h-16 flex items-center border-b-4 border-[#3B82F6]">
        <div class="w-full flex justify-between items-center px-4 md:px-8">

            <!-- Brand -->
            <div class="flex items-center">
                <a href="/" class="flex items-center">
                    <img src="<?= base_url('img/logo.svg') ?>" alt="Logo" class="hidden md:block h-8 mt-1">
                    <span class="block md:hidden text-blue-600 font-bold text-lg">SGI</span>
                </a>
            </div>

            <!-- Burger -->
            <button id="mobileMenuBtn" class="md:hidden flex flex-col justify-center items-center w-10 h-10 hover:bg-blue-50 rounded-lg transition-colors">
                <span class="w-5 h-0.5 bg-blue-900 mb-1 transition-all"></span>
                <span class="w-5 h-0.5 bg-blue-900 mb-1 transition-all"></span>
                <span class="w-5 h-0.5 bg-blue-900 transition-all"></span>
            </button>

            <!-- Menu -->
            <div class="hidden md:flex items-center space-x-2">
                <div class="relative group">
                    <button class="flex items-center justify-center w-10 h-10 rounded-full bg-[#3B82F6] font-bold text-sm uppercase text-white hover:bg-[#2563EB] shadow-md hover:shadow-lg transition-all">
                        <?= $user ? substr($user->username ?? $user->email, 0, 1) : '?' ?>
                    </button>
                    
                    <!-- Dropdown Menu -->
                    <div class="absolute right-0 top-full mt-2 w-56 bg-white rounded-xl shadow-xl border border-blue-100 hidden group-hover:block group-hover:z-50 transition-all">
                        <div class="p-4 border-b border-blue-100 bg-gradient-to-r from-blue-50 to-cyan-50">
                            <p class="font-semibold text-gray-800 truncate"><?= esc($user->username ?? 'Usuario') ?></p>
                            <p class="text-xs text-gray-500 truncate"><?= esc($user->email) ?></p>
                        </div>
                        <div class="p-2">
                            <a href="<?= url_to('logout') ?>" class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:bg-red-50 hover:text-red-600 rounded-lg transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('logout-variant'); ?></svg>
                                <span class="font-medium">Cerrar sesión</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </nav>

    <!-- Mobile Menu Overlay -->
    <div id="mobileMenuOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 top-16"></div>

    <!-- main -->
    <div id="mainContainer" class="w-full min-h-screen pt-16">
        <!-- Sidebar -->
        <aside id="sidebar">
            <nav class="p-4 md:p-6">
                <ul class="space-y-2 text-sm">

                    <!-- Dashboard -->
                    <li>
                        <a href="<?= base_url('/') ?>"
                            class="flex items-center gap-3 px-4 py-3 text-gray-700 hover:text-[#2563EB] hover:bg-blue-50 border-l-4 border-[#3B82F6] rounded-r-lg bg-blue-50 font-semibold transition-colors">
                            <svg class="w-5 h-5 text-[#3B82F6] flex-shrink-0" fill="currentColor" viewBox="0 0 24 24"><?php echo Mdi::mdi('view-dashboard'); ?></svg>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <!-- Productos -->
                    <li>
                        <a href="<?= base_url('products') ?>"
                            class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:text-[#0EA5E9] hover:bg-cyan-50 rounded-lg transition-colors">
                            <svg class="w-5 h-5 text-[#0EA5E9] flex-shrink-0" fill="currentColor" viewBox="0 0 24 24"><?php echo Mdi::mdi('package'); ?></svg>
                            <span>Productos</span>
                        </a>
                        <ul class="ml-4 mt-1 space-y-1">
                            <li>
                                <a href="<?= base_url(relativePath: 'categories') ?>" class="flex items-center gap-3 px-4 py-2 text-gray-500 hover:text-[#6366F1] hover:bg-indigo-50 rounded-lg text-xs transition-colors">
                                    <svg class="w-4 h-4 text-[#6366F1] flex-shrink-0" fill="currentColor" viewBox="0 0 24 24"><?php echo Mdi::mdi('shape-outline'); ?></svg>
                                    <span>Categorías</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Almacenes -->
                    <li>
                        <a href="<?= base_url('warehouses') ?>"
                            class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:text-[#0EA5E9] hover:bg-cyan-50 rounded-lg transition-colors">
                            <svg class="w-5 h-5 text-[#0EA5E9] flex-shrink-0" fill="currentColor" viewBox="0 0 24 24"><?php echo Mdi::mdi('warehouse'); ?></svg>
                            <span>Almacenes</span>
                        </a>
                        <ul class="ml-4 mt-1 space-y-1">
                            <li>
                                <a href="<?= base_url(relativePath: 'locations') ?>" class="flex items-center gap-3 px-4 py-2 text-gray-500 hover:text-[#6366F1] hover:bg-indigo-50 rounded-lg text-xs transition-colors">
                                    <svg class="w-4 h-4 text-[#6366F1] flex-shrink-0" fill="currentColor" viewBox="0 0 24 24"><?php echo Mdi::mdi('map-marker-multiple'); ?></svg>
                                    <span>Ubicaciones</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Movimientos -->
                    <li>
                        <a href="<?= base_url('movements') ?>"
                            class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:text-[#2563EB] hover:bg-blue-50 rounded-lg transition-colors">
                            <svg class="w-5 h-5 text-[#2563EB] flex-shrink-0" fill="currentColor" viewBox="0 0 24 24"><?php echo Mdi::mdi('swap-horizontal'); ?></svg>
                            <span>Movimientos</span>
                        </a>
                    </li>

                    <!-- Existencias -->
                    <li>
                        <a href="<?= base_url('stocks') ?>"
                            class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:text-[#059669] hover:bg-emerald-50 rounded-lg transition-colors">
                            <svg class="w-5 h-5 text-[#059669] flex-shrink-0" fill="currentColor" viewBox="0 0 24 24"><?php echo Mdi::mdi('counter'); ?></svg>
                            <span>Existencias</span>
                        </a>
                    </li>

                    <!-- User Menu Mobile -->
                    <li class="md:hidden border-t border-gray-200 pt-4 mt-4">
                        <button id="mobileUserBtn" class="w-full flex items-center justify-between px-4 py-3 text-gray-700 hover:bg-blue-50 rounded-lg transition-colors">
                            <span class="flex items-center gap-3">
                                <span class="flex items-center justify-center w-8 h-8 rounded-full bg-[#3B82F6] font-bold text-xs text-white flex-shrink-0">
                                    <?= $user ? substr($user->username ?? $user->email, 0, 1) : '?' ?>
                                </span>
                                <span class="text-sm font-medium"><?= esc($user->username ?? 'Usuario') ?></span>
                            </span>
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('chevron-down'); ?></svg>
                        </button>
                        <div id="mobileUserMenu" class="hidden mt-1 bg-white rounded-lg border border-blue-100">
                            <a href="<?= url_to('logout') ?>" class="flex items-center gap-2 px-4 py-3 text-gray-700 hover:bg-red-50 hover:text-red-600 rounded-lg transition-colors text-sm w-full">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><?= Mdi::mdi('logout-variant'); ?></svg>
                                <span>Cerrar sesión</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main>
            <div class="p-4 md:p-8">
                <div class="bg-white rounded-2xl shadow-md p-4 md:p-8">
                    <?php echo ($this->renderSection("content")); ?>
                </div>
            </div>
        </main>
    </div>

</body>
<script src="<?php echo base_url('lib/jquery/jquery-3.7.1.min.js'); ?>"></script>
<script src="<?php echo base_url('scripts.js'); ?>"></script>
<script>
    // Wait for jQuery and DOM
    function initMobileMenu() {
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const sidebar = document.getElementById('sidebar');
        const mobileMenuOverlay = document.getElementById('mobileMenuOverlay');
        
        if (!mobileMenuBtn || !sidebar || !mobileMenuOverlay) {
            console.warn('Menu elements not found');
            return;
        }
        
        // Toggle menu on button click
        mobileMenuBtn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const isOpen = sidebar.classList.contains('show');
            if (!isOpen) {
                sidebar.classList.add('show');
                sidebar.style.transform = 'translateX(0)';
                mobileMenuOverlay.classList.add('show');
                mobileMenuOverlay.style.display = 'block';
            } else {
                sidebar.classList.remove('show');
                sidebar.style.transform = 'translateX(-100%)';
                mobileMenuOverlay.classList.remove('show');
                mobileMenuOverlay.style.display = 'none';
            }
        });
        
        // Close menu when clicking overlay
        mobileMenuOverlay.addEventListener('click', function() {
            sidebar.classList.remove('show');
            sidebar.style.transform = 'translateX(-100%)';
            mobileMenuOverlay.classList.remove('show');
            mobileMenuOverlay.style.display = 'none';
        });
        
        // Close menu when clicking links
        const sidebarLinks = sidebar.querySelectorAll('a');
        sidebarLinks.forEach(link => {
            link.addEventListener('click', function() {
                sidebar.classList.remove('show');
                sidebar.style.transform = 'translateX(-100%)';
                mobileMenuOverlay.classList.remove('show');
                mobileMenuOverlay.style.display = 'none';
            });
        });
        
        // Mobile User Menu
        const mobileUserBtn = document.getElementById('mobileUserBtn');
        const mobileUserMenu = document.getElementById('mobileUserMenu');
        
        if (mobileUserBtn && mobileUserMenu) {
            mobileUserBtn.addEventListener('click', function(e) {
                e.preventDefault();
                mobileUserMenu.classList.toggle('hidden');
            });
            
            // Close user menu when clicking outside
            document.addEventListener('click', function(event) {
                if (!mobileUserBtn.contains(event.target) && !mobileUserMenu.contains(event.target)) {
                    mobileUserMenu.classList.add('hidden');
                }
            });
        }
        
        console.log('Mobile menu initialized');
    }
    
    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initMobileMenu);
    } else {
        initMobileMenu();
    }
</script>
<?php echo ($this->renderSection("scripts")); ?>

</html>