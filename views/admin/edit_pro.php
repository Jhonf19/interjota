<br><br>
<div class="container">
  <div class="row">
    <div class="col-md-8 offset-md-2 col-sm-12 offset-sm-0 col-xs-12">
      <div class="card">
        <div class="card-body">
          <h3 class="card-title text-center">Editar Producto</h3>
          <form action="?b=editarProducto" method="post">

          <div class="form-group">
            <label for="">Nombre</label>
            <input type="hidden" name="id_producto" value="<?php echo $data['id_producto']; ?>">
            <input type="text" class="form-control" name="nombre" value="<?php echo $data['nombre']; ?>"placeholder="Nombre" autofocus>
          </div>
          <div class="form-group">
            <label for="">Costo</label>
            <input type="text" class="form-control" name="costo" value="<?php echo $data['costo']; ?>"placeholder="Costo">
          </div>
          <div class="form-group">
            <label for="">Precio</label>
            <input type="text" class="form-control" name="precio" value="<?php echo $data['precio']; ?>"placeholder="Precio">
          </div>


          <button class="btn btn-warning btn-block" type="submit" name="btn_editarPro">Aceptar</button>
          <a class="btn btn-secondary btn-block" href="?b=inventario&pagina=<?php echo $_GET['page'] ?>">Cancelar</a>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
<br><br>
