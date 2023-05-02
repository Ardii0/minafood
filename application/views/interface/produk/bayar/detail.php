<section class="content">
    <div class="landpage container">
        <div class="h-100" style="margin: 75px 34px 0 34px;">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="col">
                        <h3>Barang yang dibeli</h3>
                        <?php if (!$foto['value']) { ?>
                            <img src="<?php echo site_url('assets/admin-page/images/500x300.png'); ?>" class="img-responsive fotoproduk-bayar">
                        <?php } else { ?>
                            <div class="d-flex">
                                <img src="<?php echo site_url('uploads/foto-produk/'.$foto['value']); ?>" class="img-responsive fotoproduk_bayar">
                                <div class="ml-2 text-right">
                                    <h1>
                                        <?php echo $produk['nama_produk']; ?>
                                    </h1>
                                    <div class="price_bayar">
                                        <?php if(isset($produk['harga'])) {
                                            echo IDR($produk['harga']);
                                        } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <br>
                    <p>
                        Kategori: <?php echo namaKategori($produk['id_kategori']); ?>
                    </p>
                    <p>
                        <?php echo $produk['deskripsi']; ?>
                    </p>
                </div>
                <?php echo form_open_multipart('belanja/belanja_add', 'class="col-lg-4 col-md-12 col-sm-12 col-xs-12"') ?>
                    <h3>Atur Jumlah Pembelian</h3>
                        <button type="button" onclick="decrement()">-</button>
                        <?php echo form_input($jumlah, '', ' type="number" class="number-to-text" onkeyup="total()" id="jumlah" min="1" max="'.$produk['stok'].'" required autocomplete="off"'); ?>
                        <!-- <input type="number" class="number-to-text" onkeyup="total()" id="jumlah" min="1" max="<?php echo $produk['stok']; ?>" required name="jumlah"> -->
                        <input type="hidden" id="harga" value="<?php echo $produk['harga']; ?>">
                        <input type="hidden" id="stok" value="<?php echo $produk['stok']; ?>">
                        <input type="hidden" id="sisa">
                        <button type="button" onclick="increment()">+</button>
                    <p>Stok: <?php echo $produk['stok']; ?></p>
                    <h5>Subtotal: 
                        <input type="text" class="number-to-text" id="subtotal" style="border: none; outline: none; background: white" disabled>
                    </h5>
                    <button type="submit" class="btn btn-info" <?php if(!$this->session->userdata('role') == 'User'){
                        echo 'disabled';
                    } ?>>Beli Sekarang</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</section>
<script>
   function total() {
       var harga = $("#harga").val();
       var jumlah = $("#jumlah").val();
       var stok = $("#stok").val();
       var subtotal = parseInt(harga*jumlah);
       var sisa = parseInt(stok-jumlah);
       $("#subtotal").val(subtotal);
       $("#sisa").val(sisa);
   }
   function increment() {
      document.getElementById('jumlah').stepUp()
      total()
   }
   function decrement() {
      document.getElementById('jumlah').stepDown();
      total()
   }
</script>