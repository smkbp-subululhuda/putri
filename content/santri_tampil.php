<section class="content-header">
    <h1>Data Santri</h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <!--<h3 class="box-title">Data Table With Full Features</h3>-->
                    <a class="btn btn-md btn-info"
                       href="?hal=santri_tambah"> Tambah Santri </a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama Santri</th>
                            <th>Jenis Kelamin</th>
                            <th>Asrama</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
<?php
$tampil = "SElECT * FROM view_santri";
$query = mysqli_query($con,$tampil);
$no=0;
while ($data = mysqli_fetch_array($query)) {
//        var_dump($data);
$no++;
?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $data['nis']; ?></td>
                            <td><?= $data['nama_santri']; ?></td>
                            <td><?= $data['jk']; ?></td>
                            <td><?= $data['nama_asrama']; ?></td>
                            <td>
                                <!-- Modifikasi tombol edit dan hapus-->
                                <a class="btn btn-sm btn-warning"
                                   href="?hal=santri_edit&id=<?= $data['id_santri'] ?>"> Edit </a>
                                <a class="btn btn-sm btn-danger"
                                   href="?hal=santri_delete&id=<?= $data['id_santri'] ?>"> Hapus </a>
                            </td>
                        </tr>
<?php
}
?>
                        </tbody>

                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>