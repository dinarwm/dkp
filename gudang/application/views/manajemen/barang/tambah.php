      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tambah Barang Baru
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Manajemen</a></li>
            <li><a href="active">Barang</a></li>
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
                <form role="form" action="<?php echo site_url('manajemen/tambah/barang'); ?>" method="post">
                  <div class="box-body">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control" id="nama_barang_tambah" name="nama_barang_tambah" >
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Nomor KPB</label>
                        <input type="text" class="form-control" id="nomor_kpb_tambah" name="nomor_kpb_tambah">
                      </div>
                    </div>
                    <div class="col-md-10">
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                          <label>Stok Awal</label>
                          <input type="number" class="form-control" name="stok_awal_tambah" id="stok_awal_tambah" value="" onchange="calc()">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Satuan</label>
                        <input type="text" class="form-control" id="satuan_tambah" name="satuan_tambah">
                      </div>
                    </div>
                    <div class="col-md-10">
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Foto Barang</label>
                        <input name="fotoBarang" id="fotoBarang" type="file" tabindex="1" value="NULL" />
                        <p class="help-block">Pastikan foto yang diupload dalam format .jpg atau .png</p>
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