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
            Manajemen Rak
            <small>Daftar Rak</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-users"></i> Manajemen</a></li>
            <li class="active">Manajemen Rak</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-body">
                  <form action="<?php echo base_url() ?>manajemen/tambahBaru/rak" method="post">
                    <input type="submit" class="btn btn-primary" value="Tambah Rak">
                  </form>
                  <br/>
                    <div class="form-group">
                      <select class="selectpicker" data-size="3" data-live-search="true" id="filterGudang" name="filterGudang" onchange="getRak()">
                        <?php 
                        if($gudang != NULL)
                        { ?>
                          <option value="0">Semua Gudang</option>
                          <?php foreach($gudang as $row)
                          { ?>
                            <option value="<?php echo $row->id_gudang ?>"><?php echo $row->nama_gudang ?></option>
                            <?php } } ?>
                          </select>
                    </div>
                  <br>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style="background-color:#FACC2E!important" width="30px">NO</th>
                        <th style="background-color:#FACC2E!important">NAMA RAK</th>
                        <th style="background-color:#FACC2E!important">GUDANG</th>
                        <th style="background-color:#FACC2E!important">AKSI</th>
                      </tr>
                    </thead>
                    <tbody id="listRakGudang">
                      <?php
                      $count=1;
                      if($list != NULL)
                      {
                        foreach($list as $row)
                        { ?>
                        <tr>
                          <td><?php echo $count; ?></td>
                          <td><?php echo $row['nama_rak']; ?></td>
                          <td><?php echo $row['nama_gudang']; ?></td>
                            <td>
                              <a href="<?php echo base_url() . 'manajemen/edit/rak/' . $row['id_rak'] ?>" title="Edit"><i class="fa fa-pencil text-aqua"></i></a>
                              <a href="<?php echo base_url() . 'manajemen/delete/rak/' . $row['id_rak'] ?>" title="Hapus" onclick="return deldata()"><i class="fa fa-trash text-red"></i></a>
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
                        <th style="background-color:#FACC2E!important">NAMA RAK</th>
                        <th style="background-color:#FACC2E!important">GUDANG</th>
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
      <script type="text/javascript">
        function getRak()
        {
            $('#listRakGudang tr').remove();
            var id_gudang = $('#filterGudang').val();
            var baseURL = "<?php echo base_url(); ?>";
            var count = 1;
            var str = '';
            $.getJSON("<?php echo base_url(); ?>manajemen/getRak/"+id_gudang , function(data){
              if(data.length){
                  for(i=0; i<data.length; i++)
                  {
                      var obj = data[i];
                      str =
                      '<tr>'+
                      '<td>'+count+'</td>'+
                      '<td>'+obj.nama_rak+'</td>'+
                      '<td>'+obj.nama_gudang+'</td>'+
                      '<td>'+
                        '<a href="' + baseURL + 'manajemen/edit/rak/' + obj.id_rak + '?>" title="Edit"><i class="fa fa-pencil text-aqua"></i></a>'+
                        '<a href="'+ baseURL + 'manajemen/delete/rak/' + obj.id_rak+ '?>" title="Hapus" onclick="return deldata()"><i class="fa fa-trash text-red"></i></a>'+
                      '</td>'+
                      '</tr>';
                      $("#listRakGudang").append(str);
                      count++;
                  }
              }
            });
        }
      </script>
      