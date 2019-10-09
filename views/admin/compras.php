<?php

 ?>
 <br><br>
 <div class="container">
   <div class="row">
     <div class="col-md-12">
       <div class="card">
         <div class="card-body">
           <h3 class="card-title text-center">Facturas</h3>
           <form action="?b=createPro" method="post">
             <div class="form-group">
               <input type="text" class="form-control" name="fecha" placeholder="Fecha"  required>
             </div>
             <div class="form-group">
               <input type="text" class="form-control" name="proveedor" placeholder="Proveedor" required>
             </div>
             <div class="form-group">
               <input type="text" class="form-control" name="total" placeholder="Total compra" required>
             </div>

             <button class="btn btn-primary btn-block" type="submit" name="button">Aceptar</button>
           </form>
         </div>
       </div>
     </div>
   </div>
   <hr>
   <div class="row">
     <div class="col-md-6">
       <div class="card">
         <div class="card-body">
           <h3 class="card-title text-center">Surtir</h3>
           <form action="?b=createPro" method="post">
             <div class="form-group">
               <input type="text" class="form-control" name="codigo" placeholder="Codigo del producto"  required>
             </div>
             <div class="form-group">
               <input type="text" class="form-control" name="cantidad" placeholder="Cantidad" required>
             </div>
             <button class="btn btn-primary btn-block" type="submit" name="button">Aceptar</button>
           </form>
         </div>
       </div>
     </div>
     <div class="col-md-6">
       <div class="card">
         <div class="card-body">
           <h3 class="card-title text-center">Nuevo Producto</h3>
           <form action="?b=createPro" method="post">
             <div class="form-group">
               <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
             </div>
             <div class="form-group">
               <input type="text" class="form-control" name="costo" placeholder="Costo" required>
             </div>
             <div class="form-group">
               <input type="text" class="form-control" name="precio" placeholder="Precio" required>
             </div>
             <div class="form-group">
               <input type="text" class="form-control" name="stock" placeholder="Existencia" required>
             </div>
             <button class="btn btn-primary btn-block" type="submit" name="button">Guardar</button>
           </form>
         </div>
       </div>
     </div>
   </div>
 </div>
<br><br>
