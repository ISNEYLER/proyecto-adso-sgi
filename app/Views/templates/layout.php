<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo($title); ?></title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <nav class="grid grid-cols-[auto_auto_1fr_auto] gap-5 p-4 bg-pink-500">
        <div class="flex">
            <a href="#" class="text-lg font-bold">Inventario</a>
        </div>
        <div class="drop">
            <a href="#" class="text-sm">Dashboard</a>
        </div>
        <div class="flex">
            <div class="drop px-4">
                <a href="#" class="text-sm">Operaciones</a>
            </div>
            <div class="drop px-4">
                <a href="#" class="text-sm">Productos</a>
            </div>
            <div class="drop px-4">
                <a href="#" class="text-sm">Ajustes</a>
            </div>
        </div>
        <div class="flex">
            <a href="#" class="text-sm">Inventario</a>
        </div>
    </nav>

    <?php echo($this->renderSection("content")); ?>

    <?php echo($this->renderSection("scripts")); ?>
    
</body>
</html>