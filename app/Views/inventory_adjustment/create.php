<?php echo $this->extend('templates/layout'); ?>

<?php echo $this->section('content'); ?>
<div>
            <div class="d-flex justify-content-between p-4">
                <div class="d-flex">
                    <H4>Crear ajuste</H4>
                </div>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success btn-sm btn-save">Guardar</button>
                    <button type="button" class="btn btn-secondary btn-sm btn-discard">Descartar</button>
                </div>
            </div>
            <div class="card card-form p-2 mx-auto mt-5" style="width: 900px;">
                <form class="row g-3 p-2">
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Ubicacion</label>
                        <select class="form-select" aria-label="Default select example">
                            <?php foreach($locations as $location): ?>
                                <option value="<?=$location->id ?>"><?=$location->nombre ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Producto</label>
                        <select class="form-select" aria-label="Default select example">
                            <?php foreach($products as $product): ?>
                                <option value="<?=$product->id ?>"><?=$product->nombre ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="inputEmail4" class="form-label">Cantidad a mano</label>
                        <input type="number" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-md-4">
                        <label for="inputEmail4" class="form-label">Cantidad contada</label>
                        <input type="number" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-md-4">
                        <label for="inputEmail4" class="form-label">Diferencia</label>
                        <input type="number" class="form-control" id="inputEmail4">
                    </div>
                    
                </form>
            </div>

        </div>
<?php echo $this->endSection(); ?>