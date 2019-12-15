<?php $this->load->view('components/head'); ?>
<base href="<?= base_url() ?>">
<?php $this->load->view('components/navbar'); ?>
<li><a href="hmahasiswa/home"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
<li class="active"><a href="hmahasiswa/soalmhs"><i class="icon icon-th-list"></i> <span>Soal</span></a> </li>
<li><a href="hmahasiswa/nilaimhs"><i class="icon icon-trophy"></i> <span>Nilai</span></a> </li>
 
<li><a href="hmahasiswa/diskusimhs"><i class="icon icon-group"></i> <span>Forum Diskusi</span></a> </li>

</ul>
</div>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
	<div id="content-header">
		<div id="breadcrumb"> <a href="home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a
				href="hmahasiswa/soalmhs" class="current">Soal Berganda</a> </div>
		<h1><span class="icon-briefcase"></span>
			Soal Mahasiswa <small> Pembelajaran Online STMIK IBBI</small></h1>
	</div>
	<hr>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"> <i class="icon-list"></i> </span>
						<h5>Soal ..... <code>Sampai tanggal ....</code></h5>
					</div>
					<div class="widget-content">
						<form action="hmahasiswa/kirim">
							<table class="isisoal">
								<tr>
									<td style="width:20px;" valign="top">1</td>
									<td colspan="5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate
										quo,
										commodi
										tempore in ad, accusamus et repudiandae veniam autem ipsam quasi adipisci illo
										aliquid fugit voluptates sed animi impedit? Unde.</td>

								</tr>
								<tr>
									<td></td>
									<td colspan="5">
										<div class="control-group">
											<label class="control-label"><strong>Jawaban
													Soal</strong></label>
											<div class="controls" >
												<textarea class="textarea_editor1 span12" rows="6"
													placeholder="Isi Jawaban anda..."></textarea>
											</div>
										</div>
									</td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td align="right">
										<button type="submit" class="btn btn-success" id="submitnnt">Jawab
											Nanti</button>
										<button type="submit" class="btn btn-success" id="submit">Kirim
											Jawaban</button>
									</td>
								</tr>
							</table>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('components/foot'); ?>
<?php $this->load->view('components/jsfoot'); ?>
<script src="assets/js/wysihtml5-0.3.0.js"></script>
<script src="assets/js/bootstrap-wysihtml5.js"></script>
<script>
	$('.textarea_editor1').wysihtml5();
</script>
</body>

</html>