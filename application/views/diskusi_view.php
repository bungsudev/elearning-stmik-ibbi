<?php $this->load->view('components/head'); ?>
<base href="<?= base_url(); ?>">
<base src="<?= base_url(); ?>">
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
		<li><a href="soal">Pertanyaan</a></li>
		<li class="active"><a href="diskusi">Forum Diskusi</a></li>
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
		<div id="breadcrumb"> <a href="home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a
				href="diskusi" class="current">Forum Diskusi</a> </div>
		<h1><span class="icon-briefcase"></span>
			Forum Diskusi <small>Pembelajaran Online</small></h1>
	</div>
	<hr>
	<div class="container-fluid" id="tampilawal">
		<input type="hidden" name="nama" id="nama" value="<?php echo $this->session->userdata('ses_nama');?>">
		<input type="hidden" name="userid" id="userid" value="<?php echo $this->session->userdata('ses_id');?>">
		<div class="accordion" id="collapsefilter">
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
										<select name="matakuliahfil" id="matakuliahfil"  class="span3">
										<option value="" disabled selected>Pilih</option>
										<?php
											$namamk = $this->db->query("select * from tblmatakuliah");
											foreach($namamk->result() as $row)
											{
												echo "<option data-prodi='$row->prodi' data-sem='$row->semester' value='".$row->kodemk."'>".$row->namamk." | ".$row->prodi." - ".$row->semester."</option>";
											}	
										?>
										</select>
										<input type="hidden" name="prodifil" id="prodifil">
										<input type="hidden" name="semesterfil" id="semesterfil">
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
		</div>
		<div class="row-fluid">
			<div class="span12">
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"> <i class="icon-bullhorn"></i> </span>
						<h5>Forum diskusi perkuliahan</h5>
					</div>
					<div class="widget-content nopadding">
						<div class="table-responsive table-hover">
							<table class="table table-bordered table-striped table-hover">
								<thead>
									<tr>
										<th style="width:50px;">Pertemuan</th>
										<th>Judul Topik</th>
										<th style="width:250px;">Tanggal upload</th>
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
						<h5>Pertemuan ke <span id="idsoaltp"></span> -- Judul Topik : <span id="tipesoaltp"></span></h5>
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
	</div>
	<!-- ============================================================== -->
</div>

<?php $this->load->view('components/foot'); ?>
<script src="assets/js/app/myfunction.js"></script>
<script src="assets/js/app/diskusi.js"></script>
<?php $this->load->view('components/jsfoot'); ?>
<script src="assets/ckeditor/ckeditor.js"></script>
<script src="assets/ckfinder/ckfinder.js"></script>
<!-- <script>
	// Replace the <textarea id="editor1"> with a CKEditor
	// instance, using default configuration.
	// CKEDITOR.replace('kirimdiskusi');
</script> -->
<script>
CKFinder.setupCKEditor();
</script>
</body>

</html>