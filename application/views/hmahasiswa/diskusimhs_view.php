<?php $this->load->view('components/head'); ?>
<base href="<?= base_url() ?>">
<?php $this->load->view('components/navbar'); ?>
<li><a href="hmahasiswa/home"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
<li><a href="hmahasiswa/soalmhs"><i class="icon icon-th-list"></i> <span>Soal</span></a> </li>
<li><a href="hmahasiswa/absensimhs"><i class="icon icon-home"></i> <span>Absensi</span></a> </li>
<li><a href="hmahasiswa/nilaimhs"><i class="icon icon-trophy"></i> <span>Nilai</span></a> </li>
<li class="active"><a href="hmahasiswa/diskusimhs"><i class="icon icon-group"></i> <span>Forum Diskusi</span></a> </li>

</ul>
</div>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
	<div id="content-header">
		<div id="breadcrumb"> <a href="home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a
				href="diskusi" class="current">Forum Diskusi</a> </div>
		<h1><span class="icon-briefcase"></span>
			Forum Diskusi <small>Pembelajaran Online</small></h1>
	</div>
	<hr>
	<div class="container-fluid" id="tampilawal1">
		<div class="row-fluid">
			<div class="span12">
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
						<h5>Materi kuliah</h5>
					</div>
					<div class="widget-content nopadding">
						<div class="table-responsive table-hover">
							<table class="table table-bordered table-striped table-hover">
								<thead>
									<tr>
										<th style="width:50px;">No</th>
										<th>Materi</th>
										<th style="width:200px;">Tanggal Publish</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody id="tbldownload">

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid" id="tampilawal2">
		<div class="row-fluid">
			<div class="span12">
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
						<h5>Forum diskusi perkuliahan</h5>
					</div>
					<div class="widget-content nopadding">
						<div class="table-responsive table-hover">
							<table class="table table-bordered data-table">
								<thead>
									<tr>
										<th style="width:50px;">Pertemuan</th>
										<th>Judul Topik</th>
										<th style="width:250px;">Tanggal</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody id="tbldiskusi">
									<!-- <tr>
										<td>001</td>
										<td>Budi</td>
										<td>Sei Deli</td>
										<td style="width:100px;"> <a href="forumdiskusi"><button
													class="btn btn-info btn-block">
													<span class="icon-circle-arrow-right"></span>
													Masuk</button></a>
										</td>
										<td style="width:100px;"><button class="btn btn-danger btn-block">
												<span class="icon-trash"></span> Hapus</button>
										</td>
									</tr> -->
								</tbody>
							</table>
						</div>
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
						<h5>Pertemuan ke <span id="idsoaltp"></span> -- Judul Topik : <span id="tipesoaltp"></span>
						</h5>
					</div>
					<div class="widget-content" id="listdiskusi">
						<table id="isidiskusi" style="width:100%;'">

						</table>
						<table id="kir" style="width:100%;">

						</table>
						<table style="width:100%;">
							<form id="formkirim" name="formkirim">
								<input type="hidden" name="idmateri" id="idmateri">
								<input type="hidden" name="userid" id="userid"
									value="<?php echo $this->session->userdata('ses_id');?>">
								<input type="hidden" name="nama" id="nama"
									value="<?php echo $this->session->userdata('ses_nama');?>">
								<tr>
									<td colspan="2">
										<textarea name="kirimdiskusi" id="kirimdiskusi" cols="30" rows="10"></textarea>
									</td>
								</tr>
								<tr>
									<td colspan="2"><button style="margin-top:5px;" id="kirim"
											class="btn btn-success pull-right">
											<span class="icon-ok-circle"></span> Kirim</button></td>
								</tr>
							</form>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- ============================================================== -->
	</div>
</div>
<!--end-main-container-part-->

<?php $this->load->view('components/foot'); ?>
<script src="assets/js/app/myfunction.js"></script>
<script src="assets/js/app/hmahasiswa/diskusimhs.js"></script>
<?php $this->load->view('components/jsfoot'); ?>
<script src="assets/ckeditor/ckeditor.js"></script>
<script src="assets/ckfinder/ckfinder.js"></script>
</body>
<script>
	CKFinder.setupCKEditor();
</script>

</html>