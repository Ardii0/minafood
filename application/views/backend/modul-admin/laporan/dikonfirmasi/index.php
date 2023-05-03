<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead class="bg-blue">
                                <tr>
                                    <th style="width: 2%;">No</th>
                                    <th>Nama User</th>
                                    <th>Kode Pembayaran</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Harga Total</th>
                                    <th>Tanggal Konfirmasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $id=1; foreach($conf as $data):?>
                                    <tr>
                                        <td><?php echo $id++; ?></td>
                                        <td><?php echo Akun($data->id_user, 'username'); ?></td>
                                        <td><?php echo $data->kode_pembayaran; ?></td>
                                        <td><?php echo Produk($data->id_produk, 'nama_produk'); ?></td>
                                        <td><?php echo IDR(Produk($data->id_produk, 'harga')); ?></td>
                                        <td><?php echo $data->jumlah; ?></td>
                                        <td><?php echo IDR($data->subtotal); ?></td>
                                        <td><?php echo $data->waktu_konfirmasi; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>