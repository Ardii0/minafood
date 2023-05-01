<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <?php echo anchor('produk/tipe_add', '<i class="material-icons">add</i><span>Tambah Tipe</span>', 'class="btn btn-primary waves-effect"') ?>
                    </div>
                    <div class="body">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead class="bg-blue">
                                <tr>
                                    <th style="width: 2%;">No</th>
                                    <th>Nama</th>
                                    <th style="width: 75px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $id=1; foreach($tipe as $data):?>
                                    <tr>
                                        <td><?php echo $id++; ?></td>
                                        <td><?php echo $data->nama_tipe; ?></td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <?php echo anchor('produk/tipe_edit/'.$data->id_tipe, '<i class="material-icons">edit</i>', 'class="btn btn-warning btn-circle waves-effect waves-circle waves-float"'); ?>
                                                <?php echo anchor('produk/tipe_delete/'.$data->id_tipe, '<i class="material-icons">delete</i>', 'class="btn btn-danger btn-circle waves-effect waves-circle waves-float"'); ?>
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