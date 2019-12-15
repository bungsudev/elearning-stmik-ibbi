<?php $this->load->view('components/head'); ?>
<base href="<?= base_url() ?>">
<?php $this->load->view('components/navbar'); ?>

<li class="active"><a href="home"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
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
		<li><a href="matakuliah">Matakuliah</a>
		</li>
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

<!--main-container-part-->
<div id="content">
	<div class="ini"></div>
	<!--breadcrumbs-->
	<div id="content-header">
		<div id="breadcrumb"> <a href="home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
				Home</a></div>
	</div>
	<!--End-breadcrumbs-->
	<!--Action boxes-->
	<div class="container-fluid">
		<div class="row-fluid span12">
			<div class="quick-actions_homepage">
				<ul class="quick-actions">
					<li class="bg_lo span3"> <a href="subbuatsoal"> <i class="icon-book"></i>Buat Soal </a> </li>
					<li class="bg_lg span3"> <a href="subuploadmateri"> <i class="icon-upload-alt"></i> Upload
							Materi</a>
					</li>
					<li class="bg_ly"> <a href="diskusi"> <i class="icon-group"></i> Ruang Diskusi </a> </li>
					<li class="bg_lo"> <a href="nilai"> <i class="icon-trophy"></i> Penilaian </a> </li>
				</ul>
			</div>
			<!--End-Action boxes-->
		</div>
	</div>
	<hr>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="widget-box">
				<div class="widget-title"> <span class="icon"> <i class="icon-bullhorn"></i> </span>
					<h5>Pengumuman</h5>
				</div>
				<div class="widget-content" >
					<table id="tblpeng" width='100%'>

					</table>
					<!-- <ul class="recent-posts"> -->
						<!-- <li><div class="user-thumb"> <img width="40" height="40" alt="User"
								src="assets/img/fotomahasiswa/123456.jpg"></div>
							<div class="article-post">
								<span class="user-info"> By: john Deo / Date: 2 Aug 2012 / Time:09:27 AM </span>
								<p>This is a much longer one that will go on for a few lines.It has multiple
									paragraphs and is full of waffle to pad out the comment. </p></div>
						</li> -->
					<!-- </ul> -->
				</div>
			</div>
		</div>
		<form name="form1" id="form1">
			<div class="control-group">
				<div class="controls">
					<textarea class="span12" rows="4" name="isi" id="isi" placeholder="Ketikan soal..."></textarea>
					<span name="isi"></span>
				</div>
			</div>
			<input type="hidden" name="isihide" id="isihide">
			<!-- <input class="btn btn-danger pull-right" style=" margin-left:5px;" type="reset" value="Batal" /> -->
			<input class="btn btn-success pull-right" type="submit" value="Kirim" id="kirim" />
		</form>
	</div>
</div>

<!--end-main-container-part-->

<?php $this->load->view('components/foot'); ?>
<script src="assets/js/app/home.js"></script>

<?php $this->load->view('components/jsfoot'); ?>
<script src="assets/ckeditor/ckeditor.js"></script>
<script src="assets/ckfinder/ckfinder.js"></script>
<script>
	// Replace the <textarea id="editor1"> with a CKEditor
	// instance, using default configuration.
	CKEDITOR.replace('isi');
	CKFinder.setupCKEditor();
</script>
</body>

</html>