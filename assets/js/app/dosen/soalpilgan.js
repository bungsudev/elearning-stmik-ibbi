var statuskirim = false;
$(document).ready(function () {
	var kdmk = $("#kodemkses").val();	
	cekpertemuan(kdmk);
	$("#nopilgan").val(1);
    idsoalpil = $("#idsoalpil").val();
	$("#kodemk").val(kdmk);
	$("#kirimpilgan").click(function () {
		if (statuskirim == true) {
			absen = $( "#idsoalpil" ).val();
			$("#noabsen").val(absen);
			if(confirm("Anda yakin kirim soal ?")){
				kirprodi = $("#prodises").val();
				kirsem = $("#semesterses").val();
				tipetugas = $("#tipetugas option:selected").val();
				console.log(kirprodi,kirsem,tipetugas);
				kirim();
				// $("#modalkirim").modal("hide");
			}
		}else if (statuskirim == false) {
			$("html, body").animate({
				scrollTop: 0
			}, 1000);
			showalert("danger","tambahkan soal terlebih dahulu!")
		}		
	});

	$("#kirimsoal").click(function () {
		if(confirm("Anda yakin kirim soal ?")){
			kirprodi = $("#prodises").val();
			kirsem = $("#semesterses").val();
			tipetugas = $("#tipetugas option:selected").val();
			kirim();
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
})

function cekpertemuan(kdmk) {
	$.ajax({
		url: "dosen/soalpilgan/cekpertemuan/" + kdmk,
		type: "POST",
		dataType: "JSON",
		success: function (data) {
			x = Number(data[0].akhir)+1;
			$("#idsoalpil").val(x);
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
		url: "dosen/soalpilgan/cekid",
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
		url: "dosen/soalpilgan/simpan",
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
					$("#tipetugas").attr("readonly", true);
					$('#jawabpilgan').prop('selectedIndex', 0);
					kdmk = $("#kodemkses").val();
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
		}
	})
}

function kirim() {
	$.ajax({
		type: "POST",
		url: "dosen/soalpilgan/kirimsoal",
		dataType: "JSON",
		data: $('#form1').serialize(),
		complete : function (data) {	
			// console.log(data.status);
			if (data.status) {
				showalert("success", "Soal terkirim ke mahasiswa!");
				// $("#absen").css("display", "none");
				$('#tblpilgan').children('tr').remove();
				$("html, body").animate({
					scrollTop: 0
				}, 1000);
				$("#tipetugas").attr("readonly", false);
				$('#idsoalpil').val('-');
				$("#nopilgan").val(1);
				$('#matakuliah').prop('selectedIndex', 0);
				$('#tipetugas').prop('selectedIndex', 0);
				$("#absen").css("dispalay", "none");
				statuskirim = false;
				cekpertemuan(kdmk);
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
		url: "dosen/soalpilgan/delete/"+soalid+"/"+no,
		type: "POST",
		dataType: "JSON",
		success: function(data){
			if(data.status){
				tampilpilgan(idsoalpil);
				kurangidsoalpil();
				showMessage('delete');
			}
		}
	});
}

function hapussemua(idsoalpil){
    if(confirm("Anda yakin hapus ?")){
        $.ajax({
            url: "dosen/soalpilgan/deleteall/"+idsoalpil,
            type: "POST",
            dataType: "JSON",
            success: function(data){
                if(data.status){
					tampilpilgan(idsoalpil);
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
        url: "dosen/soalpilgan/ambilpil/" + idsoalpil +"/"+ kdmk,
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