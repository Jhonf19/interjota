<br><br>
<div class="container">
<?php if(isset($rep)) : ?>
  <div class="row">
    <div class="col-md-12">
        <table class="table table-bordered">
          <thead>
              <th>#</th>
              <th>Fecha</th>
              <th>Subtotal</th>
          </thead>
          <tbody>
              <?php $tot=0; foreach ($rep as $key => $row) : ?>
              <tr>
                <td><?php $tot += $row->total_ven; echo $key+1; ?></td>
                <td><?php echo $row->fecha_ven; ?></td>
                <td><?php echo number_format($row->total_ven); ?></td>
              </tr>
              <?php endforeach; ?>
              <tr>
                <td class="borderless"></td>
                <td class="text-right"><b>TOTAL:</b></td>
              <td><b><?php echo number_format($tot); ?></b></td>
              </tr>
          </tbody>
        </table>
    </div>
    </div>
           
            <?php endif; ?>
</div>
