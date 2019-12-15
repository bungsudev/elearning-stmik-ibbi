<?php $this->load->view('components/head'); ?>
<base href="<?= base_url(); ?>">
<!-- <link rel="stylesheet" href="assets/css/bootstrap-wysihtml5.css" /> -->

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
			Buat Soal<small> Essai ataupun pilihan berganda</small></h1>
	</div>
	<hr>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="quick-actions_homepage offset2">
				<ul class="quick-actions">
					<li class="bg_lo span3"> <a href="subuploadmateri"> <i class="icon-book"></i>Upload Materi PDF
						</a> </li>
					<li class="bg_lg span3"> <a href="subbuatdiskusi"> <i class="icon-th-list"></i> Buat Materi
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
			<div class="span12">
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
						<h5>Tambah materi diskusi</h5>
					</div>
					<div class="widget-content nopadding">
						<form action="subbuatdiskusi/simpan" id="myform" name="myform" class="form-horizontal"
							enctype="multipart/form-data" method="POST">
							<input type="hidden" name="f" id="f"
								value="<?php echo $this->session->flashdata('berhasil');?>">
							<div class="control-group">
								<label class="control-label"><strong>Matakuliah</strong></label>
								<div class="controls">
									<select class="span6" name="matakuliah" id="matakuliah">
										<option disabled selected>Pilih</option>
										<?php
											$namamk = $this->db->query("select * from tblmatakuliah");
											foreach($namamk->result() as $row)
											{
												echo "<option data-prodi='$row->prodi' data-sem='$row->semester' value='".$row->kodemk."'>".$row->namamk." | ".$row->prodi." - ".$row->semester."</option>";
											}	
										?>
									</select>
									<br>
									<?php echo form_error('matakuliah'); ?>
								</div>
							</div>
							<input type="hidden" name="prodi" id="prodi">
							<input type="hidden" name="semester" id="semester">

							<div class="control-group">
								<label class="control-label"><strong>Judul Materi</strong></label>
								<div class="controls">
									<textarea class="span8" name="judulmateri" id="judulmateri" cols="5" rows="3"
										style="resize:vertical;"></textarea>
									<br>
									<?php echo form_error('judulmateri'); ?>
								</div>
							</div>
							<div class="control-group" style="margin-right:10px;">
								<label class="control-label"><strong>Isi Materi</strong></label>
								<div class="controls">
									<textarea class="span12" rows="6" placeholder="Materi diskusi online..."
										name="file"></textarea>
									<br>
									<?php echo form_error('file'); ?>
								</div>
							</div>
							<div class="form-actions">
								<button id="simpan" class="btn btn-success pull-right">
									<span class="icon-plus"></span> Tambah</button>
								<button type="reset" onclick="window.location.reload()"
									class="btn btn-default pull-right">
									<span class="icon-refresh"></span> Reset</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>






<?php $this->load->view('components/foot'); ?>
<script>
	$(document).ready(function () {
		flash = $('#f').attr('value');
		if (flash == "Materi diskusi terupload.") {
			var divMessage = "<div class='alert alert-success'>" +
				"<strong>Berhasil! </strong> <span>" + flash + "</span>" +
				"</div>";
			$(divMessage)
				.prependTo(".ini")
				.delay(2000)
				.slideUp("slow");
		}
		$('#matakuliah').on('change', function() {
			// alert('asd');
			prodi = $(this).find(':selected').data('prodi');
			semester = $(this).find(':selected').data('sem');
			console.log(prodi,semester);
			$("#prodi").val(prodi);
			$("#semester").val(semester);
		});
	});
</script>
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
	// CKEDITOR.replace('file');
	var editor = CKEDITOR.replace( 'file' );
	CKFinder.setupCKEditor( editor );
</script>
</body>

</html>