      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tambah Gudang Baru
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Manajemen</a></li>
            <li><a href="<?=base_url();?>manajemen/daftar/gudang">Manajemen Gudang</a></li>
            <li><a class="active">Tambah Gudang</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <!-- form start -->
                <form role="form" action="<?php echo site_url('manajemen/tambah/gudang'); ?>" method="post">
                  <div class="box-body">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nama Gudang</label>
                        <input type="text" class="form-control" id="nama_gudang_tambah" name="nama_gudang_tambah" >
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Alamat Gudang</label>
                        <input type="text" class="form-control" id="alamat_gudang_tambah" name="alamat_gudang_tambah">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="exampleInputEmail1">PJ Gudang</label>
                        <input type="text" class="form-control" id="pj_gudang_tambah" name="pj_gudang_tambah">
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                  <br>
                  <div class="box-body">
                    <div class="col-md-12" align="right">
                      <button class="btn btn-primary btn-social"><i class="fa fa-check"></i>Tambah</button>  
                    </div>
                  </div>
                </form>
              </div><!-- /.box -->
            </div><!--/.col (left) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->