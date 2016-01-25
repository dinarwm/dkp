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
            Status Barang
            <small>Daftar Jenis Barang</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-users"></i> Pencarian</a></li>
            <li class="active"> Barang</li>
          </ol>

        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">

                 <div class="box-body">
                  <form action="#" method="post" role="form">
                      <div class="form-group col-md-3">
                      <label>Gudang</label>
                        <select class="selectpicker" data-size="3" data-live-search="true" id="gudang_status" name="gudang_status" onchange="getListRak()">
                                    <?php 
                                    if($gudang != NULL)
                                { ?>
                                  <option value="0">---Pilih gudang---</option>
                                  <?php foreach($gudang as $row)
                                  { ?>
                                    <option value="<?php echo $row->id_gudang ?>"><?php echo $row->nama_gudang ?></option>
                                    <?php } } ?>
                                  </select>
                                  </div>
                            
                              <div class="col-md-3">
                                  <div class="form-group">
                                  <label>Rak</label>
                                  <select class="form-control" data-size="3" id="rak_status" name="rak_status" onChange="getStatus()">
                                  </select>
                                </div>
                              </div>
                      
                <br><br><br><br>
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style="background-color:#FACC2E!important" width="30px">NO</th>
                        <th style="background-color:#FACC2E!important">JENIS BARANG</th>
                        <th style="background-color:#FACC2E!important">NAMA BARANG</th>
                        <th style="background-color:#FACC2E!important">STATUS</th>
                        <th style="background-color:#FACC2E!important">AKSI</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $count=1;
                        if($list != NULL)
                        {
                          // foreach ($site_operation as $row)
                          // {
                          //   $id = $row->id_so;
                          //   # code...
                          // }
                          foreach($list as $row)
                        {
                      ?>
                      <tr>
                        <th><?php echo $count; ?></th>
                        <th><?php echo $row->nama_jenis; ?></th>
                        <th><?php echo $row->jumlah_barang; ?></th>
                        <th><?php echo $row->nama_status; ?></th>
                          <th><select class="form-control name='id_status'">
                            <?php
                            
                            foreach ($nama_status as $row) {
                                echo '<option value="' . $row->id_status . '" selected >' .$row->nama_status.'</option>';
                              }
                            ?>

                          </select></th>
                      </tr>
                      <?php $count = $count + 1; } }?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th style="background-color:#FACC2E!important" width="30px">NO</th>
                        <th style="background-color:#FACC2E!important">JENIS BARANG</th>
                        <th style="background-color:#FACC2E!important">NAMA BARANG</th>
                        <th style="background-color:#FACC2E!important">STATUS</th>
                        <th style="background-color:#FACC2E!important">AKSI</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper --><script>
function deldata() {
    return confirm('Apakah Anda yakin akan menghapus data ini?');
  }
</script>

<script type="text/javascript">
  function getListRak()
        {
            var id_gudang = $('#gudang_status').val();
            $('#rak_status option').remove();
            $.getJSON("<?php echo base_url(); ?>pengadaan/getRakGudang/"+id_gudang , function(data){
              //console.log(data);
              //console.log(data.length);
              if(data.length){
                  for(i=0; i<data.length; i++)
                  {
                      var obj = data[i];
                      console.log(obj.nama_rak);

                      $('#rak_status').append($('<option>', {
                          value: obj.id_rak,
                          text: obj.nama_rak
                      }));
                  }
              }
            });
        }


   function getStatus()
   {
          var id_gudang = $('#gudang_status').val();
          var id_rak = $('#rak_status').val();
          var baseURL = "<?php echo base_url(); ?>";
          var count = 1;
          var str = '';
          $.getJSON("<?php echo base_url(); ?>pengadaan/statusBarang"+id_gudang+"/"+id_rak , function(data){
            if(data.length){
              for(i=0; i<data.length; i++)
              {
                var obj = data[i];
                console.log(obj);
                  str =
                  '<tr>'+
                  '<td>'+count+'</td>'+
                  '<td>'+obj['nama_jenis']+'</td>'+
                  '<td>'+obj['jumlah_barang']+'</td>'+
                  '<td>'+obj['lokasi_penempatan']+'</td>';
                  if(id_status==2)
                    str +=
                    '<td><center><a href="'+baseURL+'pelaporan/tambahLaporan/'+obj['id_barang']+'" class="btn btn-info btn-social"><i class="fa fa-plus"></i>Tambah Laporan</a></center></td>'+
                    '</tr>';
                  else if(id_status==3){
                    str +=
                    '<td><center><a href="'+baseURL+'pelaporan/detailLaporan/'+obj['id_barang']+'" target="_blank" class="btn btn-success btn-social"><i class="fa fa-info"></i>Detail Laporan</a></center></td>'+
                    '</tr>';
                  }
                  $("#detailPelaporan").append(str);
                  count++;
              }
            }
          });
   }     


   // function getStatus()
   // {
   //        $('#detailStatus tr').remove();
   //        var id_gudang = $('#gudang_status').val();
   //        var id_rak = $('#rak_status').val();
   //        var baseURL = "<?php echo base_url(); ?>";
   //        var count = 1;
   //        var str = '';
   //        $.getJSON("<?php echo base_url(); ?>pengadaan/statusBarang"+id_gudang+"/"+id_rak , function(data){
   //          if(data.length){
   //            for(i=0; i<data.length; i++)
   //            {
   //              var obj = data[i];
   //              console.log(obj);
   //                str =
   //                '<tr>'+
   //                '<td>'+count+'</td>'+
   //                '<td>'+obj['nama_jenis']+'</td>'+
   //                '<td>'+obj['jumlah_barang']+'</td>'+
   //                '<td>'+obj['nama_status']+'</td>'
   //                '<td>'+obj['nama_status']+'</td>';
   //                $("#detailStatus").append(str);
   //                count++;
   //            }
   //          }
   //        });
   // } 
        </script>
    