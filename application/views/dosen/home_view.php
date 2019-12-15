<?php $this->load->view('components/head'); ?>
<base href="<?= base_url(); ?>">
<?php $this->load->view('components/navbar'); ?>
<!--sidebar-menu-->
<li class="active"><a href="dosen/home"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
<li><a href="dosen/soal"><i class="icon icon-book"></i> <span>Manage Pertanyaan</span></a> </li>
<li><a href="dosen/diskusi"><i class="icon icon-group"></i> <span>Forum Diskusi</span></a> </li>
<li><a href="dosen/materi"><i class="icon icon-tasks"></i> <span>Manage Materi</span></a> </li>
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

<!--main-container-part-->
<div id="content">
	<div class="ini"></div>
        <input type="hidden" name="kodemkses" id="kodemkses" value="<?php echo $this->session->userdata('ses_kodemk');?>">
		<input type="hidden" name="prodises" id="prodises" value="<?php echo $this->session->userdata('ses_prodi');?>">
		<input type="hidden" name="semesterses" id="semesterses" value="<?php echo $this->session->userdata('ses_semester');?>">
        
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
					<li class="bg_lo span3"> <a href="dosen/subbuatsoal"> <i class="icon-book"></i> Buat Soal</a> </li>
					<li class="bg_lg span3"> <a href="dosen/subuploadmateri"> <i class="icon-upload-alt"></i> Upload Materi</a>
					</li>
					<li class="bg_ly"> <a href="dosen/subbuatdiskusi"> <i class="icon-group"></i> Buat Diskusi </a> </li>
					<li class="bg_lo"> <a href="dosen/nilai"> <i class="icon-trophy"></i> Penilaian </a> </li>
				</ul>
			</div>
		</div>
		<!--End-Action boxes-->
	</div>
	<hr />
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="widget-box">
				<div class="widget-title"> <span class="icon"> <i class="icon-bullhorn"></i> </span>
					<h5>Pengumuman</h5>
				</div>
				<div class="widget-content" >
					<table id="tblpeng" width='100%'>
					</table>
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
			<input type="hidden" name="iddsn" id="iddsn" value='<?= $this->session->userdata('ses_id') ?>'>
			<!-- <input class="btn btn-danger pull-right" style=" margin-left:5px;" type="reset" value="Batal" /> -->
			<input class="btn btn-success pull-right" type="submit" value="Kirim" id="kirim" />
		</form>
	</div>
</div>

<!--end-main-container-part-->

<?php $this->load->view('components/foot'); ?>
<script src="assets/js/app/dosen/home.js"></script>

<?php $this->load->view('components/jsfoot'); ?>
<script src="assets/ckeditor/ckeditor.js"></script>
<script src="assets/ckfinder/ckfinder.js"></script>
<script>
	// Replace the <textarea id="editor1"> with a CKEditor
	// instance, using default configuration.
	CKEDITOR.replace('isi');
	// , {
	// 	startupFocus: true
	// }
	CKFinder.setupCKEditor();
</script>
</body>

</html>