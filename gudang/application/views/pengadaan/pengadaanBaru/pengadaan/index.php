			<?php if($flag == 'sukses'){
				echo '<script language="javascript">';
		        echo 'swal("Berhasil!", "Data berhasil ditambahkan!", "success");';
		        echo 'setTimeout(function(){
						    window.location.href = "' . site_url('pengadaan/pengadaanBaru/pengadaan/') . '";;
						}, 2000);';
		        echo '</script>';
			}
			else if($flag == 'gagal'){
				echo '<script language="javascript">';
		        echo 'swal("Oops...", "Terjadi kesalahan!", "error");';
		        echo 'setTimeout(function(){
						    window.location.href = "' . site_url('pengadaan/pengadaanBaru/pengadaan/') . '";;
						}, 2000);';
		        echo '</script>';
			} ?>
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<h1>
						Pengadaan Baru
						<small>Dari Pengadaan</small>
					</h1>
					<ol class="breadcrumb">
						<li><a href="#"><i class="fa fa-dashboard"></i> Pengadaan Barang</a></li>
						<li><a href="#">Pengadaan Baru</a></li>
						<li class="active">Pengadaan</li>
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
								<form role="form" action="<?php echo site_url('pengadaan/insert/pengadaan'); ?>" method="post">
									<div class="box-body">
										<div class="col-md-6">
											<div class="form-group">
												<label for="exampleInputEmail1">Nomor Berita Acara Penerimaan</label>
												<input type="text" class="form-control" id="no_ba_penerimaan" name="no_ba_penerimaan" placeholder="Nomor Berita Acara Penerimaan">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
							                    <label>Tanggal Penerimaan (mm-dd-yyyy)</label>
							                        <!-- <input type="date" name="tglclosed"/> -->
							                    <input type="text" class="form-control" name="tgl_ba_penerimaan" value="" id="dp4" >
							                 </div><!-- /.form group -->
							            </div>
							            <div class="col-md-6">
											<div class="form-group">
												<label for="exampleInputEmail1">Nomor Berita Acara Pemeriksaan</label>
												<input type="text" class="form-control" id="no_ba_pemeriksaan" name="no_ba_pemeriksaan" placeholder="Nomor Berita Acara Pemeriksaan">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
							                    <label>Tanggal Pemeriksaan (mm-dd-yyyy)</label>
							                        <!-- <input type="date" name="tglclosed"/> -->
							                    <input type="text" class="form-control" name="tgl_ba_pemeriksaan" value="" id="dp2" >
							                 </div><!-- /.form group -->
							            </div>
							            <div class="col-md-8">
											<div class="form-group">
												<label for="exampleInputEmail1">Kegiatan</label>
												<input type="text" class="form-control" id="kegiatan" name="kegiatan" placeholder="Kegiatan">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="exampleInputEmail1">Nomor SPK</label>
												<input type="text" class="form-control" id="nomer_spk" name="nomer_spk" placeholder="Nomor Berita Acara Pemeriksaan">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
							                    <label>Tanggal SPK (mm-dd-yyyy)</label>
							                        <!-- <input type="date" name="tglclosed"/> -->
							                    <input type="text" class="form-control" name="tgl_spk" value="" id="dp3" >
							                 </div><!-- /.form group -->
							            </div>
							            <div class="col-md-8">
											<div class="form-group">
												<label for="exampleInputEmail1">Uraian Pekerjaan</label>
												<input type="text" class="form-control" id="uraian_pekerjaan" placeholder="Uraian Pekerjaan" name="uraian_pekerjaan">
											</div>
										</div>
										<div class="col-md-8">
											<div class="form-group">
												<label for="exampleInputEmail1">Nama Rekanan</label>
												<input type="text" class="form-control" id="nama_rekanan" placeholder="Nama Rekanan" name="nama_rekanan">
											</div>
										</div>
										<div class="col-md-8">
											<div class="form-group">
												<label for="exampleInputEmail1">Alamat Rekanan</label>
												<input type="text" class="form-control" id="alamat_rekanan" placeholder="Alamat Rekanan" name="alamat_rekanan">
											</div>
										</div>
										<div class="col-md-8">
											<div class="form-group">
												<label for="exampleInputEmail1">Nilai SPK / Kontrak</label>
												<input type="text" class="form-control" id="nilai_spk" placeholder="Nilai SPK / Kontrak" name="nilai_spk">
											</div>
										</div>
										<div class="col-md-8">
											<div class="form-group">
												<label for="exampleInputEmail1">Rekening Belanja & Nilai</label>
												<input type="text" class="form-control" id="rekening_belanja" placeholder="Rekening Belanja & Nilai" name="rekening_belanja">
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
						                      <label>Nama Barang</label>
						                      <select class="selectpicker" data-live-search="true" data-size="3" id="jenis_barang_pengadaan" name="jenis_barang_pengadaan">  	
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
						                      <select class="selectpicker" data-size="3" id="kondisi_barang_pengadaan" name="kondisi_barang_pengadaan">
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

					                    <div class="col-md-3">
					                      	<div class="form-group">
						                      <label>Gudang</label>
						                      <select class="selectpicker" data-size="3" id="gudang_pengadaan" name="gudang_pengadaan">
						                      	<?php 
						                      	if($gudang != NULL)
								                {
								                  foreach($gudang as $row)
								                  { ?>
						                        <option value="<?php echo $row->id_gudang ?>"><?php echo $row->nama_gudang ?></option>
						                        <?php } } ?>
						                      </select>
						                    </div>
					                    </div>
					                    <div class="col-md-3">
					                      	<div class="form-group">
						                      <label>Rak</label>
						                      <select class="selectpicker" data-size="3" id="kondisi_barang_pengadaan" name="kondisi_barang_pengadaan">
						                      	<?php 
						                      	if($rak != NULL)
								                {
								                  foreach($rak as $row)
								                  { ?>
						                        <option value="<?php echo $row->id_rak ?>"><?php echo $row->nama_rak ?></option>
						                        <?php } } ?>
						                      </select>
						                    </div>
					                    </div>

					                    <div class="col-md-10">
					                    	
					                    </div>
					                    <br/>
					                    <div class="col-md-3">
					                      <div class="form-group">
					                          <label>Jumlah</label>
					                          <input type="number" class="form-control" name="jumlah_barang_pengadaan" id="jumlah_barang_pengadaan" value="" onchange="calc()">
					                       </div>
					                    </div>
					                    <div class="col-md-3">
					                      <div class="form-group">
					                          <label>Harga Satuan Barang</label>
					                          <input type="number" class="form-control" name="harga_satuan_pengadaan" id="harga_satuan_pengadaan" value="" onchange="calc()">
					                       </div>
					                    </div>
					                    <div class="col-md-3">
					                      <div class="form-group">
					                          <label>Harga Total + Pajak</label>
					                          <input type="text" class="form-control" name="harga_total_pengadaan" id="harga_total_pengadaan" readonly>
					                       </div>
					                    </div>
					                    <div class="col-md-7">
					                    </div>
					                    <div class="col-md-2" align="right">
					                      <div class="btn btn-info btn-social" id="btnAddPengadaan_pengadaan"><i class="fa fa-plus"></i>Tambah Barang</div>
					                    </div>
									</div><!-- /.box-body -->
									<br>
				                  <div class="row">
				                    <div class="col-md-9">
				                        <table class="table table-bordered table-stripped">
				                          <thead>
				                            <tr>
				                              <th><center>Nama Barang</center></th>
				                              <th><center>Jumlah Barang</center></th>
				                              <th><center>Harga Satuan</center></th>
				                              <th><center>Harga Total + Pajak</center></th>
				                              <th><center>Action</center></th>
				                            </tr>
				                          </thead>
				                          <tbody id="tableDetailBarang_pengadaan">
				                          </tbody>
				                        </table>
				                      </div>
				                      <input type="hidden" name="jumlah_detail_pengadaan">
				                  	  <input type="hidden" name="deleted_pengadaan">
				                      <div class="col-md-7">
					                  </div>
				                  	  <div class="col-md-2" align="right">
					                    <button class="btn btn-primary btn-social"><i class="fa fa-check"></i>Submit</button>  
					                  </div>
				                    </div>
				                    <br/>
				                  </div>
								</form>
							</div><!-- /.box -->
						</div><!--/.col (left) -->
					</div>   <!-- /.row -->
				</section><!-- /.content -->
			</div><!-- /.content-wrapper -->
			<script type="text/javascript">
			function calc(){

				var total = $('#jumlah_barang_pengadaan').val() * $('#harga_satuan_pengadaan').val();
				document.getElementById('harga_total_pengadaan').value = total;
			}

			</script>
			<script type="text/javascript">
		      var jumlah_detail_pengadaan = 0;
		      $("#btnAddPengadaan_pengadaan").click(function () {
		        jumlah_detail_pengadaan++;
		        document.getElementsByName("jumlah_detail_pengadaan")[0].value = jumlah_detail_pengadaan;
		        var value_nama_barang_pengadaan = document.getElementsByName("jenis_barang_pengadaan")[0].value;
		        //var nama_barang_pengadaan = document.getElementsByName("jenis_barang_pengadaan").text;
		        //var nama_barang_pengadaan = elt.options[elt.selectedIndex].text;
		        
				var nama_barang_pengadaan = document.getElementById("jenis_barang_pengadaan").options[document.getElementById("jenis_barang_pengadaan").selectedIndex ].text;
				var kondisi_barang_pengadaan = document.getElementsByName("kondisi_barang_pengadaan")[0].value;
		        var jumlah_barang_pengadaan = document.getElementsByName("jumlah_barang_pengadaan")[0].value;
		        var harga_satuan_pengadaan = document.getElementsByName("harga_satuan_pengadaan")[0].value;
		        var harga_total_pengadaan = document.getElementsByName("harga_total_pengadaan")[0].value;
		        var str =
		        '/<tr id="rec_pengadaan'+jumlah_detail_pengadaan+'">'+
		        '<input type="hidden" class="form-control" readonly name="jenis_barang_'+jumlah_detail_pengadaan+'" value="'+value_nama_barang_pengadaan+'">'+
		        '<input type="hidden" class="form-control" readonly name="kondisi_barang_'+jumlah_detail_pengadaan+'" value="'+kondisi_barang_pengadaan+'">'+
		        '<td><center><input type="text" class="form-control" readonly name="nama_barang_'+jumlah_detail_pengadaan+'" value="'+nama_barang_pengadaan+'"></center></td>'+
		        '<td><center><input type="text" class="form-control"readonly name="jumlah_barang_'+jumlah_detail_pengadaan+'" value="'+jumlah_barang_pengadaan+'"></center></td>'+
		        '<td><center><input type="text" class="form-control" readonly name="harga_satuan_'+jumlah_detail_pengadaan+'" value="'+harga_satuan_pengadaan+'"></center></td>'+
		        '<td><center><input type="text" class="form-control" readonly name="harga_total_'+jumlah_detail_pengadaan+'" value="'+harga_total_pengadaan+'"></center></td>'+
		        '<td><center><div class="btn btn-danger btn-social" onclick="del(' + jumlah_detail_pengadaan + ')"><i class="fa fa-trash"></i>Hapus Barang</div></center></td>'+
		        '</tr>';
		        $("#tableDetailBarang_pengadaan").append(str);
		      });
		      function del(id){
		        document.getElementsByName("deleted_pengadaan")[0].value = document.getElementsByName("deleted_pengadaan")[0].value + id + ",";
		        document.getElementById("rec_pengadaan" + id).remove();
		      }
		    </script>
