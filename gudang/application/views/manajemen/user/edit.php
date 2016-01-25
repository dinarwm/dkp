      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit User
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Manajemen</a></li>
            <li><a href="<?=base_url();?>manajemen/daftar/user">Manajemen User</a></li>
            <li><a class="active">Edit User</a></li>
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
                <?php
                if($result != NULL)
                {
                  foreach($result as $row)
                  { ?>
                <form role="form" action="<?php echo base_url() . 'manajemen/update/user/' . $row['id_user'] ?>" method="post">
                  <div class="box-body">
                    
                    <div class="col-md-6">
                      <div class="form-group">
                          <label>Hak Akses</label><br/>
                          <select class="selectpicker" data-live-search="true" id="jabatan_edit" name="jabatan_edit">
                            <option value="0" selected>Administrator</option>
                            <?php 
                            if($gudang != NULL)
                            { ?>
                              <?php foreach($gudang as $row2)
                              { ?>
                                <option value="<?php echo $row2->id_gudang ?>" <?php if($row2->id_gudang == $row['jabatan']) { echo 'selected'; } ?> > <?php echo $row2->nama_gudang ?></option>
                              <?php } } ?>
                          </select>
                      </div>
                    </div>
                    <div class="col-md-10">
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nama</label>
                        <input type="text" class="form-control" id="nama_edit" name="nama_edit" value="<?php echo $row['nama_user'] ?>" >
                      </div>
                    </div>
                    <div class="col-md-10">
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" id="nama_edit" name="username_edit" value="<?php echo $row['username'] ?>" >
                      </div>
                    </div>
                    <div class="col-md-10">
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="password" class="form-control" id="password_edit" name="password_edit" value"" placeholder="Kosongi password jika tidak ingin mengganti password">
                      </div>
                    </div>
                    <div class="col-md-10">
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
                <?php } } ?> 
              </div><!-- /.box -->
            </div><!--/.col (left) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->