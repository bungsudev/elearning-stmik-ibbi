<?php $this->load->view('components/head'); ?>
<base href="<?= base_url(); ?>">
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
<li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Manage Matakuliah</span> <span
			class="icon icon-chevron-down pull-right" style="margin-right: 5px;"></span></a>
	<ul>
		<li><a href="matakuliah">Matakuliah</a>
		</li>
		<li><a href="materi"> Materi</a></li>
		<li><a href="soal">Pertanyaan</a></li>
		<li><a href="diskusi">Forum Diskusi</a></li>
	</ul>
</li>
<li><a href="admin"><i class="icon icon-user"></i> <span>Manage Admin</span></a> </li>
<li class="submenu open"> <a href="#"><i class="icon icon-print"></i> <span>Laporan</span> <span
			class="icon icon-chevron-down pull-right" style="margin-right: 5px;"></span></a>
	<ul>
		<li><a href="laporan/mahasiswalaporan">Laporan Mahasiswa</a></li>
		<li><a href="laporan/absensilaporan">Laporan Absensi</a></li>
		<li><a href="laporan/matakuliahlaporan">Laporan Matakuliah</a></li>
		<li class='active'><a href="laporan/nilailaporan">Laporan Nilai</a></li>
	</ul>
</li>
</ul>
</div>
<!--sidebar-menu-->


<div id="content">
	<div id="content-header">
		<div id="breadcrumb"> <a href="home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a
				href="#" class="current">Laporan Nilai</a> </div>
		<h1><span class="icon-briefcase"></span>
			Laporan Nilai <small>E-learning STMIK IBBI</small></h1>
	</div>
	<hr>
	<div class="container-fluid offset4">
		<form action="<?= $action ?>" method="GET" target="blank">
			<div class="control-group">
				<label class="control-label" for="kodemk">Matakuliah</label>
				<div class="controls">
					<select name="kodemk" id="kodemk" class="span4">
						<option value="" disabled selected>Pilih</option>
						<?php
							$namamk = $this->db->query("select * from tblmatakuliah");
							foreach($namamk->result() as $row)
							{
								echo "<option value='".$row->kodemk."'>".$row->namamk." - ".$row->prodi." - ".$row->semester."</option>";
							}
						?>
					</select>
					<?php echo form_error('prodi'); ?>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="kelas">Kelas</label>
				<div class="controls">
					<select id="kelas" name="kelas" class="form-control">
						<option disabled selected>Pilih</option>
						<option value="P1">P1</option>
						<option value="P2">P2</option>
						<option value="M1">M1</option>
					</select>
					<?php echo form_error('kelas'); ?>
				</div>
			</div>
			<!-- <div class="control-group">
				<label class="control-label" for="pertemuan">Pertemuan</label>
				<div class="controls">
					<select id="pertemuan" name="pertemuan" class="form-control">
                        <option disabled selected>Pilih</option>
                        <?php 
                            for ($i=1; $i <= 16; $i++) { 
                                echo "<option value='$i'>$i</option>";
                            }
                        ?>
					</select>
					<span name="pertemuan"></span>
				</div>
			</div> -->
			<!-- <input type="hidden" name="prodi" id="prodi">
				<input type="hidden" name="semester" id="semester"> -->
			<input type="submit" id="submit" class="btn btn-success" value="Cetak Laporan">
	</div>
	</form>
</div>
</div>

<?php $this->load->view('components/foot'); ?>
<script>
	$(document).ready(function () {
		$('#matakuliah').on('change', function () {
			alert('asd');
			prodi = $(this).find(':selected').data('prodi');
			semester = $(this).find(':selected').data('sem');
			console.log(prodi, semester);
			$("#prodi").val(prodi);
			$("#semester").val(semester);
		});
	});
</script>
<?php $this->load->view('components/jsfoot'); ?>
</body>

</html>