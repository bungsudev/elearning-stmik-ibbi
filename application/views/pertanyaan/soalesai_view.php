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
					<li class="bg_lo span3"> <a href="soalesai"> <i class="icon-book"></i>Buat Essai </a> </li>
					<li class="bg_lg span3"> <a href="soalpilgan"> <i class="icon-th-list"></i> Buat Pilihan
							Berganda</a> </li>
				</ul>
			</div>
		</div>
	</div>
	<hr>
	<div class="container-fluid">
		<div id="modalkirim" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
			aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 id="myModalLabel"> Kirim soal ke mahasiswa </h3>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="" id="form2" name="form2">
					<div class="control-group">
						<label class="control-label" for="kirprodi">Program studi</label>
						<div class="controls" id="val1">
							<select id="kirprodi" name="kirprodi" class="form-control">
								<option value="" disabled selected>Pilih</option>
								<option value="TI">Teknik Informatika</option>
								<option value="SI">Sistem Informasi</option>
							</select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="kirsem">Semester</label>
						<div class="controls" id="val2">
							<select id="kirsem" name="kirsem" class="form-control span1">
								<option value="" disabled selected>Pilih</option>
								<option value="1">I</option>
								<option value="2">II</option>
								<option value="3">III</option>
								<option value="4">IV</option>
								<option value="5">V</option>
								<option value="6">VI</option>
								<option value="7">VII</option>
								<option value="8">VIII</option>
							</select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="tipetugas">Tipe</label>
						<div class="controls" id="val3">
							<select id="tipetugas" name="tipetugas" class="form-control">
								<option value="" disabled selected>Pilih</option>
								<option value="quiz">Quiz</option>
								<option value="tugas">Tugas</option>
								<option value="uts">UTS</option>
								<option value="kelompok">Kelompok</option>
							</select>
							<span name="tipetugas"></span>
						</div>
					</div>
					<!-- <div class="control-group" id='tipe' style="display: none;">
						<label class="control-label" for="tptugas"></label>
						<div class="controls">
							<select id="tptugas" name="tptugas" class="form-control">
								<option value="" disabled selected>Pilih</option>
								<option value="personal">Personal</option>
								<option value="kelompok">Kelompok</option>
							</select>
							<span name="tptugas"></span>
						</div>
					</div> -->
					<input type="hidden" name="noabsen" id="noabsen">
					<input type="hidden" name="kodemk" id="kodemk">
					<!-- <div class="control-group">
						<label class="control-label" for="pilihabsen">Absensi</label>
						<div class="controls" id="val4">
							<select id="pilihabsen" name="pilihabsen" class="form-control span1">
								<option value="" disabled selected>Pilih</option>
								<option value="Y">Ya</option>
								<option value="N">Tidak</option>
							</select>
							<span name="pilihabsen"></span>
						</div>
					</div> -->	
				</form>
			</div>
			<div class="modal-footer">
				<button class="btn btn-success" id="kirimsoal">
					<span class="icon-floppy-disk"></span> Kirim Soal</button>
				<button class="btn btn-danger" data-dismiss="modal">
					<span class="icon-remove"></span> Batal</button>
			</div>
		</div>
		<!-- modal kirim -->
		<div class="ini"></div>
		<div class="row-fluid">
			<div class="widget-box">
				<button class="btn btn-danger pull-right" id="deleteall" style="margin:3px 5px;">
					<span class="icon-remove"></span> Delete All</button>
				<div class="widget-title"> <span class="icon"> <i class="icon-th"></i>
					</span>
					<h5>Soal esai yang telah didaftarkan</h5>
				</div>

				<div class="widget-content nopadding">
					<table class="table table-bordered table-striped ">
						<thead>
							<tr>
								<th style="width:30px">No</th>
								<th>Matakuliah</th>
								<th>isi Soal</th>
								<th align="center">Action</th>
							</tr>
						</thead>
						<tbody id="tblesai">
							<!-- <tr>
							<td class='isitbl'>PE1</td>
							<td class='isitbl' style='width:20px;'>1</td>
							<td class='isitbl' style='width: 200px;'>Algoritma Pemrograman</td>
							<td>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempora adipisci quasi tenetur, autem et id ipsum fugit temporibus facilis ipsam. Magnam, omnis quidem! Unde laborum nihil sequi ipsum asperiores. Exercitationem!</td>
							<td class='isitbl'>btn</td>
						</tr> -->
						</tbody>
					</table>
				</div>
			</div>
			<div class="widget-box">
				<div class="widget-title"> <span class="icon"> <i class="icon-plus"></i> </span>
					<h5>Buat Soal Essai</h5>
				</div>
				<div class="widget-content nopadding">
					<!-- <form action="soalesai/simpan" id="myform" name="myform" class="form-horizontal" enctype="multipart/form-data" method="POST"> -->
					<!-- <form action="soalesai/simpan" name="form1" method="POST" class="form-horizontal"> -->
					<form action="" id="form1" name="form1" class="form-horizontal" enctype="multipart/form-data">
						<input type="hidden" name="tanggal" id="tanggal" value="<?= date('Y-m-d H:i:s');?>">						
						<div class="control-group">
							<label class="control-label"><strong>Matakuliah</strong></label>
							<div class="controls">
								<select class="span6" name="matakuliah" id="matakuliah">
									<option value="" disabled selected>Pilih</option>
									<?php
										$namamk = $this->db->query("select * from tblmatakuliah");
										foreach($namamk->result() as $row)
										{
											echo "<option value='".$row->kodemk."'>".$row->namamk." | ".$row->prodi." - ".$row->semester."</option>";
										}										
										foreach($namamk->result() as $row)
										{
											echo "<input type='hidden' id='".$row->kodemk."' name='".$row->kodemk."' value='".$row->semester."'>";
										}										
										
									?>
								</select>
								<span name="matakuliah"></span>
								<!-- <input class='span3' id="mprodi" name="mprodi" type="text" readonly> -->
							</div>
						</div>							
						<!-- <?php 
						$cek = $this->db->query("select MAX(idsoal) AS akhir from tblsoalesai");
						$cek = $cek->result_array();	
						print_r($cek[0]['akhir']);
						?>		 -->
						<div class="control-group">
							<label class="control-label" for="idsoal"><strong>Pertemuan Ke </strong></label>
							<div class="controls">
								<input class="span1" type="text" id="idsoal" name="idsoal" readonly value="-">								
								<!-- <select id="idsoal" name="idsoal" class="form-control">
									<option value="" disabled selected>Pilih</option>									
								</select> -->
								<span name="idsoal"></span>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label"><strong>No
									Soal</strong></label>
							<div class="controls">
								<input class="span1" type="text" id="noesai" name="noesai" readonly>
							</div>
						</div>						
						<div class="control-group" style="margin-right:10px;">
							<label class="control-label"><strong>Isi
									Soal</strong></label>
							<div class="controls">
								<textarea class="span12" rows="4" name="isiesai" id="isiesai"
									placeholder="Ketikan soal..."></textarea>
								<span name="isiesai"></span>
							</div>
						</div>
						<div class="control-group" style="margin-right:10px;">
							<label class="control-label"><strong>Jawaban
									Soal</strong></label>
							<div class="controls">
								<textarea class="span12" rows="4" name="jawaban" id="jawaban"
									placeholder="Dapat dikosongkan..."></textarea>
							</div>
						</div>
					</form>
					<!-- <span class="pull-right">Instruksi : Klik tambah untuk menambahkan soal dalam id yang sama.</span><br>
					<span class="pull-right">Instruksi : Klik selesai untuk selesai menambahkan soal dalam id yang sama.</span> -->
					<div class="form-actions">
						<button type="submit" id="kirimesai" class="btn btn-info pull-right">
							<span class="icon-upload"></span> Kirim ke mahasiswa</button>
						<!-- <button type="submit" id="selesaiesai" class="btn btn-warning pull-right"
							style="margin-right:10px;">
							<span class="icon-ok"></span> Simpan ke draft</button> -->
						<button type="submit" id="tambahesai" class="btn btn-success pull-right"
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
<script src="assets/js/app/soalesai.js"></script>
<?php $this->load->view('components/jsfoot'); ?>
<script src="assets/ckeditor/ckeditor.js"></script>
<script src="assets/ckfinder/ckfinder.js"></script>
<script>
	// Replace the <textarea id="editor1"> with a CKEditor
	// instance, using default configuration.
	CKEDITOR.replace('isiesai');
	CKEDITOR.replace('jawaban');
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
<!-- <script>
	function yesnoCheck(that) {
		if (that.value == "Y") {
			// alert("check");
			document.getElementById("absen").style.display = "block";
		} else {
			document.getElementById("absen").style.display = "none";
		}
	}
</script> -->
</body>

</html>