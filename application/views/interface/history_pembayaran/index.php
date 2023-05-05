<section class="content">
    <div class="landpage container-fluid">
        <div class="h-100" style="margin: 75px 34px 0 34px;">
            <div class="row clearfix">  
                <h2>History Pembayaran</h2>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead class="bg-blue">
                                    <tr>
                                        <th style="width: 2%;">No</th>
                                        <th>Nama Produk</th>
                                        <th>Kode Pembayaran</th>
                                        <th>Bukti Pembayaran</th>
                                        <th>Total</th>
                                        <th>Status Pembayaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $id=1; foreach($history as $data):?>
                                        <tr>
                                            <td><?php echo $id++; ?></td>
                                            <td><?php echo Produk($data->id_produk, 'nama_produk'); ?></td>
                                            <td><?php echo $data->kode_pembayaran; ?></td>
                                            <td>
                                                <a href="<?php echo site_url('uploads/bukti_pembayaran/'.$data->bukti_pembayaran); ?>" class="thumbnail">
                                                    <img src="<?php echo site_url('uploads/bukti_pembayaran/'.$data->bukti_pembayaran); ?>" class="img-responsive" style="max-width: 125px; max-height: 125px;">
                                                </a>
                                            </td>
                                            <td><?php echo IDR($data->subtotal); ?></td>
                                            <td><?php echo $data->status; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>