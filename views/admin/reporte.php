<br><br>
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h3 class="card-title text-center">Reporte Mensual</h3>
          <form action="?b=generateReport" method="post" id="fnb">
            <div class="form-group">
              <select class="form-control" form="fnb" name="mes">
                <option selected>Seleccione el mes</option>
                <option value="01">Enero</option>
                <option value="02">Febrero</option>
                <option value="03">Marzo</option>
                <option value="04">Abril</option>
                <option value="05">Mayo</option>
                <option value="06">Junio</option>
                <option value="07">Julio</option>
                <option value="08">Agosto</option>
                <option value="09">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
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
          <h3 class="card-title text-center">Reporte Diario</h3>
          <form action="?b=generateReport" method="post" id="">
            <div class="form-group">
              <input type="text" class="form-control" value="<?php echo date('Y-m-d') ?>" readonly name="dia">
            </div>
            <button class="btn btn-primary btn-block" type="submit">Generar</button>
            <!-- <a class="btn btn-block btn-secondary" type="button" href="?b=listAcounts">Cancelar</a> -->
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>
</div>
