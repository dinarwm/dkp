      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Stok Opname
            <small>Laporan Anggaran per Tahun</small>
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

                  <form action="">
                    <div class="form-group">
                      <div class="col-md-2">
                        <label>Tahun Anggaran</label>
                        <select class="form-control">
                          <option>2012</option>
                          <option>2013</option>
                          <option>2014</option>
                          <option>2015</option>
                        </select>
                      </div>
                      <br>
                      <button type="submit" class="btn btn-success" id="">Pilih</button>
                    </div>
                  </form>
                  <br>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    </thead>
                    <tbody>
                      <tr>
                      <th><a href="<?php echo base_url('report/excelStok') ?>">
                      <button type="submit" class="btn btn-success" id="bulan">Download</button></a></th>
                    </tr>
                    </tbody>
                    <tfoot>
                    </tfoot>
                  </table>

                    </div>
                  </form>
                  <br>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->