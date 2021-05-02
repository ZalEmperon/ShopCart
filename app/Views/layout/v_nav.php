<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
  <div class="container">
    <a href="template/index3.html" class="navbar-brand">
      <img src="<?php echo base_url() ?>/template/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">JumpShopper</span>
    </a>

    <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse order-3" id="navbarCollapse">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="<?php echo base_url('home') ?>" class="nav-link">Home</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>
    </div>

    <!-- Right navbar links -->
    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
      <!-- Messages Dropdown Menu -->
      <?php
      $keranjang = $cart->contents();
      $jml_item = 0;
      foreach ($keranjang as $key => $value) {
        $jml_item = $jml_item + $value['qty'];
      }
      ?>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-shopping-cart"></i>
          <span class="badge badge-danger navbar-badge"><?php echo $jml_item ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <?php if (empty($keranjang)) {?>
              <a href="#" class="dropdown-item text-center">
                <p>Keranjang Belanja Kosong</p>
              </a>
            <?php } else{?>
              <a href="#" class="dropdown-item">
                <?php foreach ($keranjang as $key => $value) {?>
                  <div class="media">
                    <img src="<?php echo base_url('gambar/'. $value['options']['gambar']) ?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                    <div class="media-body">
                      <h3 class="dropdown-item-title">
                        <?php echo $value['name']; ?>
                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                      </h3>
                      <p class="text-sm"><?php echo $value['qty']?> * <?php echo number_to_currency($value['price'], 'IDR') ?> = <?php echo number_to_currency($value['subtotal'], 'IDR') ?></p>
                      <p class="text-sm text-muted">Berat : <?php echo $value['options']['berat'] ?></p>
                    </div>
                  </div>
                <?php } ?>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">Total : <?php echo number_to_currency($cart->total(), 'IDR') ?></a>
            <a href="<?= base_url('home/cart') ?>" class="dropdown-item dropdown-footer">View Cart</a>
            <a href="#" class="dropdown-item dropdown-footer">Check Out</a>
            <?php } ?>
        </div>
      </li>
    </ul>
  </div>
</nav>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"> <?= $title ?></h1>
        </div>
      </div>
    </div>
  </div>
