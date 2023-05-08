<section class="content">
    <div class="landpage container" style="min-height: 100vh;">
        <div class="h-100" style="margin: 100px 34px 0 34px;">
            <div class="row clearfix" style="margin: auto;">
                <div style="position: relative; margin: 0 0 0 160px;">
                    <?php echo form_open_multipart('profile/upload_foto', ' id="upload" class="card" style="padding: 16px; position: absolute;"') ?>
                        <?php if (!$user['foto']) { ?>
                            <img src="<?php echo site_url('assets/admin-page/images/500x300.png'); ?>" class="img-responsive" style="max-width: 258px; max-height: 258px; margin: auto;">
                        <?php } else { ?>
                            <img src="<?php echo site_url('uploads/foto-profil/'.$user['foto']);?>" class="img-responsive" style="max-width: 258px; max-height: 258px; margin: auto;" alt="">
                        <?php } ?>
                            <div class="custom-file" style="margin: 10px 0 0 0;">
                                <?php echo form_upload($foto, '', 'accept="image/*" onchange="getFile(); upload();" class="upload_fotoprofil mt-2 custom-file-input" id="uploadbukti"" lang="in"'); ?>
                                <label class="custom-file-label" for="uploadbukti">Pilih Foto</label>
                            </div>
                            <button type="submit" id="upfile" hidden=""></button>
                    <?php echo form_close(); ?>
                </div>
                <div style="margin-left: 350px; font-family: 'Open Sauce One', 'Nunito Sans', -apple-system, sans-serif;font-weight: 500; color: #6D7588">
                    <div>
                        <h4>Biodata Diri</h4>
                        <table>
                            <tr>
                                <td style="padding: 20px 0 0 0;">Username&ensp;&ensp;</td>
                                <td style="padding: 20px 0 0 40px;"><?php echo $user['username'] ?></td>
                            </tr>
                            <tr>
                                <td style="padding: 20px 0 0 0;">Email</td>
                                <td style="padding: 20px 0 0 40px;"><?php echo $user['email'] ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="mt-5">
                        <h4>Kontak</h4>
                        <?php if(isset($this->db->select('alamat')->where("id_user", $this->session->userdata('id_user'))->limit(1)->get('alamat')->row()->alamat)){ ?>
                            <table>
                                <tr>
                                    <td style="padding: 20px 0 0 0;">Alamat&ensp;&ensp;</td>
                                    <td style="padding: 20px 0 0 40px;">
                                        <?php echo $this->db->select('alamat')->where("id_user", $this->session->userdata('id_user'))->limit(1)->get('alamat')->row()->alamat;?>
                                    </td>
                                </tr>
                            </table>
                        <?php } else {?>
                            <table>
                                <tr>
                                    <td style="padding: 20px 0 0 0;">Alamat Kosong</td>
                                    <td style="padding: 20px 0 0 30px;">
                                        <a href="<?php echo base_url('profile/alamat')?>">
                                        Isi Alamat
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function upload() {
        var button = document.getElementById('upload');
        button.submit();
    }

    function getFile(){
     document.getElementById("upfile").click();
    }
</script>