<?php $this->load->view('components/head'); ?>
<?php $this->load->view('components/navbar'); ?>

<!--sidebar-menu-->

<li><a href="home"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
<li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Manage Mahasiswa</span> <span
			class="icon icon-chevron-down pull-right" style="margin-right: 5px;"></span></a>
	<ul>
		<li><a href="mahasiswa">Data Mahasiswa</a></li>
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
<li class="active"><a href="admin"><i class="icon icon-user"></i> <span>Manage Admin</span></a> </li>
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
				href="admin" class="current">Admin</a> </div>
		<h1><span class="icon-briefcase"></span>
			Manajemen Informasi <small>Data Mahasiswa</small></h1>
	</div>
	<hr>
	<div class="container-fluid">
		<div class="ini"></div>
		<!-- modal -->
		<div class="modal hide fade" tabindex="-1" role="dialog" id="form-admin">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<h3>Form <span id="mode"></span> Admin</h3>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" action="">
							<div class="control-group">
								<label class="control-label" for="idadmin">ID Admin</label>
								<div class="controls">
									<input type="number" id="idadmin" name="idadmin" class="form-control">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="namaadmin">Nama</label>
								<div class="controls">
									<input type="text" id="namaadmin" name="namaadmin" class="form-control">
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
										<option value="Buddha">Buddha</option>
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
								<label class="control-label" for="status">Status</label>
								<div class="controls">
									<select id="status" name="status" class="form-control">
										<option value="" disabled selected>Pilih</option>
										<option value="admin">Admin</option>
										<option value="dosen">Dosen</option>
									</select>
									<span name="status"></span>
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
					<!-- action="mahasiswa/upload" method="POST" -->
					<div class="modal-body">
						<form name="form2" enctype="multipart/form-data">
							<input type="hidden" name="idadmin1" id="idadmin1">
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
					<!-- <div class="modal-footer">
						<button class="btn btn-success" type="submit">
							<span class="icon-floppy-disk"></span> Simpan</button>
						<button class="btn btn-danger" data-dismiss="modal">
							<span class="icon-remove"></span> Batal</button>
					</div> -->
				</div>
			</div>
		</div> <!-- ./modal -->

		<div class="row-fluid">
			<div class="span12">
				<div class="widget-box">
					<button class="btn btn-success pull-right" id="tambah" style="margin:3px 5px;">
						<span class="icon-plus"></span> Tambah</button>
					<div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
						<h5>Data Admin Pembelajaran Online</h5>
					</div>

					<div class="widget-content nopadding">
						<table class="table table-bordered table-striped ">
							<thead>
								<tr>
									<th>ID Admin</th>
									<th>Nama</th>
									<th>Alamat</th>
									<th>E-mail</th>
									<th>Tgl Lahir</th>
									<th>Agama</th>
									<th>Jekel</th>
									<th>Telepon</th>
									<th>Status</th>
									<th colspan="3">Action</th>
								</tr>
							</thead>
							<tbody id="tbladmin">

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
<script src="assets/js/app/admin.js"></script>
<?php $this->load->view('components/jsfoot'); ?>
<script>
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
</script>
</body>

</html>