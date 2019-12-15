<?php $this->load->view('components/head'); ?>
<base href="<?= base_url(); ?>">
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
		<li class="active"><a href="materi"> Materi</a></li>
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
		<div id="breadcrumb"> <a href="home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
				Home</a> <a href="subbuatsoal" class="current">Tambah Soal</a> </div>
		<h1><span class="icon-briefcase"></span>
			Lihat Materi<small> Pembelajaran Online</small></h1>
	</div>
	<hr>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="quick-actions_homepage offset2">
				<ul class="quick-actions">
					<li class="bg_lo span3"> <a href="lihatup"> <i class="icon-book"></i>Materi PDF </a> </li>
					<li class="bg_lg span3"> <a href="lihatdis"> <i class="icon-th-list"></i>Materi Diskusi</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<hr>
	<div class="container-fluid">	
		<div class="ini"></div>
		<div class="row-fluid">
			<div class="span12">
			<input type="hidden" name="f" id="f" value="<?php echo $this->session->flashdata('berhasil');?>">
				<!-- Diskusi============================================================================== -->
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
											<td><label for="matakuliahfil">Matakuliah</label></td>
											<td>
											<select class="span12" name="matakuliahfil" id="matakuliahfil">
												<option value="" disabled selected>Pilih</option>
												<?php
													$namamk = $this->db->query("select * from tblmatakuliah");
													foreach($namamk->result() as $row)
													{
														echo "<option value='".$row->kodemk."'>".$row->namamk." | ".$row->prodi." - ".$row->semester."</option>";
													}										
													
												?>
											</select>
											</td>
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
					<button class="btn btn-success pull-right" onclick="location.href='subbuatdiskusi'"
						style="margin:3px 5px;">
						<span class="icon-plus"></span> Tambah</button>
					<div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
						<h5>Materi Forum Diskusi</h5>
					</div>
					<div class="widget-content nopadding">
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
									<th style="width:30px;">Pertemuan</th>
									<th style="width:30px;">Semester</th>
									<th style="width:150px;">Program Studi</th>
									<th style="width:80px;">Matakuliah</th>
									<th style="width:auto;">Judul Materi</th>
									<th style="width:150px;">Tanggal</th>
									<th colspan="2">Action</th>
								</tr>
							</thead>
							<tbody id="tbldis">
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
<script src="assets/js/app/lihatdis.js"></script>
<!-- <script>
	$(document).ready(function () {
		alert("read");
		flash = $('#f').attr('value');
		if (flash == "Berhasil, Materi terhapus.") {
			var divMessage = "<div class='alert alert-success'>" +
				"<strong>Berhasil! </strong> <span>" + flash + "</span>" +
				"</div>";
			$(divMessage)
				.prependTo(".ini")
				.delay(2000)
				.slideUp("slow");
		}
	});
</script> -->
<?php $this->load->view('components/jsfoot'); ?>

</body>

</html>