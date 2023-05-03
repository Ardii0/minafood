<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="alert <?php if($detail['status'] == 'Belum Dikonfirmasi') { echo 'alert-info'; } else { echo 'alert-success'; }; ?>" style="margin: 0 0 50px 0;">
                    Status Pembayaran: <?php echo $detail['status']; ?>
                </div>
                <div class="card">
                    <div class="body" style="margin: -20px 0 0 0;">
                        <div class="ml-4" style="display: flex">
                            <img src="<?php echo site_url('uploads/foto-produk/'.Produk($detail['id_produk'], 'foto')); ?>" class="img-responsive fotoproduk_bayar" style="margin: 0 20px 0 0;">
                            <div class="ml-2" class="margin: 0 0 0 200px;">
                                <span style="font-size: 28px;">
                                    <?php echo Produk($detail['id_produk'], 'nama_produk'); ?>
                                </span>
                                <div class="price_bayar" style="margin: 0 0 0 0;">
                                    <?php echo IDR(Produk($detail['id_produk'], 'harga')); ?>
                                </div>
                                <div class="text-right">
                                    <h5>
                                        x<?php echo $detail['jumlah']; ?>
                                    </h5>
                                </div>
                            </div>
                            <div class="ml-2" class="margin: 0 0 0 300px;">
                                <div>
                                   <span>Subtotal: </span><h4><?php echo IDR($detail['subtotal']); ?></h4> 
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="body table-responsive">
                                <table class="table table-striped table-hover">
                                    <tbody>
                                        <tr class="bg-teal">
                                            <th colspan="4">
                                                <div style="display: flex; justify-align: center;">
                                                    <i class="material-icons">location_on</i>
                                                    <p style="margin: 5px 0 0 0;"> Alamat Pengirim</p>
                                                </div>
                                            </th>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Nama Penerima</td>
                                            <td>: </td>
                                            <td><?php echo Alamat($detail['id_alamat'], 'nama_penerima'); ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">No Telp.</td>
                                            <td>: </td>
                                            <td><?php echo Alamat($detail['id_alamat'], 'nomor_hp'); ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Alamat</td>
                                            <td>: </td>
                                            <td><?php echo Alamat($detail['id_alamat'], 'alamat'); ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Kode Pos</td>
                                            <td>: </td>
                                            <td><?php echo Alamat($detail['id_alamat'], 'kode_pos'); ?></td>
                                        </tr>
                                        <tr class="bg-teal">
                                            <th colspan="4">Detail Pesanan</th>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Waktu Pembelian</td>
                                            <td>: </td>
                                            <td><?php echo $detail['detail_waktu']; ?></td>
                                        </tr>
                                        <?php if($detail['status'] === 'Telah Dikonfirmasi' && isset($detail['waktu_konfirmasi'])) {?>
                                            <tr>
                                                <td colspan="2">Waktu Konfirmasi</td>
                                                <td>: </td>
                                                <td><?php echo $detail['waktu_konfirmasi']; ?></td>
                                            </tr>
                                        <?php }?>
                                        <!-- <tr class="bg-teal">
                                            <th colspan="4">Detail Wirausaha</th>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Nama Usaha</td>
                                            <td>: </td>
                                            <td><?php echo Alamat($detail['id_alamat'], 'alamat'); ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Jenis Usaha</td>
                                            <td>: </td>
                                            <td><?php echo Alamat($detail['id_alamat'], 'alamat'); ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Tahun Usaha</td>
                                            <td>: </td>
                                            <td><?php echo Alamat($detail['id_alamat'], 'alamat'); ?></td>
                                        </tr>
                                        <tr class="bg-teal">
                                            <th colspan="4">Detail Perguruan Tinggi</th>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Nama Perguruan Tinggi</td>
                                            <td>: </td>
                                            <td><?php echo Alamat($detail['id_alamat'], 'alamat'); ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Jurusan</td>
                                            <td>: </td>
                                            <td><?php echo Alamat($detail['id_alamat'], 'alamat'); ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Tahun Masuk Perguruan Tinggi</td>
                                            <td>: </td>
                                            <td><?php echo Alamat($detail['id_alamat'], 'alamat'); ?></td>
                                        </tr> -->
                                    </tbody>
                                </table>
                                <?php echo anchor('data-angkatan/data-angkatan-detail/' . $detail['id_alamat'], '<i class="material-icons">keyboard_backspace</i><span>Kembali</span>', 'class="btn btn-primary waves-effect"'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>