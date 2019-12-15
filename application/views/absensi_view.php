<?php $this->load->view('components/head'); ?>
<?php $this->load->view('components/navbar'); ?>

<!--sidebar-menu-->

<li><a href="home"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
<li class="submenu open"> <a href="#"><i class="icon icon-th-list"></i> <span>Manage Mahasiswa</span> <span
			class="icon icon-chevron-down pull-right" style="margin-right: 5px;"></span></a>
	<ul>
		<li><a href="mahasiswa">Data Mahasiswa</a></li>
		<li class="active"><a href="absensi">Absensi</a></li>
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
				href="absensi" class="current">Absensi</a> </div>
		<h1><span class="icon-briefcase"></span>
			Informasi <small>Absensi Mahasiswa</small></h1>
	</div>
	<hr>
	<div class="container-fluid">
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
									<table style="width:400px;">
										<tr>
											<td><label for="matakuliahfil">Matakuliah</label></td>
											<td>
												<select name="matakuliahfil" id="matakuliahfil" class="span11">
													<option value="" disabled selected>Pilih</option>
													<?php
														$namamk = $this->db->query("select * from tblmatakuliah");
														foreach($namamk->result() as $row)
														{
															echo "<option value='".$row->kodemk."'>".$row->namamk." - ".$row->prodi." - ".$row->semester."</option>";
														}
													?>
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
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
						<h5>Data Absensi Mahasiswa Pembelajaran Online</h5>
					</div>

					<div class="widget-content nopadding">
						<table class="table table-bordered table-striped ">
							<thead>
								<tr>
									<th>NIM</th>
									<th>Nama</th>
									<th>Team</th>
									<th>a1</th>
									<th>a2</th>
									<th>a3</th>
									<th>a4</th>
									<th>a5</th>
									<th>a6</th>
									<th>a7</th>
									<th>a8</th>
									<th>a9</th>
									<th>a10</th>
									<th>a11</th>
									<th>a12</th>
									<th>a13</th>
									<th>a14</th>
									<th>a15</th>
									<th>a16</th>
									<!-- <th align="center">Action</th> -->
								</tr>
							</thead>
							<tbody id="tabelabsen">
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
<script src="assets/js/app/absensi.js"></script>
<?php $this->load->view('components/jsfoot'); ?>
</body>

</html>