			<?php if($flag == 'sukses'){
				echo '<script language="javascript">';
		        echo 'swal("Berhasil!", "Data berhasil ditambahkan!", "success");';
		        echo 'setTimeout(function(){
						    window.location.href = "' . site_url('pengadaan/pengadaanBaru/pemda/') . '";;
						}, 2000);';
		        echo '</script>';
			}
			else if($flag == 'gagal'){
				echo '<script language="javascript">';
		        echo 'swal("Oops...", "Terjadi kesalahan!", "error");';
		        echo 'setTimeout(function(){
						    window.location.href = "' . site_url('pengadaan/pengadaanBaru/pemda/') . '";;
						}, 2000);';
		        echo '</script>';
			} ?>
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<h1>
						Pengadaan Baru
						<small>Dari Pemda</small>
					</h1>
					<ol class="breadcrumb">
						<li><a href="#"><i class="fa fa-dashboard"></i> Pengadaan Barang</a></li>
						<li><a href="#">Pengadaan Baru</a></li>
						<li class="active">Pemda</li>
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
								<form role="form" action="<?php echo site_url('pengadaan/insert/pemda'); ?>" method="post">
									<div class="box-body">
										<div class="col-md-5">
											<div class="form-group">
												<label for="exampleInputEmail1">Nomor Berita Acara Serah Terima</label>
												<input type="text" class="form-control" id="no_ba_serahterima" name="no_ba_serahterima" placeholder="Nomor Berita Acara Serah Terima">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
							                    <label>Tanggal Serah Terima (mm-dd-yyyy)</label>
							                        <!-- <input type="date" name="tglclosed"/> -->
							                    <input type="text" class="form-control" name="tgl_ba_serahterima" value="" id="dp4" >
							                 </div><!-- /.form group -->
							            </div>
							            <div class="col-md-9">
											<div class="form-group">
												<label for="exampleInputEmail1">Asal Penerimaan</label>
												<input type="text" class="form-control" id="asal_penerimaan" name="asal_penerimaan" placeholder="Asal Penerimaan">
											</div>
										</div>								
									</div><!-- /.box-body -->
									<div class="box-body">
										<div class="col-md-12">
					                        <h3>Detail Pengadaan</h3>
					                    </div>
										<!-- <div class="col-md-4">
					                      <div class="form-group">
					                          <label>Kode Barang</label>
					                          <input type="text" class="form-control" name="kode_barang" id="kode_barang" value="">
					                       </div>
					                    </div> -->
					                    <div class="col-md-3">
					                      	<div class="form-group">
						                      <label>Gudang</label>
						                      <select class="selectpicker" data-size="3" data-live-search="true" id="gudang_pemda" name="gudang_pemda" onchange="getListRak()">
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
					                    </div>
					                    <div class="col-md-3">
					                      	<div class="form-group">
						                      <label>Rak</label>
						                      <select class="form-control" data-size="3" id="rak_pemda" name="rak_pemda">
						                      </select>
						                    </div>
					                    </div>

					                    <div class="col-md-10">
					                    	
					                    </div>
					                    <div class="col-md-3">
					                      	<div class="form-group">
						                      <label>Nama Barang</label>
						                      <select class="selectpicker" data-live-search="true" data-size="3" id="jenis_barang_pemda" name="jenis_barang_pemda">  	
						                      	<?php 
						                      	if($jenisBarang != NULL)
								                {
								                  foreach($jenisBarang as $row)
								                  { ?>
						                        <option value="<?php echo $row->id_jenis ?>"><?php echo $row->nama_jenis ?></option>
						                        <?php } } ?>
						                      </select>
						                    </div>
					                    </div>
					                    <div class="col-md-3">
					                      	<div class="form-group">
						                      <label>Kondisi Barang</label>
						                      <select class="selectpicker" data-size="3" id="kondisi_barang_pemda" name="kondisi_barang_pemda">
						                      	<?php 
						                      	if($kondisiBarang != NULL)
								                {
								                  foreach($kondisiBarang as $row)
								                  { ?>
						                        <option value="<?php echo $row->id_kondisi ?>"><?php echo $row->nama_kondisi ?></option>
						                        <?php } } ?>
						                      </select>
						                    </div>
					                    </div>
					                    <div class="col-md-10">
					                    	<br/>
					                    </div>

					                    
					                    <br/>
					                    <div class="col-md-3">
					                      <div class="form-group">
					                          <label>Jumlah</label>
					                          <input type="number" class="form-control" name="jumlah_barang_pemda" id="jumlah_barang_pemda" value="" onchange="calc()">
					                       </div>
					                    </div>
					                    <div class="col-md-3">
					                      <div class="form-group">
					                          <label>Harga Satuan Barang</label>
					                          <input type="number" class="form-control" name="harga_satuan_pemda" id="harga_satuan_pemda" value="" onchange="calc()">
					                       </div>
					                    </div>
					                    <div class="col-md-3">
					                      <div class="form-group">
					                          <label>Harga Total + Pajak</label>
					                          <input type="text" class="form-control" name="harga_total_pemda" id="harga_total_pemda" readonly>
					                       </div>
					                    </div>
					                    <div class="col-md-7">
					                    </div>
					                    <div class="col-md-2" align="right">
					                      <div class="btn btn-info btn-social" id="btnAddPengadaan_pemda"><i class="fa fa-plus"></i>Tambah Barang</div>
					                    </div>
									</div><!-- /.box-body -->
									<br>
				                  <div class="row">
				                    <div class="col-md-9">
				                        <table class="table table-bordered table-stripped">
				                          <thead>
				                            <tr>
				                              <th><center>Nama Barang</center></th>
				                              <th><center>Gudang</center></th>
				                              <th><center>Rak</center></th>
				                              <th><center>Jumlah Barang</center></th>
				                              <th><center>Harga Satuan</center></th>
				                              <th><center>Harga Total + Pajak</center></th>
				                              <th><center>Action</center></th>
				                            </tr>
				                          </thead>
				                          <tbody id="tableDetailBarang_pemda">
				                          </tbody>
				                        </table>
				                      </div>
				                      <input type="hidden" name="jumlah_detail_pemda">
				                  	  <input type="hidden" name="deleted_pemda">
				                      <div class="col-md-7">
					                  </div>
				                  	  <div class="col-md-2" align="right">
					                    <button class="btn btn-primary btn-social"><i class="fa fa-check"></i>Submit</button>  
					                  </div>
				                    </div>
				                    <br/>
				                  </div>

									<!-- <div class="box-footer">
										<button type="submit" class="btn btn-primary">Submit</button>
									</div> -->
								</form>
							</div><!-- /.box -->
						</div><!--/.col (left) -->
					</div>   <!-- /.row -->
				</section><!-- /.content -->
			</div><!-- /.content-wrapper -->
			<script type="text/javascript">
			function del(id){
		        document.getElementsByName("deleted_pemda")[0].value = document.getElementsByName("deleted_pemda")[0].value + id + ",";
		        document.getElementById("rec_pemda" + id).remove();
		      }
			</script>
			<script type="text/javascript">
		      var jumlah_detail_pemda = 0;
		      $("#btnAddPengadaan_pemda").click(function () {
		        jumlah_detail_pemda++;
		        document.getElementsByName("jumlah_detail_pemda")[0].value = jumlah_detail_pemda;
		        var value_nama_barang_pemda = document.getElementsByName("jenis_barang_pemda")[0].value;
		        var value_gudang_pemda = document.getElementsByName("gudang_pemda")[0].value;
		        var value_rak_pemda = document.getElementsByName("rak_pemda")[0].value;
		        //var nama_barang_pemda = document.getElementsByName("jenis_barang_pemda").text;
		        //var nama_barang_pemda = elt.options[elt.selectedIndex].text;
		        
				var nama_barang_pemda = document.getElementById("jenis_barang_pemda").options[document.getElementById("jenis_barang_pemda").selectedIndex ].text;
				var gudang_pemda = document.getElementById("gudang_pemda").options[document.getElementById("gudang_pemda").selectedIndex ].text;
				var rak_pemda = document.getElementById("rak_pemda").options[document.getElementById("rak_pemda").selectedIndex ].text;
				var kondisi_barang_pemda = document.getElementsByName("kondisi_barang_pemda")[0].value;
		        var jumlah_barang_pemda = document.getElementsByName("jumlah_barang_pemda")[0].value;
		        var harga_satuan_pemda = document.getElementsByName("harga_satuan_pemda")[0].value;
		        var harga_total_pemda = document.getElementsByName("harga_total_pemda")[0].value;
		        var str =
		        '/<tr id="rec_pemda'+jumlah_detail_pemda+'">'+
		        '<td><center><input type="text" class="form-control" readonly name="nama_barang_'+jumlah_detail_pemda+'" value="'+nama_barang_pemda+'"></center></td>'+
		        '<td><center><input type="text" class="form-control" readonly name="gudang2_'+jumlah_detail_pemda+'" value="'+gudang_pemda+'"></center></td>'+
		        '<td><center><input type="text" class="form-control" readonly name="rak2_'+jumlah_detail_pemda+'" value="'+rak_pemda+'"></center></td>'+
		        '<input type="hidden" class="form-control" readonly name="jenis_barang_'+jumlah_detail_pemda+'" value="'+value_nama_barang_pemda+'">'+
		        '<input type="hidden" class="form-control" readonly name="gudang_'+jumlah_detail_pemda+'" value="'+value_gudang_pemda+'">'+
		        '<input type="hidden" class="form-control" readonly name="rak_'+jumlah_detail_pemda+'" value="'+value_rak_pemda+'">'+
		        '<input type="hidden" class="form-control" readonly name="kondisi_barang_'+jumlah_detail_pemda+'" value="'+kondisi_barang_pemda+'">'+
		        '<td><center><input type="text" class="form-control"readonly name="jumlah_barang_'+jumlah_detail_pemda+'" value="'+jumlah_barang_pemda+'"></center></td>'+
		        '<td><center><input type="text" class="form-control" readonly name="harga_satuan_'+jumlah_detail_pemda+'" value="'+harga_satuan_pemda+'"></center></td>'+
		        '<td><center><input type="text" class="form-control" readonly name="harga_total_'+jumlah_detail_pemda+'" value="'+harga_total_pemda+'"></center></td>'+
		        '<td><center><div class="btn btn-danger btn-social" onclick="del(' + jumlah_detail_pemda + ')"><i class="fa fa-trash"></i>Hapus Barang</div></center></td>'+
		        '</tr>';
		        $("#tableDetailBarang_pemda").append(str);
		      });
		      </script>
			<script type="text/javascript">
			function calc(){

				var total = $('#jumlah_barang_pemda').val() * $('#harga_satuan_pemda').val();
				document.getElementById('harga_total_pemda').value = total;
			}

			function getListRak()
				{
				    var id_gudang = $('#gudang_pemda').val();
				    $('#rak_pemda option').remove();
				    $.getJSON("<?php echo base_url(); ?>pengadaan/getRakGudang/"+id_gudang , function(data){
				      //console.log(data);
				      //console.log(data.length);
				      if(data.length){
				          for(i=0; i<data.length; i++)
				          {
				              var obj = data[i];
				              console.log(obj.nama_rak);

				              $('#rak_pemda').append($('<option>', {
				                  value: obj.id_rak,
				                  text: obj.nama_rak
				              }));
				          }
				      }
				    });
				}

			</script>