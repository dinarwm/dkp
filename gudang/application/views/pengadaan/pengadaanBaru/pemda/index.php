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
										<div class="col-md-6">
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
							            <div class="col-md-8">
											<div class="form-group">
												<label for="exampleInputEmail1">Asal Penerimaan</label>
												<input type="text" class="form-control" id="asal_penerimaan" name="asal_penerimaan" placeholder="Asal Penerimaan">
											</div>
										</div>
										<div class="col-md-9">
											<div class="form-group">
												<label for="exampleInputEmail1">Nama Barang</label>
												<input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
							                    <label for="exampleInputEmail1">Jumlah</label>
												<input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang" placeholder="Jumlah" onchange="calc()">
							                 </div><!-- /.form group -->
							            </div>
							            <div class="col-md-4">
											<div class="form-group">
												<label for="exampleInputEmail1">Harga Satuan</label>
												<input type="number" class="form-control" id="harga_satuan" name="harga_satuan" placeholder="Harga Satuan" onchange="calc()">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="exampleInputEmail1">Harga Total + Pajak</label>
												<input type="text" class="form-control" id="harga_total" name="harga_total" readonly>
											</div>
										</div>
									</div><!-- /.box-body -->
										
									<div class="box-footer">
										<button type="submit" class="btn btn-primary">Submit</button>
									</div>
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