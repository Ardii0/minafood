<section class="content">
    <div class="landpage container" style="min-height: 100vh;">
        <div class="h-100" style="margin: 80px 34px 0 34px;">
            <h3 style="font-family: 'Open Sauce One', 'Nunito Sans', -apple-system, sans-serif;font-weight: 500;">
                Tambahkan Alamat
            </h3>
            <div class="row clearfix" style="margin: auto;">
                <?php echo form_open_multipart('profile/alamat', 'class="card p-3 col form-horizontal"') ?>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="nama_penerima">Nama Penerima</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <?php echo form_input($nama_penerima, '', 'class="form-control" autocomplete="off" placeholder="Masukkan Nama Penerima" required') ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="nomor_hp">Nomor HP</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <?php echo form_input($nomor_hp, '', 'class="form-control" autocomplete="off" minlength="3" placeholder="Masukkan Nomor HP" required') ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="kota">Kota</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <?php echo form_input($kota, '', 'class="form-control" autocomplete="off" placeholder="Masukkan Kota" required') ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="alamat">Alamat</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <?php echo
                                    form_textarea($alamat, '', 'class="form-control"');
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="kode_pos">Kode Pos</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <?php echo form_input($kode_pos, '', 'class="form-control" autocomplete="off" placeholder="Masukkan Kode Pos" required') ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                        <?php echo form_submit('simpan-produk', 'Simpan', 'class="btn btn-primary m-t-15 waves-effect"') ?>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</section>