<?php $this->load->view('components/head'); ?>
<base href="<?= base_url() ?>">
<?php $this->load->view('components/navbar'); ?>
<li><a href="hmahasiswa/home"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
<li class="active"><a href="hmahasiswa/soalmhs"><i class="icon icon-th-list"></i> <span>Soal</span></a> </li>
<li><a href="hmahasiswa/absensimhs"><i class="icon icon-home"></i> <span>Absensi</span></a> </li>
<li><a href="hmahasiswa/nilaimhs"><i class="icon icon-trophy"></i> <span>Nilai</span></a> </li>
<li><a href="hmahasiswa/diskusimhs"><i class="icon icon-group"></i> <span>Forum Diskusi</span></a> </li>

</ul>
</div>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
	<div id="content-header">
		<div id="breadcrumb"> <a href="home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a
				href="hmahasiswa/soalmhs" class="current">Soal</a> </div>
		<h1><span class="icon-briefcase"></span>
			Soal Mahasiswa <small> Pembelajaran Online STMIK IBBI</small></h1>
	</div>
	<hr>
	<!-- <button id="tes">test</button>
	<button id="tes2">test2</button> -->
	<div class="container-fluid">
		<div class="ini"></div>
		<div class="row-fluid" id="tampilawal">
			<div class="span12">
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"><i class="icon-time"></i></span>
						<h5>Daftar tugas</h5>
					</div>
					<!-- style="display:none;" -->
					<div class="widget-content nopadding">
						<input type="hidden" id="prodi" value="<?= $this->session->userdata("ses_prodi") ?>">
						<input type="hidden" id="semester" value="<?= $this->session->userdata("ses_semester") ?>">
						<input type="hidden" id="nim" value="<?= $this->session->userdata("ses_id") ?>">
						<table class="table table-striped table-bordered data-table">
							<thead>
								<tr>
									<th>Tipe Tugas</th>
									<th>Deskripsi</th>
									<th>Tanggal</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody id="tblsoalmhs">
								<!-- <tr>
									<td class="taskDesc"><i class="icon-info-sign"></i> Making The New Suit</td>
									<td class="taskStatus"><span class="in-progress">in progress</span></td>
									<td class="taskOptions"><a href="#" class="tip-top" data-original-title="Update"><i
												class="icon-ok"></i></a> <a href="#" class="tip-top"
											data-original-title="Delete"><i class="icon-remove"></i></a></td>
								</tr>
								<tr>
									<td class="taskDesc"><i class="icon-plus-sign"></i> Luanch My New Site</td>
									<td class="taskStatus"><span class="pending">pending</span></td>
									<td class="taskOptions"><a href="#" class="tip-top" data-original-title="Update"><i
												class="icon-ok"></i></a> <a href="#" class="tip-top"
											data-original-title="Delete"><i class="icon-remove"></i></a></td>
								</tr>
								<tr>
									<td class="taskDesc"><i class="icon-ok-sign"></i> Maruti Excellant Theme</td>
									<td class="taskStatus"><span class="done">done</span></td>
									<td class="taskOptions"><a href="#" class="tip-top" data-original-title="Update"><i
												class="icon-ok"></i></a> <a href="#" class="tip-top"
											data-original-title="Delete"><i class="icon-remove"></i></a></td>
								</tr> -->
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- ======================================================================= -->
		<div class="row-fluid" id="tampilsoal">
			<div class="span12">
				<h1 class="pull-right" style="margin-right:45%;" style='none'><span id="timer"></span>
				<!-- <button class="btn btn-info" style="margin-bottom:7px;" id="start">START</button> -->
				</h1>
				
				<div class="widget-box">
					<button class="btn btn-info pull-right" id="kembali" style="margin:3px 5px;">
						<span class="icon-arrow-left"></span> Kembali</button>
					<div class="widget-title"> <span class="icon"><i class="icon-time"></i></span>
						<h5>Kode soal : <span id="idsoaltp"></span> -- Tipe soal : <span id="tipesoaltp"></span></h5>
					</div>
					<div class="widget-content" id="listsoal">
						<form action="" id="form2">
						<!-- <input type="hidden" name="kdmk" id="kdmk"> -->
							<input type="hidden" name="tipetugastp1" id="tipetugastp1">
							<input type="hidden" name="jlh" id="jlh">
							<input type="hidden" name="jlhup" id="jlhup">
							<input type="hidden" id="nim1" name="nim1"
								value="<?= $this->session->userdata("ses_id") ?>">
							<input type="hidden" name="nama1" id="nama1"
								value="<?= $this->session->userdata("ses_nama") ?>">
							<input type="hidden" name="idsoal" id="idsoal">
							<input type="hidden" name="tanggal" id="tanggal" value="<?= date('Y-m-d H:i:s');?>">
							<input type="hidden" id="abske">
							<input type="hidden" id="temp" name="temp">
						</form>
						<style>
						</style>
						<ol start="1" id="listsoal" class="fontsoal">
							<form action="" id="form1">

							</form>
						</ol>
					</div>
					<div class="form-actions">
						<button type="submit" id="selesai" class="btn btn-warning pull-right"
							style="margin-right:10px;">
							<span class="icon-ok"></span> Selesai</button>
					</div>
				</div>
			</div>
		</div>
		<!-- ============================================================== -->
		<div class="row-fluid" id="tampilriwayat">
			<div class="span12">
				<div class="widget-box">
					<button class="btn btn-info pull-right" id="kembali1" style="margin:3px 5px;">
						<span class="icon-arrow-left"></span> Kembali</button>
					<div class="widget-title"> <span class="icon"><i class="icon-time"></i></span>
						<h5>Kode soal : <span id="idsoaltp1"></span> -- Tipe soal : <span id="tipesoaltp1"></span></h5>
		
					</div>
					<div class="widget-content" id="listsoal">
						<!-- <form action="" id="form2">
							<input type="hidden" name="jlh" id="jlh">
							<input type="hidden" id="nim1" name="nim1" value="<?= $this->session->userdata("ses_id") ?>">
							<input type="hidden" name="idsoal" id="idsoal">
							<input type="hidden" name="tanggal" id="tanggal" value="<?= date('Y-m-d H:i:s');?>">
						</form> -->

						<ol start="1" id="listsoal" class="fontsoal">
							<form action="" id="form3">
								<!-- <li>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique atque laudantium minima perspiciatis doloribus rem doloremque dolores amet quasi quas expedita mollitia facilis quibusdam dolor, sint nostrum, consectetur ullam? Pariatur.</li>
							<textarea class="span12" name="jawab" id="jawab" cols="5" rows="5"
										style="resize:vertical; margin-top:10px;" readonly>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus repellat ullam eveniet quibusdam dolorum fuga voluptatum mollitia sed soluta, ipsa magnam voluptates nobis sit quis saepe! Ab architecto fugit doloremque!</textarea>
							<br> -->
							</form>
						</ol>
					</div>
				</div>
			</div>
		</div>
		<!-- ============================================================== -->
		<div class="row-fluid" id="tampilnilai">
			<div class="span6 offset3">
				<div class="widget-box">
					<button class="btn btn-info pull-right" id="kembali2" style="margin:3px 5px;">
						<span class="icon-arrow-left"></span> Kembali</button>
					<div class="widget-title"> <span class="icon"><i class="icon-ok-circle alert-success"></i></span>
						<h5></h5>
					</div>
					<input type="hidden" name="nama" id="nama" value="<?= $this->session->userdata("ses_nama") ?>">
					<div class="widget-content" id="hasilnilai">

						<!-- <table class="fontsoal" style="width:500px; font-size:15px;">
							<tr>
								<td style="width:50px;"><strong>NIM</strong></td>
								<td style="width:180px;">: <?= $this->session->userdata('ses_id')?></td>
								<td style="width:100px;"><strong>Tipe Soal</strong></td>
								<td>: <span id="tipesoal">UTS - Essai</span></td>
							</tr>
							<tr>
								<td style="width:50px;"><strong>Nama</strong></td>
								<td style="width:180px;">: <?= $this->session->userdata('ses_nama')?></td>
								<td style="width:100px;"><strong>Tanggal kirim</strong></td>
								<td>: <span id="tipesoal">12:12:12</span></td>
							</tr>
							<tr>
								<td style="width:50px;"><strong>ID Soal</strong></td>
								<td style="width:180px;">: 1</td>
								<td style="width:100px;"><strong>Tanggal nilai</strong></td>
								<td>: <span id="tipesoal">12:12:12</span></td>
							</tr>
							<tr>
								<td style="width:50px;"><strong>Matkul</strong></td>
								<td style="width:180px;" colspan='3'>: Algoritma dan pemrograman</td>
							</tr>
						</table>
						<hr>
						<table class="fontsoal" style="width:500px; font-size:32px; margin-top:20px; text-align:center;">
							<tr>
								<td><strong>Nilai : 90</strong></td>
							</tr>
						</table>
						<hr> -->
					</div>
				</div>
			</div>
		</div>
		<div class="row-fluid" id="tampilstart">
			<div class="span12 offset4">
				<button class="btn btn-large btn-info" id="startkembali">Kembali</button>
				<button class="btn btn-large btn-warning" id="start">Mulai Kerjakan</button>
			</div>
			<div class="span6 offset3" style="margin-top:20px; font-family:serif;">
				<span> <h2  style="color:red;"> <b>Peringatan!</b></h2>
					<h5><p>Waktu pengerjaan 30 menit. </p></h5>
					<h5><p>Jawaban akan tersimpan jika Anda mencoba untuk reload/menutup browser! </p></h5>
				</span>
			</div>
		</div>
	</div>
</div> 
<?php $this->load->view('components/foot'); ?>
<script src="assets/js/app/myfunction.js"></script>
<script src="assets/js/app/hmahasiswa/soalmhs.js"></script>
<?php $this->load->view('components/jsfoot'); ?>

<script src="assets/ckeditor/ckeditor.js"></script>
<script src="assets/ckfinder/ckfinder.js"></script>

<script>
	// Replace the <textarea id="editor1"> with a CKEditor
	// instance, using default configuration.
	// CKEDITOR.replace('jawaban');
	// window.onbeforeunload = function() {
	// 	asd = console.log('asd');
	// 	return asd;
	// } 
	CKFinder.setupCKEditor();
</script>

</body>

</html>