<section class="content">
    <div class="landpage container-fluid">
        <div class="h-100" style="margin: 75px 34px 0 34px;">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-md-2">
                        <?php if (!$foto['value']) { ?>
                            <img src="<?php echo site_url('assets/admin-page/images/500x300.png'); ?>" class="img-responsive fotoproduk">
                        <?php } else { ?>
                            <img src="<?php echo site_url('uploads/foto-produk/'.$foto['value']); ?>" class="img-responsive fotoproduk">
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <h1 style="font-family: 'Open Sauce One', 'Nunito Sans', -apple-system, sans-serif;font-weight: 500;">
                        <?php echo $produk['nama_produk']; ?>
                    </h1>
                    <div class="price">
                        <?php echo IDR($produk['harga']); ?>
                    </div>
                    <br>
                    <p>
                        Kategori: <?php echo Kategori($produk['id_kategori'], 'nama_kategori'); ?>
                    </p>
                    <p>
                        <?php echo $produk['deskripsi']; ?>
                    </p>
                </div>
                <?php echo form_open_multipart('belanja/belanja_add', 'class="col-lg-4 col-md-12 col-sm-12 col-xs-12 card"') ?>
                    <h3 class="my-3" style="font-family: 'Open Sauce One', 'Nunito Sans', -apple-system, sans-serif;font-weight: 500;">Atur Jumlah Pembelian</h3>
                    <?php if(!empty($produk['stok'])) { ?>
                        <div class="d-flex justify-content-center">
                            <div style="border: 1px solid #BFC9D9;padding: 10px;width: fit-content; border-radius: 8px;">
                                <input type="button" onclick="decrement()" value="-" class="button-minus border rounded-circle  icon-shape icon-sm mx-1 pb-1" data-field="quantity">
                                <?php echo form_input($jumlah, '', 'type="number" class="number-to-text text-center" onkeyup="total()" id="jumlah" min="1" max="'.$produk['stok'].'" required autocomplete="off" style="outline: 0; border: none;"'); ?>
                                <input type="button" onclick="increment()" value="+" class="button-plus border rounded-circle icon-shape icon-sm " data-field="quantity">
                            </div>
                            <!-- <input type="number" class="number-to-text" onkeyup="total()" id="jumlah" min="1" max="<?php echo $produk['stok']; ?>" required name="jumlah"> -->
                            <input type="hidden" id="harga" value="<?php echo $produk['harga']; ?>">
                            <input type="hidden" id="stok" value="<?php echo $produk['stok']; ?>">
                            <?php echo form_input($id_produk, $produk['id_produk'], ' style="display: none;"'); ?>
                        </div>
                    <p>Stok: <?php echo $produk['stok']; ?></p>
                    <div class="mt-auto">
                        <h5>Subtotal: 
                            <input type="text" class="number-to-text" id="subtotal" style="border: none; outline: none; background: white" disabled>
                        </h5>
                    </div>
                    <?php } else {?>
                        <p>Stok: Habis</p>
                    <?php } ?>
                    <button type="submit" class="btn btn-info" <?php if(!$this->session->userdata('role') == 'User' || empty($produk['stok'])){
                        echo 'disabled';
                    } ?> name="submit" value="keranjang"><i class="fas fa-plus mr-1"></i>Keranjang</button>
                    <button type="submit" class="btn btn-info mb-3" <?php if(!$this->session->userdata('role') == 'User' || empty($produk['stok'])){
                        echo 'disabled';
                    } ?> name="submit" value="beli_langsung">Beli Sekarang</button>
                <?php echo form_close(); ?>
            </div>
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