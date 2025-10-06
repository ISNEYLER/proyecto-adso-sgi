<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo($title); ?></title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-sm navbar-light bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">LOGO</a>
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link">Productos</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Operaciones</a>
                        <ul class="dropdown-menu">
                            <li><a href="#" class="dropdown-item">Transferencias</a></li>
                            <li><a href="#" class="dropdown-item">Ajuste de Inventario</a></li>
                            <li><a href="#" class="dropdown-item">Desecho</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Configuración</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link">PERFIL</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>


    <?php echo($this->renderSection("content")); ?>

</body>
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
<script src="../lib/bootstrap/js/bootstrap.min.js"></script>
<?php echo($this->renderSection("scripts")); ?>
</html>