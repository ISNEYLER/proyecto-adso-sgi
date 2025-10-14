START TRANSACTION;

CREATE TABLE IF NOT EXISTS `ubicaciones` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `id_almacen` INT NOT NULL,
    `nombre` VARCHAR(20) NOT NULL,
    `codigo` VARCHAR(10) UNIQUE,
    `creado_el` DATETIME NOT NULL,
    `modificado_el` DATETIME NOT NULL,
    CONSTRAINT `pk_ubicaciones_id` PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `categorias` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(30) NOT NULL,
    `creado_el` DATETIME NOT NULL,
    `modificado_el` DATETIME NOT NULL,
    CONSTRAINT `pk_categorias_id` PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `productos` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(30) NOT NULL,
    `descripcion` TEXT,
    `valor` FLOAT,
    `costo` FLOAT,
    `sku` VARCHAR(30) UNIQUE,
    `codigo_barras` VARCHAR(40) UNIQUE,
    `id_categoria` INT,
    `creado_el` DATETIME NOT NULL,
    `modificado_el` DATETIME NOT NULL,
    CONSTRAINT `pk_productos_id` PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `almacenes` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(20) NOT NULL,
    `direccion` VARCHAR(30),
    `codigo` VARCHAR(10) UNIQUE,
    `creado_el` DATETIME NOT NULL,
    `modificado_el` DATETIME NOT NULL,
    CONSTRAINT `pk_almacenes_id` PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `movimientos` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `id_producto` INT NOT NULL,
    `id_ubicacion_origen` INT NOT NULL,
    `id_ubicacion_destino` INT NOT NULL,
    `cantidad` FLOAT NOT NULL,
    `id_tipo_movimiento` INT NOT NULL,
    `fecha` DATETIME NOT NULL,
    `creado_el` DATETIME NOT NULL,
    `modificado_el` DATETIME NOT NULL,
    CONSTRAINT `pk_movimientos_id` PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `usuarios` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `nombres` VARCHAR(30) NOT NULL,
    `apellidos` VARCHAR(30),
    `correo` VARCHAR(30) NOT NULL,
    `contraseña` VARCHAR(255) NOT NULL,
    CONSTRAINT `pk_usuarios_id` PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `existencias` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `id_producto` INT NOT NULL,
    `id_ubicacion` INT NOT NULL,
    `cantidad` FLOAT NOT NULL,
    `creado_el` DATETIME NOT NULL,
    `modificado_el` DATETIME NOT NULL,
    CONSTRAINT `pk_existencias_id` PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `tipos_movimientos` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(255) NOT NULL,
    `creado_el` DATETIME NOT NULL,
    `modificado_el` DATETIME NOT NULL,
    CONSTRAINT `pk_tipos_movimientos_id` PRIMARY KEY (`id`)
);

ALTER TABLE `ubicaciones` ADD CONSTRAINT `fk_ubicaciones_id_almacen` FOREIGN KEY(`id_almacen`) REFERENCES `almacenes`(`id`);
ALTER TABLE `productos` ADD CONSTRAINT `fk_productos_id_categoria` FOREIGN KEY(`id_categoria`) REFERENCES `categorias`(`id`);
ALTER TABLE `movimientos` ADD CONSTRAINT `fk_movimientos_id_tipo_movimiento` FOREIGN KEY(`id_tipo_movimiento`) REFERENCES `tipos_movimientos`(`id`);
ALTER TABLE `existencias` ADD CONSTRAINT `fk_existencias_id_producto` FOREIGN KEY(`id_producto`) REFERENCES `productos`(`id`);
ALTER TABLE `movimientos` ADD CONSTRAINT `fk_movimientos_id_producto` FOREIGN KEY(`id_producto`) REFERENCES `productos`(`id`);
ALTER TABLE `existencias` ADD CONSTRAINT `fk_existencias_id_ubicacion` FOREIGN KEY(`id_ubicacion`) REFERENCES `ubicaciones`(`id`);
ALTER TABLE `movimientos` ADD CONSTRAINT `fk_movimientos_id_ubicacion_destino` FOREIGN KEY(`id_ubicacion_destino`) REFERENCES `ubicaciones`(`id`);
ALTER TABLE `movimientos` ADD CONSTRAINT `fk_movimientos_id_ubicacion_origen` FOREIGN KEY(`id_ubicacion_origen`) REFERENCES `ubicaciones`(`id`);

COMMIT;
