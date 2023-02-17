<section class="content-header">
    <h1>Tambah Santri</h1>
</section>

<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box">
                <div class="box-header with-border">
                    <!--<h3 class="box-title">Quick Example</h3>-->
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="?hal=santri_insert" method="post" role="form">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="nis">No. Induk Santri</label>
                            <input type="text" class="form-control"
                                   name="nis"
                                   id="nis"
                                   placeholder="No. Induk Santri" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_santri">Nama Santri</label>
                            <input type="text" class="form-control"
                                   name="nama_santri"
                                   id="nama_santri"
                                   placeholder="Nama santri" required>
                        </div>
                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="jk" id="jk" value="L" required> Laki-laki
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="jk" id="jk" value="P"> Perempuan
                                </label>
                            </div>
                        </div>

                       <div class="form-group">
                           <label for="id_asrama">Asrama</label>
                           <select class="form-control" name="id_asrama" id="id_asrama" required>
                               <option value=""> - Pilih Asrama - </option>
                               <?php
                               $query_asrama=mysqli_query($con,"SELECT * FROM asrama");
                               while ($j=mysqli_fetch_array($query_asrama)){
                                   echo "<option value='$j[id_asrama]'> $j[nama_asrama] </option>";
                               }
                               ?>
                           </select>
                       </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <button type="reset" class="btn btn-warning">Reset</button>
                        <a class="btn btn-danger" href="?hal=santri_tampil">Batal</a>
                    </div>
                </form>
            </div>
            <!-- /.box -->

        </div>
        <!--/.col (left) -->
    </div>
</section>