      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Rak
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Manajemen</a></li>
            <li><a href="<?=base_url();?>manajemen/daftar/rak">Manajemen Rak</a></li>
            <li><a class="active">Edit Rak</a></li>
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
                <form role="form" action="<?php echo base_url() . 'manajemen/update/rak/' . $row['id_rak'] ?>" method="post">
                  <div class="box-body">
                    <div class="col-md-4">
                      <div class="form-group">
                          <label>Gudang</label><br/>
                          <select class="form-group" id="gudang_rak_edit" name="gudang_rak_edit" data-max-options="1" >
                            <?php 
                            if($gudang != NULL)
                            { ?>
                              <?php foreach($gudang as $row2)
                              { ?>
                                <option value="<?php echo $row2->id_gudang ?>" <?php if($row['id_gudang'] == $row2->id_gudang) { echo 'selected'; } ?> ><?php echo $row2->nama_gudang ?></option>
                              <?php } } ?>
                          </select>
                      </div>
                    </div>
                    <div class="col-md-10">
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nama Rak</label>
                        <input type="text" class="form-control" id="nama_rak_edit" name="nama_rak_edit" value="<?php echo $row['nama_rak']; ?>" >
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