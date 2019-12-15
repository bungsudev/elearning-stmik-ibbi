<?php
$this->load->view("laporan/head",array("title" => $title));
?>
<base href="<?= base_url(); ?>">
<div id="lap" style="width:210px; height:297px; margin-left:50px;">
	<table class='head' style="width:800px; margin-right:150px;">
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
    foreach($nilai as  $item):
		$kls = $item->tipetugas;
		$kls = strtoupper($kls);
        $prd = $item->namamhs;
    endforeach;
    ?>
	<h1 style="width:800px; margin-left:50px;"><?= $title." ".$kls?> </h1>

	<table border="1" style="width:800px; margin-right:150px;">
		<thead>
			<tr>
                <th width="70px;">Kode MK</th>
				<th width="90px;">NIM</th>
				<th>Nama</th>
                <?php
                    for ($i=1; $i <=16 ; $i++) { 
                        echo "<th width='100px;'>P $i</th>";
                    }
                ?>
				
			</tr>
		</thead>
		<tbody>
			<?php
            foreach($nilai as  $item):
                echo "<tr>
                        <td style='text-align:center;'>{$item->kodemk}</td>
                        <td style='text-align:center;'>{$item->nim}</td>
                        <td>{$item->namamhs}</td>";
                        $nimmhs = $item->nim;
                        for ($i=1; $i <=16 ; $i++) { 
							$n = 0;
                            $query1 = $this->db->query("SELECT nilai FROM tblriwayatsoal WHERE nim = '$nimmhs' AND absensike = $i");
							foreach($query1->result() as $row)
							{
                                $n = $row->nilai;
                                if ($n == NULL) {
                                    $n = 0;
                                } else {
                                    $n = $n;
                                };
                                // $n = $data[$i];
							}                            
                            echo "<td style='text-align:center;'>$n</td>";   
                        };
                echo "</tr>";
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