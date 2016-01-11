<script>
function deldata() {
    return confirm('Apakah Anda yakin akan menghapus data ini?');
  }
</script>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manajemen Gudang
            <small>Daftar Gudang</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-users"></i> Manajemen</a></li>
            <li class="active">Manajemen Gudang</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-body">
                  <form action="<?php echo base_url() ?>manajemen/tambahBaru/gudang" method="post">
                    <input type="submit" class="btn btn-primary" value="Tambah gudang">
                  </form>
                  <br>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style="background-color:#FACC2E!important" width="30px">NO</th>
                        <th style="background-color:#FACC2E!important">NAMA GUDANG</th>
                        <th style="background-color:#FACC2E!important">ALAMAT GUDANG</th>
                        <th style="background-color:#FACC2E!important">PJ GUDANG</th>
                        <th style="background-color:#FACC2E!important">AKSI</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $count=1;
                      if($list != NULL)
                      {
                        foreach($list as $row)
                        { ?>
                        <tr>
                          <td><?php echo $count; ?></td>
                          <td><?php echo $row->nama_gudang; ?></td>
                          <td><?php echo $row->alamat_gudang; ?></td>
                          <td><?php echo $row->pj_gudang; ?></td>
                            <td>
                              <a href="<?php echo base_url() . 'manajemen/edit/gudang/' . $row->id_gudang ?>" title="Edit"><i class="fa fa-pencil text-aqua"></i></a>
                              <a href="<?php echo base_url() . 'manajemen/delete/gudang/' . $row->id_gudang ?>" title="Hapus" onclick="return deldata()"><i class="fa fa-trash text-red"></i></a>
                            </td>
                        </tr>
                        <?php 
                        $count = $count + 1;
                        }
                      }?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th style="background-color:#FACC2E!important" width="30px">NO</th>
                        <th style="background-color:#FACC2E!important">NAMA GUDANG</th>
                        <th style="background-color:#FACC2E!important">ALAMAT GUDANG</th>
                        <th style="background-color:#FACC2E!important">PJ GUDANG</th>
                        <th style="background-color:#FACC2E!important">AKSI</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->