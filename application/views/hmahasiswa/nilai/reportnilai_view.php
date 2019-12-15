<?php $this->load->view('components/head'); ?>
<base href="<?= base_url() ?>">
<?php $this->load->view('components/navbar'); ?>
<li><a href="hmahasiswa/home"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
<li><a href="hmahasiswa/soalmhs"><i class="icon icon-th-list"></i> <span>Soal</span></a> </li>
<li class="active"><a href="hmahasiswa/nilaimhs"><i class="icon icon-trophy"></i> <span>Nilai</span></a> </li>
 
<li><a href="hmahasiswa/diskusimhs"><i class="icon icon-group"></i> <span>Forum Diskusi</span></a> </li>

</ul>
</div>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
	<div id="content-header">
		<div id="breadcrumb"> <a href="home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a
				href="hmahasiswa/nilaimhs" class="current">Nilai</a> </div>
		<h1><span class="icon-briefcase"></span>
			Nilai Mahasiswa <small> Pembelajaran Online STMIK IBBI</small></h1>
	</div>
	<hr>
	<div class="container-fluid">
        <div class="span8 offset1">
		<div class="widget-box">
			<div class="widget-title"> <span class="icon"><i class="icon-time"></i></span>
                <h5>Nilai <span id="mode"></span></h5>
                <button type="submit" id="cetak" class="btn btn-success pull-right" style="margin:3px 3px;">Cetak</button>
			</div>
			<div class="widget-content nopadding">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
                            <th style="width:80px;">Tgl Kirim</th>
                            <th style="width:45px;">Tipe soal</th>
							<th>Judul soal</th>
							<th style="width:30px;">Benar</th>
							<th style="width:30px;">Salah</th>
							<th style="width:30px;">Nilai</th>
						</tr>
					</thead>
					<tbody>
						<tr>
                            <td>15-2-018</td>
							<td>Quiz</td>
							<td>Perangkat Lunak</td>
							<td>8</td>
							<td>2</td>
							<td>80</td>
                        </tr>
					</tbody>
				</table>
            </div>
            </div>
		</div>
	</div>
</div>

<?php $this->load->view('components/foot'); ?>

<?php $this->load->view('components/jsfoot'); ?>
</body>

</html>