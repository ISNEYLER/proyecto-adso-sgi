<?php echo $this->extend('templates/layout'); ?>

<?php echo $this->section('content'); ?>
  <div>
    <div class="d-flex justify-content-between p-4 bg-body">
      <div class="d-flex flex-column">
        <H4>Productos</H4>
      </div>
      <div>
        <a class="btn btn-success btn-sm" href="producto/crear-producto.html">Añadir Producto</a>
      <input type="email" class="form-control-sm" id="exampleFormControlInput1" placeholder="Buscar">
    </div>
  </div>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr class="table-dark">
          <th>Producto</th>
          <th>SKU</th>
          <th>Cod Barras</th>
          <th>Precio</th>
          <th>Costo</th>
          <th>Cantidad</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Barra de sonido Hisense HS1000</td>
          <td>73261439</td>
          <td>73261439</td>
          <td>$ 329.000</td>
          <td>$ 200.000</td>
          <td>20</td>
        </tr>
  </div>
<?php echo $this->endSection(); ?>