<section class="content">
    <div class="landpage container">
        <div class="h-100" style="margin: 75px 34px 0 34px;">
            <?php echo form_open_multipart('belanja/beli', '') ?>
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <div class="col">
                        <?php foreach($beli as $data): ?>
                            <div class="card pt-2 pr-3 pl-3 pb-3 mb-3">
                                <h3 style="font-family: 'Open Sauce One', 'Nunito Sans', -apple-system, sans-serif;font-weight: 500;">Barang yang dibeli</h3>
                                <div class="d-flex">
                                <?php if (!Produk($data->id_produk, 'foto')) { ?>
                                    <img src="<?php echo site_url('assets/admin-page/images/500x300.png'); ?>" class="img-responsive fotoproduk_bayar">
                                <?php } else { ?>
                                    <img src="<?php echo site_url('uploads/foto-produk/'.Produk($data->id_produk ,'foto')); ?>" class="img-responsive fotoproduk_bayar">
                                <?php } ?>
                                    <div class="ml-2">
                                        <h4>
                                            <?php echo Produk($data->id_produk, 'nama_produk') ?>
                                        </h4>
                                        <div class="price_bayar">
                                            <?php echo IDR(Produk($data->id_produk, 'harga')) ?>
                                        </div>
                                        <!-- <p>Stok: <?php echo Produk($data->id_produk, 'stok') ?></p> -->
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
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
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 card" style="height: 405.984px;">
                        <h3 class="pt-2" style="font-family: 'Open Sauce One', 'Nunito Sans', -apple-system, sans-serif;font-weight: 500;">Ringkasan Belanja</h3>
                        <div class="mt-auto">
                            <input type="hidden" id="harga" value="<?php echo Produk($data->id_produk, 'harga') ?>">
                            <input type="hidden" id="stok" value="<?php echo Produk($data->id_produk, 'stok') ?>">
                            <input type="hidden" id="sisa" value="<?php echo Produk($data->id_produk, 'stok')-$data->jumlah ?>" name="sisa">
                            <div>
                                <div>Lakukan Pembayaran dengan Transfer melalui</div>
                                <div>Bca: 62373828838298</div>
                                <div>Mandiri: 62373828838298</div>
                            </div>
                            <div class="mt-2">
                                <div>Unggah Bukti Pembayaran (jpg/png)*</div>
                                <div>
                                    <div class="custom-file">
                                    <?php echo form_upload($bukti_pembayaran, '', 'accept="image/*" class="custom-file-input" id="uploadbukti" lang="in" required'); ?>
                                    <label class="custom-file-label" for="uploadbukti">Pilih File untuk Unggah Bukti Pembayaran</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-auto">
                            <!-- <div>
                                <h5 class="mt-4">Total Harga: 
                                    A<?php echo $total->total ?><br>
                                    <?php foreach($beli as $bl): ?>
                                        <?php echo Produk($bl->id_produk, 'harga')*$bl->jumlah ?>
                                    <?php endforeach; ?>
                                    <input type="text" name="subtotal" class="number-to-text" value="<?php echo IDR(Produk($data->id_produk, 'harga')*$data->jumlah); ?>" id="subtotal" style="border: none; outline: none; background: white" disabled>
                                </h5>
                            </div> -->
                        </div>
                        <button type="submit" class="btn btn-info mb-3" <?php if(!$this->session->userdata('role') == 'User' || empty($data->id_produk)){
                            echo 'disabled style="cursor: not-allowed;"';
                        } ?>>Beli Sekarang</button>
                    </div>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</section>
<!-- <script>
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
</script> -->