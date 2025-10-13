<?php echo $this->extend('templates/layout'); ?>

<?php echo $this->section('content'); ?>
<div>
            <div class="d-flex justify-content-between p-4">
                <div class="d-flex">
                    <H4>Crear producto</H4>
                </div>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-success btn-sm btn-save">Guardar</button>
                    <button type="button" class="btn btn-secondary btn-sm btn-discard">Descartar</button>
                </div>
            </div>
            <div class="card card-form p-2 mx-auto mt-5" style="width: 900px;">
                <form class="row g-3 p-2">
                    <div class="col-md-12">
                        <label for="input-nameProduct" class="form-label">Producto</label>
                        <input type="text" class="form-control" id="input-nameProduct" placeholder="Bicicleta de Montaña">
                    </div>
                    <div class="col-md-4">
                        <label for="input-priceProduct" class="form-label">Valor</label>
                        <input type="number" min=1 class="form-control" id="input-priceProduct">
                    </div>
                    <div class="col-md-4">
                        <label for="input-costProduct" class="form-label">Costo</label>
                        <input type="number" min=1 class="form-control" id="input-costProduct">
                    </div>
                    <div class="col-md-4">
                        <label for="input-skuProduct" class="form-label">SKU</label>
                        <input type="text" class="form-control" id="input-skuProduct">
                    </div>
                    <div class="col-md-4">
                        <label for="input-barcodeProduct" class="form-label">Codigo de Barras</label>
                        <input type="number" class="form-control" id="input-barcodeProduct">
                    </div>
                    <div class="col-md-4">
                        <label for="select-categoryProduct" class="form-label">Categoria</label>
                        <select class="form-select" id="select-categoryProduct" aria-label="Default select example">
                            <?php foreach($categories as $category): ?>
                                <option value="<?= esc($category->id);?>"><?=esc($category->nombre);?></option>
                            <?php  endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="input-descriptionProduct" class="form-label">Descripción</label>
                        <textarea class="form-control" id="input-descriptionProduct" rows="5"></textarea>
                    </div>
                </form>
            </div>

        </div>
<?php echo $this->endSection(); ?>