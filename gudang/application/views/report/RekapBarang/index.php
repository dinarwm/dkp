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
            Rekap Barang
            <small>Laporan Pengadaan Barang</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-users"></i> Report</a></li>
            <li class="active"> Rekap Barang</li>
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
                        <th style="background-color:#FACC2E!important">NAMA BARANG</th>
                        <th style="background-color:#FACC2E!important">JUMLAH BARANG</th>
                        <th style="background-color:#FACC2E!important">TIPE PENGADAAN</th>
                        <th style="background-color:#FACC2E!important">ASAL PENERIMAAN</th>
                        <th style="background-color:#FACC2E!important">TANGGAL PENERIMAAN</th>
                        <th style="background-color:#FACC2E!important">NOMOR SPK</th>

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
                        <th> <?php echo $row->nama_jenis;?></th>
                        <th><?php echo $row->jumlah_barang; ?></th>
                        <th><?php echo $row->tipe_pengadaan; ?></th>
                        <th><?php echo $row->asal_penerimaan; ?></th>
                        <th><?php echo $row->tgl_ba_penerimaan; ?></th>
                        <th><?php echo $row->nomer_spk; ?></th>

                      </tr>
                      <?php $count = $count + 1; } }?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th style="background-color:#FACC2E!important" width="30px">NO</th>
                        <th style="background-color:#FACC2E!important">NAMA BARANG</th>
                        <th style="background-color:#FACC2E!important">JUMLAH BARANG</th>
                        <th style="background-color:#FACC2E!important">TIPE PENGADAAN</th>
                        <th style="background-color:#FACC2E!important">ASAL PENERIMAAN</th>
                        <th style="background-color:#FACC2E!important">TANGGAL PENERIMAAN</th>
                        <th style="background-color:#FACC2E!important">NOMOR SPK</th>

                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->