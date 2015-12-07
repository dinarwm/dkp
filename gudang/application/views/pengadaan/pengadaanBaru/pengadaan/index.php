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
										
									<div class="box-footer">
										<button type="submit" class="btn btn-primary">Submit</button>
									</div>
								</form>
							</div><!-- /.box -->
						</div><!--/.col (left) -->
					</div>   <!-- /.row -->
				</section><!-- /.content -->
			</div><!-- /.content-wrapper -->
			