      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Detail Laporan Penyaluran
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Penyaluran Barang</a></li>
            <li><a href="<?=base_url();?>pelaporan">Pelaporan</a></li>
            <li class="active">Detail Laporan</li>
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
                <div class="box-body">
                  <input type="hidden" name="id_barang_add" value="<?=$data[0]->id_barang;?>">
                  <div class="col-md-7">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control" name="nama_barang_add" value="<?=$data[0]->nama_jenis;?>" readonly>
                     </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                        <label>Jumlah Barang</label>
                        <input type="number" class="form-control" name="jml_barang_add" value="<?=$data[0]->jumlah_barang;?>" readonly>
                     </div>
                  </div>
                  <div class="col-md-10">
                    <div class="form-group">
                        <label>Lokasi Penempatan</label>
                        <input type="text" class="form-control" name="lokasi_barang_add" value="<?=$data[0]->lokasi_penempatan;?>" readonly>
                     </div>
                  </div>
                  <div class="col-md-10">
                    <div class="form-group">
                        <label>Bukti Foto Laporan</label><br>
                        <center><img src="<?=$data[0]->foto_bukti?>" width="400px" id="imgPrev"></center>
                     </div>
                  </div>
                </div>
              </div><!-- /.box -->
            </div><!--/.col (left) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->