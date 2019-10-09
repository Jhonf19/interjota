<br><br>
<div class="container">
  <div class="row">
    <div class="table-responsive">
      <h3 class="text-center">Productos</h3>
      <br>
      <table class="table table-bordered text-center">
        <thead>
          <th>CODIGO</th><th>NOMBRE</th><th>PRECIO</th><th>STOCK</th>
        </thead>
        <tbody>
          <?php foreach ($res as $row): ?>

          <tr>
            <td><?php echo $row->codigo; ?></td>
            <td><?php echo $row->nombre; ?></td>
            <td><?php echo "$".$row->precio; ?></td>
            <td><?php echo $row->stock; ?></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
