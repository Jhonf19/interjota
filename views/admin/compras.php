 <br><br>
 <div class="container">
   <div class="row">
     <div class="col-md-12">
     </div>
   </div>
   <div class="row">
     <div class="col-md-6">
       <div class="card">
         <div class="card-body">
           <h3 class="card-title text-center">Ingreso de Facturas</h3>
           <form action="?b=createFac" method="post">
             <div class="form-group">
               <input type="date" class="form-control" name="fecha" placeholder="Fecha"  required>
             </div>
             <div class="form-group">
               <input type="text" class="form-control" name="proveedor" placeholder="Proveedor" required>
             </div>
             <div class="form-group">
               <input type="text" class="form-control" name="total_fac" placeholder="Total compra" required>
             </div>

             <button class="btn btn-primary btn-block" type="submit" name="button">Ingresar</button>
           </form>
         </div>
       </div>
     </div>
     <div class="col-md-6">
       <div class="card">
         <div class="card-body">
           <h3 class="card-title text-center">Creación de Productos</h3>
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
             <button class="btn btn-primary btn-block" type="submit" name="button">Crear</button>
           </form>
         </div>
       </div>
     </div>
   </div>
 </div>
<br><br>
