<?php $this->load->view('components/head'); ?>
	<link rel="stylesheet" href="<?= base_url("assets/css/bootstrap.min.css")?>" />
	<link rel="stylesheet" href="<?= base_url("assets/css/bootstrap-responsive.min.css")?>" />
	<link rel="stylesheet" href="<?= base_url("assets/css/fullcalendar.css")?>" />
	<link rel="stylesheet" href="<?= base_url("assets/css/matrix-style.css")?>" />
	<link rel="stylesheet" href="<?= base_url("assets/css/matrix-media.css")?>" />
	<link href="<?= base_url("assets/font-awesome/css/font-awesome.css")?>" rel="stylesheet" />
	<link rel="stylesheet" href="<?= base_url("assets/css/jquery.gritter.css")?>" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?= base_url("assets/css/custom.css")?>" />
	<link rel="stylesheet" href="<?= base_url("assets/css/bootstrap-wysihtml5.css")?>" />
	
	<script src="<?= base_url("assets/js/excanvas.min.js")?>"></script>
	<script src="<?= base_url("assets/js/jquery.min.js")?>"></script>
	<script src="<?= base_url("assets/js/jquery.ui.custom.js")?>"></script>
	<script src="<?= base_url("assets/js/bootstrap.min.js")?>"></script>
	


<script src="<?= base_url("assets/js/fullcalendar.min.js")?>"></script>
<script src="<?= base_url("assets/js/matrix.js")?>"></script>

<script src="<?= base_url("assets/js/matrix.dashboard.js")?>"></script>

<script src="<?= base_url("assets/js/jquery.gritter.min.js")?>"></script>
<script src="<?= base_url("assets/js/matrix.interface.js")?>"></script>
<script src="<?= base_url("assets/js/matrix.chat.js")?>"></script>
<script src="<?= base_url("assets/js/jquery.validate.js")?>"></script>

<script src="<?= base_url("assets/js/matrix.form_validation.js")?>"></script>
<script src="<?= base_url("assets/js/jquery.wizard.js")?>"></script>
<script src="<?= base_url("assets/js/jquery.uniform.js")?>"></script>
<script src="<?= base_url("assets/js/select2.min.js")?>"></script>

<script src="<?= base_url("assets/js/matrix.popover.js")?>"></script>
<script src="<?= base_url("assets/js/jquery.dataTables.min.js")?>"></script>
<script src="<?= base_url("assets/js/matrix.tables.js")?>"></script>


// var currentRow = $(this).closest("tr")[0];
		// var cells = currentRow.cells;
		// var idsoalhide = cells[0].textContent;
		// $("#idsoal").val(idsoalhide);
<!-- select yang paten -->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="icon" type="image/png" href="<?= base_url("assets/img/favicon.png")?>">
	<title>Pembelajaran Online STMIK IBBI</title>

	<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="assets/css/bootstrap-responsive.min.css" />
	<link rel="stylesheet" href="assets/css/colorpicker.css" />
	<link rel="stylesheet" href="assets/css/datepicker.css" />
	<link rel="stylesheet" href="assets/css/uniform.css" />
	<link rel="stylesheet" href="assets/css/select2.css" />
	<link rel="stylesheet" href="assets/css/matrix-style.css" />
	<link rel="stylesheet" href="assets/css/matrix-media.css" />
	<!-- <link rel="stylesheet" href="assets/css/bootstrap-wysihtml5.css" /> -->
	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?= base_url("assets/css/custom.css")?>" />
	
	<?php $this->load->view('components/navbar'); ?>
	<!--sidebar-menu-->

	// data : {idesai:idesai,idsoal:idsoal,noesai:noesai,matakuliah:matakuliah,isiesai:isiesai,jawaban:jawaban},

	// event.preventDefault();
        // alert();
        idesai = '';
        idsoal = $("#idsoal").val();
        noesai = $("#noesai").val();
        matakuliah = $("#matakuliah").val();
        isiesai = CKEDITOR.instances.isiesai.getData()
        jawaban = CKEDITOR.instances.jawaban.getData()
        $("#isiesai").val(CKEDITOR.instances.isiesai.getData());
        $("#jawaban").val(CKEDITOR.instances.jawaban.getData());
        var formData = $("#form1").serialize();
        // console.log(idesai,idsoal,noesai,matakuliah,isiesai,jawaban);
        // console.log(formData);

		<!-- ================== -->

		
	// public function simpan(){		
	// 	$this->form_validation->set_rules('idsoal', 'ID Soal', 'required');
	// 	$this->form_validation->set_rules('matakuliah', 'matakuliah', 'required');
	// 	$this->form_validation->set_rules('isiesai', 'isi soal', 'required');
	// 	$this->form_validation
	// 		->set_error_delimiters("<span class='alert alert-error nopadding'>","</span>");
	// 	if ($this->form_validation->run() == FALSE)
	// 	{
	// 			$this->load->view('pertanyaan/soalesai_view');
	// 	}
	// 	else
	// 	{
	// 		$data = array(
	// 		"idsoal" => $this->input->post("idsoal"),
	// 		"noesai" => $this->input->post("noesai"),
	// 		"matakuliah" => $this->input->post("matakuliah"),
	// 		"isiesai" => $this->input->post("isiesai"),
	// 		"jawaban" => $this->input->post("jawaban")
	// 		);
	// 		$status = $this->pertanyaan_model->createsoales($data);
	// 		echo json_encode(array("status" => TRUE));
			
	// 		$this->session->set_flashdata('berhasil','Soal essai ditambahkan.');
	// 		// redirect('soalesai');
	// 	}
	// }

	"<li><input type='radio' name='NO1' style='margin-bottom:5px;' value='" + texta + "'></li>" +
					"<li><input type='radio' name='NO1' style='margin-bottom:5px;' value='" + textb + "'></li>" +
					"<li><input type='radio' name='NO1' style='margin-bottom:5px;' value='" + textc + "'></li>" +
					"<li><input type='radio' name='NO1' style='margin-bottom:5px;' value='" + textd + "'></li>" +