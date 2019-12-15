<?php $this->load->view('components/head'); ?>
<base href="<?= base_url(); ?>">
<!-- <link rel="stylesheet" href="assets/css/bootstrap-wysihtml5.css" /> -->

<?php $this->load->view('components/navbar'); ?>
<li><a href="dosen/home"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
<li class="active"><a href="dosen/soal"><i class="icon icon-book"></i> <span>Manage Pertanyaan</span></a> </li>
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
					<li class="bg_lo span3"> <a href="dosen/soalesai"> <i class="icon-book"></i>Buat Essai </a> </li>
					<li class="bg_lg span3"> <a href="dosen/soalpilgan"> <i class="icon-th-list"></i> Buat Pilihan
							Berganda</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<hr>
	<div class="container-fluid">
		<div class="ini"></div>
		<div class="row-fluid">
			<div class="widget-box">
				<button class="btn btn-danger pull-right" id="deleteall" style="margin:3px 5px;">
					<span class="icon-remove"></span> Delete All</button>
				<div class="widget-title"> <span class="icon"> <i class="icon-th"></i>
					</span>
					<h5>Soal pilihan berganda yang telah didaftarkan</h5>
				</div>

				<div class="widget-content nopadding">
					<table class="table table-bordered table-striped ">
						<thead>
							<tr>
								<th style="width:30px">No</th>
								<th>Matakuliah</th>
								<th>isi Soal</th>
								<th style="width:30px">Jawaban</th>
								<th align="center">Action</th>
							</tr>
						</thead>
						<tbody id="tblpilgan">
						</tbody>
					</table>
				</div>
			</div>
			<div class="widget-box">
				<div class="widget-title"> <span class="icon"> <i class="icon-plus"></i> </span>
					<h5>Buat Soal Pilihan Berganda</h5>
				</div>
				<div class="widget-content nopadding">
					<form action="" id="form1" name="form1" class="form-horizontal" enctype="multipart/form-data">
						<input type="hidden" name="noabsen" id="noabsen">
						<input type="hidden" name="kodemkses" id="kodemkses" value="<?php echo $this->session->userdata('ses_kodemk');?>">
						<input type="hidden" name="prodises" id="prodises" value="<?php echo $this->session->userdata('ses_prodi');?>">
						<input type="hidden" name="semesterses" id="semesterses" value="<?php echo $this->session->userdata('ses_semester');?>">
						<input type="hidden" name="tanggal" id="tanggal" value="<?= date('Y-m-d H:i:s');?>">
						<div class="control-group">
							<label class="control-label" for="tipetugas"><strong>Tipe Tugas</strong></label>
							<div class="controls">
								<select id="tipetugas" name="tipetugas" class="form-control">
									<option disabled selected>Pilih</option>
									<option value="quiz">Quiz</option>
									<option value="tugas">Tugas</option>
									<option value="uts">UTS</option>
								</select>
								<span name="tipetugas"></span>
							</div>
						</div>	
						<div class="control-group">
							<label class="control-label" for="idsoalpil"><strong>Pertemuan Ke - </strong></label>
							<div class="controls">
								<input class="span1" type="text" id="idsoalpil" name="idsoalpil" readonly value="-">								
								<!-- <select id="idsoal" name="idsoal" class="form-control">
									<option value="" disabled selected>Pilih</option>									
								</select> -->
								<span name="idsoalpil"></span>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label"><strong>No
									Soal</strong></label>
							<div class="controls">
								<input class="span1" type="text" id="nopilgan" name="nopilgan" readonly>
							</div>
						</div>						
						<div class="control-group">
							<label class="control-label"><strong>Isi
									Soal</strong></label>
							<div class="controls">
								<textarea class="span12" name="isipilgan" id="isipilgan" rows="6"
									placeholder="Ketikan soal..."></textarea>
								<span name="isipilgan"></span>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label"><strong>Pilihan A</strong></label>
							<div class="controls">
								<textarea class="span12" name="pila" id="pila" rows="2"
									placeholder="isi pilihan A..."></textarea>
								<span name="pila"></span>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label"><strong>Pilihan B</strong></label>
							<div class="controls">
								<textarea class="span12" name="pilb" id="pilb" rows="2"
									placeholder="isi pilihan B..."></textarea>
								<span name="pilb"></span>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label"><strong>Pilihan C</strong></label>
							<div class="controls">
								<textarea class="span12" name="pilc" id="pilc" rows="2"
									placeholder="isi pilihan C..."></textarea>
								<span name="pilc"></span>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label"><strong>Pilihan D</strong></label>
							<div class="controls">
								<textarea class="span12" name="pild" id="pild" rows="2"
									placeholder="isi pilihan D..."></textarea>
								<span name="pild"></span>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="jawabanpilgan"><strong>Jawaban</strong></label>
							<div class="controls">
								<select id="jawabanpilgan" name="jawabanpilgan" class="span3">
									<option value="" disabled selected>Pilih</option>
									<option value="A">A</option>
									<option value="B">B</option>
									<option value="C">C</option>
									<option value="D">D</option>
								</select>
								<span name="jawabanpilgan"></span>
							</div>
						</div>
					</form>
					<div class="form-actions">
						<button type="submit" id="kirimpilgan" class="btn btn-info pull-right">
							<span class="icon-upload"></span> Kirim ke mahasiswa</button>
						<!-- <button type="submit" id="selesaipilgan" class="btn btn-warning pull-right"
							style="margin-right:10px;">
							<span class="icon-ok"></span> Selesai</button> -->
						<button type="submit" id="tambahpilgan" class="btn btn-success pull-right"
							style="margin-right:10px;">
							<span class="icon-plus"></span> Tambah</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('components/foot'); ?>
<script src="assets/js/app/myfunction.js"></script>
<script src="assets/js/app/dosen/soalpilgan.js"></script>
<?php $this->load->view('components/jsfoot'); ?>
<script src="assets/ckeditor/ckeditor.js"></script>
<script src="assets/ckfinder/ckfinder.js"></script>
<script>
	// Replace the <textarea id="editor1"> with a CKEditor
	// instance, using default configuration.
	CKEDITOR.replace('isipilgan', {
		width: 870,
		height: 100
	});
	CKEDITOR.replace('pila', {
		width: 870,
		height: 100
	});
	CKEDITOR.replace('pilb', {
		width: 870,
		height: 100
	});
	CKEDITOR.replace('pilc', {
		width: 870,
		height: 100
	});
	CKEDITOR.replace('pild', {
		width: 870,
		height: 100
	});
	CKFinder.setupCKEditor();
</script>
<!-- <script>
	var seq = 0;

	function tambahidsoal() {
		seq = seq + 1; 
		number = ''.substr(String(seq).length) + seq
		document.getElementById("noesai").value = number;
	}
</script> -->
<script>
	function yesnoCheck(that) {
		if (that.value == "Y") {
			// alert("check");
			document.getElementById("absen").style.display = "block";
		} else {
			document.getElementById("absen").style.display = "none";
		}
	}
</script>
</body>

</html>