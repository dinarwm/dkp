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
            Rekap Penyaluran Barang
            <small>Laporan Penyaluran Barang</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-users"></i> Report</a></li>
            <li class="active"> Rekap Penyaluran Barang</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style="background-color:#FACC2E!important" width="30px">NO</th>
                        <th style="background-color:#FACC2E!important">NOMOR SURAT</th>
                        <th style="background-color:#FACC2E!important">TANGGAL PENYALURAN</th>
                        <th style="background-color:#FACC2E!important">NAMA BARANG</th>
                        <th style="background-color:#FACC2E!important">JUMLAH BARANG</th>
                        <th style="background-color:#FACC2E!important">NAMA PENERIMA</th>
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
                        <th> <?php echo $row->nomor_surat;?></th>
                        <th><?php echo $row->tgl_penyaluran; ?></th>
                        <th><?php echo $row->nama_barang; ?></th>
                        <th><?php echo $row->jumlah_barang; ?></th>
                        <th><?php echo $row->nama_penerima; ?></th>

                          <th>
                          <a href="  "><i class="fa fa-eye text-red"></i></a></th>
                      </tr>
                      <?php $count = $count + 1; } }?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th style="background-color:#FACC2E!important" width="30px">NO</th>
                        <th style="background-color:#FACC2E!important">NOMOR SURAT</th>
                        <th style="background-color:#FACC2E!important">TANGGAL PENYALURAN</th>
                        <th style="background-color:#FACC2E!important">NAMA BARANG</th>
                        <th style="background-color:#FACC2E!important">JUMLAH BARANG</th>
                        <th style="background-color:#FACC2E!important">NAMA PENERIMA</th>
                        <th style="background-color:#FACC2E!important">AKSI</th>

                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->