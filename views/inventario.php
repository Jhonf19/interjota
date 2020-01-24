<br><br>
<div class="container">
  <div class="row">
    <div class="input-group col-md-3">
      <input type="text" class="form-control" name="search" id="_query" placeholder="Buscar productos" autofocus required>
      <a id="_search" class="btn btn-primary" href="#"><i class="fas fa-search"></i></a>
    </div>  
</div>
  <div class="row">
    <div class="col-md-3">
      <p><b><?php echo $matches ?></p>
    </div>
    <div class="table-responsive">
      <h3 class="text-center">Productos</h3>
      <br>
      <table class="table table-bordered table-striped text-center">
        <thead class="bg-primary text-light">
          <th style="width:5px;">CODIGO</th><th>NOMBRE</th>
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
              <td><?php echo "$".number_format($row->costo); ?></td>
            <?php endif; ?>
            <td><?php echo "$".number_format($row->precio); ?></td>
            <td><?php echo $row->stock; ?></td>
            <?php if (isset($_SESSION['admin'])): ?>
              <td>
                <a class="btn btn-warning" href="?b=editarProducto&prod=<?php echo $row->id_producto; ?>&nom=<?php echo $row->nombre; ?>&cos=<?php echo $row->costo ?>&pre=<?php echo $row->precio ?>&page=<?php echo $_GET['pagina'] ?>">
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
      <div class="d-flex justify-content-around">
        <nav class="" aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item <?php echo $_GET['pagina']<=1 ? 'disabled' : '' ?>">
              <?php

                if (isset($_GET['pagina']))
                {

                  $a=$_GET['pagina'] - 1;
                  if($a < 1)
                  {
                    $href = "?b=inventario";
                  }
                  else
                  {
                    $href = "?b=inventario&pagina=".$a;
                  }
                }else{
                  $href = "?b=inventario";
                }
              ?>
              <a class="page-link" href="<?php  echo $href ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
            </li>
              <?php for ($i=0; $i < $pages; $i++): ?>
                <li class="page-item
                <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?>">
                <a class="page-link" href="?b=inventario&pagina=<?php echo $i+1 ?>"><?php echo $i+1 ?></a></li>
              <?php endfor; ?>
            <li class="page-item <?php echo $_GET['pagina']>=$pages ? 'disabled' : '' ?>">
            <?php

                if (isset($_GET['pagina']))
                {

                  $next=$_GET['pagina'] + 1;
                  if($next > $pages)
                  {
                    $next2 = $next - 1;
                    $href2 = "?b=inventario&pagina=".$next2;
                  }
                  else
                  {
                    $href2 = "?b=inventario&pagina=".$next;
                  }
                }else{
                  $href2 = "?b=inventario";
                }
              ?>
              <a class="page-link" href="<?php  echo $href2 ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</div>

