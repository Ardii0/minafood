<div class="landpage container-fluid">
    <div class="h-100" style="margin: 75px 34px 0 34px;">
    <h2>Produk Kami</h2>
    <div class="row smooth-scroll">
        <?php foreach($produk as $data): ?>
            <div class="col-lg-2 col-md-4 col-xs-6 d-flex justify-content-center mb-4">
                <a href="<?php echo base_url('belanja/detail/'.$data->id_produk); ?>" class="black-text" style="width: 188px; height: 380px; background-color: white; border-radius: 4px; box-shadow: rgba(0, 0, 0, 0.16) 0px 2px 5px 0px, rgba(0, 0, 0, 0.12) 0px 2px 10px 0px">
                <?php if (!$data->foto) { ?>
                    <img src="<?php echo site_url('assets/admin-page/images/500x300.png'); ?>" height="188px" width="188px" class="card-img-top" alt="ProductPicture">
                <?php } else { ?>
                    <img src="<?php echo site_url('uploads/foto-produk/' . $data->foto); ?>" height="188px" width="188px" class="card-img-top" alt="ProductPicture">
                <?php } ?>
                <div class="p-3">
                    <h5 class="card-title truncate"><?php echo $data->nama_produk?></h5>
                    <b class="card-text"><?php echo IDR($data->harga)?></b>
                    <p class="card-text">--</p>
                    <p class="card-text"><?php echo Kategori($data->id_kategori, 'nama_kategori')?></p>
                    <p class="card-text">Stok : 
                    <?php if(empty($data->stok)) {?>
                        Habis
                    <?php } else { echo $data->stok; } ?></p>
                </div>
                </a>
            </div>
        <?php endforeach; ?>
        <!-- <?php foreach($productsbycategory as $categoryName => $row) : ?>
            <div>
                <h4><?php echo $categoryName;?></h4>
                <?php foreach($row as $product) : ?>
                    <div><h6><?php echo anchor('method/', $row['nama_produk']); ?></h6></div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?> -->
    </div>
    </div>
</div>