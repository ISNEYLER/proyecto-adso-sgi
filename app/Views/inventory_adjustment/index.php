<?php echo $this->extend('templates/layout'); ?>

<?php echo $this->section('content'); ?>
<div class="p-4">
    <div class="d-flex justify-content-between">
                <div class="d-flex">
                    <H4>Ajuste de inventario</H4>
                </div>
                <div class="d-flex gap-2">
                    <a href="producto/crear-ajuste-inventario.html" class="btn btn-success">Crear ajuste de inventario</a>
                    <input type="email" class="form-control form-control-sm w-auto" id="exampleFormControlInput1" placeholder="Buscar">
                </div>
            </div>
            <div class="table-responsive py-4">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr class="table-light">
                            <th>Ubicacion</th>
                            <th>Producto</th>
                            <th>Cantidad a mano</th>
                            <th>Cantidad contada</th>
                            <th>Diferencia</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                        </tr>
                    </tbody>
                </table>
            </div>
</div>
<?php echo $this->endSection(); ?>