<?php $this->load->view('components/head'); ?>
<base href="<?= base_url(); ?>">
<?php $this->load->view('components/navbar'); ?>
<!--sidebar-menu-->
<li><a href="dosen/home"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
<li><a href="dosen/soal"><i class="icon icon-book"></i> <span>Manage Pertanyaan</span></a> </li>
<li><a href="dosen/diskusi"><i class="icon icon-group"></i> <span>Forum Diskusi</span></a> </li>
<li class="active"><a href="dosen/materi"><i class="icon icon-tasks"></i> <span>Manage Materi</span></a> </li>
<li><a href="dosen/nilai"><i class="icon icon-trophy"></i> <span>Penilaian</span></a> </li>
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
		<div id="breadcrumb"> <a href="dosen/home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a
				href="dosen/materi" class="current">Materi</a> </div>
		<h1><span class="icon-briefcase"></span>
			Manajemen Informasi <small>Materi Pembelajaran</small></h1>
	</div>
	<hr>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span3">
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
					</div>
					<div class="widget-content">
						<a href="dosen/subbuatmateri" class="thumbnail">
							<img src="assets/img/icons/044-note.png" alt="Materi">
							<div class="caption">
								<h4 align="center" class="textsub">Tambah Materi</h4>
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
						<a href="dosen/sublihatmateri" class="thumbnail">
							<img src="assets/img/icons/039-search.png" alt="Materi">
							<div class="caption">
								<h4 align="center" class="textsub">Lihat Materi</h4>
							</div>
						</a>
					</div>
				</div>
			</div>
			<div class="span6">
				<img src="assets/img/gambar2up.png" alt="" style="margin-top:15px;">
			</div>
		</div>
	</div>
</div>
</div>

<?php $this->load->view('components/foot'); ?>


<?php $this->load->view('components/jsfoot'); ?>
</body>

</html>