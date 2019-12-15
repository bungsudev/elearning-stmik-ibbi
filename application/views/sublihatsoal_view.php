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
		<li><a href="matakuliah">Matakuliah</a></li>
		<li><a href="materi"> Materi</a></li>
		<li class="active"><a href="soal">Pertanyaan</a></li>
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
				href="sublihatsoal" class="current">Lihat soal</a> </div>
		<h1><span class="icon-briefcase"></span>
			Lihat Soal Pembelajaran<small> Online</small></h1>
	</div>
	<hr>
	<div class="container-fluid">

		<div class="row-fluid">
			<div class="span12">
				<div class="accordion" id="collapsefilter">
					<div class="accordion-group" style="width:400px;">
						<div class="accordion-heading">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#collapsefilter"
								href="#tampilfilteresai">
								<strong>Filter Data <span class="icon icon-chevron-down"></span></strong>
							</a>
						</div>
						<div id="tampilfilteresai" class="accordion-body collapse">
							<div class="accordion-inner">
								<form class="form-inline">
									<table>
										<tr>
											<td><label for="matakuliahesai">Matakuliah</label></td>
											<td>
												<select name="matakuliahesai" id="matakuliahesai">
													<option value="#" disabled selected>Pilih</option>
													<?php
														$namamk = $this->db->query("select * from tblmatakuliah");
														foreach($namamk->result() as $row)
														{
															echo "<option value='".$row->kodemk."'>".$row->namamk."</option>";
														}
													?>
												</select>
											</td>
										</tr>
										<tr>
											<td> <label for="idsoalfil">ID Soal</label></td>
											<td><input type="text" id="idsoalfil" name="idsoalfil"
													placeholder="Optional"></td>
										</tr>
										<tr>
											<td>&nbsp</td>
											<td><button type="submit" id="filteresai" class="btn">Filter</button></td>
										</tr>
									</table>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
						<h5>Materi Pembelajaran Online PDF/WORD/EXCEL</h5>
					</div>

					<div class="widget-content nopadding">
						<table class="table table-bordered table-striped ">
							<thead>
								<tr>
									<th>No</th>
									<th style="width:auto;">Nama</th>
									<th>Alamat</th>
									<th>E-mail</th>
									<th>TTL</th>
									<th>Telepon</th>
									<th>Jekel</th>
									<th>Prodi</th>
									<th>Sem</th>
									<th>Kelas</th>
									<th colspan="3">Action</th>
								</tr>
							</thead>
							<tbody id="esai">
							</tbody>
						</table>
					</div>
				</div>
				<!-- Diskusi -->
				<div class="accordion" id="collapsefilter">
					<div class="accordion-group" style="width:400px;">
						<div class="accordion-heading">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#collapsefilter"
								href="#tampilfilterpilgan">
								<strong>Filter Data <span class="icon icon-chevron-down"></span></strong>
							</a>
						</div>
						<div id="tampilfilterpilgan" class="accordion-body collapse">
							<div class="accordion-inner">
								<form class="form-inline">
									<table>
										<tr>
											<td><label for="semesterpilgan">Semester</label></td>
											<td>
												<select class="span4" id="semesterpilgan" name="semesterpilgan">
													<option value="pilih" disabled selected>Pilih
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
											<td><label for="kelaspilgan">Kelas</label></td>
											<td>
												<select class="span4" id="kelaspilgan" name="kelaspilgan">
													<option value="pilih" disabled selected>Pilih
													<option value="P1">P1</option>
													<option value="P2">P2</option>
													<option value="M1">M1</option>
												</select>
											</td>
										</tr>
										<tr>
											<td> <label for="judulsoalpilgan">Judul Soal</label></td>
											<td><input type="text" id="judulsoalpilgan" name="judulsoalpilgan"
													placeholder="Optional"></td>
										</tr>
										<tr>
											<td>&nbsp</td>
											<td><button type="submit" id="filterpilgan" class="btn">Filter</button></td>
										</tr>
									</table>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
						<h5>Materi Forum Diskusi</h5>
					</div>

					<div class="widget-content nopadding">
						<table class="table table-bordered table-striped ">
							<thead>
								<tr>
									<th>No</th>
									<th style="width:auto;">Nama</th>
									<th>Alamat</th>
									<th>E-mail</th>
									<th>TTL</th>
									<th>Telepon</th>
									<th>Jekel</th>
									<th>Prodi</th>
									<th>Sem</th>
									<th>Kelas</th>
									<th colspan="3">Action</th>
								</tr>
							</thead>
							<tbody id="tablepilgan">
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
<script src="assets/js/app/sublihatsoal.js"></script>


<?php $this->load->view('components/jsfoot'); ?>
</body>

</html>