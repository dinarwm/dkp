<script>
function deldata() {
    return confirm('Apakah Anda yakin akan menghapus data ini?');
  }
</script>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Status Barang
            <small>Daftar Jenis Barang</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-users"></i> Pencarian</a></li>
            <li class="active"> Barang</li>
          </ol>

        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">

                 <div class="box-body">
                  <form action="#" method="post" role="form">
                    <div class="form-group col-xs-3">
                      <label>Bidang</label>
                      <div class="input-group">
                        <select class="form-control" name='id_bidang'>

                          <?php
                            
                            foreach ($nama_bidang as $row) {
                                echo '<option value="' . $row->id_bidang . '" selected >' .$row->nama_bidang.'</option>';
                              }
                            ?>
                        </select>
                      </div><!-- /.input group -->
                    </div>
                      <div class="form-group col-xs-3">
                      <label>Kasi</label>
                      <div class="input-group">
                        <select class="form-control" name='id_kasi'>

                          <?php
                            
                            foreach ($nama_kasi as $row) {
                                echo '<option value="' . $row->id_kasi . '" selected >' .$row->nama_kasi.'</option>';
                              }
                            ?>
                        </select>
                      </div><!-- /.input group -->
                      </div>
                      <div class="form-group col-xs-3">
                      <label>Gudang</label>
                      <div class="input-group">
                        <select class="form-control" name='id_gudang'>

                          <?php
                            
                            foreach ($nama_gudang as $row) {
                                echo '<option value="' . $row->id_gudang . '" selected >' .$row->nama_gudang.'</option>';
                              }
                            ?>
                        </select>
                      </div><!-- /.input group -->
                    </div>
                      <div class="form-group col-xs-3">
                      <label>Rak</label>
                      <div class="input-group">
                        <select class="form-control" name='id_rak'>

                          <?php
                            
                            foreach ($nama_rak as $row) {
                                echo '<option value="' . $row->id_rak . '" selected >' .$row->nama_rak.'</option>';
                              }
                            ?>
                        </select>

                      </div><!-- /.input group --> 
                    </div>
                    </div><!-- /.form group -->

                  

                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style="background-color:#FACC2E!important" width="30px">NO</th>
                        <th style="background-color:#FACC2E!important">BIDANG</th>
                        <th style="background-color:#FACC2E!important">KASI</th>
                        <th style="background-color:#FACC2E!important">GUDANG</th>
                        <th style="background-color:#FACC2E!important">RAK</th>
                        <th style="background-color:#FACC2E!important">JENIS BARANG</th>
                        <th style="background-color:#FACC2E!important">KODE REK</th>
                        <th style="background-color:#FACC2E!important">NAMA BARANG</th>
                        <th style="background-color:#FACC2E!important">STATUS</th>
                        <th style="background-color:#FACC2E!important">AKSI</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $count=1;
                        if($list != NULL)
                        {
                          // foreach ($site_operation as $row)
                          // {
                          //   $id = $row->id_so;
                          //   # code...
                          // }
                          foreach($list as $row)
                        {
                      ?>
                      <tr>
                        <th><?php echo $count; ?></th>
                        <th> <?php echo $row->nama_bidang;?></th>
                        <th><?php echo $row->nama_kasi;?> </th>
                        <th><?php echo $row->nama_gudang; ?></th>
                        <th><?php echo $row->nama_rak; ?></th>
                        <th> <?php echo $row->nama_jenis;?></th>
                        <th><?php echo $row->nomor_kpb;?> </th>
                        <th><?php echo $row->nama_barang; ?></th>
                        <th><?php echo $row->nama_status; ?></th>
                          <th><select class="form-control name='id_status'">
                            <?php
                            
                            foreach ($nama_status as $row) {
                                echo '<option value="' . $row->id_status . '" selected >' .$row->nama_status.'</option>';
                              }
                            ?>

                          </select></th>
                      </tr>
                      <?php $count = $count + 1; } }?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th style="background-color:#FACC2E!important">NO</th>
                        <th style="background-color:#FACC2E!important">BIDANG</th>
                        <th style="background-color:#FACC2E!important">KASI</th>
                        <th style="background-color:#FACC2E!important">GUDANG</th>
                        <th style="background-color:#FACC2E!important">RAK</th>
                        <th style="background-color:#FACC2E!important">JENIS BARANG</th>
                        <th style="background-color:#FACC2E!important">KODE REK</th>
                        <th style="background-color:#FACC2E!important">NAMA BARANG</th>
                        <th style="background-color:#FACC2E!important">STATUS</th>
                        <th style="background-color:#FACC2E!important">AKSI</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper --><script>
function deldata() {
    return confirm('Apakah Anda yakin akan menghapus data ini?');
  }
</script>
      <!-- Content Wrapper. Contains page content -->
    

        <!-- Main content -->
        <!-- <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style="background-color:#FACC2E!important" width="30px">NO</th>
                        <th style="background-color:#FACC2E!important">NAMA BARANG</th>
                        <th style="background-color:#FACC2E!important">STOK</th>
                        <th style="background-color:#FACC2E!important">NOMOR KPB</th>
                        <th style="background-color:#FACC2E!important">AKSI</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th style="background-color:#FACC2E!important">NO</th>
                        <th style="background-color:#FACC2E!important">NAMA BARANG</th>
                        <th style="background-color:#FACC2E!important">STOK</th>
                        <th style="background-color:#FACC2E!important">NOMOR KPB</th>
                        <th style="background-color:#FACC2E!important">AKSI</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content --> -->
      </div><!-- /.content-wrapper -->