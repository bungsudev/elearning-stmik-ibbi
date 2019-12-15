var statuskirim = false;
var kdmk = $("#kodemkses").val();;
$(document).ready(function () { 
	// kdmk = $("#kodemkses").val();
	$("#noesai").val(1);
	idsoal = $("#idsoal").val();
	$("#kodemk").val(kdmk);
	cekpertemuan(kdmk);
	// $("#mprodi").val(mprodi);

	$("#kirimesai").click(function () {
		if (statuskirim == true) {
			if(confirm("Anda yakin kirim soal ?")){
				kirprodi = $("#prodises").val();
				kirsem = $("#semesterses").val();
				tipetugas = $("#tipetugas option:selected").val();
				console.log(kirprodi,kirsem,tipetugas);
				kirim();
				// $("#modalkirim").modal("hide");
			}
		} else if (statuskirim == false) {
			$("html, body").animate({
				scrollTop: 0
			}, 1000);
			showalert("danger", "tambahkan soal terlebih dahulu!")
		}
	});

	$("#kirimsoal").click(function () {
		if(confirm("Anda yakin kirim soal ?")){
			kirprodi = $("#prodises").val();
			kirsem = $("#semesterses").val();
			tipetugas = $("#tipetugas option:selected").val();
			console.log(kirprodi,kirsem,tipetugas);
			kirim();
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
		absen = $( "#idsoal" ).val();
		$("#noabsen").val(absen);
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
	// $('#matakuliah').on('change', function() {
	// 	kdmk = this.value;
	// 	mprodi = $("#"+kdmk).val();
	// 	$("#kodemk").val(kdmk);
	// 	cekpertemuan(kdmk);
	// 	$("#mprodi").val(mprodi);
	// });
})


function cekpertemuan(kdmk) {
	$.ajax({
		url: "dosen/soalesai/cekpertemuan/" + kdmk,
		type: "POST",
		dataType: "JSON",
		success: function (data) {
			// var html = "";
			x = Number(data[0].akhir)+1;
			$("#idsoal").val(x);
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
		url: "dosen/soalesai/cekid",
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
		url: "dosen/soalesai/simpan",
		dataType: "JSON",
		data: $("#form1").serialize(),
		success: function (data) {
			// if (($("#idsoal").is(":disabled"))) {
				if (data.status) {
					// $('#idsoal').attr('readonly', true);
					$("html, body").animate({
						scrollTop: 0
					}, 1000);
					CKEDITOR.instances.isiesai.setData('');
					CKEDITOR.instances.jawaban.setData('');
					showMessage('menambahkan');
					$("#matakuliah").attr("readonly", true);
					$("#tipetugas").attr("readonly", true);
					tambahidsoal();
					kdmk = $("#kodemkses").val();
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
			
		}
	})
}
 
function kirim() {
	$.ajax({
		type: "POST",
		url: "dosen/soalesai/kirimsoal",
		dataType: "JSON",
		data: $('#form1').serialize(),
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
				$("#tipetugas").attr("readonly", false);
				$('#idsoal').val('-');
				$("#noesai").val(1);
				$('#tipetugas').prop('selectedIndex', 0);
				$("#absen").css("dispalay", "none");
				statuskirim = false;
				cekpertemuan(kdmk);
				// email = 'amialazmi@gmail.com';
				// send(email);
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

// function send(email) {
// 	$.ajax({
// 		url: "dosen/soalesai/send/" + email,
// 		type: "POST",
// 		dataType: "JSON",
// 		success: function (data) {
// 			console.log("berhasil")
// 		}
// 	});
// }

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
		url: "dosen/soalesai/delete/" + soalid + "/" + no,
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
			url: "dosen/soalesai/deleteall/" + soalid,
			type: "POST",
			dataType: "JSON",
			success: function (data) {
				if (data.status) {
					tampilesai(idsoal);
					$("#matakuliah").val("");
					$('#idsoal').val('-');
					// $("#idsoal").attr("readonly", false);
					$("#noesai").val(1);					
					$("#tipetugas").attr("readonly", false);
					$('#tipetugas').prop('selectedIndex', 0);
					cekpertemuan(kdmk);
					statuskirim = false;
					showMessage("delete");
				}
			}
		});
	}
}

function tampilesai(idsoal,kdmk) {
	$.ajax({
		url: "dosen/soalesai/ambil/" + idsoal +"/"+ kdmk,
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