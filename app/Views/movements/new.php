<?php echo $this->extend('templates/layout'); ?>

<?php echo $this->section('content'); ?>
<div>
    <div class="d-flex justify-content-between p-4">
                <div class="d-flex flex-column">
                    <H4>Crear movimiento</H4>
                </div>
                <div>
                    <button type="submit" class="btn btn-success btn-sm btn-save" form="formCreateMovement">Guardar</button>
                    <a href="<?= base_url('movements/')?>" class="btn btn-secondary btn-sm btn-discard">Descartar</a>
                </div>
            </div>
            <div class="card card-form p-2 mx-auto mt-5" style="width: 900px;">
                <form class="row g-3 p-2" id="formCreateMovement" action="<?= base_url('movements/save') ?>" method="post">
                    <div class="col-md-4">
                        <label for="inputEmail4" class="form-label">Ubicacion Origen</label>
                        <select class="form-select" aria-label="Default select example" name="ubicacion_origen">
                            <?php foreach($locations as $location): ?>
                                <option value="<?=$location->id ?>"><?=$location->nombre ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="inputEmail4" class="form-label">Ubicacion Destino</label>
                        <select class="form-select" aria-label="Default select example" name="ubicacion_destino">
                            <?php foreach($locations as $location): ?>
                                <option value="<?=$location->id ?>"><?=$location->nombre ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="inputEmail4" class="form-label">Tipo de Movimiento</label>
                        <select class="form-select" aria-label="Default select example" name="tipo_movimiento">
                            <?php foreach($types as $type): ?>
                                <option value="<?=$type->id ?>"><?=$type->nombre ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-8">
                        <label for="inputEmail4" class="form-label">Producto</label>
                        <select class="form-select" aria-label="Default select example" name="producto">
                            <?php foreach($products as $product): ?>
                                <option value="<?=$product->id ?>"><?=$product->nombre ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="inputEmail4" class="form-label">Cantidad</label>
                        <input type="number" class="form-control <?= isset($validation) && $validation->hasError('cantidad') ? 'is-invalid' : (old('cantidad') ? 'is-valid' : '') ?>" name="cantidad" value="<?= set_value('cantidad') ?>">
                        <div class="invalid-feedback">
                            <?= isset($validation) ? $validation->getError('cantidad') : '' ?>
                        </div>
                    </div>
                </form>
            </div>
</div>
<?php echo $this->endSection(); ?>