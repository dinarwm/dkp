      <?php if($flag == 'sukses'){
        echo '<script language="javascript">';
            echo 'swal("Berhasil!", "Data berhasil ditambahkan!", "success");';
            echo 'setTimeout(function(){
                window.location.href = "' . site_url('pelaporan/') . '";;
            }, 2000);';
            echo '</script>';
      }
      else if($flag == 'gagal'){
        echo '<script language="javascript">';
            echo 'swal("Oops...", "Terjadi kesalahan!", "error");';
            echo 'setTimeout(function(){
                window.location.href = "' . site_url('pelaporan/') . '";;
            }, 2000);';
            echo '</script>';
      } ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Pelaporan Barang
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Penyaluran Barang</a></li>
            <li class="active">Pelaporan Penyaluran</li>
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
                <div class="box-body">
                  <div class="col-md-3">
                    <label>Status</label>
                      <select class="form-control selectpicker" name="statusPelaporan" id="statusPelaporan" onChange="getNomerSurat()">
                        <option value="0">---Pilih gudang---</option>
                        <option value="2">Belum Dilaporkan</option>
                        <option value="3">Sudah Dilaporkan</option>
                      </select>
                  </div>
                  <div class="col-md-9">
                    <div class="form-group">
                      <label>Nomor Surat</label>
                      <select class="form-control selectpicker" data-live-search="true" data-size="10" id="noSurat" name="noSurat" onChange="getBarang()">

                      </select>
                    </div>
                  </div>
                  <br>
                  <div class="col-md-12">
                    <label>Detail Penyaluran</label>
                    <table class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th style="background-color:#FACC2E!important" width="30px">NO</th>
                          <th style="background-color:#FACC2E!important">NAMA BARANG</th>
                          <th style="background-color:#FACC2E!important">JUMLAH BARANG</th>
                          <th style="background-color:#FACC2E!important">LOKASI PENEMPATAN</th>
                          <th style="background-color:#FACC2E!important">AKSI</th>
                        </tr>
                      </thead>
                      <tbody id="detailPelaporan">
                      </tbody>
                      <tfoot>
                        <tr>
                          <th style="background-color:#FACC2E!important" width="30px">NO</th>
                          <th style="background-color:#FACC2E!important">NAMA BARANG</th>
                          <th style="background-color:#FACC2E!important">JUMLAH BARANG</th>
                          <th style="background-color:#FACC2E!important">LOKASI PENEMPATAN</th>
                          <th style="background-color:#FACC2E!important">AKSI</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div><!-- /.box -->
            </div><!--/.col (left) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


      <script type="text/javascript">
        function getNomerSurat()
        {
          $('#noSurat option').remove();
          $('#detailPelaporan tr').remove();
          var id_status = $('#statusPelaporan').val();
          var baseURL = "<?php echo base_url(); ?>";
          var str = '';
          if(id_status){
            $.getJSON("<?php echo base_url(); ?>pelaporan/getNomerSurat/"+id_status , function(data){
              if(data.length){
                  $('#noSurat').append($('<option>', {
                      value: 0,
                      text: "---Pilih Nomor Surat---"
                  }));
                  for(i=0; i<data.length; i++)
                  {
                      var obj = data[i];
                      $('#noSurat').append($('<option>', {
                          value: obj['id_penyaluran'],
                          text: obj['nomor_surat']
                      }));
                      console.log(obj);
                  }
                  $('#noSurat').selectpicker('refresh');
              }
              else
                $('#noSurat').selectpicker('refresh');
            });
          }
          else
            $('#noSurat').selectpicker('refresh');
        }

        function getBarang()
        {
          $('#detailPelaporan tr').remove();
          var id_status = $('#statusPelaporan').val();
          var id_penyaluran = $('#noSurat').val();
          var baseURL = "<?php echo base_url(); ?>";
          var count = 1;
          var str = '';
          $.getJSON("<?php echo base_url(); ?>pelaporan/getBarang/"+id_status+"/"+id_penyaluran , function(data){
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

      </script>
     