var statuskirim = false;
var kdmk = '';
$(document).ready(function () {
	$("#noesai").val(1);
	idsoal = $("#idsoal").val();

	$("#kirimesai").click(function () {
		if (statuskirim == true) {
			$("#modalkirim").modal("show");
			absen = $( "#idsoal" ).val();
			$("#noabsen").val(absen);
		} else if (statuskirim == false) {
			$("html, body").animate({
				scrollTop: 0
			}, 1000);
			showalert("danger", "tambahkan soal terlebih dahulu!")
		}
	});

	$("#kirimsoal").click(function () {
		kirprodi = $("#kirprodi option:selected").val();
		kirsem = $("#kirsem option:selected").val();
		tipetugas = $("#tipetugas option:selected").val();
		pilihabsen = $("#pilihabsen option:selected").val();
		console.log(kirprodi,kirsem,tipetugas,pilihabsen);
		if (kirprodi == '' || kirsem == '' || tipetugas == '' || pilihabsen == '') {
			alert("Pilih field dengan benar");
			// $( "#val1" ).append("<br><span class='alert alert-error nopadding'>Pilih Program Studi!</span>");
			// $( "#val2" ).append("<br><span class='alert alert-error nopadding'>Pilih Semester!</span>");
			// $( "#val3" ).append("<br><span class='alert alert-error nopadding'>Pilih Tipe!</span>");
			// $( "#val4" ).append("<br><span class='alert alert-error nopadding'>Pilih Absensi!</span>");
		} else {
			kirim();
			$("#modalkirim").modal("hide");
		}		
	});

	$("#selesaiesai").click(function () {
		if ($("#cek").is(":disabled")) {
			if (confirm("Sudah selesai menambahkan soal?")) {
				showMessage("selesai menambahkan soal");
				$('#tblesai').children('tr').remove();
				$("html, body").animate({
					scrollTop: 0
				}, 1000);
				$("#matakuliah").attr("readonly", false);
				$("#idsoal").attr("readonly", false);
				$("#idsoal").val('');
				$("#noesai").val(1);
				$("#cek").attr("disabled", false);
				statuskirim = false;
			}
		} else {
			alert('Anda belum menambahkan soal apapun!');
		}
	});

	$("tbody#tblesai").on("click", "#hapus", function () {
		var soalid = $(this).data("id");
		var no = $(this).data("no");
		hapus(soalid, no);
	});
	$("#cek").click(function () {
		event.preventDefault();
		idsoal = $("#idsoal").val();
		$("#isiesai").val(CKEDITOR.instances.isiesai.getData());
		$("#jawaban").val(CKEDITOR.instances.jawaban.getData());
		cek();

	});
	$("#tambahesai").click(function () {
		$("#isiesai").val(CKEDITOR.instances.isiesai.getData());
		$("#jawaban").val(CKEDITOR.instances.jawaban.getData());
		$("span.help-inline").remove();
		$("span.alert").remove();
		idsoal = $("#idsoal").val();
		simpanpertanyaan();
	});
	$("#deleteall").click(function () {
		var soalid = $(this).data("id");
		hapussemua(idsoal);
	});
	$('#matakuliah').on('change', function() {
		kdmk = this.value;
		mprodi = $("#"+kdmk).val();
		$("#kodemk").val(kdmk);
		cekpertemuan(kdmk);
		$("#mprodi").val(mprodi);
	});
	// $('#tipetugas').on('change', function() {
	// 	// $("#tipe").css("display", "block");
	// 	// absensi = $( "#idsoal option:selected" ).val();
	// 	if (this.value == 'kelompok') {
	// 		// absen = $( "#idsoal option:selected" ).val();
	// 		// $("#noabsen").val(absen);
	// 		alert("asd");
	// 	}		
	// });
})


function cekpertemuan(kdmk) {
	$.ajax({
		url: "soalesai/cekpertemuan/" + kdmk,
		type: "POST",
		dataType: "JSON",
		success: function (data) {
			// var html = "";
			x = Number(data[0].akhir)+1;
			$("#idsoal").val(x);
			console.log(x);
			// if (data[0].akhir !== null && data[0].akhir !== undefined) {
			// 	for (i = x; i <= 16; i++) {
			// 		html += "<option value='"+i+"'>"+i+"</option>"
			// 	}
			// 	$("#idsoal").html(html);	
			// 	// $('#idsoal').prepend("<option value='' disabled selected>Pilih</option>");
			// } else {
			// 	for (i = 1; i <= 16; i++) {
			// 		html += "<option value='"+i+"'>"+i+"</option>"
			// 	}
			// 	$("#idsoal").html(html);
			// 	// $('#idsoal').prepend("<option value='' disabled selected>Pilih</option>");
			// }
		}
	})
}

function tambahidsoal() {
	$('#noesai').val(function (i, oldval) {
		return ++oldval;
	});
}

function kurangidsoal() {
	$('#noesai').val(function (i, oldval) {
		return --oldval;
	});
}

function cek() {
	$.ajax({
		type: "POST",
		url: "soalesai/cekid",
		dataType: "JSON",
		data: $("#form1").serialize(),
		success: function (data) {
			if (data.status) {
				$("span.alert").remove();
				$(".control-group").removeClass("error");
				desc = "<span class='alert alert-success nopadding' style='font-size:13px; margin-left:10px;'> Dapat digunakan. </span>";
				$(desc)
					.prependTo("#cekid")
					.delay(500)
					.slideUp("slow");
				$("#idsoal").attr("readonly", true);
				$("#cek").attr("disabled", true);
			} else {
				$("span.alert").remove();
				$(".control-group").removeClass("error");
				desc = "<span class='alert alert-danger nopadding' style='font-size:13px; margin-left:10px;'> Tidak dapat digunakan! </span>";
				// $("span[name='cek'").after(desc);
				$(desc)
					.prependTo("#cekid")
					.delay(500)
					.slideUp("slow");
			}
		}
	})
}

function simpanpertanyaan() {
	$.ajax({
		type: "POST",
		url: "soalesai/simpan",
		dataType: "JSON",
		data: $("#form1").serialize(),
		success: function (data) {
			// if (($("#idsoal").is(":disabled"))) {
				if (data.status) {
					// $('#idsoal').attr('readonly', true);
					console.log(idsoal);
					$("html, body").animate({
						scrollTop: 0
					}, 1000);
					CKEDITOR.instances.isiesai.setData('');
					CKEDITOR.instances.jawaban.setData('');
					showMessage('menambahkan');
					$("#matakuliah").attr("readonly", true);
					tambahidsoal();
					kdmk = $( "#matakuliah option:selected" ).val();
					tampilesai(idsoal,kdmk);
					statuskirim = true;
				} else {
					$("span.alert").remove();
					$(".control-group").removeClass("error");
					$.each(data.message, function (index, value) {
						if (value) {
							$("span[name=" + index + "]")
								.after(value)
								.parent()
								.addClass("error");
						}
					});
				}
			// } else {
			// 	$("html, body").animate({
			// 		scrollTop: 0
			// 	}, 500);
			// 	$("#idsoal").focus();
			// 	$("span.alert").remove();
			// 	$(".control-group").removeClass("error");
			// 	desc = "<span class='alert alert-danger nopadding' style='font-size:13px; margin-left:10px;'> Cek terlebih dahulu! </span>";
			// 	// $("span[name='cek'").after(desc);
			// 	$(desc)
			// 		.prependTo("#cekid")
			// 		.delay(1500)
			// 		.slideUp("slow");
			// }
		}
	})
}
 
function kirim() {
	$.ajax({
		type: "POST",
		url: "soalesai/kirimsoal",
		dataType: "JSON",
		data: $('#form1,#form2').serialize(),
		complete : function (data) {	
			console.log(data.status);
			if (data.status) {
				showalert("success", "Soal terkirim ke mahasiswa!");
				// $("#absen").css("display", "none");
				$('#tblesai').children('tr').remove();
				$("html, body").animate({
					scrollTop: 0
				}, 1000);
				$("#matakuliah").attr("readonly", false);
				$('#idsoal').val('-');
				// $("#idsoal").attr("readonly", false);
				// $('#idsoal').html("<option value='' disabled selected>Pilih</option>");
				// $("#idsoal").val(0);
				$("#noesai").val(1);
				$('#form2')[0].reset();
				$('#matakuliah').prop('selectedIndex', 0);
				$("#absen").css("dispalay", "none");
				statuskirim = false;
			} else {				
				showalert("danger", "Isi Field dengan benar!", "mengirimkan data");
				$("html, body").animate({
					scrollTop: 0
				}, 1000);
			}
			
		}
	});
	return false;
}

function showalert(stat, mode) {
	var divMessage = "<div class='alert alert-" + stat + "'>" +
		"<strong>" + mode.toUpperCase() + "</strong>" +
		"</div>";
	$(divMessage)
		.prependTo(".ini")
		.delay(5000)
		.slideUp("slow");
}

function showMessage(mode) {
	var divMessage = "<div class='alert alert-success'>" +
		"Berhasil <strong>" + mode.toUpperCase() + "</strong> pertanyaan" +
		"</div>";
	$(divMessage)
		.prependTo(".ini")
		.delay(2000)
		.slideUp("slow");
}

function hapus(soalid, no) {
	$.ajax({
		url: "soalesai/delete/" + soalid + "/" + no,
		type: "POST",
		dataType: "JSON",
		success: function (data) {
			if (data.status) {
				tampilesai(idsoal,kdmk);
				kurangidsoal();
				showMessage('delete');
			}
		}
	});
}

function hapussemua(soalid) {
	if (confirm("Anda yakin hapus ?")) {
		$.ajax({
			url: "soalesai/deleteall/" + soalid,
			type: "POST",
			dataType: "JSON",
			success: function (data) {
				if (data.status) {
					tampilesai(idsoal);
					$("#matakuliah").val("");
					$('#idsoal').val('-');
					// $("#idsoal").attr("readonly", false);
					$("#noesai").val(1);					
					$("#matakuliah").attr("readonly", false);
					statuskirim = false;
					showMessage("delete");
				}
			}
		});
	}
}

function tampilesai(idsoal,kdmk) {
	$.ajax({
		url: "soalesai/ambil/" + idsoal +"/"+ kdmk,
		type: "POST",
		dataType: "JSON",
		success: function (data) {
			var html = "";
			for (i = 0; i < data.length; i++) {
				html += "<tr>" +
					"<td class='isitbl' style='width:20px;'>" + data[i].noesai + "</td>" +
					"<td class='isitbl' style='width:200px;'>" + data[i].matakuliah + "</td>" +
					"<td>" + data[i].isiesai + "</td>" +
					"<td class='isitbl' style='width:80px;'><button class='btn btn-warning btn-block' id='hapus' data-no='" + data[i].noesai + "' data-id='" + data[i].idsoal + "'>" +
					"<span class='icon-trash'></span> Hapus</button>" +
					"</td>" +
					"</tr>";
			}
			$("tbody#tblesai").html(html);
		}
	})
}