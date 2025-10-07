<?php echo $this->extend('templates/layout'); ?>

<?php echo $this->section('content'); ?>
<div>
    <div class="d-flex justify-content-between p-4 bg-body">
                <div class="d-flex flex-column">
                    <H4>Crear trasferencia</H4>
                </div>
                <div>
                    <button type="button" class="btn btn-success btn-sm">Guardar</button>
                    <button type="button" class="btn btn-secondary btn-sm">Descartar</button>
                </div>
            </div>
            <div class="card card-form p-2 mx-auto mt-5" style="width: 900px;">
                <form class="row g-3 p-2">
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Ubicacion Origen</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>A1</option>
                            <option value="1">A2</option>
                            <option value="2">A3</option>
                            <option value="3">A4</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Ubicacion Destino</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>A4</option>
                            <option value="1">A2</option>
                            <option value="2">A3</option>
                            <option value="3">A1</option>
                        </select>
                    </div>
                    <div class="table-responsive mt-5">
                        <table class="table table-striped">
                    <thead>
                        <tr class="table-dark">
                            <th>Producto</th>
                            <th>Cantidad a transferir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><a href="#">Haga clic para agregar un producto</a></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                    </div>
                </form>
            </div>
</div>
<?php echo $this->endSection(); ?>