<?php $this->load->view('components/head'); ?>
<base href="<?= base_url() ?>">
<?php $this->load->view('components/navbar'); ?>
<li class="active"><a href="hmahasiswa/home"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
<li><a href="hmahasiswa/soalmhs"><i class="icon icon-th-list"></i> <span>Soal</span></a> </li>
<li><a href="hmahasiswa/absensimhs"><i class="icon icon-home"></i> <span>Absensi</span></a> </li>
<li><a href="hmahasiswa/nilaimhs"><i class="icon icon-trophy"></i> <span>Nilai</span></a> </li>
<li><a href="hmahasiswa/diskusimhs"><i class="icon icon-group"></i> <span>Forum Diskusi</span></a> </li>

</ul>
</div>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
	<!--breadcrumbs-->
	<div id="content-header">
		<div id="breadcrumb"> <a href="hmahasiswa/home" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
				Home</a></div>
	</div>
	<!--End-breadcrumbs-->

	<!--Action boxes-->
	<div class="container-fluid">
		<div class="row-fluid span12">
			<div class="quick-actions_homepage">
				<ul class="quick-actions">
					<li class="bg_lo span3"> <a href="hmahasiswa/soalmhs"> <i class="icon-book"></i>Soal Terbaru </a> </li>
					<li class="bg_lg span3"> <a href="hmahasiswa/nilaimhs"> <i class="icon-list-alt"></i> Nilai </a>
					</li>
					<li class="bg_ly"> <a href="hmahasiswa/diskusimhs"> <i class="icon-group"></i> Ruang Diskusi </a> </li>
					<li class="bg_lo"> <a href="hmahasiswa/absensimhs"> <i class="icon-trophy"></i> Absensi </a> </li>
				</ul>
			</div>
		</div>
		<!--End-Action boxes-->
	</div>
	<hr />
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="widget-box">
				<div class="widget-title"> <span class="icon"> <i class="icon-bullhorn"></i> </span>
					<h5>Pengumuman</h5>
				</div>
				<div class="widget-content" >
					<table id="tblpeng" width='100%'>

					</table>
					<!-- <ul class="recent-posts"> -->
						<!-- <li><div class="user-thumb"> <img width="40" height="40" alt="User"
								src="assets/img/fotomahasiswa/123456.jpg"></div>
							<div class="article-post">
								<span class="user-info"> By: john Deo / Date: 2 Aug 2012 / Time:09:27 AM </span>
								<p>This is a much longer one that will go on for a few lines.It has multiple
									paragraphs and is full of waffle to pad out the comment. </p></div>
						</li> -->
					<!-- </ul> -->
				</div>
			</div>
		</div>
	</div>
</div>

<!--end-main-container-part-->

<?php $this->load->view('components/foot'); ?>
<script src="assets/js/app/hmahasiswa/home.js"></script>
<?php $this->load->view('components/jsfoot'); ?>
</body>

</html>