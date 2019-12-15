<?php $this->load->view('components/head'); ?>
<?php $this->load->view('components/navbar'); ?>

<!--sidebar-menu-->

		<li><a href="home"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
		<li class="submenu open"> <a href="#"><i class="icon icon-th-list"></i> <span>Manage Mahasiswa</span> <span
					class="icon icon-chevron-down pull-right" style="margin-right: 5px;"></span></a>
			<ul>
				<li><a href="mahasiswa">Data Mahasiswa</a></li>
				<li><a href="absensi">Absensi</a></li>
				<li class="active"><a href="nilai">Nilai</a></li>
			</ul>
		</li>
		<li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Manage Matakuliah</span> <span
					class="icon icon-chevron-down pull-right" style="margin-right: 5px;"></span></a>
			<ul>
				<li><a href="matakuliah">Matakuliah</a></li>
				<li><a href="materi"> Materi</a></li>
				<li><a href="soal">Pertanyaan</a></li>
				<li><a href="diskusi">Forum Diskusi</a></li>
			</ul>
		</li>
		<li><a href="admin"><i class="icon icon-user"></i> <span>Manage Admin</span></a> </li>
<li class="submenu"> <a href="#"><i class="icon icon-print"></i> <span>Laporan</span> <span
			class="icon icon-chevron-down pull-right" style="margin-right: 5px;"></span></a>
	<ul>
		<li><a href="laporan/mahasiswalaporan">Laporan Mahasiswa</a></li>
		<li><a href="laporan/absensilaporan">Laporan Absensi</a></li>
<li><a href="laporan/matakuliahlaporan">Laporan Matakuliah</a></li>
		<li><a href="laporan/nilailaporan">Laporan Nilai</a></li>
	</ul>
</li>
		  

	</ul>
</div>
<!--sidebar-menu-->


<div id="content">
	<div id="content-header">
		<div id="breadcrumb"> <a href="home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a
				href="subnilaiquiz" class="current">Nilai Quiz</a> </div>
		<h1><span class="icon-briefcase"></span>
			Informasi Penilaian Nilai<small> Quiz Mahasiswa</small></h1>
	</div>
	<hr>
	<div class="container-fluid">
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
										<th>Judul Quiz</th>
										<th>Tanggal Selesai</th>
										<th>Nilai</th>
										<th colspan="3">Action</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Quiz 1</td>
										<td>19 Mei 2019</td>
										<td align="center" style="width:100px;">90</td>
										<td style="width:90px;"><a href="#"><button class="btn btn-info btn-block"
													data-toggle="modal"> Lihat
													tugas</button></a>
										</td>
										<td style="width:50px;"><button class="btn btn-warning btn-block"
												data-toggle="modal" data-target="#form-rubahquiz">Rubah</button>
										</td>
										<td style="width:30px;"><button class="btn btn-danger btn-block">
												<span class="icon-trash"></span></button>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-default" data-dismiss="modal">
							<span class="icon-remove"></span> Tutup</button>
					</div>
				</div> <!-- ./ modal content -->
			</div>
		</div>
		<!-- ./modal Riwayat-->

		<!-- modal rubah -->
		<div class="modal hide fade" tabindex="-1" role="dialog" id="form-rubahquiz">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h3>Rubah Nilai Quiz</h3>
					</div>
					<div class="modal-body">
						<form class="form-horizontal">
							<div class="control-group">
								<label class="control-label" for="judulquiz">Judul</label>
								<div class="controls">
									<input type="text" id="judulquiz" name="judulquiz">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="tglquiz">Tanggal selesai quiz</label>
								<div class="controls">
									<input type="date" id="tglquiz" name="tglquiz">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="nilaiquiz">Nilai quiz</label>
								<div class="controls">
									<input type="text" id="nilaiquiz" name="nilaiquiz">
								</div>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button class="btn btn-success" id="rubahriwayat">
							<span class="icon-floppy-disk"></span> Simpan</button>
						<button class="btn btn-default" data-dismiss="modal">
							<span class="icon-remove"></span> Batal</button>
					</div>
				</div> <!-- ./ modal content -->
			</div>
		</div>
		<!-- ./modal rubah-->

		<!-- modal koreksi -->
		<div class="modal hide fade" tabindex="-1" role="dialog" id="form-koreksi">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h3>Koreksi Quiz Mahasiswa</h3>
					</div>
					<div class="modal-body">
						<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover" id="dataTables-example">
								<thead>
									<tr>
										<th>Nim</th>
										<th>Nama</th>
										<th>Prodi</th>
										<th>Kelas</th>
										<th>Tanggal Selesai</th>
										<th colspan="2">Action</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1513121497</td>
										<td>Anisa Ramadani</td>
										<td>Teknik Informatika</td>
										<td align="center">P-1</td>
										<td align="center">07 nov 2019</td>
										<td style="width:70px;"><a href="isinilai" target="_blank">
												<input type="button" class="btn btn-success btn-block"
													value="Koreksi"></a>
										</td>
										<td style="width:30px;"><button class="btn btn-danger btn-block">
												<span class="icon-trash"></span></button>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-default" data-dismiss="modal">
							<span class="icon-remove"></span> Tutup</button>
					</div>
				</div> <!-- ./ modal content -->
			</div>
		</div>
		<!-- ./modal koreksi-->

		<div class="row-fluid">
			<div class="span12">
				<div class="accordion" id="collapsefilter">
					<div class="accordion-group" style="width:400px;">
						<div class="accordion-heading">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#collapsefilter"
								href="#tampilfilter">
								<strong>Filter Data <span class="icon icon-chevron-down"></span></strong>
							</a>
						</div>
						<div id="tampilfilter" class="accordion-body collapse">
							<div class="accordion-inner">
								<form class="form-inline">
									<table>
										<tr>
											<td><label for="prodi">Program Studi</label></td>
											<td>
												<select id="prodi" name="prodi" class="form-control">
													<option value="TI">Teknik Informatika</option>
													<option value="SI">Sistem Informasi</option>
												</select>
											</td>
										</tr>
										<tr>
											<td><label for="semester">Semester</label></td>
											<td>
												<select id="semester" name="semester" class="form-control">
													<option value="1">I</option>
													<option value="2">II</option>
													<option value="3">III</option>
													<option value="4">IV</option>
													<option value="5">V</option>
													<option value="6">VI</option>
													<option value="7">VII</option>
													<option value="8">VIII</option>
												</select>
											</td>
										</tr>
										<tr>
											<td><label for="kelas">Kelas</label></td>
											<td>
												<select id="kelas" name="kelas" class="form-control">
													<option value="P1">P1</option>
													<option value="P2">P2</option>
													<option value="M1">M1</option>
												</select>
											</td>
										</tr>
										<tr>
											<td> <label for="nim">NIM</label></td>
											<td><input type="text" id="nim" name="nim" placeholder="Optional"></td>
										</tr>
										<tr>
											<td>&nbsp</td>
											<td><button type="submit" id="filter" class="btn">Filter</button></td>
										</tr>
									</table>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="widget-box">
					<button class="btn btn-success pull-right" id="btnkoreksi" data-toggle="modal" data-target="#form-koreksi"
						style="margin:3px 5px;">
						<span class="icon-check"></span> Koreksi</button>
					<div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
						<h5>Nilai Mahasiswa</h5>
					</div>
					<div class="widget-content nopadding">
						<table class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th>Nim</th>
									<th>Nama</th>
									<th>Kehadiran</th>
									<th>Quiz Selesai</th>
									<th>Avg Nilai</th>
									<th colspan="2">Action</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1513121497</td>
									<td>Anisa Ramadani</td>
									<td align="center">15</td>
									<td align="center">4</td>
									<td align="center">98</td>
									<td style="width:120px;"><button class="btn btn-info btn-block" data-toggle="modal"
											data-target="#form-riwayatquiz">
											<span class="icon-pencil"></span> Riwayat Quiz</button>
									</td>
									<td style="width:100px;"><button class="btn btn-danger btn-block">
											<span class="icon-trash"></span> Hapus</button>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<!--End Advanced Tables -->
			</div>
		</div>
	</div>
</div>
</div>
</div>

<?php $this->load->view('components/foot'); ?>

<script src="assets/js/app/myfunction.js"></script>
<script src="assets/js/app/subnilai.js"></script>
<?php $this->load->view('components/jsfoot'); ?>
</body>

</html>