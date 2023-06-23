<section class="content">
    <div class="landpage container">
        <div class="h-100" style="margin: 75px 34px 0 34px;">
            <?php echo form_open_multipart('belanja/pembayaran', '') ?>
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <div class="col">
                            <div class="card pt-2 pr-3 pl-3 pb-3">
                            <h3 style="font-family: 'Open Sauce One', 'Nunito Sans', -apple-system, sans-serif;font-weight: 500;">Barang yang dibeli</h3>
                            <?php if (!$foto['value']) { ?>
                                <img src="<?php echo site_url('assets/admin-page/images/500x300.png'); ?>" class="img-responsive fotoproduk_bayar">
                            <?php } else { ?>
                                <div class="d-flex">
                                    <img src="<?php echo site_url('uploads/foto-produk/'.$foto['value']); ?>" class="img-responsive fotoproduk_bayar">
                                    <div class="ml-2">
                                        <h4>
                                            <?php echo $produk['nama_produk']; ?>
                                        </h4>
                                        <div class="price_bayar">
                                            <?php if(isset($produk['harga'])) {
                                                echo IDR($produk['harga']);
                                            } ?>
                                        </div>
                                        <!-- <input id="jumlah" min="1" max="<?php echo $produk['stok']?>" value="<?php echo $bayar['jumlah']?>" required autocomplete="off"> -->
                                        <?php if(!empty($produk['stok'])) { ?>
                                            <div class="d-flex justify-content-start">
                                                <div style="border: 1px solid #BFC9D9;padding: 5px;width: fit-content; border-radius: 8px;">
                                                    <input type="button" onclick="decrement()" value="-" class="button-minus border rounded-circle  icon-shape icon-sm mx-1 pb-1" data-field="quantity">
                                                    <?php echo form_input($jumlah, $jumlah['value'], ' type="number" class="number-to-text text-center" onkeyup="total()" id="jumlah" min="1" max="'.$produk['stok'].'" required autocomplete="off" style="outline: 0; border: none;"'); ?>
                                                    <input type="button" onclick="increment()" value="+" class="button-plus border rounded-circle icon-shape icon-sm " data-field="quantity">
                                                </div>
                                            </div>
                                            <p>Stok: <?php echo $produk['stok']; ?></p>
                                        <?php } else {?>
                                            <p>Stok: Habis</p>
                                        <?php } ?></div>
                                    </div>
                                </div>
                                <hr>
                                <?php if(!$alamat) {?>
                                    <div>
                                        Tambahkan Alamat Dahulu Sebelum Melanjutkan
                                    </div>
                                <?php } else {?>
                                    <div class="">
                                    </div>
                                    <div class="card">
                                        <h3 class="col mt-2" style="font-family: 'Open Sauce One', 'Nunito Sans', -apple-system, sans-serif;font-weight: 500;">
                                            Pengiriman
                                        </h3>
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
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 card">
                        <h3 class="pt-2" style="font-family: 'Open Sauce One', 'Nunito Sans', -apple-system, sans-serif;font-weight: 500;">Ringkasan Belanja</h3>
                        <div class="mt-auto">
                                <input type="hidden" id="harga" value="<?php echo $produk['harga']; ?>">
                                <input type="hidden" id="stok" value="<?php echo $produk['stok']; ?>">
                                <input type="hidden" id="sisa" value="<?php echo $produk['stok']-$jumlah['value']; ?>" name="sisa">
                                <div>
                                    <div>Lakukan Pembayaran dengan Transfer melalui</div>
                                    <div>Bca: 62373828838298</div>
                                    <div>Mandiri: 62373828838298</div>
                                </div>
                                <div class="mt-2">
                                    <div>Unggah Bukti Pembayaran (jpg/png)*</div>
                                    <div>
                                        <div class="custom-file">
                                        <?php echo form_upload($bukti_pembayaran, '', 'accept="image/*" class="custom-file-input" id="uploadbukti"" lang="in" '); ?>
                                        <label class="custom-file-label" for="uploadbukti">Pilih File untuk Unggah Bukti Pembayaran</label>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="mt-auto">
                            <div>
                                <h5 class="mt-4">Total Harga: 
                                    <input type="text" name="subtotal" class="number-to-text" value="<?php echo IDR($produk['harga']*$jumlah['value']); ?>" id="subtotal" style="border: none; outline: none; background: white" disabled>
                                </h5>
                            </div>
                        </div>
                            <button type="submit" class="btn btn-info mb-3" <?php if(!$this->session->userdata('role') == 'User' || empty($produk['stok'])){
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
    const formatRupiah = (money) => {
        return new Intl.NumberFormat('id-ID',
            { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }
        ).format(money);
    }
   function total() {
       var harga = $("#harga").val();
       var jumlah = $("#jumlah").val();
       var stok = $("#stok").val();
       var subtotal = parseInt(harga*jumlah);
       var sisa = parseInt(stok-jumlah);
       $("#subtotal").val(formatRupiah(subtotal));
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