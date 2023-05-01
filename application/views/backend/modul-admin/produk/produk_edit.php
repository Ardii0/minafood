<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Ubah Produk
                        </h2>
                    </div>
                    <div class="body">
                        <?php echo form_open_multipart('produk/produk_edit/' . $id_produk['value'], 'class="form-horizontal"') ?>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="nama_produk">Nama Produk</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <?php echo form_input($nama_produk, $nama_produk['value'], 'class="form-control" autocomplete="off" placeholder="Masukkan Nama Produk" required') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="id_kategori">Kategori</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <?php
                                    $options = array();
                                    foreach ($kategori as $val) {
                                        $options[$val->id_kategori] = $val->nama_kategori;
                                    }
                                    echo form_dropdown($id_kategori, $options, $id_kategori['value']);
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="id_tipe">Tipe</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <?php
                                        $options = array();
                                        foreach ($tipe as $val) {
                                            $options[] = 'Batalkan';
                                            $options[$val->id_tipe] = $val->nama_tipe;
                                        }
                                        echo form_dropdown($id_tipe, $options, $id_tipe['value']);
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="harga">Harga</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <?php echo form_input($harga, $harga['value'], 'class="form-control" autocomplete="off" minlength="3" placeholder="Masukkan Harga" required') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="stok">Stok</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <?php echo form_input($stok, $stok['value'], 'class="form-control" autocomplete="off" placeholder="Masukkan Stok" required') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="foto">Gambar (.jpg/.png)</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <?php echo form_upload($foto); ?>
                                    </div>
                                </div>
                            </div>
                            <?php if (!empty($foto['value'])) { ?>
                                <div class="col-md-2">
                                    <a href="<?php echo site_url('uploads/foto-produk/' . $foto['value']); ?>" class="thumbnail">
                                        <?php echo img('uploads/foto-produk/' . $foto['value'], 'class="img-responsive"') ?>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="deskripsi">Deskripsi</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <?php echo
                                            form_textarea($deskripsi, '', 'id="ckeditor"');
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
                                <?php echo anchor($_SERVER['HTTP_REFERER'], 'Kembali', 'class="btn btn-warning m-t-15 waves-effect"') ?>
                            </div>
                            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                <?php echo form_submit('simpan', 'Simpan', 'class="btn btn-primary m-t-15 waves-effect"') ?>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>