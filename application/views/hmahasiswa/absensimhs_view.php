<?php $this->load->view('components/head'); ?>
<base href="<?= base_url() ?>">
<?php $this->load->view('components/navbar'); ?>
<li><a href="hmahasiswa/home"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
<li><a href="hmahasiswa/soalmhs"><i class="icon icon-th-list"></i> <span>Soal</span></a> </li>
<li class="active"><a href="hmahasiswa/absensimhs"><i class="icon icon-home"></i> <span>Absensi</span></a> </li>
<li><a href="hmahasiswa/nilaimhs"><i class="icon icon-trophy"></i> <span>Nilai</span></a> </li> 
<li><a href="hmahasiswa/diskusimhs"><i class="icon icon-group"></i> <span>Forum Diskusi</span></a> </li>

</ul>
</div>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
	<div id="content-header">
		<div id="breadcrumb"> <a href="home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a
				href="absensi" class="current">Absensi</a> </div>
		<h1><span class="icon-briefcase"></span>
			Lihat Absensi <small><span id="nim"><?= $this->session->userdata("ses_id"); ?></span> - <?= $this->session->userdata("ses_nama"); ?></small></h1>
	</div>
	<hr>
	<div class="container-fluid">	
		<div class="row-fluid">
			<div class="span12">				
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
						<h5>Data Absensi Pembelajaran Online</h5>
					</div>
 
					<div class="widget-content nopadding">
						<table class="table table-bordered table-striped ">
							<thead>
								<tr>
									<th>NIM</th>
									<th>Nama</th>
									<th>Team</th>
									<th>a1</th>
									<th>a2</th>
									<th>a3</th>
									<th>a4</th>
									<th>a5</th>
									<th>a6</th>
									<th>a7</th>
									<th>a8</th>
									<th>a9</th>
									<th>a10</th>
									<th>a11</th>
									<th>a12</th>
									<th>a13</th>
									<th>a14</th>
									<th>a15</th>
									<th>a16</th>
									<!-- <th align="center">Action</th> -->
								</tr>
							</thead>
							<tbody id="tabelabsenmhs">
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!--end-main-container-part-->

<?php $this->load->view('components/foot'); ?>
<script src="assets/js/app/myfunction.js"></script>
<script src="assets/js/app/hmahasiswa/absensimhs.js"></script>
<?php $this->load->view('components/jsfoot'); ?>
</body>

</html>