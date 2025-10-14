<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo($title); ?></title>
    <link rel="stylesheet" href="<?= base_url('lib/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">
</head>
<body class="bg-light">
    <header>
        <!-- Sidebar -->
        <nav class="sidebar collapse d-lg-block sidebar bg-white" id="navbarToggler">
            <div class="position-sticky">
                <div class="list-group list-group-flush mx-3 mt-4">
                    <a class="list-group-item list-group-item-action py-2 ripple" href="<?= base_url('/')?>">Dashboard</a>
                    <a class="list-group-item list-group-item-action py-2 ripple" href="<?= base_url('products')?>">🎯 Productos</a>
                    <a class="list-group-item list-group-item-action py-2 ripple" href="<?= base_url('movements')?>">🔄 Movimientos</a>
                    <a class="list-group-item list-group-item-action py-2 ripple" href="<?= base_url('stock')?>">📊 Existencias</a>
                    <a class="list-group-item list-group-item-action py-2 ripple" href="<?= base_url('inventory_adjustment')?>">📦 Ajuste de Inventario</a>
                    <a class="list-group-item list-group-item-action py-2 ripple" href="<?= base_url('disposal')?>">🗑️ Desecho</a>
                    <a class="list-group-item list-group-item-action py-2 ripple" href="#">⚙️ Ajustes</a>
                </div>
            </div>
        </nav>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="<?= base_url('/')?>">LOGO</a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link">PERFIL</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- main -->
    <main style="margin-top: 58px">
        <div class="container pt-4">
            <?php echo($this->renderSection("content")); ?>
        </div>
    </main>
</body>
<script src="<?php echo base_url('lib/popper/popper.min.js'); ?>"></script>
<script src="<?php echo base_url('lib/bootstrap/js/bootstrap.min.js'); ?>"></script>
<?php echo($this->renderSection("scripts")); ?>
</html>