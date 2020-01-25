<br><br>
<div class="container">
    <div class="row text-center">
        <div class="col-md-4">
            <div class="card bg-warning text-white">
                <div class="card-header">COMPRAS</div>
                <div class="card-body">
                    <?php echo "$".number_format($compras); ?>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-info text-white">
                <div class="card-header">VENTAS</div>
                <div class="card-body">
                    <?php echo "$".number_format($ventas); ?>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-<?php echo $color ?> text-white">
                <div class="card-header">BALANCE</div>
                <div class="card-body">
                    <?php echo "$".number_format($balance); ?>
                </div>
            </div>
        </div>
    </div>
</div>