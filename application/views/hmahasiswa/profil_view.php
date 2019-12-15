<?php $this->load->view('components/head'); ?>
<base href="<?= base_url() ?>">
<?php $this->load->view('components/navbar'); ?>
<!--sidebar-menu-->
<li class="active"><a href="hmahasiswa/home"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
<li><a href="hmahasiswa/soalmhs"><i class="icon icon-th-list"></i> <span>Soal</span></a> </li>
<li><a href="hmahasiswa/absensimhs"><i class="icon icon-home"></i> <span>Absensi</span></a> </li>
<li><a href="hmahasiswa/nilaimhs"><i class="icon icon-trophy"></i> <span>Nilai</span></a> </li>
<li><a href="hmahasiswa/diskusimhs"><i class="icon icon-group"></i> <span>Forum Diskusi</span></a> </li>

</ul>
</div>
<!--sidebar-menu-->
<div id="content">
	<div id="content-header">
		<div id="breadcrumb"> <a href="home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a
				href="profil" class="current">Profil</a> </div>
		<h1><span class="icon-briefcase"></span>
			Profil <small>Pembelajaran Online</small></h1>
	</div>
	<hr>
	<div class="container">
		<div class="modal hide fade" tabindex="-1" role="dialog" id="form-ganti">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<h3>Form <span id="mode"></span> Mahasiswa</h3>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" id="form2">
							<div class="control-group">
								<label class="control-label" for="passwordlama">Password Lama</label>
								<div class="controls">
									<input type="text" id="passwordlama" placeholder="Password Lama"
										autocomplete="new-password">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="passwordbaru1">Password Baru</label>
								<div class="controls">
									<input type="password" id="passwordbaru1" placeholder="Password Baru"
										autocomplete="new-password">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="passwordbaru2">Password</label>
								<div class="controls">
									<input type="password" id="passwordbaru2" placeholder="Ulang Password"
										autocomplete="new-password">
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<button type="submit" class="btn btn-danger">Simpan</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div> <!-- ./modal -->
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12 offset1">
					<style>
						table {
							/* border-collapse: separate; */
							/* border-spacing: 0 1em; */
						}

						input {
							margin-top: 12px;
							width: 250px;
						}

						select {
							margin-top: 12px;
						}
					</style>
					<form id="form1" name="form1" enctype="multipart/form-data">
						<div class="span5">
							<table style="font-size:20px; font-family:serif;">
								<tr>
									<td style="width:130px;"><label for="nim"></label>NIM</td>
									<td></td>
									<td><input type="text" readonly id="nim" name="nim" value="<?= $profil->nim ?>">
									</td>
								</tr>
								<tr>
									<td style="width:130px;"><label for="namamhs"></label>Nama</td>
									<td></td>
									<td><input type="text" id="namamhs" name="namamhs" value="<?= $profil->namamhs ?>">
									</td>
								</tr>
								<tr>
									<td style="width:130px;"><label for="alamat"></label>Alamat</td>
									<td></td>
									<td>
										<textarea class='span10' name="alamat" id="alamat" cols="45"
											rows="3"><?= $profil->alamat ?></textarea>
									</td>
								</tr>
								<tr>
									<td style="width:130px;"><label for="email"></label>E-mail</td>
									<td></td>
									<td><input type="text" id="email" name="email" value="<?= $profil->email ?>"></td>
								</tr>
								<tr>
									<td style="width:130px;"><label for="tanggallahir"></label>Tanggal lahir</td>
									<td></td>
									<td><input type="date" id="tanggallahir" name="tanggallahir"
											value="<?= $profil->tanggallahir ?>"></td>
								</tr>
								<tr>
									<td style="width:130px;"><label for="agama"></label>Agama</td>
									<td></td>
									<td>
										<select id="agama" name="agama" class="form-control">
											<option value="<?= $profil->agama ?>" selected disabled hidden>
												<?= $profil->agama ?></option>
											<option value="Islam">Islam</option>
											<option value="Kristen">Kristen</option>
											<option value="Katolik">Katolik</option>
											<option value="Hindu">Hindu</option>
											<option value="Buddha">Buddha</option>
											<option value="Lainnya">Lainnya</option>
										</select>
									</td>
								</tr>
							</table>
						</div>
						<div class="span5">
							<table style="font-size:20px; font-family:serif;">
								<tr>
									<?php 
									if ($profil->jekel = 'L') {
										$j = 'Laki-Laki';
									}else{
										$j = 'Perempuan';
									};
									// echo $j;
									?>
									<td style="width:130px;"><label for="jekel"></label>Jenis Kelamin</td>
									<td></td>
									<td>
										<select id="jekel" name="jekel" class="form-control">
											<option value="<?= $profil->jekel ?>" selected disabled hidden><?= $j ?>
											</option>
											<option value="L">Laki-Laki</option>
											<option value="P">Perempuan</option>
										</select>
									</td>
								</tr>
								<tr>
									<td style="width:130px;"><label for="telepon"></label>Telepon</td>
									<td></td>
									<td><input type="text" id="telepon" name="telepon" value="<?= $profil->telepon ?>">
									</td>
								</tr>
								<tr>
									<td style="width:130px;"><label for="prodi"></label>Program Studi</td>
									<td></td>
									<td>
										<select id="prodi" name="prodi" class="form-control">
											<option value="<?= $profil->prodi ?>" selected disabled hidden>
												<?= $profil->prodi ?></option>
											<option value="TI">Teknik Informatika</option>
											<option value="SI">Sistem Informasi</option>
										</select>
									</td>
								</tr>
								<tr>
									<td style="width:130px;"><label for="kelas"></label>Kelas</td>
									<td></td>
									<td>
										<select id="kelas" name="kelas" class="form-control span3">
											<option value="<?= $profil->kelas ?>" selected disabled hidden>
												<?= $profil->kelas ?></option>
											<option value="P1">P1</option>
											<option value="P2">P2</option>
											<option value="M1">M1</option>
										</select>
									</td>
								</tr>
								<tr>
									<td style="width:130px;"><label for="semester"></label>Semester</td>
									<td></td>
									<td>
										<select id="semester" name="semester" class="form-control span3">
											<option value="<?= $profil->semester ?>" selected disabled hidden>
												<?= $profil->semester ?></option>
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
							</table>
						</div>
					</form>
				</div>
				<div class="span12 offset6">
					<button class="btn btn-info" id="batal" style="margin-top:20px; margin-left:10px;">
						<span class="icon-floppy-disk"></span> Batal</button>
					<button class="btn btn-warning" id="simpan" style="margin-top:20px; ">
						<span class="icon-floppy-disk"></span> Simpan</button>
					<!-- <button class="btn btn-danger" id="gantipassword" style="margin-top:20px; ">
						<span class="icon-floppy-disk"></span> Ganti password</button> -->
				</div>
			</div>
		</div>
	</div>

</div>

<?php $this->load->view('components/foot'); ?>
<?php $this->load->view('components/jsfoot'); ?>
<script>
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#tampil').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}
	$("#image").change(function () {
		readURL(this);
	});

	$("#simpan").click(function () {
		alert('Profil disimpan!');
		simpan();
	});

	$("#gantipassword").click(function () {
		window.location.href = "hmahasiswa/profil/gantipass";
	});

	function simpan() {
		$.ajax({
			url: "hmahasiswa/profil/simpan",
			type: "POST",
			data: $("#form1").serialize(),
			dataType: "JSON",
			success: function (data) {
				window.location.reload();
				$("html, body").animate({
					scrollTop: 0
				}, "slow");
				// $('#namafoto').load(document.URL + ' #namafoto');
			}
		})
	}
</script>
</body>

</html>