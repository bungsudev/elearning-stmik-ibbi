<?php $this->load->view('components/head'); ?>
<base href="<?= base_url(); ?>">

<link rel="stylesheet" href="assets/css/bootstrap-wysihtml5.css" />
<?php $this->load->view('components/navbar'); ?>
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
				Home</a> <a href="dosen/subbuatsoal" class="current">Tambah Soal</a> </div>
		<h1><span class="icon-briefcase"></span>
			Buat Soal<small> Essai ataupun pilihan berganda</small></h1>
	</div>
	<hr>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="quick-actions_homepage offset2">
				<ul class="quick-actions">
					<li class="bg_lo span3"> <a href="dosen/subuploadmateri"> <i class="icon-book"></i>Upload Materi PDF
						</a> </li>
					<li class="bg_lg span3"> <a href="dosen/subbuatdiskusi"> <i class="icon-th-list"></i> Buat Materi
							Diskusi</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<hr>
	<div class="container-fluid">
		<div class="ini"></div>
		<div class="row-fluid">
			<div class="span8 offset2">
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
						<h5>Upload materi</h5>
					</div>
					<div class="widget-content nopadding">
						<form action="dosen/subuploadmateri/do_upload" class="form-horizontal" enctype="multipart/form-data"
							method="POST">
							<input type="hidden" name="f" id="f"
								value="<?php echo $this->session->flashdata('berhasil');?>">								
							<input type="hidden" name="matakuliah" id="matakuliah" value="<?php echo $this->session->userdata('ses_kodemk');?>">
							<input type="hidden" name="prodi" id="prodi" value="<?php echo $this->session->userdata('ses_prodi');?>">
							<input type="hidden" name="semester" id="semester" value="<?php echo $this->session->userdata('ses_semester');?>">
							<div class="control-group">
								<label class="control-label"><strong>Judul Materi</strong></label>
								<div class="controls">
									<textarea name="judulmateri" class="span11" id="judulmateri" cols="5"
										rows="3"></textarea>
									<br>
									<?php echo form_error('judulmateri'); ?>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label"><strong>Upload materi</strong></label>
								<div class="controls">
									<input type="file" id="upload" name="upload" />
									<br>
									<?php echo form_error('upload'); ?>
								</div>
							</div>
							<div class="form-actions">
								<button type="submit" id="uploadmateri" class="btn btn-success pull-right">
									<span class="icon-plus"></span> Tambah</button>
								<button type="reset" class="btn btn-default pull-right">
									<span class="icon-refresh"></span> Reset</button>
							</div> 
						</form>
					</div>
				</div>
			</div>
		</div>
		<hr>
	</div>
</div>

<?php $this->load->view('components/foot'); ?>
<script>
	$(document).ready(function () {
		flash = $('#f').attr('value');
		if (flash == "Materi ter-upload.") {
			var divMessage = "<div class='alert alert-success'>" +
				"<strong>Berhasil! </strong> <span>" + flash + "</span>" +
				"</div>";
			$(divMessage)
				.prependTo(".ini")
				.delay(2000)
				.slideUp("slow");
		}
		// $('#matakuliah').on('change', function() {
		// 	// alert('asd');
		// 	prodi = $("#prodises").val();
		// 	semester = $("#prodises").val();
		// 	console.log(prodi,semester);
		// 	$("#prodi").val(prodi);
		// 	$("#semester").val(semester);
		// });
	});
</script>
<?php $this->load->view('components/jsfoot'); ?>

</body>

</html>