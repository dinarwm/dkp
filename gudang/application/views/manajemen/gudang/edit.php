      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Gudang
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Manajemen</a></li>
            <li><a href="<?=base_url();?>manajemen/daftar/gudang">Manajemen Gudang</a></li>
            <li><a class="active">Edit Gudang</a></li>
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
                <?php
                if($result != NULL)
                {
                  foreach($result as $row)
                  { ?>
                <form role="form" action="<?php echo base_url() . 'manajemen/update/gudang/' . $row['id_gudang'] ?>" method="post">
                  <div class="box-body">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nama Gudang</label>
                        <input type="text" class="form-control" id="nama_gudang_edit" name="nama_gudang_edit" value="<?php echo $row['nama_gudang'] ?>" >
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Alamat Gudang</label>
                        <input type="text" class="form-control" id="alamat_gudang_edit" name="alamat_gudang_edit" value="<?php echo $row['alamat_gudang'] ?>">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="exampleInputEmail1">PJ Gudang</label>
                        <input type="text" class="form-control" id="pj_gudang_edit" name="pj_gudang_edit" value="<?php echo $row['pj_gudang'] ?>">
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
                <?php } } ?>
              </div><!-- /.box -->
            </div><!--/.col (left) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->