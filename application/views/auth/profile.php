<section class="content">
    <div class="landpage container" style="min-height: 100vh;">
        <div class="h-100" style="margin: 100px 34px 0 34px;">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12" style="position: relative;">
                    <?php echo form_open_multipart('profile/upload_foto', ' id="upload" class="card" style="padding: 16px; position: absolute;"') ?>
                        <?php if (!$user['foto']) { ?>
                            <img src="<?php echo site_url('assets/admin-page/images/500x300.png'); ?>" class="img-responsive" style="max-width: 258px; max-height: 258px; margin: auto;">
                        <?php } else { ?>
                            <img src="<?php echo site_url('uploads/foto-profil/'.$user['foto']);?>" class="img-responsive" style="max-width: 258px; max-height: 258px; margin: auto;" alt="">
                        <?php } ?>
                        <!-- <button class="btn btn-light">Pilih Foto</button> -->
                            <?php echo form_upload($foto, '', 'accept="image/*" onchange="getFile(); upload();" class="upload_fotoprofil mt-2"'); ?>
                    <?php echo form_close(); ?>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <h4>Biodata Diri</h4>
                    <table>
                        <tr>
                            <td style="margin: 40px">Username&ensp;&ensp;</td>
                            <td><?php echo $user['username'] ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?php echo $user['email'] ?></td>
                        </tr>
                    </table>
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