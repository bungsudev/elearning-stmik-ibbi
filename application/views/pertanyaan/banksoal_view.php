<?php $this->load->view('components/head'); ?>
<base href="<?= base_url(); ?>">

<link rel="stylesheet" href="assets/css/bootstrap-wysihtml5.css" />
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
				Home</a> <a href="banksoal" class="current">Bank Soal</a> </div>
		<h1><span class="icon-briefcase"></span>
			Manage Soal<small> pembelajaran Online</small></h1>
	</div>
	<hr>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="quick-actions_homepage offset2">
				<ul class="quick-actions">
					<li class="bg_lo span3"> <a href="banksoal"> <i class="icon-book"></i> Bank Soal</a> </li>
					<li class="bg_lg span3"> <a href="soalterkirim"> <i class="icon-ok-circle"></i> Soal Terkirim</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<hr>
	<div class="container-fluid" id="tampilawal">
		<div id="modalkirim" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
			aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 id="myModalLabel"> Kirim soal ke mahasiswa </h3>
			</div>
			<div class="modal-body">
				<!-- <form class="form-horizontal" action="" id="form2" name="form2">
					<div class="control-group">
						<label class="control-label" for="kirprodi">Program studi</label>
						<div class="controls">
							<select id="kirprodi" name="kirprodi" class="form-control">
								<option value="TI">Teknik Informatika</option>
								<option value="SI">Sistem Informasi</option>
							</select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="kirsem">Semester</label>
						<div class="controls">
							<select id="kirsem" name="kirsem" class="form-control span1">
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
					<input type="hidden" name="idsoal" id="idsoal">
					<input type="hidden" name="tipe" id="tipe">
					<input type="hidden" name="tanggal" id="tanggal" value="<?= date('Y-m-d H:i:s');?>">
				</form> -->
				<form class="form-horizontal" action="" id="form2" name="form2">
					<input type="hidden" name="idsoal" id="idsoal">
					<input type="hidden" name="tipesoal" id="tipesoal">
					<input type="hidden" name="tanggal" id="tanggal" value="<?= date('Y-m-d H:i:s');?>">
					<div class="control-group">
						<label class="control-label" for="kirprodi">Program studi</label>
						<div class="controls">
							<select id="kirprodi" name="kirprodi" class="form-control">
								<option value="#" disabled selected>Pilih</option>
								<option value="TI">Teknik Informatika</option>
								<option value="SI">Sistem Informasi</option>
							</select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="kirsem">Semester</label>
						<div class="controls">
							<select id="kirsem" name="kirsem" class="form-control span1">
								<option value="#" disabled selected>Pilih</option>
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
						<div class="controls">
							<select id="tipetugas" name="tipetugas" class="form-control">
								<option value="#" disabled selected>Pilih</option>
								<option value="quiz">Quiz</option>
								<option value="tugas">Tugas</option>
								<option value="uts">UTS</option>
								<option value="uas">UAS</option>
							</select>
							<span name="tipetugas"></span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="pilihabsen">Absensi</label>
						<div class="controls">
							<select id="pilihabsen" name="pilihabsen" class="form-control span1"
								onchange="yesnoCheck(this);">
								<option value="#" disabled selected>Pilih</option>
								<option value="Y">Ya</option>
								<option value="N">Tidak</option>
							</select>
							<span name="pilihabsen"></span>
						</div>
					</div>
					<div class="control-group" id='absen' style="display: none;">
						<label class="control-label" for="noabsen">Absensi Ke- </label>
						<div class="controls">
							<select id="noabsen" name="noabsen" class="form-control">
								<option value="0" disabled selected>Pilih</option>
								<?php 
									$i = 1;
									for ($i=1; $i <= 16 ; $i++) { 
										echo "<option value='".$i."'>".$i."</option>";
									}
								?>
							</select>
							<span name="noabsen"></span>
						</div>
					</div>
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
			<div class="span12">
				<!-- <div class="accordion" id="collapsefilter">
					<div class="accordion-group" style="width:450px;">
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
												<select class="span12" name="matakuliah" id="matakuliah">
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
				</div> -->
				<div class="widget-box">
					<button type="submit" class="btn btn-info pull-right" style="margin:3px 3px;" id="tampilesai">
						<span class="icon-refresh"></span> Tampil soal essai</button>
					<button type="submit" class="btn btn-info pull-right" style="margin:3px 3px;" id="tampilpilgan">
						<span class="icon-refresh"></span> Tampil soal pilihan ganda</button>

					<div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
						<h5>Soal-soal pembelajaran Online <span id="judul"></span></h5>
					</div>
					<div class="widget-content nopadding">
						<table class="table table-bordered table-striped ">
							<thead>
								<tr>
									<th>Pertemuan</th>
									<th>Jlh Soal</th>
									<th>Matakuliah</th>
									<th>Tanggal</th>
									<th colspan="2">Action</th>
								</tr>
							</thead>
							<tbody id="tblbanksoal">
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- ====================================================================================== -->
	<div class="container-fluid" id="tampilsoal" style="display:none;">
		<div class="row-fluid" id="tampilsoal">
			<div class="span12">
				<div class="widget-box">
					<button class="btn btn-info pull-right" id="kembali" style="margin:3px 5px;">
						<span class="icon-arrow-left"></span> Kembali</button>
					<div class="widget-title"> <span class="icon"><i class="icon-time"></i></span>
						<h5>Kode soal : <span id="idsoaltp"></span> -- Tipe soal : <span id="tipesoaltp"></span></h5>
					</div>
					<div class="widget-content" id="listsoal">
						<form action="" id="form2">
							<input type="hidden" name="jlh" id="jlh">
							<input type="hidden" id="nim1" name="nim1"
								value="<?= $this->session->userdata("ses_id") ?>">
							<input type="hidden" name="idsoal" id="idsoal">
							<input type="hidden" name="tanggal" id="tanggal" value="<?= date('Y-m-d H:i:s');?>">
						</form>

						<ol start="1" id="listsoal" class="fontsoal">
							<form action="" id="formlistesai">

							</form>
						</ol>
					</div>
				</div>
			</div>
		</div>
		<!-- ============================================================== -->
	</div>
</div>

<?php $this->load->view('components/foot'); ?>
<script src="assets/js/app/myfunction.js"></script>
<script src="assets/js/app/banksoal.js"></script>
<?php $this->load->view('components/jsfoot'); ?>
<script src="assets/ckeditor/ckeditor.js"></script>
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