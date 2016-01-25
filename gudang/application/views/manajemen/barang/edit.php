      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Data Barang
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Manajemen</a></li>
            <li><a href="<?=base_url();?>manajemen/daftar/barang">Manajemen Barang</a></li>
            <li><a class="active">Edit Barang</a></li>
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
                <form role="form" action="<?php echo base_url() . 'manajemen/update/barang/' . $row['id_jenis'] ?>" method="post">
                  <div class="box-body">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nama Barang</label>
                        <input type="text" class="form-control" id="nama_barang_edit" name="nama_barang_edit" value="<?php echo $row['nama_jenis'] ?>">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nomor KPB</label>
                        <input type="text" class="form-control" id="nomor_kpb_edit" name="nomor_kpb_edit" value="<?php echo $row['nomor_kpb'] ?>">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                          <label>Stok</label>
                          <input type="number" class="form-control" name="stok_awal_edit" id="stok_awal_edit" value="<?php echo $row['stok'] ?>" onchange="calc()" readonly>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Satuan</label>
                        <input type="text" class="form-control" id="satuan_edit" name="satuan_edit" value="<?php echo $row['satuan'] ?>">
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                  <br>
                  <div class="box-body">
                    <div class="col-md-12" align="right">
                      <button class="btn btn-primary btn-social"><i class="fa fa-check"></i>Ubah</button>  
                    </div>
                  </div>
                </form>
                <?php } } ?>
              </div><!-- /.box -->
            </div><!--/.col (left) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->