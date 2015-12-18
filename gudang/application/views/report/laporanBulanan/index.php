      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Laporan Bulanan
            <small>Laporan Anggaran per Bulan</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-users"></i> Report</a></li>
            <li class="active"> Stok Opname</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-body">
                  <form action="<?php echo base_url() ?>users">
                    <div class="form-group">
                      <div class="col-md-2">
                        <label>Tahun</label>
                        <select class="form-control" id="tahunLaporanBulanan" onChange='getBulan()'>
                          <option>2012</option>
                          <option>2013</option>
                          <option>2014</option>
                          <option>2015</option>
                        </select>
                      </div>
                      <div class="col-md-2">
                        <label>Bulan</label>
                        <select class="form-control" id="bulanLaporanBulanan">
                          <option value="">----</option>
                        </select>
                      </div>
                    </div>
                  </form>
                  <br>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <script type="text/javascript">
        function getBulan()
        {
            var tahun = $('#tahunLaporanBulanan').val();
            var list = 
            '<option value="Januari">Januari</option><option value="Februari">Februari</option><option value="Maret">Maret</option><option value="April">April</option>';
            $('#bulanLaporanBulanan option').remove();
            $('#bulanLaporanBulanan').append(list);
        }
      </script>