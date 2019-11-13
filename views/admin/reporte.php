<br><br>
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h3 class="card-title text-center">Generar Reporte Mensual</h3>
          <form action="?b=createPerf" method="post" id="fnb">
            <div class="form-group">
              <select class="form-control" form="fnb" name="rol">
                <option selected>Seleccione el mes</option>
                <option value="0">Meses</option>
              </select>
            </div>
            <button class="btn btn-primary btn-block" type="submit">Generar</button>
            <!-- <a class="btn btn-block btn-secondary" type="button" href="?b=listAcounts">Cancelar</a> -->
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h3 class="card-title text-center">Generar Reporte de Ventas</h3>
          <form action="?b=createPerf" method="post" id="fnb">
            <div class="form-group">
              <select class="form-control" form="fnb" name="rol">
                <option selected>Seleccione el día</option>
                <option value="0">Dias</option>
              </select>
            </div>
            <button class="btn btn-primary btn-block" type="submit">Generar</button>
            <!-- <a class="btn btn-block btn-secondary" type="button" href="?b=listAcounts">Cancelar</a> -->
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
