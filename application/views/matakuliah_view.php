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
<li class="submenu open"> <a href="#"><i class="icon icon-th-list"></i> <span>Manage Matakuliah</span> <span
			class="icon icon-chevron-down pull-right" style="margin-right: 5px;"></span></a>
	<ul>
		<li class="active"><a href="matakuliah">Matakuliah</a></li>
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
				href="matakuliah" class="current">Matakuliah</a> </div>
		<h1><span class="icon-briefcase"></span>
			Manajemen Informasi <small>Data Matakuliah</small></h1>
	</div>
	<hr>
	<div class="container-fluid">
		<div class="ini"></div>
		<!-- modal -->
		<div class="modal hide fade" tabindex="-1" role="dialog" id="form-matakuliah">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<h3>Form <span id="mode"></span> matakuliah</h3>
					</div>
					<div class="modal-body">

						<form class="form-horizontal" action="">
							<div class="control-group" id="tkdmk" style="display:none;">
								<label class="control-label" for="kodemk">kodemk</label>
								<div class="controls">
									<input type="text" id="kodemk" name="kodemk" class="form-control">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="namamk">Nama Matakuliah</label>
								<div class="controls">
									<input type="text" id="namamk" name="namamk" class="form-control">
								</div>
							</div>
							<!-- <div class="control-group">
								<label class="control-label" for="sks">SKS</label>
								<div class="controls">
									<input type="text" id="sks" name="sks" class="form-control">
								</div>
							</div> -->
							<div class="control-group">
								<label class="control-label" for="prodi">Program studi</label>
								<div class="controls" id="val1">
									<select id="prodi" name="prodi" class="form-control">
										<option value="" disabled selected>Pilih</option>
										<option value="TI">Teknik Informatika</option>
										<option value="SI">Sistem Informasi</option>
									</select>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="semester">Semester</label>
								<div class="controls">
									<select id="semester" name="semester" class="form-control">
										<option value="#" disabled selected>Pilih</option>
										<option value="1">I</option>
										<option value="2">II</option>
										<option value="3">III</option>
										<option value="4">IV</option>
										<option value="5">V</option>
										<option value="6">VI</option>
										<option value="7">VII</option>
										<option value="8">VIII</option>
									</select>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Dosen</label>
								<div class="controls">
									<select class="span3" name="iddosen" id="iddosen">
										<option disabled selected>Pilih</option>
										<?php
											$dosen = $this->db->query("select * from tbladmin where status = 'dosen'");
											foreach($dosen->result() as $row1)
											{
												echo "<option data-nama='".$row1->namaadmin."' value='".$row1->idadmin."'>".$row1->namaadmin."</option>";
											}	
										?>
									</select>
									<input type="hidden" name="namadosen" id="namadosen">
								</div>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button class="btn btn-success" id="simpan">
							<span class="icon-floppy-disk"></span> Simpan</button>
						<button class="btn btn-danger" data-dismiss="modal">
							<span class="icon-remove"></span> Batal</button>
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
											<td> <label for="prodifil">Prodi</label></td>
											<td>
												<div class="controls">
													<select id="prodifil" name="prodifil" class="form-control">
														<option value="" disabled selected>Pilih</option>
														<option value="TI">Teknik Informatika</option>
														<option value="SI">Sistem Informasi</option>
													</select>
												</div>
											</td>
										</tr>
										<tr>
											<td><label for="semesterfil">Semester</label></td>
											<td>
												<select id="semesterfil" name="semesterfil" class="form-control">
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
											</td>
										</tr>
										<tr>
											<td>&nbsp</td>
											<td>
												<button type="submit" id="filter" class="btn">Filter</button>
												<button type="submit" id="filterall" class="btn">Tampil Semua</button>
											</td>
										</tr>
									</table>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="widget-box">
					<button class="btn btn-success pull-right" id="tambah" style="margin:3px 5px;">
						<span class="icon-plus"></span> Tambah</button>
					<div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
						<h5>Data matakuliah Pembelajaran Online</h5>
					</div>

					<div class="widget-content nopadding">
						<table class="table table-bordered table-striped ">
							<thead>
								<tr>
									<th>Kode MK</th>
									<th style="width:400px;">Nama Matakuliah</th>
									<th style="width:400px;">Nama Dosen</th>
									<th>Jurusan</th>
									<th>Semester</th>
									<th colspan="2" style='width:10%;'>Action</th>
								</tr>
							</thead>
							<tbody id="tbldatamk">
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
<script src="assets/js/app/matakuliah.js"></script>


<?php $this->load->view('components/jsfoot'); ?>
</body>

</html>