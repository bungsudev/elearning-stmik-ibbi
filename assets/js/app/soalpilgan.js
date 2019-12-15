var statuskirim = false;
var kdmk = '';
$(document).ready(function () {
	// console.log('ready');	
	$("#nopilgan").val(1);
    idsoalpil = $("#idsoalpil").val();
	
	$("#kirimpilgan").click(function () {
		if (statuskirim == true) {
			$("#modalkirim").modal("show");
			absen = $( "#idsoalpil" ).val();
			$("#noabsen").val(absen);
		}else if (statuskirim == false) {
			$("html, body").animate({
				scrollTop: 0
			}, 1000);
			showalert("danger","tambahkan soal terlebih dahulu!")
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

	$("tbody#tblpilgan").on("click", "#hapus", function () {
		idsoalpil = $(this).data("id");
		var no = $(this).data("no");
		hapus(idsoalpil,no);
	});

	$("#deleteall").click(function () {
		hapussemua(idsoalpil);
	});

	$("#selesaipilgan").click(function (){		
		if ($("#cek").is(":disabled")) {
			if(confirm("Sudah selesai menambahkan soal?")){
				showMessage("selesai menambahkan soal");
				$('#tblpilgan').children('tr').remove();
				$("html, body").animate({
					scrollTop: 0
				}, 1000);				
				$("#matakuliah").attr("readonly", false);
				$("#idsoalpil").attr("readonly", false);
				$("#idsoalpil").val('');
				$("#nopilgan").val(1);				
				$("#cek").attr("disabled", false);
				statuskirim = false;
			}
		}else{
			alert('Anda belum menambahkan soal apapun!');
		}
	});

	$("#cek").click(function () {
		event.preventDefault();
		idsoalpil = $("#idsoalpil").val();
		$("#isipilgan").val(CKEDITOR.instances.isipilgan.getData());
        $("#pila").val(CKEDITOR.instances.pila.getData());
        $("#pilb").val(CKEDITOR.instances.pilb.getData());
        $("#pilc").val(CKEDITOR.instances.pilc.getData());
        $("#pild").val(CKEDITOR.instances.pild.getData());
		cek();

	});
	$("#tambahpilgan").click(function () {
        $("#isipilgan").val(CKEDITOR.instances.isipilgan.getData());
        $("#pila").val(CKEDITOR.instances.pila.getData());
        $("#pilb").val(CKEDITOR.instances.pilb.getData());
        $("#pilc").val(CKEDITOR.instances.pilc.getData());
        $("#pild").val(CKEDITOR.instances.pild.getData());
		$("span.help-inline").remove();
		$("span.alert").remove();
        idsoalpil = $("#idsoalpil").val();        
		simpanpertanyaan();
	});

	$('#matakuliah').on('change', function() {
		kdmk = this.value;
		$("#kodemk").val(kdmk);
		cekpertemuan(kdmk);
	});

})

function cekpertemuan(kdmk) {
	$.ajax({
		url: "soalpilgan/cekpertemuan/" + kdmk,
		type: "POST",
		dataType: "JSON",
		success: function (data) {
			var html = "";
			x = Number(data[0].akhir)+1;
			$("#idsoalpil").val(x);
			// if (data[0].akhir !== null && data[0].akhir !== undefined) {
			// 	for (i = x; i <= 16; i++) {
			// 		html += "<option value='"+i+"'>"+i+"</option>"
			// 	}
			// 	$("#idsoalpil").html(html);	
			// 	// $('#idsoal').prepend("<option value='' disabled selected>Pilih</option>");
			// } else {
			// 	for (i = 1; i <= 16; i++) {
			// 		html += "<option value='"+i+"'>"+i+"</option>"
			// 	}
			// 	$("#idsoalpil").html(html);
			// 	// $('#idsoal').prepend("<option value='' disabled selected>Pilih</option>");
			// }
		}
	})
}

function tambahidsoalpil() {
	$('#nopilgan').val(function (i, oldval) {
		return ++oldval;
	});
}
function kurangidsoalpil() {
	$('#nopilgan').val(function (i, oldval) {
		return --oldval;
	});
}

function cek() {
	$.ajax({
		type: "POST",
		url: "soalpilgan/cekid",
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
				$("#idsoalpil").attr("readonly", true);
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
		url: "soalpilgan/simpan",
		dataType: "JSON",
		data: $("#form1").serialize(),
		success: function (data) {
			// if ($("#cek").is(":disabled")) {
				if (data.status) {
					$('#idsoalpil').attr('readonly', true);
					$('#jawabanpilgan').val('');
					$("html, body").animate({
						scrollTop: 0
					}, 1000);
					CKEDITOR.instances.isipilgan.setData('');
                    CKEDITOR.instances.pila.setData('');
                    CKEDITOR.instances.pilb.setData('');
                    CKEDITOR.instances.pilc.setData('');
                    CKEDITOR.instances.pild.setData('');
					showMessage('menambahkan');
					$("#matakuliah").attr("readonly", true);
					$('#jawabanpilgan').prop('selectedIndex', 0);
					tambahidsoalpil();
					tampilpilgan(idsoalpil,kdmk);
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
		url: "soalpilgan/kirimsoal",
		dataType: "JSON",
		data: $('#form1,#form2').serialize(),
		complete : function (data) {	
			console.log(data.status);
			if (data.status) {
				showalert("success", "Soal terkirim ke mahasiswa!");
				// $("#absen").css("display", "none");
				$('#tblpilgan').children('tr').remove();
				$("html, body").animate({
					scrollTop: 0
				}, 1000);
				$("#matakuliah").attr("readonly", false);
				$('#idsoalpil').val('-');
				// $("#idsoalpil").attr("readonly", false);
				// $('#idsoalpil').html("<option value='' disabled selected>Pilih</option>");
				// $("#idsoalpil").val(0);
				$("#nopilgan").val(1);
				// $("#cek").attr("disabled", false);
				$('#form2')[0].reset();
				$('#matakuliah').prop('selectedIndex', 0);
				$('#jawabanpilgan').prop('selectedIndex', 0);
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

// function kirim() {
// 	$.ajax({
// 		type: "POST",
// 		url: "soalpilgan/kirimsoal",
// 		dataType: "JSON",
// 		data: $('#form1,#form2').serialize(),
// 		complete: function (data) {
// 			if (($("#cek").is(":disabled"))) {
// 				if (data.status) {
// 					showalert("success", "Soal terkirim ke mahasiswa!");
// 					$("#absen").css("display", "none"); 
// 					$('#tblpilgan').children('tr').remove();
// 					$("html, body").animate({
// 						scrollTop: 0
// 					}, 1000);
// 					$("#matakuliah").attr("readonly", false);
// 					$("#idsoalpil").attr("readonly", false);
// 					$("#idsoalpil").val('');
// 					$("#nopilgan").val(1);
// 					$("#cek").attr("disabled", false);
// 					$("#modalkirim").modal("hide");
// 					$('#form2')[0].reset();
// 					$('#matakuliah').prop('selectedIndex', 0);
// 					statuskirim = false;
// 				} else {
// 					$("#modalkirim").modal("hide");
// 					showalert("danger","Gagal","mengirimkan data");
// 					$("html, body").animate({
// 						scrollTop: 0
// 					}, 1000);
// 				}
// 			} else {
// 				$("#modalkirim").modal("hide");
// 				showalert("danger","Gagal","mengirimkan data");
// 				$("html, body").animate({
// 					scrollTop: 0
// 				}, 1000);
// 			}
// 		}
// 	});
// 	return false;
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

function bacapertanyaan(id) {
	$("form")[0].reset();
	$.ajax({
		url: "lihatup/baca/" + id,
		type: "POST",
		dataType: "JSON",
		success: function (data) {
			$("#idpertanyaan").val(data.idpertanyaan);
			$("#matakuliah").val(data.matakuliah);
			$("#judulpertanyaan").val(data.judulpertanyaan);
			$("#tanggal").val(data.tanggal);
			// $("#upload").val(data.file);
			$("#upload").change(function () {
				var filename = $("#upload").val();
				$("#upload").html(filename);
			});

			$("#mode").html("Upload");
			$("#form-rubah").modal("show");
		}
	})
}

function hapus(soalid,no){
	$.ajax({
		url: "soalpilgan/delete/"+soalid+"/"+no,
		type: "POST",
		dataType: "JSON",
		success: function(data){
			if(data.status){
				tampilpilgan(idsoalpil,kdmk);
				kurangidsoalpil();
				showMessage('delete');
			}
		}
	});
}

function hapussemua(idsoalpil){
    if(confirm("Anda yakin hapus ?")){
        $.ajax({
            url: "soalpilgan/deleteall/"+idsoalpil,
            type: "POST",
            dataType: "JSON",
            success: function(data){
                if(data.status){
					tampilpilgan(idsoalpil,kdmk);
					$("#matakuliah").val("");
					$('#idsoalpil').val('-');
					$("#nopilgan").val(1);
					// $("#idsoalpil").attr("readonly", false);
					$("#matakuliah").attr("readonly", false);
                    showMessage("delete");
                }
            }
        });
    }
}

function tampilpilgan(idsoalpil,kdmk){
    $.ajax({
        url: "soalpilgan/ambilpil/"+idsoalpil+"/"+kdmk,
        type: "POST",
        dataType: "JSON",
        success: function(data){
            var html = "";
            for(i=0;i<data.length;i++){
				html += "<tr>" +
					"<td class='isitbl' style='width:20px;'>" + data[i].nopilgan + "</td>" +
					"<td class='isitbl' style='width:200px;'>" + data[i].matakuliah + "</td>" +
					"<td>" + data[i].isipilgan + "</td>" +
					"<td class='isitbl' style='width:20px;'>" + data[i].jawabanpilgan + "</td>" +
					"<td class='isitbl' style='width:80px;'><button class='btn btn-warning btn-block' id='hapus' data-no='" + data[i].nopilgan + "' data-id='" + data[i].idsoalpil + "'>" +
					"<span class='icon-trash'></span> Hapus</button>" +
					"</td>" +
					"</tr>";
            }
            $("tbody#tblpilgan").html(html);
        }
    })
}