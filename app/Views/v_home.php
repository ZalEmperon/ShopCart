<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <?php
        if (session()->getFlashData('pesan')) {
          echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
          echo session()->getFlashData('pesan');
          echo '</div>';
        }
         ?>
      </div>
      <?php foreach ($barang as $key => $value) {?>
        <div class="col-lg-3">
          <?php
          echo form_open('home/add');
          echo form_hidden('id', $value['id_barang']);
          echo form_hidden('price', $value['harga']);
          echo form_hidden('name', $value['nama_barang']);
          echo form_hidden('gambar', $value['gambar']);
          echo form_hidden('berat', $value['berat']);
          ?>
          <div class="card">
            <div class="card-body text-center">
              <h5 class="card-title font-weight-bold"><?php echo $value['nama_barang'] ?></h5>

              <p class="card-text">
                <label>Berat : <?php echo $value['berat'] ?> Gr</label>
                <img src="<?php echo base_url('gambar/'.$value['gambar']) ?>" width="200px" height="160px">
              </p>

              <label><?php echo number_to_currency($value['harga'], 'IDR') ?></label><br>
              <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-shopping-basket"></i> Add </button>
            </div>
          </div>
          <?php echo form_close(); ?>
        </div>
      <?php } ?>
    </div>
  </div>
</div>
