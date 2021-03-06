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
            Manajemen Barang
            <small>Daftar Jenis Barang</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-users"></i> Manajemen</a></li>
            <li class="active">Manajemen Barang</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-body">
                  <form action="<?php echo base_url() ?>manajemen/tambahBaru/barang" method="post">
                    <input type="submit" class="btn btn-primary" value="Tambah barang">
                  </form>
                  <br>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style="background-color:#FACC2E!important" width="30px">NO</th>
                        <th style="background-color:#FACC2E!important">NAMA BARANG</th>
                        <th style="background-color:#FACC2E!important">STOK</th>
                        <th style="background-color:#FACC2E!important">NOMOR KPB</th>
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
                          <td><?php echo $row->nama_jenis; ?></td>
                          <td><?php echo $row->stok; ?></td>
                          <td><?php echo $row->nomor_kpb; ?></td>
                            <td>
                              <!-- <a href="<?php echo base_url() . 'manajemen/edit/barang/' . $row->id_jenis ?>" title="Edit"><i class="fa fa-pencil text-aqua"></i></a> -->
                              <a href="<?php echo base_url() . 'manajemen/delete/barang/' . $row->id_jenis?>" title="Hapus" onclick="return deldata()"><i class="fa fa-trash text-red"></i></a>
                            </td>
                        </tr>
                        <?php 
                        $count = $count + 1;
                        }
                      }?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th style="background-color:#FACC2E!important">NO</th>
                        <th style="background-color:#FACC2E!important">NAMA BARANG</th>
                        <th style="background-color:#FACC2E!important">STOK</th>
                        <th style="background-color:#FACC2E!important">NOMOR KPB</th>
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