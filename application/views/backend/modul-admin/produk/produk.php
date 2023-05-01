<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <?php echo anchor('produk/add_produk', '<i class="material-icons">add</i><span>Tambah Produk</span>', 'class="btn btn-primary waves-effect"') ?>
                    </div>
                    <div class="body">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead class="bg-blue">
                                <tr>
                                    <th style="width: 2%;">No</th>
                                    <th>Foto</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <!-- <th>Tipe</th> -->
                                    <th>Stok</th>
                                    <th style="width: 75px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $id=1; foreach($produk as $data):?>
                                    <tr>
                                        <td><?php echo $id++; ?></td>
                                        <td class="col-xs-6 col-md-2" style="vertical-align: middle;">
                                            <div>
                                                <?php if (!$data->foto) { ?>
                                                    <a href="<?php echo site_url('assets/admin-page/images/500x300.png'); ?>" class="thumbnail">
                                                        <img src="<?php echo site_url('assets/admin-page/images/500x300.png'); ?>" class="img-responsive" style="max-width: 125px; max-height: 125px;">
                                                    </a>
                                                <?php } else { ?>
                                                    <a href="<?php echo site_url('uploads/foto-produk/' . $data->foto); ?>" class="thumbnail">
                                                        <img src="<?php echo site_url('uploads/foto-produk/' . $data->foto); ?>" class="img-responsive" style="max-width: 125px; max-height: 125px;">
                                                    </a>
                                                <?php } ?>
                                            </div>
                                        </td>
                                        <td><?php echo $data->kode_produk; ?></td>
                                        <td><?php echo $data->nama_produk; ?></td>
                                        <td><?php echo namaKategori($data->id_kategori); ?></td>
                                        <!-- <td><?php echo namaTipe($data->id_tipe); ?></td> -->
                                        <td><?php echo $data->stok; ?></td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <?php echo anchor('produk/produk_edit/'.$data->id_produk, '<i class="material-icons">edit</i>', 'class="btn btn-warning btn-circle waves-effect waves-circle waves-float"'); ?>
                                                <?php echo anchor('produk/produk_delete/'.$data->id_produk, '<i class="material-icons">delete</i>', 'class="btn btn-danger btn-circle waves-effect waves-circle waves-float"'); ?>
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
</section>