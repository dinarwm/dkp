      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Master Data User
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-file"></i> Master Data User</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">List User</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="tabelUser">
                    <thead>
                    <tr role="row">
                      <th>No</th>
                      <th>Nama User</th>
                      <th>Password</th>
                      <th>Jabatan</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php $i=1; foreach ($user as $row) {?>
                      <tr>
                        <td><?php echo $i++?></td>
                        <td><?php echo $row->nama_user?></td>
                        <td><?php echo $row->password?></td>
                        <td><?php echo $row->jabatan?></td>
                        <td>
                          <?php if ($row->status == 1){
                            echo "Active";}
                            else{
                              echo "Non-Active";
                          }?>
                        </td>
                        <td class="center aligned">
                          <button id="<?php echo $row->nama_user?>" class="btn btn-primary" style="width:75px"><i class="edit icon"></i>Edit</button>
                          <button id="del<?php echo $row->nama_user?>" class="btn btn-primary" style="width:75px"><i class="remove user icon"></i>Hapus</button>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                    <tfoot>
                    <tr role="row">
                      <th>No</th>
                      <th>Nama User</th>
                      <th>Password</th>
                      <th>Jabatan</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
      </div><!-- /.content-wrapper -->

      <script>  
        $(function () {
          $('#tabelUser').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false
          });
        });
      </script>