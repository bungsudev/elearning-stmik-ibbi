<!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
<?php
$this->load->view("laporan/head",array("title" => $title));
?>
<base href="<?= base_url(); ?>">
<div id="lap" style="width:210px; height:297px;">
	<table class='head' style="width:800px; margin-left:100px;">
		<tr>
			<td rowspan="4" style="width:50px;"><img style="  margin-bottom:40px; width:120px; height:120px;"
					src="assets/img/laporanibbi.jpg" alt=""></td>
		</tr>
		<tr>
			<td style="color:#cfba46;  text-align: center;">
				<h2>SEKOLAH TINGGI ILMU MANAJEMEN INFORMATIKA DAN KOMPUTER IBBI</h2>
			</td>
		</tr>
		<tr>
			<td style="text-align:center;">Jl. Sei Deli No.18, Silalas, Kec. Medan Barat., Kota Medan, Sumatera Utara
				20236</td>
		</tr>
		<tr>
			<td>.</td>
		</tr>
	</table>
	<?php
    foreach($absensi as  $item):
        $kls = $item->kelas;
        $mk = $item->kodemk;
    endforeach;
    ?>
	<h1 style="width:800px;  margin-left:150px;"><?= $title." ".$mk." ".$kls?> </h1>

	<table border="1" style="width:800px; margin-right:150px;">
		<thead>
			<tr>
				<th width="50px;">NIM</th>
				<th width="auto">Nama</th>
				<th>Kel</th>
				<?php 
					for ($i=1; $i <=16 ; $i++) { 
						echo "<th width='10px;'>P$i</th>";
					}
				?>
				<th>T</th>
				<th>H</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach($absensi as  $item):
                echo "<tr>
                        <td>{$item->nim}</td>
                        <td>{$item->namamhs}</td>
						<td style='text-align:center;'>{$item->kelompok}</td>";	
						$hadir=0;	
						$tidakhadir=0;	
						for ($i=1; $i <=16 ; $i++) { 
							$y = "a".$i;
							echo "<td>{$item->$y}</td>";
							if ($item->$y == "Hadir") {
								$hadir = $hadir +1;
							}else{
								$tidakhadir = $tidakhadir +1;
							}							
						};
				echo    "<td>$tidakhadir</td>
						 <td>$hadir</td>
						 </tr>";
            endforeach;
            ?>
		</tbody>
	</table>
</div>

<script type="text/javascript">
	$(document).ready(function () {
        window.print();
	})
</script>
<?php
$this->load->view("laporan/foot");
?>