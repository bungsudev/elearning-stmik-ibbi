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
<input type="hidden" name="kodemkses" id="kodemkses" value="<?php echo $this->session->userdata('ses_kodemk');?>">
	<div id="content-header">
		<div id="breadcrumb"> <a href="dosen/home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
				Home</a> <a href="dosen/subbuatsoal" class="current">Tambah Soal</a> </div>
		<h1><span class="icon-briefcase"></span>
			Lihat Materi<small> Pembelajaran Online</small></h1>
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
		<div class="ini"></div>
		<div class="row-fluid">
			<div class="span12">
			<input type="hidden" name="f" id="f" value="<?php echo $this->session->flashdata('berhasil');?>">
				<!-- Diskusi============================================================================== -->
				
				<div class="widget-box">
					<button class="btn btn-success pull-right" onclick="location.href='dosen/subbuatdiskusi'"
						style="margin:3px 5px;">
						<span class="icon-plus"></span> Tambah</button>
					<div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
						<h5>Materi Forum Diskusi</h5>
					</div>
					<div class="widget-content nopadding">
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
									<th style="width:50px;">ID Materi</th>
									<th style="width:50px;">Pertemuan</th>
									<th style="width:50px;">Semester</th>
									<th style="width:100px;">Program Studi</th>
									<th style="width:80px;">Matakuliah</th>
									<th style="width:auto;">Judul Materi</th>
									<th style="width:150px;">Tanggal</th>
									<th colspan="2">Action</th>
								</tr>
							</thead>
							<tbody id="tbldis">
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>






<?php $this->load->view('components/foot'); ?>
<script src="assets/js/app/myfunction.js"></script>
<script src="assets/js/app/dosen/lihatdis.js"></script>
<!-- <script>
	$(document).ready(function () {
		alert("read");
		flash = $('#f').attr('value');
		if (flash == "Berhasil, Materi terhapus.") {
			var divMessage = "<div class='alert alert-success'>" +
				"<strong>Berhasil! </strong> <span>" + flash + "</span>" +
				"</div>";
			$(divMessage)
				.prependTo(".ini")
				.delay(2000)
				.slideUp("slow");
		}
	});
</script> -->
<?php $this->load->view('components/jsfoot'); ?>

</body>

</html>