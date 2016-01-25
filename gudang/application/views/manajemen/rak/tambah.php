      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tambah Rak Baru
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Manajemen</a></li>
            <li><a href="<?=base_url();?>manajemen/daftar/rak">Manajemen Rak</a></li>
            <li><a class="active">Tambah Rak</a></li>
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
                <form role="form" action="<?php echo site_url('manajemen/tambah/rak'); ?>" method="post">
                  <div class="box-body">
                    <div class="col-md-4">
                      <div class="form-group">
                          <label>Gudang</label><br/>
                          <select class="form-group" id="gudang_rak_tambah" name="gudang_rak_tambah" data-max-options="1" >
                            <?php 
                            if($gudang != NULL)
                            { ?>
                              <?php foreach($gudang as $row)
                              { ?>
                                <option value="<?php echo $row->id_gudang ?>"><?php echo $row->nama_gudang ?></option>
                              <?php } } ?>
                          </select>
                      </div>
                    </div>
                    <div class="col-md-10">
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nama Rak</label>
                        <input type="text" class="form-control" id="nama_rak_tambah" name="nama_rak_tambah" >
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