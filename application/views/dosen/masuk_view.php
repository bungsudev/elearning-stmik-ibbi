<?php $this->load->view('components/head'); ?>
<base href="<?= base_url(); ?>">

<style>
	body {
		width: 100%;
		height: 100%;
		font-family: 'Open Sans', sans-serif;
		background: url('http://localhost/online/assets/img/LOGIN2.jpg');
		/* Full height */
		height: 100%;
		/* Center and scale the image nicely */
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;
	}

	.center {
		width: 50%;
		padding: 10px;
		margin-top: 15%;
		margin-left: 35%;
		position: absolute;
	}

	h2 {
		color: white;
	}
</style>
</head>

<body>
	<div class="center">
		<label for="matakuliahfil">
			<h2>Masuk matakuliah</h2>
		</label>
		<select name="matakuliahfil" id="matakuliahfil" class="span4">
			<option value="" disabled selected>Pilih</option>
			<?php
				$iddosen = $this->session->userdata('ses_id');
                $namamk = $this->db->query("select * from tblmatakuliah where iddosen = '$iddosen'");
                foreach($namamk->result() as $row)
                {
                    echo "<option data-prodi='$row->prodi' data-namamk='$row->namamk' data-sem='$row->semester' value='".$row->kodemk."'>".$row->namamk." | ".$row->prodi." - ".$row->semester."</option>";
                }	 
            ?>
		</select>
		<br>
		<div class="span4 pull-right" style="margin-right:80px;">
		<input class='btn btn-success' style="margin-bottom:10px;" type="button" id="masuk" value="Masuk">
		<input class='btn btn-warning' style="margin-bottom:10px;" type="button" id="logout" value="Keluar">
		</div>
	</div>
	<script>
		$(document).ready(function () {

			$('#matakuliahfil').on('change', function () {
                kodemk = $("#matakuliahfil option:selected").val();
				prodi = $(this).find(':selected').data('prodi');
				semester = $(this).find(':selected').data('sem');
				namamk = $(this).find(':selected').data('namamk');
				namamk.text();
				$("#prodifil").val(prodi);
                $("#semesterfil").val(semester);
                console.log(prodi,semester,kodemk);
			});
			$("#masuk").click(function () {
				kodemk = $("#matakuliahfil option:selected").val();
				if (kodemk == '') {
					alert('Pilih terlebih dahulu!');
				} else {
					$.get("dosen/masuk/set_session/" + kodemk + "/" +prodi+"/"+semester+"/"+namamk, function (result) {
						window.location.href = 'dosen/home';
					});
				}                
			});
			$("#logout").click(function () {
				window.location.href = 'dosen/masuk/keluar';
			});
		});
	</script>
</body>

</html>