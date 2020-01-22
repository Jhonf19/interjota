<br><br>
<div class="container text-center">
  <div class="row">
    <div class="col-md-4">
      <div class="card bg-success text-white">
        <div class="card-header">VENTAS HOY</div>
        <div class="card-body">
          <h3>
            <?php echo number_format($v_hoy->total_v); ?>
          </h3>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card bg-success text-white">
        <div class="card-header">VENTAS DEL MES</div>
        <div class="card-body">
          <h3>
            <?php echo number_format($v_mes->total_vm); ?>
          </h3>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card bg-info text-white">
        <div class="card-header">PRODUCTOS</div>
        <div class="card-body">
          <h3>
            <?php echo $productos->suma ?>
          </h3>
        </div>
      </div>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-4">
      <div class="card bg-warning text-white">
        <div class="card-header">COMPRAS HOY</div>
        <div class="card-body">
          <h3>
            <?php echo number_format($c_hoy->total_c); ?>
          </h3>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card bg-warning text-white">
        <div class="card-header">COMPRAS DEL MES</div>
        <div class="card-body">
          <h3>
            <?php echo number_format($c_mes->total_cm); ?>
          </h3>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card <?php echo $color ?> text-white">
        <div class="card-header">BALANCE DEL MES</div>
        <div class="card-body">
          <h3>
            <?php echo number_format($b_mes); ?>
          </h3>
        </div>
      </div>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-12">
      <div class="card bg-secondary text-dark">
        <div class="card-header">UTILIDAD DE VENTAS</div>
        <div class="card-body">
          <div class="row">
          <div class="col-md-6">
          <div class="card bg-secondary text-dark">
            <div class="card-header">VENTAS MES</div>
            <div class="card-body">
              <h3>
              <?php echo number_format($u_mes->total_ut); ?>
              </h3>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card bg-secondary text-dark">
            <div class="card-header">VENTAS HOY</div>
            <div class="card-body">
              <h3>
              <?php echo number_format($u_hoy->total_ut_today); ?>
              </h3>
            </div>
          </div>
        </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

