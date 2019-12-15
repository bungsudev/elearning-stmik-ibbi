<?php $this->load->view('components/head'); ?>
<?php $this->load->view('components/navbar'); ?>

<!--sidebar-menu-->

<li><a href="home"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
<li class="submenu open"> <a href="#"><i class="icon icon-th-list"></i> <span>Manage Mahasiswa</span> <span
			class="icon icon-chevron-down pull-right" style="margin-right: 5px;"></span></a>
	<ul>
		<li class="active"><a href="mahasiswa">Data Mahasiswa</a></li>
		<li><a href="absensi">Absensi</a></li>
		<li><a href="nilai">Nilai</a></li>
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
				href="mahasiswa" class="current">Mahasiswa</a> </div>
		<h1><span class="icon-briefcase"></span>
			Manajemen Informasi <small>Data Mahasiswa</small></h1>
	</div>
	<hr>
	<div class="container-fluid">
		<!-- modal -->
		<div class="modal hide fade" tabindex="-1" role="dialog" id="form-mahasiswa">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<h3>Form <span id="mode"></span> Mahasiswa</h3>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" action="">
							<div class="control-group">
								<label class="control-label" for="nim">NIM</label>
								<div class="controls">
									<input type="text" id="nim" name="nim" minlength="10" maxlength="10"
										class="form-control">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="namamhs">Nama</label>
								<div class="controls">
									<input type="text" id="namamhs" name="namamhs" class="form-control">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="alamat">Alamat</label>
								<div class="controls">
									<input type="text" id="alamat" name="alamat" class="form-control">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="email">E-mail</label>
								<div class="controls">
									<input type="text" id="email" name="email" class="form-control">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="tanggallahir">Tangal Lahir</label>
								<div class="controls">
									<input type="date" id="tanggallahir" name="tanggallahir" class="form-control">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="agama">Agama</label>
								<div class="controls">
									<select id="agama" name="agama" class="form-control">
										<option value="" disabled selected>Pilih</option>
										<option value="Islam">Islam</option>
										<option value="Kristen">Kristen</option>
										<option value="Katolik">Katolik</option>
										<option value="Hindu">Hindu</option>
										<option value="Budha">Budha</option>
										<option value="Lainnya">Lainnya</option>
									</select>
									<span name="agama"></span>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="jekel">Jenis Kelamin</label>
								<div class="controls">
									<select id="jekel" name="jekel" class="form-control">
										<option value="" disabled selected>Pilih</option>
										<option value="L">Laki-Laki</option>
										<option value="P">Perempuan</option>
									</select>
									<span name="jekel"></span>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="telepon">Telepon</label>
								<div class="controls">
									<input type="text" id="telepon" name="telepon" class="form-control">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="prodi">Program Studi</label>
								<div class="controls">
									<select id="prodi" name="prodi" class="form-control">
										<option value="" disabled selected>Pilih</option>
										<option value="TI">Teknik Informatika</option>
										<option value="SI">Sistem Informasi</option>
									</select>
									<span name="prodi"></span>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="semester">Semester</label>
								<div class="controls">
									<select id="semester" name="semester" class="form-control">
										<option value="" disabled selected>Pilih</option>
										<option value="1">I</option>
										<option value="2">II</option>
										<option value="3">III</option>
										<option value="4">IV</option>
										<option value="5">V</option>
										<option value="6">VI</option>
										<option value="7">VII</option>
										<option value="8">VIII</option>
									</select>
									<span name="semester"></span>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="kelas">Kelas</label>
								<div class="controls">
									<select id="kelas" name="kelas" class="form-control">
										<option value="" disabled selected>Pilih</option>
										<option value="P1">P1</option>
										<option value="P2">P2</option>
										<option value="M1">M1</option>
									</select>
									<span name="kelas"></span>
								</div> 
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button class="btn btn-success" id="simpandata" >
							<span class="icon-floppy-disk"></span> Simpan</button>
						<button class="btn btn-warning" id="simpan" >
							<span class="icon-floppy-disk"></span> Selanjutnya</button>
						<button class="btn btn-danger" data-dismiss="modal">
							<span class="icon-remove"></span> Batal</button>
					</div>
				</div>
			</div>
		</div> <!-- ./modal -->

		<!-- modal gambar-->
		<div class="modal hide fade" tabindex="-1" role="dialog" id="form-gambar">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<h3>Form <span id="mode"></span> Mahasiswa</h3>
					</div>
					<div class="modal-body">
						<form name="form2" id="form2" enctype="multipart/form-data">
							<input type="hidden" name="nim1" id="nim1">
							<div class="form-group">
								<label for="title">Foto</label>
								<input type="file" name="userfile" id="image" onchange="readURL(this)" />
							</div>
							<div class="form-group">
								<div id="previewLoad" style='margin-left: 0px; display: none'>
									<img src='<?php echo base_url();?>assets/img/loading.gif' />
								</div>
								<div class="image_preview">

								</div>

							</div>
							<input class="btn btn-danger pull-right" style="margin-top:20px; margin-left:5px;"
								type="submit" value="Batal" data-dismiss="modal" />
							<input class="btn btn-success pull-right" style="margin-top:20px;" type="submit"
								value="Simpan" id="simpangbr" />
						</form>
					</div>
				</div>
			</div>
		</div> <!-- ./modal -->

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
						<div id="tampilfilter" class="accordion-body collapse in">
							<div class="accordion-inner">
								<form class="form-inline">
									<table>
										<tr>
											<td><label for="prodifil">Program Studi</label></td>
											<td>
												<select id="prodifil" name="prodifil" class="form-control">
													<option value="" disabled selected>Pilih</option>
													<option value="TI">Teknik Informatika</option>
													<option value="SI">Sistem Informasi</option>
												</select>
											</td>
										</tr>
										<tr>
											<td><label for="kelasfil">Kelas</label></td>
											<td>
												<select id="kelasfil" name="kelasfil" class="form-control">
													<option value="" disabled selected>Pilih</option>
													<option value="P1">P1</option>
													<option value="P2">P2</option>
													<option value="M1">M1</option>
												</select>
											</td>
										</tr>
										<tr>
											<td>&nbsp</td>
											<td>
												<button type="submit" id="filter" class="btn">Filter</button>
												<!-- <button type="submit" id="filterall" class="btn">Tampil Semua</button> -->
											</td>
										</tr>
									</table>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="ini"></div>
				<div class="widget-box">
					<button class="btn btn-success pull-right" id="tambah" style="margin:3px 5px;">
						<span class="icon-plus"></span> Tambah</button>
					<div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
						<h5>Data Mahasiswa Pembelajaran Online</h5>
					</div>

					<div class="widget-content nopadding">
						<table class="table table-bordered table-striped " style="text-align:center;">
							<thead>
								<tr>
									<!-- <th>Foto</th> -->
									<th>NIM</th>
									<th style="width:20%;">Nama</th>
									<th>Jekel</th>
									<th>Prodi</th>
									<th>Sem</th>
									<th>Kelas</th>
									<th colspan="3">Action</th>
								</tr>
							</thead>
							<tbody id="tbldatamhs">
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('components/foot'); ?>

<script src="assets/js/app/myfunction.js"></script>
<script src="assets/js/app/mahasiswa.js"></script>
<?php $this->load->view('components/jsfoot'); ?>
<script type="text/javascript">
	function readURL(input) {
		$('#previewLoad').show();
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('.image_preview').html('<img src="' + e.target.result + '" alt="' + reader.name +
					'" class="img-thumbnail" width="100" height="75"/>');
			}

			reader.readAsDataURL(input.files[0]);
			$('#previewLoad').hide();
		}
	}

	function reset() {
		$('#image').val("");
		$('.image_preview').html("");
	}
</script>
</body>

</html>