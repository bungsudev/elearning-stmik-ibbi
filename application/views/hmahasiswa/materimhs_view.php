<?php $this->load->view('components/head'); ?>
<base href="<?= base_url() ?>">
<?php $this->load->view('components/navbar'); ?>
<li><a href="hmahasiswa/home"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
<li><a href="hmahasiswa/soalmhs"><i class="icon icon-th-list"></i> <span>Soal</span></a> </li>
<li><a href="hmahasiswa/nilaimhs"><i class="icon icon-trophy"></i> <span>Nilai</span></a> </li>
<li class="active"><a href="hmahasiswa/materimhs"><i class="icon icon-book"></i> <span>Materi</span></a> </li>
<li><a href="hmahasiswa/diskusimhs"><i class="icon icon-group"></i> <span>Forum Diskusi</span></a> </li>

</ul>
</div>
<!--sidebar-menu-->


<div id="content">
	<div id="content-header">
		<div id="breadcrumb"> <a href="home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a
				href="materimhs" class="current">Materi</a> </div>
		<h1><span class="icon-briefcase"></span>
			Materi Pembelajaran<small> Online</small></h1>
	</div>
	<hr>
	<div class="container-fluid">

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
											<td><input type="text" id="judulmateri" name="judulmateri" placeholder="Optional"></td>
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
						<h5>Materi Pembelajaran Online PDF/WORD/EXCEL</h5>
					</div>

					<div class="widget-content nopadding">
						<table class="table table-bordered table-striped ">
							<thead>
								<tr>
									<th>No</th>
									<th style="width:auto;">Nama</th>
									<th>Alamat</th>
									<th>E-mail</th>
									<th>TTL</th>
									<th>Telepon</th>
									<th>Jekel</th>
									<th>Prodi</th>
									<th>Sem</th>
									<th>Kelas</th>
									<th colspan="3">Action</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
                    </div>                    
                </div>
                <!-- Diskusi -->
                <div class="accordion" id="collapsefilter">
					<div class="accordion-group" style="width:400px;">
						<div class="accordion-heading">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#collapsefilter"
								href="#tampilfilterdiskusi">
								<strong>Filter Data <span class="icon icon-chevron-down"></span></strong>
							</a>
						</div>
						<div id="tampilfilterdiskusi" class="accordion-body collapse">
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
											<td><input type="text" id="judulmateri" name="judulmateri" placeholder="Optional"></td>
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
						<h5>Materi Forum Diskusi</h5>
					</div>

					<div class="widget-content nopadding">
						<table class="table table-bordered table-striped ">
							<thead>
								<tr>
									<th>No</th>
									<th style="width:auto;">Nama</th>
									<th>Alamat</th>
									<th>E-mail</th>
									<th>TTL</th>
									<th>Telepon</th>
									<th>Jekel</th>
									<th>Prodi</th>
									<th>Sem</th>
									<th>Kelas</th>
									<th colspan="3">Action</th>
								</tr>
							</thead>
							<tbody>
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
<script src="assets/js/app/absensi.js"></script>


<?php $this->load->view('components/jsfoot'); ?>
</body>

</html>