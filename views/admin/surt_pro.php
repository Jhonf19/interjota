<br><br>
<div class="container">
  <div class="row">
    <div class="col-md-8 offset-md-2 col-sm-12 offset-sm-0 col-xs-12">
      <div class="card">
        <div class="card-body">
          <h3 class="card-title text-center">Surtir Producto</h3>
          <form action="?b=surtPro" method="post">

          <div class="form-group">
            <label for="">Nombre</label>
            <input type="hidden" name="id_producto" value="<?php echo $data['id_producto']; ?>">
            <input type="hidden" name="stock" value="<?php echo $data['stock']; ?>">
            <input type="text" class="form-control" name="nombre" value="<?php echo $data['nombre']; ?>"placeholder="Nombre" readonly >
          </div>
          <div class="form-group">
            <label for="">Cantidad</label>
            <input type="text" class="form-control" name="cantidad" placeholder="Cantidad" autofocus>
          </div>


          <button class="btn btn-success btn-block" type="submit" name="btn_surtPro">Surtir</button>
          <a class="btn btn-secondary btn-block" href="?b=inventario">Cancelar</a>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
<br><br>
