<?php $this->load->view('components/head'); ?>
<base href="<?= base_url(); ?>">
<link rel="stylesheet" href="assets/css/bootstrap-wysihtml5.css" />
<!-- <script src="assets/js/app/rubahdis.js"></script> -->
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
		<div id="breadcrumb"> <a href="dosen/home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
				Home</a> <a href="dosen/rubahdis" class="current">Rubah Materi Diskusi</a> </div>
		<h1><span class="icon-briefcase"></span>
			Rubah<small> Materi diskusi</small></h1>
	</div>
	<hr>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="quick-actions_homepage offset2">
				<ul class="quick-actions">
					<li class="bg_lo span3"> <a href="dosen/lihatup"> <i class="icon-book"></i>Materi PDF </a> </li>
					<li class="bg_lg span3"> <a href="dosen/lihatdis"> <i class="icon-th-list"></i>Materi Diskusi</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<hr>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
						<h5>Tambah materi diskusi</h5>
					</div>
					<div class="widget-content nopadding">
						<?php
                            $idmateri = $_GET['idmateri'];
                            $namadsn = $this->db->query("select * from tblmateri where idmateri=$idmateri");
                            foreach($namadsn->result() as $row)
                            {
                        ?>
						<form action="dosen/rubahdis/simpandis" id="dis" name="myform" class="form-horizontal"
							enctype="multipart/form-data" method="POST">
							<input type="hidden" id="pertemuan" name="pertemuan" value="<?php  echo $row->pertemuan; ?>">
							<input type="hidden" id="idmateri" name="idmateri" value="<?php  echo $row->idmateri; ?>">
							<input type="hidden" id="tanggal" name="tanggal" value="<?php  echo $row->tanggal; ?>">
							<input type="hidden" name="mat" id="mat" value="<?php echo $this->session->userdata('ses_kodemk');?>">
							<input type="hidden" name="prd" id="prd" value="<?php echo $this->session->userdata('ses_prodi');?>">
							<input type="hidden" name="sem" id="sem" value="<?php echo $this->session->userdata('ses_semester');?>">
							<input type="hidden" name="matakuliah" id="matakuliah" value="<?php echo $this->session->userdata('ses_kodemk');?>">
							<input type="hidden" name="prodi" id="prodi" value="<?php echo $this->session->userdata('ses_prodi');?>">
							<input type="hidden" name="semester" id="semester" value="<?php echo $this->session->userdata('ses_semester');?>">
							<div class="control-group">
								<label class="control-label"><strong>Judul Materi</strong></label>
								<div class="controls">
									<textarea class="span8" name="judulmateri" id="judulmateri" cols="5" rows="3"
										style="resize:vertical;"><?php echo $row->judulmateri; ?></textarea>
									<br>
									<?php echo form_error('judulmateri'); ?>
								</div>
							</div>
							<div class="control-group" style="margin-right:10px;">
								<label class="control-label"><strong>Isi Materi</strong></label>
								<div class="controls">
									<textarea class="span12" rows="6" placeholder="Materi diskusi online..."
										name="file2"><?php echo $row->file; ?></textarea>
									<br>
									<?php echo form_error('file'); ?>
								</div>
							</div>
							<?php } ?>
							<div class="form-actions">
								<button id="simpandis" class="btn btn-warning pull-right">
									<span class="icon-plus"></span> Rubah</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>






<?php $this->load->view('components/foot'); ?>

<?php $this->load->view('components/jsfoot'); ?>
<script src="assets/ckeditor/ckeditor.js"></script>
<script src="assets/ckfinder/ckfinder.js"></script>

<!-- <script src="assets/js/wysihtml5-0.3.0.js"></script>
<script src="assets/js/jquery.peity.min.js"></script>
<script src="assets/js/bootstrap-wysihtml5.js"></script> -->

<!-- <script src="assets/js/app/subuploadmateri.js"></script> -->
<!-- <script>
	$('.textarea_editor1').wysihtml5();
</script> -->
<script>
	// Replace the <textarea id="editor1"> with a CKEditor
	// instance, using default configuration.
	var editor = CKEDITOR.replace( 'file2' );
	CKFinder.setupCKEditor( editor );
</script>
<script>
	document.getElementById('matakuliah').value = document.getElementById('mat').value;
</script>
</body>

</html>