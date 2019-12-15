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
				href="materi" class="current">Materi</a> </div>
		<h1><span class="icon-briefcase"></span>
			Manajemen <small>Soal Pembelajaran</small></h1>
	</div>
	<hr>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span3">
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
					</div>
					<div class="widget-content">
					<a href="subbuatsoal" class="thumbnail">
							<img src="assets/img/icons/031-q&a.png" alt="soal">
							<div class="caption">
								<h4 align="center" class="textsub">Tambah soal</h4>
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
					<a href="lihatsoal" class="thumbnail">
							<img src="assets/img/icons/038-laptop.png" alt="soal">
							<div class="caption">
								<h4 align="center" class="textsub">Lihat soal</h4>
							</div>
						</a>
					</div>
				</div>
			</div>
			<div class="span6">
				<img src="assets/img/gambar1up.jpg" alt="" style="margin-top:15px;">
			</div>
		</div>
	</div>
</div>
</div>

<?php $this->load->view('components/foot'); ?>


<?php $this->load->view('components/jsfoot'); ?>
</body>

</html>