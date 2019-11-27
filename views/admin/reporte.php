<br><br>
<div class="container">
  <div class="row">
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <h3 class="card-title text-center">Reporte de ventas Mensual</h3>
          <form action="?b=generateReport" method="post" id="fnb">
            <div class="form-group">
              <input class="form-control" type="month" name="mes" required>
            </div>
            <button class="btn btn-primary btn-block" type="submit">Generar</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <h3 class="card-title text-center">Reporte de ventas Diario</h3>
          <form action="?b=generateReport" method="post" id="">
            <div class="form-group">
              <input class="form-control" type="date" name="dia" required>
            </div>
            <button class="btn btn-primary btn-block" type="submit">Generar</button>
          </form>
        </div>
      </div>
    </div>

  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <h3 class="card-title text-center">Reporte Financiero Mensual</h3>
        <form action="?b=generateReport" method="post">
            <div class="form-group">
              <input class="form-control" type="month" name="balance" required>
            </div>
          <button class="btn btn-primary btn-block" type="submit">Generar</button>
        </form>
      </div>
    </div>
  </div>

 </div>
</div>
