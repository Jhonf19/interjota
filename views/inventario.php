<br><br>
<div class="container">
  <div class="row">
    <div class="table-responsive">
      <h3 class="text-center">Productos</h3>
      <br>
      <table class="table table-bordered text-center">
        <thead>
          <th>CODIGO</th><th>NOMBRE</th>
          <?php if (isset($_SESSION['admin'])): ?>
          <th>COSTO</th>
          <?php endif; ?>
          <th>PRECIO</th><th>STOCK</th>
          <?php if (isset($_SESSION['admin'])): ?>
            <th><i class="fas fa-cog"></i> </th>
          <?php endif; ?>
        </thead>
        <tbody>
          <?php foreach ($res as $row): ?>

          <tr>
            <td><?php echo $row->id_producto; ?></td>
            <td><?php echo $row->nombre; ?></td>
            <?php if (isset($_SESSION['admin'])): ?>
              <td><?php echo "$".$row->costo; ?></td>
            <?php endif; ?>
            <td><?php echo "$".$row->precio; ?></td>
            <td><?php echo $row->stock; ?></td>
            <?php if (isset($_SESSION['admin'])): ?>
              <td>
                <a class="btn btn-warning" href="?b=editarProducto&prod=<?php echo $row->id_producto; ?>&nom=<?php echo $row->nombre; ?>&cos=<?php echo $row->costo ?>&pre=<?php echo $row->precio ?>">
                    <i class="fas fa-edit"></i>
                </a>
                <a class="btn btn-success" href="?b=surtPro&prod=<?php echo $row->id_producto; ?>&nom=<?php echo $row->nombre; ?>&sto=<?php echo $row->stock ?>">
                    <i class="fas fa-truck"></i>
                  </a>
              </td>
            <?php endif; ?>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
