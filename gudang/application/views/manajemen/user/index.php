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
            Manajemen User
            <small>Daftar User</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-users"></i> Manajemen</a></li>
            <li class="active">Manajemen User</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-body">
                  <button id="btnInsertUser" class="btn btn-primary">Tambah User</button>
                  <br>
                  <table class="table table-bordered table-striped data_table">
                    <thead>
                      <tr>
                        <th style="background-color:#FFFFFF!important" width="30px">NO</th>
                        <th style="background-color:#FFFFFF!important">NAMA LENGKAP</th>
                        <th style="background-color:#FFFFFF!important">USERNAME</th>
                        <th style="background-color:#FFFFFF!important">HAK AKSES</th>
                        <th style="background-color:#FFFFFF!important">STATUS </th>
                        <th style="background-color:#FFFFFF!important">AKSI</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1; foreach ($user as $row) {?>
                      <tr>
                        <td><?php echo $i++?></td>
                        <td><?php echo $row->id_user?></td>
                        <td><?php echo $row->nama_user?></td>
                        <td><?php echo $row->jabatan?></td>
                        <td>
                          <?php if ($row->status == 1){
                            echo "Active";}
                            else{
                              echo "Non-Active";
                          }?>
                        </td>
                        <td>
                          <center>
                          <button id="<?php echo $row->nama_user?>" class="btn btn-primary" style="width:75px"><i class="edit icon"></i>Edit</button>
                          <button id="del<?php echo $row->nama_user?>" class="btn btn-primary" style="width:75px"><i class="remove user icon"></i>Hapus</button>
                          </center>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th style="background-color:#FFFFFF!important">NO</th>
                        <th style="background-color:#FFFFFF!important">NAMA LENGKAP</th>
                        <th style="background-color:#FFFFFF!important">USERNAME</th>
                        <th style="background-color:#FFFFFF!important">HAK AKSES</th>
                        <th style="background-color:#FFFFFF!important">STATUS </th>
                        <th style="background-color:#FFFFFF!important">AKSI</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <div class="modal" id="insertUserModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Default Modal</h4>
            </div>
            <div class="modal-body">
              <p>One fine body…</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>