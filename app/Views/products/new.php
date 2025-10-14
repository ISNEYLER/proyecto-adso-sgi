<?php echo $this->extend('templates/layout'); ?>

<?php echo $this->section('content'); ?>
<div>
            <div class="d-flex justify-content-between p-4">
                <div class="d-flex">
                    <H4>Crear producto</H4>
                </div>
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success btn-sm btn-save" form="formCreateProduct">Guardar</button>
                    <a href="<?= base_url('products/')?>" class="btn btn-secondary btn-sm btn-discard">Descartar</a>
                </div>
            </div>
            <div class="card card-form p-2 mx-auto mt-5" style="width: 900px;">
                <form id="formCreateProduct" class="row g-3 p-2" action="<?= base_url('products/save') ?>" method="post">
                    <div class="col-md-12">
                        <label for="input-nameProduct" class="form-label">Producto</label>
                        <input type="text" class="form-control <?= isset($validation) && $validation->hasError('nombre') ? 'is-invalid' : (old('nombre') ? 'is-valid' : '') ?>" name="nombre" placeholder="Bicicleta de Montaña" value="<?= set_value('nombre') ?>">
                        <div class="invalid-feedback">
                            <?= isset($validation) ? $validation->getError('nombre') : '' ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="input-priceProduct" class="form-label">Valor</label>
                        <input type="number" class="form-control <?= isset($validation) && $validation->hasError('valor') ? 'is-invalid' : (old('valor') ? 'is-valid' : '') ?>" name="valor" value="<?= set_value( 'valor',0) ?>">
                        <div class="invalid-feedback">
                            <?= isset($validation) ? $validation->getError('valor') : '' ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="input-costProduct" class="form-label">Costo</label>
                        <input type="number" class="form-control <?= isset($validation) && $validation->hasError('costo') ? 'is-invalid' : (old('costo') ? 'is-valid' : '') ?>" name="costo" value="<?= set_value('costo',0); ?>">
                        <div class="invalid-feedback">
                            <?= isset($validation) ? $validation->getError('costo') : '' ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="input-skuProduct" class="form-label">SKU</label>
                        <input type="text" class="form-control <?= isset($validation) && $validation->hasError('sku') ? 'is-invalid' : (old('sku') ? 'is-valid' : '') ?>" name="sku" value="<?= set_value('sku') ?>">
                        <div class="invalid-feedback">
                            <?= isset($validation) ? $validation->getError('sku') : '' ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="input-barcodeProduct" class="form-label">Codigo de Barras</label>
                        <input type="text" class="form-control <?= isset($validation) && $validation->hasError('codigo_barras') ? 'is-invalid' : (old('codigo_barras') ? 'is-valid' : '') ?>" name="codigo_barras" value="<?= set_value('codigo_barras') ?>">
                        <div class="invalid-feedback">
                            <?= isset($validation) ? $validation->getError('codigo_barras') : '' ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="select-categoryProduct" class="form-label">Categoria</label>
                        <select class="form-select <?= isset($validation) && $validation->hasError('categoria') ? 'is-invalid' : (old('categoria') ? 'is-valid' : '') ?>" name="categoria" aria-label="Default select example">
                            <?php foreach($categories as $category): ?>
                                <option value="<?= esc($category->id);?>"><?=esc($category->nombre);?></option>
                            <?php  endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= isset($validation) ? $validation->getError('categoria') : '' ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="input-descriptionProduct" class="form-label">Descripción</label>
                        <textarea class="form-control <?= isset($validation) && $validation->hasError('descripcion') ? 'is-invalid' : (old('descripcion') ? 'is-valid' : '') ?>" name="descripcion" rows="5" value="<?= set_value('descripcion') ?>"></textarea>
                    </div>
                </form>
            </div>

        </div>
<?php echo $this->endSection(); ?>