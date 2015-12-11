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
										<div class="col-md-4">
					                      <div class="form-group">
					                          <label>Kode Barang</label>
					                          <input type="text" class="form-control" name="kode_barang" id="kode_barang" value="">
					                       </div>
					                    </div>
					                    <div class="col-md-5">
					                      <div class="form-group">
					                          <label>Nama Barang</label>
					                          <input type="text" class="form-control" name="nama_barang" id="nama_barang" value="">
					                       </div>
					                    </div>
					                    <div class="col-md-10">
					                    	
					                    </div>
					                    <br/>
					                    <div class="col-md-3">
					                      <div class="form-group">
					                          <label>Jumlah</label>
					                          <input type="number" class="form-control" name="jumlah_barang" id="jumlah_barang" value="" onchange="calc()">
					                       </div>
					                    </div>
					                    <div class="col-md-3">
					                      <div class="form-group">
					                          <label>Harga Satuan Barang</label>
					                          <input type="number" class="form-control" name="harga_satuan" id="harga_satuan" value="" onchange="calc()">
					                       </div>
					                    </div>
					                    <div class="col-md-3">
					                      <div class="form-group">
					                          <label>Harga Total + Pajak</label>
					                          <input type="text" class="form-control" name="harga_total" id="harga_total" value="" readonly>
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
				                              <th><center>Kode Barang</center></th>
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
				//var jurusan = $('#jurusanLabBaru').val();
				var total = $('#jumlah_barang').val() * $('#harga_satuan').val();
				//alert(total);
				document.getElementById('harga_total').value = total;
				//document.getElementById('harga_total_pajak').innerHTML =  total ;
				//var total = document.getElementById('jumlah').value + document.getElementById('harga_satuan').value;
  				//document.getElememntById('harga_total_pajak').value = total;
			}
			</script>