      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tambah User Baru
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Manajemen</a></li>
            <li><a href="<?=base_url();?>manajemen/daftar/user">Manajemen User</a></li>
            <li><a class="active">Tambah User</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-9">
              <!-- general form elements -->
              <div class="box box-primary">
                <!-- form start -->
                <form role="form" action="<?php echo site_url('manajemen/tambah/user'); ?>" method="post" onsubmit="return confSubmit();">
                  <div class="box-body">
                    
                    <div class="col-md-6">
                      <div class="form-group">
                          <label>Hak Akses</label><br/>
                          <select class="selectpicker" data-live-search="true" id="jabatan_tambah" name="jabatan_tambah">
                            <?php 
                            if($gudang != NULL)
                            { ?>
                              <?php foreach($gudang as $row)
                              { ?>
                                <option value="<?php echo $row->id_gudang ?>"><?php echo $row->nama_gudang ?></option>
                              <?php } } ?>
                            <option value="0">Administrator</option>
                          </select>
                      </div>
                    </div>
                    <div class="col-md-10">
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nama</label>
                        <input type="text" class="form-control" id="nama_tambah" name="nama_tambah" >
                      </div>
                    </div>
                    <div class="col-md-10">
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" id="username_tambah" name="username_tambah" >
                      </div>
                    </div>
                    <div class="col-md-10">
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="password" class="form-control" id="password_tambah" name="password_tambah" >
                      </div>
                    </div>
                    <div class="col-md-10">
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Ulangi Password</label>
                        <input type="password" class="form-control" id="ulangi_password_tambah" name="ulangi_password_tambah" >
                        
                      </div>
                    </div>
                    
                    <br/><br/><br/>
                  </div><!-- /.box-body -->
                  <br>
                  <div class="box-body">
                    <div class="col-md-12" align="right">
                      <button class="btn btn-primary btn-social" id="submit_tambah_user"><i class="fa fa-check"></i>Tambah</button>  
                    </div>
                  </div>
                </form>
              </div><!-- /.box -->
            </div><!--/.col (left) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <script type="text/javascript">
          function confSubmit() {
             var pass = $('#password_tambah').val();
             var pass2 = $('#ulangi_password_tambah').val();
             if (pass != pass2)
             {
                alert('Password yang dimasukkan tidak cocok'); 
                return false;
             }
             else
             {
                return true;
             }
          }
      </script>