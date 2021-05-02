<div class="content">
  <div class="container">
    <?php
    if (session()->getFlashData('pesan')) {
      echo '<div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
      echo session()->getFlashData('pesan');
      echo '</div>';
    }
     ?>
    <?php echo form_open('home/update') ?>
    <div class="invoice p-3 mb-3">
      <!-- title row -->
      <div class="row">
        <div class="col-12">
          <h4>
            <i class="fas fa-shopping-cart"></i> Keranjang Belanja
            <small class="float-right">Date: 2/10/2014</small>
          </h4>
        </div>
        <!-- /.col -->
      </div>
      <!-- Table row -->
      <div class="row">
        <div class="col-12 table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th width="100px">Qty</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th width="100px">Berat</th>
                <th>Total</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $tot_berat = 0;
                $i = 1;
                foreach ($cart->contents() as $key => $value) {
                  $tot_berat = $tot_berat + ($value['qty'] * $value['options']['berat']);
                  ?>
                  <tr>
                    <td><input type="number" min="1" name="qty<?php echo $i++ ?>" class="form-control" value="<?php echo $value['qty'] ?>"> </td>
                    <td><?php echo $value['name'] ?></td>
                    <td><?php echo number_to_currency($value['price'], 'IDR') ?></td>
                    <td><?php echo $value['qty'] * $value['options']['berat'] ?> Gr</td>
                    <td><?php echo number_to_currency($value['subtotal'], 'IDR') ?></td>
                    <td>
                      <a href="<?php echo base_url('home/delete/'.$value['rowid']) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</a>
                    </td>
                  </tr>
                <?php } ?>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-6">
        </div>
        <!-- /.col -->
        <div class="col-6">
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Subtotal : </th>
                <td><?= number_to_currency($cart->total(), 'IDR') ?></td>
              </tr>
              <tr>
                <th>Total berat : </th>
                <td><?= $tot_berat ?> Gr</td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-12">
          <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Keranjang</button>
          <a href="<?php echo base_url('home/clear') ?>" class="btn btn-warning"><i class="fas fa-trash"></i> Clear Keranjang</a>
          <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Check Out</button>
        </div>
      </div>
    </div>
    <?php echo form_close(); ?>
    <!-- /.invoice -->
  </div>
</div>
