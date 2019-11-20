<br><br>
<div class="container">
  <div class="row">
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">VENTAS HOY</div>
        <div class="card-body">
          <?php echo number_format($v_hoy->total_v); ?>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">VENTAS DEL MES</div>
        <div class="card-body">
          <?php echo number_format($v_mes->total_vm); ?>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">PRODUCTOS</div>
        <div class="card-body">
          <?php echo $productos->suma ?>
        </div>
      </div>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">COMPRAS HOY</div>
        <div class="card-body">
          <?php echo number_format($c_hoy->total_c); ?>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">COMPRAS DEL MES</div>
        <div class="card-body">
          <?php echo number_format($c_mes->total_cm); ?>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">BALANCE DEL MES</div>
        <div class="card-body">
          <?php echo number_format($b_mes); ?>
        </div>
      </div>
    </div>
  </div>
</div>

