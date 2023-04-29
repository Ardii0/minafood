<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Akun</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Data akun pengguna
                        </h2>
                    </div>
                    <div class="body">
                        <?php echo form_open_multipart('akun', 'class="form-horizontal"') ?>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="username">Nama</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <?php echo form_input($username, $username['value'], 'class="form-control" placeholder="Masukkan nama"'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="email">Alamat surel</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <?php echo form_input($email, $email['value'], 'class="form-control" placeholder="Masukkan alamat surel"'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="password">Kata Sandi</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <?php echo form_input($password, '', 'class="form-control" minlength="5" placeholder="Masukkan Kata Sandi"'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="passconf">Konfirmasi Kata Sandi</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <?php echo form_input($passconf, '', 'class="form-control" minlength="5" placeholder="Ulangi Kata Sandi"'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="upload">foto<br>Maks 2Mb<br>(Upload Foto -> Simpan)</label>
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
                                    <a href="<?php echo site_url('uploads/foto-profil/' . $foto['value']); ?>" class="thumbnail">
                                        <?php echo img('uploads/foto-profil/' . $foto['value'], 'class="img-responsive"') ?>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                <?php echo
                                    form_submit('submit-akun', 'Simpan', 'class="btn btn-primary m-t-15 waves-effect"');
                                ?>
                            </div>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>