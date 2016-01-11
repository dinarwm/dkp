      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tambah Laporan Penyaluran
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Penyaluran Barang</a></li>
            <li><a href="<?=base_url();?>pelaporan">Pelaporan</a></li>
            <li class="active">Tambah Laporan</li>
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
                  <form role="form" action="<?php echo site_url('pelaporan/doTambahLaporan/'); ?>" method="post" enctype="multipart/form-data">
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
                          <label>Upload Foto Bukti</label>
                          <input type="file" accept="image/*" class="form-control" name="foto_bukti" id="foto_bukti">
                       </div>
                    </div>

                    <div class="col-md-10">
                      <div class="form-group">
                          <label>Preview Image</label><br>
                          <center><img src="<?php echo base_url() ?>assets/kecil.png" width="400px" id="imgPrev"></center>
                       </div>
                    </div>

                    <div class="box-footer">
                      <div class="col-md-10" align="right">
                        <button class="btn btn-primary btn-social"><i class="fa fa-check"></i>Submit</button>  
                      </div>
                    </div>
                  </form>
                </div>
              </div><!-- /.box -->
            </div><!--/.col (left) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <script type="text/javascript">
       function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#imgPrev').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
          }
        }

        $("#foto_bukti").change(function(){
            readURL(this);
        });
    </script>