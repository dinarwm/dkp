      <?php if($flag == 'sukses'){
        echo '<script language="javascript">';
            echo 'swal("Berhasil!", "Data berhasil ditambahkan!", "success");';
            echo 'setTimeout(function(){
                window.location.href = "' . site_url('penyaluran/penyaluranBaru/') . '";;
            }, 2000);';
            echo '</script>';
      }
      else if($flag == 'gagal'){
        echo '<script language="javascript">';
            echo 'swal("Oops...", "Terjadi kesalahan!", "error");';
            echo 'setTimeout(function(){
                window.location.href = "' . site_url('penyaluran/penyaluranBaru/') . '";;
            }, 2000);';
            echo '</script>';
      } ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Penyaluran Baru
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Penyaluran Barang</a></li>
            <li class="active">Penyaluran Baru</li>
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
                <form role="form" action="<?php echo site_url('penyaluran/insert/'); ?>" method="post">
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Nomor Surat</label>
                          <input type="text" class="form-control" id="no_surat" name="no_surat" placeholder="Nomor Surat">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                            <label>Tanggal Surat (mm-dd-yyyy)</label>
                            <input type="text" class="form-control" name="tgl_surat" value="" id="pny_tgl_surat" >
                         </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Nama Penerima</label>
                          <input type="text" class="form-control" id="nama_penerimaan" name="nama_penerima" placeholder="Nama Penerimaan">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                            <label>Tanggal Penyaluran (mm-dd-yyyy)</label>
                            <input type="text" class="form-control" name="tgl_penyaluran" value="" id="pny_tgl_penyaluran">
                         </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <h3>Detail Penyaluran</h3>
                      </div>

                      <div class="col-md-2">
                        <div class="form-group">
                            <label>Kode Barang</label>
                            <input type="text" class="form-control" name="kode_barang_add" value="">
                         </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input type="text" class="form-control" name="nama_barang_add" value="">
                         </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                            <label>Jumlah Barang</label>
                            <input type="number" class="form-control" name="jml_barang_add" value="">
                         </div>
                      </div>
                      <div class="col-md-9">
                        <div class="form-group">
                            <label>Lokasi Penempatan</label>
                            <input type="text" class="form-control" name="lokasi_barang_add" value="">
                         </div>
                      </div>
                      <div class="col-md-7">
                      </div>
                      <div class="col-md-2" align="right">
                        <div class="btn btn-info btn-social" id="btnAddBarang"><i class="fa fa-plus"></i>Tambah Barang</div>
                      </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-9">
                        <table class="table table-bordered table-stripped">
                          <thead>
                            <tr>
                              <th><center>Kode Barang</center></th>
                              <th><center>Nama Barang</center></th>
                              <th><center>Lokasi Penempatan</center></th>
                              <th><center>Jumlah Barang</center></th>
                              <th><center>Action</center></th>
                            </tr>
                          </thead>
                          <tbody id="tableDetailBarang">
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                  <input type="hidden" name="jumlah_detail">
                  <input type="hidden" name="deleted">
                  <div class="box-footer">
                    <div class="col-md-9" align="right">
                      <button class="btn btn-primary btn-social"><i class="fa fa-check"></i>Submit</button>  
                    </div>
                  </div>
                </form>
              </div><!-- /.box -->
            </div><!--/.col (left) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     