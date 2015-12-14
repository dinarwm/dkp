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
						                      <label>Jenis Barang</label>
						                      <select class="form-control" id="jenis_barang_pemda" name="jenis_barang_pemda">
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
					                    <div class="col-md-5">
					                      <div class="form-group">
					                          <label>Nama Barang</label>
					                          <input type="text" class="form-control" name="nama_barang_pemda" id="nama_barang_pemda" onchange="dis()">
					                       </div>
					                    </div>
					                    <div class="col-md-3">
					                      	<div class="form-group">
						                      <label>Kondisi Barang</label>
						                      <select class="form-control" id="kondisi_barang_pemda" name="kondisi_barang_pemda">
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
					                      <div class="btn btn-info btn-social" id="btnAddPengadaan1"><i class="fa fa-plus"></i>Tambah Barang</div>
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
				                          <tbody id="tableDetailBarang">
				                          </tbody>
				                        </table>
				                      </div>
				                      <input type="hidden" name="jumlah_detail">
				                  	  <input type="hidden" name="deleted">
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
			function calc(){

				var total = $('#jumlah_barang_pemda').val() * $('#harga_satuan_pemda').val();
				document.getElementById('harga_total_pemda').value = total;
			}

			function dis(){
				var nama_barang = $('#nama_barang_pemda').val();
				if(nama_barang == ''){
			            $('#jenis_barang_pemda').removeAttr('disabled');
			        }
			        else{
			            $('#jenis_barang_pemda').attr('disabled','disabled');
			        }
			}

			</script>