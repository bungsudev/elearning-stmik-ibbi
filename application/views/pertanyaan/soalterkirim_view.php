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
		<li><a href="laporan/mahasiswa">Laporan Mahasiswa</a></li>
	</ul>
</li>
  

</ul>
</div>
<!--sidebar-menu-->
<div id="content">
	<div id="content-header">
		<div id="breadcrumb"> <a href="home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
				Home</a> <a href="soalterkirim" class="current">Soal Terkirim</a> </div>
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
		<div class="row-fluid">
			<div class="span12">
				<div class="accordion" id="collapsefilter">
					<div class="accordion-group" style="width:400px;">
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
											<select class="span12" name="matakuliahfil" id="matakuliahfil">
												<option value="" disabled selected>Pilih</option>
												<?php
													$namamk = $this->db->query("select * from tblmatakuliah");
													foreach($namamk->result() as $row)
													{
														echo "<option value='".$row->kodemk."'>".$row->namamk." | ".$row->prodi." - ".$row->semester."</option>";
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
				</div>
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
						<h5>Soal-soal pembelajaran Online <span id="judul"></span></h5>
					</div>
					<div class="widget-content nopadding">
						<table class="table table-bordered table-striped ">
							<thead>
								<tr>
									<th>Pertemuan</th>
									<th>Tipe Soal</th>
									<th>Tipe Tugas</th>
									<!-- <th>Status</th> -->
									<th>Tanggal</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody id="tblterkirim">
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
<script src="assets/js/app/soalterkirim.js"></script>
<?php $this->load->view('components/jsfoot'); ?>

</body>

</html>