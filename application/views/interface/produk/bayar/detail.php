<section class="content">
    <div class="landpage container">
        <div class="h-100" style="margin: 75px 34px 0 34px;">
            <?php echo form_open_multipart('belanja/pembayaran', '') ?>
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <div class="col">
                            <h3>Barang yang dibeli</h3>
                            <?php if (!$foto['value']) { ?>
                                <img src="<?php echo site_url('assets/admin-page/images/500x300.png'); ?>" class="img-responsive fotoproduk_bayar">
                            <?php } else { ?>
                                <div class="d-flex">
                                    <img src="<?php echo site_url('uploads/foto-produk/'.$foto['value']); ?>" class="img-responsive fotoproduk_bayar">
                                    <div class="ml-2">
                                        <h1>
                                            <?php echo $produk['nama_produk']; ?>
                                        </h1>
                                        <div class="price_bayar">
                                            <?php if(isset($produk['harga'])) {
                                                echo IDR($produk['harga']);
                                            } ?>
                                        </div>
                                        <!-- <input id="jumlah" min="1" max="<?php echo $produk['stok']?>" value="<?php echo $bayar['jumlah']?>" required autocomplete="off"> -->
                                        <?php if(!empty($produk['stok'])) { ?>
                                            <button type="button" onclick="decrement()">-</button>
                                                <?php echo form_input($jumlah, $jumlah['value'],
                                                ' type="number" class="number-to-text" onkeyup="total()"
                                                id="jumlah" min="1" max="'.$produk['stok'].'" required autocomplete="off"'); ?>
                                            <button type="button" onclick="increment()">+</button>
                                            <p>Stok: <?php echo $produk['stok']; ?></p>
                                        <?php } else {?>
                                            <p>Stok: Habis</p>
                                        <?php } ?>
                                    </div>
                                </div>
                                <hr>
                                <?php if(!$alamat) {?>
                                    <div>
                                        Tambahkan Alamat Dahulu Sebelum Melanjutkan
                                    </div>
                                <?php } else {?>
                                    <div class="">
                                        <h3>
                                            Pengiriman
                                        </h3>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <?php echo $alamat['nama_penerima'].' ('.$alamat['nomor_hp'].')'; ?>
                                            <br>
                                            <?php echo $alamat['alamat'].', '.$alamat['kota']; ?>
                                            <?php echo form_hidden('id_alamat', $alamat['id_alamat']); ?>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <h3>Ringkasan Belanja</h3>
                            <input type="hidden" id="harga" value="<?php echo $produk['harga']; ?>">
                            <input type="hidden" id="stok" value="<?php echo $produk['stok']; ?>">
                            <input type="hidden" id="sisa" value="<?php echo $produk['stok']-$jumlah['value']; ?>" name="sisa">
                            <div>
                                <div>Lakukan Pembayaran dengan Transfer melalui</div>
                                <div>Bca: 62373828838298</div>
                                <div>Mandiri: 62373828838298</div>
                            </div>
                            <div class="mt-2">
                                <div>Unggah Bukti Pembayaran</div>
                                <div>
                                    <?php echo form_upload($bukti_pembayaran, '', 'accept="image/*" '); ?>
                                </div>
                            </div>
                        <h5 class="mt-4">Total Harga: 
                            <!-- <?php echo form_input(IDR($produk['harga']*$jumlah['value']), $subtotal['value'], 
                            ' class="number-to-text" id="subtotal" style="border: none; outline: none; background: white" disabled'); ?> -->
                            Rp<input type="text" name="subtotal" class="number-to-text" value="<?php echo $produk['harga']*$jumlah['value']; ?>" id="subtotal" style="border: none; outline: none; background: white" disabled>
                        </h5>
                        <button type="submit" class="btn btn-info" <?php if(!$this->session->userdata('role') == 'User' || empty($produk['stok'])){
                            echo 'disabled';
                        } ?>>Beli Sekarang</button>
                    </div>
                </div>
                <?php echo form_hidden('id_produk', $id_produk['value']); ?>
            <?php echo form_close(); ?>
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