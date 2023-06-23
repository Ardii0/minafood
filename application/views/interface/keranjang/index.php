<section class="content">
    <div class="landpage container-fluid">
        <div class="h-100" style="margin: 75px 34px 0 34px;">
            <div class="row clearfix">  
                <h2>Keranjang</h2>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead class="bg-blue">
                                    <tr>
                                        <th style="width: 2%;">No</th>
                                        <th>Nama Produk</th>
                                        <th>Jumlah</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $id=1; foreach($keranjang as $data):?>
                                        <tr>
                                            <td><?php echo $id++; ?></td>
                                            <td><?php echo Produk($data->id_produk, 'nama_produk'); ?></td>
                                            <td><?php echo $data->jumlah; ?></td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <?php echo anchor('belanja/beli', '<i class="fas fa-shopping-cart"></i>', 'class="btn btn-warning btn-sm mr-2"'); ?>
                                                    <?php echo anchor('belanja/keranjang_delete/'.$data->id_keranjang, '<i class="fas fa-trash"></i>', 'class="btn btn-danger btn-sm"'); ?>
                                                </div>
                                            </td>
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