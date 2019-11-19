<br><br>
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h3 class="card-title text-center">Punto de Venta</h3>
          <form action="?b=addCar" method="post">
            <div class="form-group">
              <input type="text" class="form-control" name="codigo" placeholder="Codigo del producto" autofocus required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="cantidad" placeholder="Cantidad" required>
            </div>
            <button class="btn btn-success " type="submit" name="button"><i class="fa fa-shopping-cart"></i> Añadir</button>
          </form>
          <div class="card-footer">

            <a class="btn btn-primary btn-block" href="?b=sell&sell=<?php echo $total_venta; ?>&date=<?php
            echo date('Y-m-d'); ?>">Vender</a>
            <a class="btn btn-secondary btn-block" href="?b=cancelVenta">Cancelar</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-header text-right"><h3><b>Total:</b> <?php echo number_format($total_venta) ?></h3></div>
      </div>
      <div class="card">
        <div class="card-body">
          <h3 class="card-title text-center">Lista de articulos</h3><hr>
          <table class="table table-bordered ">
            <thead>
              <th>CODIGO</th>
              <th>NOMBRE</th>
              <th>PRECIO</th>
              <th>CANTIDAD</th>
              <th><i class="fas fa-cog"></i></th>
            </thead>
            <tbody>
              <?php if (isset($_SESSION['n_venta'])): ?>
              <?php foreach ($_SESSION['n_venta'] as $key => $row): ?>
                <tr>
                  <td><?php echo $row->id_producto; ?></td>
                  <td><?php echo $row->nombre; ?></td>
                  <td><?php echo "$".$row->precio; ?></td>
                  <td><?php echo $row->cantidad; ?></td>
                  <td><a class="btn btn-danger" href="?b=removeCart&id=<?php echo $key; ?>"><i class="fas fa-times"></i></a></td>
                </tr>
            <?php endforeach; ?>
          <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
