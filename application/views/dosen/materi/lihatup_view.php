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
	<div id="content-header">
		<div id="breadcrumb"> <a href="dosen/home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
				Home</a> <a href="dosen/subbuatsoal" class="current">Lihat Materi PDF</a> </div>
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
				<!-- <div class="accordion" id="collapsefilter">
					<div class="accordion-group" style="width:400px;">
						<div class="accordion-heading">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#collapsefilter"
								href="#tampilfilter">
								<strong>Filter Data <span class="icon icon-chevron-down"></span></strong>
							</a>
						</div>
						<div id="tampilfilter" class="accordion-body collapse">
							<div class="accordion-inner">
								<form class="form-inline">
									<table>
										<tr>
											<td><label for="semester">Semester</label></td>
											<td>
												<select class="span3" id="semester" name="semester">
													<option value="1">I</option>
													<option value="2">II</option>
													<option value="3">III</option>
													<option value="4">IV</option>
													<option value="5">V</option>
													<option value="6">VI</option>
													<option value="7">VII</option>
													<option value="8">VIII</option>
												</select>
											</td>
										</tr>
										<tr>
											<td> <label for="judulmateri">Judul Materi</label></td>
											<td><input type="text" id="judulmateri" name="judulmateri"
													placeholder="Optional"></td>
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
					<button class="btn btn-success pull-right" onclick="location.href='dosen/subuploadmateri'"
						style="margin:3px 5px;">
						<span class="icon-plus"></span> Tambah</button>
					<div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
						<h5>Lihat materi uplaod</h5>
					</div>
					<div class="widget-content nopadding">
						<table class="table table-bordered table-striped ">
							<thead>
								<tr>
									<th style="width:50px;" align='center'>ID Materi</th>
									<th style="width:auto;">Matakuliah</th>
									<th>Judul Materi</th>
									<th>Tanggal</th>
									<th>File</th>
									<th colspan="2">Action</th>
								</tr>
							</thead>
							<tbody id="tblup">
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
<script src="assets/js/app/dosen/lihatup.js"></script>

<?php $this->load->view('components/jsfoot'); ?>

</body>

</html>