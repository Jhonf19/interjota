<br><br>
<div class="container">
<?php if(isset($rep)) : ?>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <table class="table table-bordered">
          <thead>
              <th>#</th>
              <th>Fecha</th>
              <th>Total</th>
          </thead>
          <tbody>
              <?php $tot=0; foreach ($rep as $key => $row) : ?>
              <tr>
                <td><?php $tot += $row->total_ven; echo $key+1; ?></td>
                <td><?php echo $row->fecha_ven; ?></td>
                <td><?php echo $row->total_ven; ?></td>
              </tr>
              <?php endforeach; ?>
              <tr>
                <td> 22</td>
                <td>3 </td>
              <td>TOTAL: <?php echo number_format($tot); ?></td>
              </tr>
          </tbody>
        </table>
      </div>
    </div>
    </div>
           
            <?php endif; ?>
</div>
