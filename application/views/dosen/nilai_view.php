<?php $this->load->view('components/head'); ?>
<base href="<?= base_url(); ?>">
<?php $this->load->view('components/navbar'); ?>

<!--sidebar-menu-->

<li><a href="dosen/home"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
<li><a href="dosen/soal"><i class="icon icon-book"></i> <span>Manage Pertanyaan</span></a> </li>
<li><a href="dosen/diskusi"><i class="icon icon-group"></i> <span>Forum Diskusi</span></a> </li>
<li><a href="dosen/materi"><i class="icon icon-tasks"></i> <span>Manage Materi</span></a> </li>
<li class="active"><a href="dosen/nilai"><i class="icon icon-trophy"></i> <span>Penilaian</span></a> </li>
<li class="submenu"> <a href="#"><i class="icon icon-print"></i> <span>Laporan</span> <span
			class="icon icon-chevron-down pull-right" style="margin-right: 5px;"></span></a>
	<ul>
		<li><a href="laporan/absensilaporandosen">Laporan Absensi</a></li>
		<li><a href="laporan/nilailaporandosen">Laporan Nilai</a></li>
	</ul>
</li>
</ul>
</div>
<!--sidebar-menu-->


<div id="content">
	<div id="content-header">
		<div id="breadcrumb"> <a href="dosen/home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
				Home</a> <a href="dosen/absensi" class="current">Absensi</a> </div>
		<h1><span class="icon-briefcase"></span>
			Informasi <small>Nilai Mahasiswa</small></h1>
	</div>
	<hr>
	<!-- modal gambar-->
	<!-- <style>
		.modal-body {
		position: relative;
		overflow-y: auto;
		max-width: 200px;
		padding: 15px;
	}
	</style> -->
	<div class="modal hide fade offset1" tabindex="-1" role="dialog" id="form-nilai"  style='width: 200px;'>
		<div class="modal-dialog modal-sm"  style='width: 200px;'>
			<div class="modal-content" >
				<div class="modal-header">
					<h3>Form Nilai</h3>
				</div>
				<div class="modal-body" style='width: 200px;'>
					<form name="formnilai" id="formnilai" style='width: 200px;'>
						<div class="control-group">
							<label for="nbenar">Benar</label>
							<input class="span1" type="text" name="nbenar" id="nbenar" readonly />
						</div>
						<div class="control-group">
							<label for="text">Salah</label>
							<input class="span1" type="text" name="nsalah" id="nsalah" readonly />
						</div>
						<div class="control-group">
							<label for="text">Nilai</label>
							<input class="span1" type="text" name="nilai" id="nilai" />
						</div>
						<input class="btn btn-danger" style="margin-top:20px; margin-left:5px;" type="submit"
							value="Batal" data-dismiss="modal" />
						<input class="btn btn-success" style="margin-top:20px;" type="submit" value="Simpan"
							id="simpannilai" />
					</form>
				</div>
			</div>
		</div>
	</div> <!-- ./modal -->
	<div id='tampilawal'>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span3">
					<div class="widget-box">
						<div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
						</div>
						<div class="widget-content">
							<a style="cursor: pointer;" id="bukaquiz" class="thumbnail">
								<img src="assets/img/icons/017-consulting.png" alt="Quiz">
								<div class="caption">
									<h4 align="center">Nilai Quiz</h4>
								</div>
							</a>
						</div>
					</div>
				</div>
				<div class="span3">
					<div class="widget-box">
						<div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
						</div>
						<div class="widget-content">
							<a style="cursor: pointer;" id="bukatugas" class="thumbnail">
								<img src="assets/img/icons/020-philosophy.png" alt="Tugas">
								<div class="caption">
									<h4 align="center">Nilai Tugas</h4>
								</div>
							</a>
						</div>
					</div>
				</div>
				<div class="span3">
					<div class="widget-box">
						<div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
						</div>
						<div class="widget-content">
							<a style="cursor: pointer;" id="bukauts" class="thumbnail">
								<img src="assets/img/icons/021-exam.png" alt="Quiz">
								<div class="caption">
									<h4 align="center">Nilai UTS</h4>
								</div>
							</a>
						</div>
					</div>
				</div>
				<div class="span3">
					<div class="widget-box">
						<div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
						</div>
						<div class="widget-content">
							<a style="cursor: pointer;" id="bukakelompok" class="thumbnail">
								<img src="assets/img/icons/023-ebook.png" alt="Quiz">
								<div class="caption">
									<h4 align="center">Nilai Kelompok</h4>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- ======================================================================================= -->
	<div id="tampilnilai" style="display:none;">
		<div class="container-fluid">
			<div class="ini"></div>
			<!-- modal Riwayat -->
			<div class="modal hide fade" tabindex="-1" role="dialog" id="form-riwayatquiz">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h3>Riwayat Quiz Mahasiswa</h3>
						</div>
						<div class="modal-body">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover" id="dataTables-example">
									<thead>
										<tr>
											<th>No</th>
											<th>Tanggal Selesai</th>
											<th>Tipe Tugas</th>
											<th>ID Soal</th>
											<th>Nilai</th>
										</tr>
									</thead>
									<tbody id="tblriwayatquiz">
										<!-- <tr>
											<td style="text-align:center;">tanggal</td>
											<td style="text-align:center;">quiz</td>
											<td style="text-align:center;">idsoal</td>
											<td style="text-align:center;">90</td>
										</tr> -->
									</tbody>
								</table>
							</div>
						</div>
						<div class="modal-footer">
							<button class="btn btn-success" data-dismiss="modal">
								<span class="icon-remove"></span> Tutup</button>
						</div>
					</div> <!-- ./ modal content -->
				</div>
			</div>
			<!-- ./modal Riwayat-->

			<!-- modal koreksi -->
			<div class="modal hide fade" tabindex="-1" role="dialog" id="form-koreksi">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<h3>Koreksi Quiz Mahasiswa</h3>
						</div>
						<div class="modal-body">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>Nim</th>
											<th>Nama</th>
											<th>Prodi</th>
											<th>Sem</th>
											<th>Tanggal Selesai</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody id="tblkoreksi">
										<!-- <tr>
											<td>1513121497</td>
											<td>Anisa Ramadani</td>
											<td>Teknik Informatika</td>
											<td align="center">P-1</td>
											<td align="center">07 nov 2019</td>
											<td style="width:70px;"><a href="dosen/isinilai" target="_blank">
													<input type="button" class="btn btn-success btn-block"
														value="Koreksi"></a>
											</td>
											<td style="width:30px;"><button class="btn btn-danger btn-block">
													<span class="icon-trash"></span></button>
											</td>
										</tr> -->
									</tbody>
								</table>
							</div>
						</div>
						<div class="modal-footer">
							<button class="btn btn-success" data-dismiss="modal">
								<span class="icon-remove"></span>Tutup</button>
						</div>
					</div> <!-- ./ modal content -->
				</div>
			</div>
			<!-- ./modal koreksi kelompok-->
			<div class="modal hide fade" tabindex="-1" role="dialog" id="form-koreksikel">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<h3>Koreksi Quiz Mahasiswa</h3>
						</div>
						<div class="modal-body">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>Kelompok</th>
											<th>Prodi</th>
											<th>Sem</th>
											<th>Tanggal Selesai</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody id="tblkoreksikel">
										<!-- <tr>
											<td>1513121497</td>
											<td>Anisa Ramadani</td>
											<td>Teknik Informatika</td>
											<td align="center">P-1</td>
											<td align="center">07 nov 2019</td>
											<td style="width:70px;"><a href="dosen/isinilai" target="_blank">
													<input type="button" class="btn btn-success btn-block"
														value="Koreksi"></a>
											</td>
											<td style="width:30px;"><button class="btn btn-danger btn-block">
													<span class="icon-trash"></span></button>
											</td>
										</tr> -->
									</tbody>
								</table>
							</div>
						</div>
						<div class="modal-footer">
							<button class="btn btn-success" data-dismiss="modal">
								<span class="icon-remove"></span>Tutup</button>
						</div>
					</div> <!-- ./ modal content -->
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<div class="widget-box">
						<button class="btn btn-info pull-right" id="kembali1" style="margin:3px 5px;">
							<span class="icon-share-alt"></span> Kembali</button>
						<button class="btn btn-success pull-right" id="btnkoreksi" style="margin:3px 5px;">
							<span class="icon-check"></span> Koreksi</button>
						<div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
							<h5>Terakhir dikoreksi</h5>
						</div>
						<div class="widget-content nopadding">
							<table class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th id='tplnilai'>Nim</th>
										<th>Nama</th>
										<th>Prodi</th>
										<th>Semester</th>
										<th>Tipe Tugas</th>
										<th>Nilai</th>
										<th>Tanggal</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody id="tblnilaimhs">
									<!-- <tr>
										<td style="text-align:center;">1513121497</td>
										<td>Anisa Ramadani</td>
										<td style="text-align:center;">TI</td>
										<td style="text-align:center;">P1</td>
										<td style="text-align:center;">98</td>
										<td style="width:120px;"><button class="btn btn-info btn-block"
												data-toggle="modal" data-target="#form-riwayatquiz">
												<span class="icon-pencil"></span> Riwayat Quiz</button>
										</td>
										<td style="width:100px;"><button class="btn btn-danger btn-block">
												<span class="icon-trash"></span> Hapus</button>
										</td>
									</tr> -->
								</tbody>
							</table>
						</div>
					</div>
					<!--End Advanced Tables -->
				</div>
			</div>
		</div>
	</div>
	<!-- ======================================================================================= -->
	<div id="tampilkoreksi" style="display:none;">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<div class="widget-box">
						<button class="btn btn-info pull-right" id="kembali2" style="margin:3px 5px;">
							<span class="icon-share-alt"></span> Kembali</button>
						<div class="widget-title"> <span class="icon"><i class="icon-time"></i></span>
							<h5>Nim : <span id="nimtp"></span> -- Nama : <span id="namatp"></span>
							</h5>
						</div>
						<form id="form2">
							<input type="hidden" id="nilaimhs" name="nilaimhs">
						</form>
						<div class="widget-content" id="listsoal">
							<ol start="1" id="listsoal" class="fontsoal">
								<form action="" id="form3">
									<!-- <h2>Is this awesome?</h2>
									<div class="switch-field">
										<input type="radio" id="radio-one" name="switch-one" value="yes" checked />
										<label for="radio-one">Yes</label>
										<input type="radio" id="radio-two" name="switch-one" value="no" />
										<label for="radio-two">No</label>
									</div> -->
									<!-- <input id='RadioGroup1_1' type='radio' name='RadioGroup' class='yes' value='radio'>
									<input id='RadioGroup1_1' type='radio' name='RadioGroup' class='no' value='radio'> -->
								</form>
							</ol>
						</div>
						<div class="form-actions">
							<button type="submit" id="btnselesai" class="btn btn-warning pull-right"
								style="margin-right:10px;">
								<span class="icon-ok"></span> Beri Nilai</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('components/foot'); ?>
<script src="assets/js/app/myfunction.js"></script>
<script src="assets/js/app/dosen/subnilai.js"></script>
<?php $this->load->view('components/jsfoot'); ?>
</body>

</html>