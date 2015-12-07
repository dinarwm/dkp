			<?php if($flag == 'sukses'){
				echo '<script language="javascript">';
		        echo 'swal("Berhasil!", "Data berhasil ditambahkan!", "success");';
		        echo 'setTimeout(function(){
						    window.location.href = "' . site_url('pengadaan/pengadaanBaru/hibah/') . '";;
						}, 2000);';
		        echo '</script>';
			}
			else if($flag == 'gagal'){
				echo '<script language="javascript">';
		        echo 'swal("Oops...", "Terjadi kesalahan!", "error");';
		        echo 'setTimeout(function(){
						    window.location.href = "' . site_url('pengadaan/pengadaanBaru/hibah/') . '";;
						}, 2000);';
		        echo '</script>';
			} ?>
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<h1>
						Pengadaan Baru
						<small>Dari Hibah</small>
					</h1>
					<ol class="breadcrumb">
						<li><a href="#"><i class="fa fa-dashboard"></i> Pengadaan Barang</a></li>
						<li><a href="#">Pengadaan Baru</a></li>
						<li class="active">Hibah</li>
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
								<form role="form">
									<div class="box-body">
										<div class="col-md-6">
											<div class="form-group">
												<label for="exampleInputEmail1">Nama Barang</label>
												<input type="text" class="form-control" id="nama_barang_hibah" name="nama_barang_hibah" placeholder="Nama Barang">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
							                    <label for="exampleInputEmail1">Jumlah</label>
												<input type="number" class="form-control" id="jumlah_barang_hibah" name="jumlah_barang_hibah" placeholder="Jumlah">
							                 </div><!-- /.form group -->
							            </div>
							            <div class="col-md-4">
											<div class="form-group">
												<label for="exampleInputEmail1">Harga Satuan</label>
												<input type="number" class="form-control" id="harga_satuan_hibah" name="harga_satuan_hibah" placeholder="Harga Satuan">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="exampleInputEmail1">Harga Total + Pajak</label>
												<input type="text" class="form-control" id="harga_total_hibah" name="harga_total_hibah" placeholder="Harga Total + Pajak">
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
			