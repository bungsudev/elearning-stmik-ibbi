var nim = "";
var nama = "";
var idsoal = "";
var ts = "";
var tipetugas = "";
$(document).ready(function () {	
	$("tbody#tblnilaimhs").on("click", "#btnriwayat", function () {
		$("#form-riwayatquiz").modal("show");
		var nim = $(this).data("nim");
		tampilriwayat(nim, tipetugas);
	});
	$("tbody#tblkoreksi").on("click", "#btnberinilai", function () {
		nim = $(this).data("nim");
		idsoal = $(this).data("id");
		ts = $(this).data("tipesoal");
        nama = $(this).data("nama");
        $("#tampilnilai").css("display", "none");
        $("#tampilawal").css("display", "none");
        $("#tampilkoreksi").css("display", "block");
        $("#nimtp").text(nim);
        $("#namatp").text(nama);
		if (ts == "e") {
			lihatsoalesai(nim, ts, idsoal);
			$("#form-koreksi").modal("hide");			
		} else if (ts == "p") {
			lihatsoalpilgan(nim, ts, idsoal);
			$("#form-koreksi").modal("hide");
		}
    });
    $('#btnselesai').click(function(){
        var benar = $('input[class=yes]:checked').length;
        var salah = $('input[class=no]:checked').length;
        total = (benar/(benar + salah))*100;
        nilai = total.toFixed();
        $("#nilaimhs").val(nilai);
        kirimnilai(nim,ts,idsoal,nilai);
    });
    // ===========================================================
    $('#bukaquiz').click(function(){
        tipetugas = "quiz";
        $("#tampilnilai").css("display", "block");
        $("#tampilawal").css("display", "none");
        tampilterupdate(tipetugas);
    });
    $('#bukatugas').click(function(){
        tipetugas = "tugas";
        $("#tampilnilai").css("display", "block");
        $("#tampilawal").css("display", "none");
        tampilterupdate(tipetugas);
    });
    $('#bukauts').click(function(){
        tipetugas = "uts";
        $("#tampilnilai").css("display", "block");
        $("#tampilawal").css("display", "none");
        tampilterupdate(tipetugas);
    });
    $('#bukakelompok').click(function(){
        tipetugas = "kelompok";
        $("#tampilnilai").css("display", "block");
        $("#tampilawal").css("display", "none");
        tampilterupdate(tipetugas);
    });
    // =======================================================================
    $("#kembali2").click(function () {
		$("#tampilnilai").css("display", "block");
        $("#tampilawal").css("display", "none");
        $("#tampilkoreksi").css("display", "none");
        $("#form-koreksi").modal("show");
        tampilkoreksi(tipetugas);
    });
    $("#kembali1").click(function () {
		$("#tampilnilai").css("display", "none");
        $("#tampilawal").css("display", "block");
        $("#tampilkoreksi").css("display", "none");
    });
    $("#btnkoreksi").click(function () {
		$("#form-koreksi").modal("show");
		tampilkoreksi(tipetugas);
	});
});

function kirimnilai(nim,tipesoal,idsoal,nilai){
	if (confirm("Kirim nilai Anda?")) {		
		$.ajax({
			url: "nilai/kirimnilai/" + nim + "/" + tipesoal + "/" + idsoal + "/" + nilai,
			type: "POST",
			data: $('#form2,#form3').serialize(),
			dataType: "JSON",
			complete: function (data) {
				if (data.status) {
					tampilterupdate(tipetugas);
                    showalert("success","Nilai terkirim!");
                    $("#tampilnilai").css("display", "block");
                    $("#tampilawal").css("display", "none");
                    $("#tampilkoreksi").css("display", "none");
				} else {
					alert('No');
				}
			}
		});
	}

}

function lihatsoalesai(nim, tipesoal, idsoal) {
	$.ajax({
		url: "nilai/tampilkoreksi/" + nim + "/" + tipesoal + "/" + idsoal,
		type: "POST",
		dataType: "JSON",
		success: function (data) {
			var html = "";
			for (i = 0; i < data.length; i++) {
				str = data[i].jawabesai;
				hasil = $(str).text();
				html += "<li>" + data[i].isisoal + "</li>" +
					"<strong>Jawaban</strong>" +
					"<blockquote>" + hasil + "</blockquote>" +
                    "<div class='switch-field'>"+
                        "<input type='radio' id='radio-one"+i+"' name='switch"+i+"' class='yes' checked />"+
                        "<label for='radio-one"+i+"'>Benar</label>"+
                        "<input type='radio' id='radio-two"+i+"' name='switch"+i+"' class='no' />"+
                        "<label for='radio-two"+i+"'>Salah</label>"+
                    "</div>"+                       
					"<br>";
			}
			$("#form3").html(html);
			// CKEDITOR.replaceAll();
		}
	})
}

function lihatsoalpilgan(nim, tipesoal, idsoal) {
	$.ajax({
		url: "nilai/tampilkoreksi/" + nim + "/" + tipesoal + "/" + idsoal,
		type: "POST",
		dataType: "JSON",
		success: function (data) {
			var html = "";
			var hasil = "";
			for (i = 0; i < data.length; i++) {
				jb = data[i].jawabpilgan;
				if (jb == 'a') {
					hasil = data[i].a;
				} else if (jb == 'b') {
					hasil = data[i].b;
				} else if (jb == 'c') {
					hasil = data[i].c;
				} else if (jb == 'd') {
					hasil = data[i].d;
				}
				html += "<li>" + data[i].isisoal + "</li>" +
					"<strong>Jawaban</strong>" +
					"<blockquote>" + jb.toUpperCase() + "." + hasil + "</blockquote>" +
                    "<div class='switch-field'>"+
                        "<input type='radio' id='radio-one"+i+"' name='switch"+i+"' class='yes' checked />"+
                        "<label for='radio-one"+i+"'>Benar</label>"+
                        "<input type='radio' id='radio-two"+i+"' name='switch"+i+"' class='no' />"+
                        "<label for='radio-two"+i+"'>Salah</label>"+
                    "</div>"+
					"<br>";
			}
			$("#form3").html(html);
			// CKEDITOR.replaceAll();
		}
	})
}

function tampilriwayat(nim, tipetugas) {
	$.ajax({
		url: "nilai/getriwayat/" + nim + "/" + tipetugas,
		type: "POST",
		dataType: "JSON",
		success: function (data) {
			var html = "";
			for (i = 0; i < data.length; i++) {
				no = i + 1;
				html += "<tr>" +
					"<td style='text-align:center;'>" + no + "</td>" +
					"<td style='text-align:center;'>" + data[i].tanggal + "</td>" +
					"<td style='text-align:center;'>" + (data[i].tipetugas).toUpperCase() + "</td>" +
					"<td style='text-align:center;'>" + data[i].idsoal + "</td>" +
					"<td style='text-align:center;'>" + data[i].nilai + "</td>" +
					"</tr>";
			}
			$("tbody#tblriwayatquiz").html(html);
		}
	})
}

function tampilterupdate(tipetugas) {
	$.ajax({
		url: "nilai/getterupdate/" + tipetugas,
		type: "POST",
		dataType: "JSON",
		success: function (data) {
			var html = "";
			for (i = 0; i < data.length; i++) {
				html += "<tr>" +
					"<td style='text-align:center;'>" + data[i].nim + "</td>" +
					"<td>" + data[i].namamhs + "</td>" +
					"<td style='text-align:center;'>" + konversiJurusan(data[i].prodi) + "</td>" +
					"<td style='text-align:center;'>" + konversiSemester(data[i].semester) + "</td>" +
					"<td style='text-align:center;'>" + data[i].tipetugas + "</td>" +
					"<td style='text-align:center;'>" + data[i].nilai + "</td>" +
					"<td style='text-align:center;'>" + data[i].tanggal + "</td>" +
					"<td style='width:120px;'><button class='btn btn-info btn-block' id='btnriwayat' data-nim='" + data[i].nim + "'>" +
					"<span class='icon-pencil'></span> Riwayat " + data[i].tipetugas + "</button>" +
					"</td>" +
					"</tr>";
			}
			$("tbody#tblnilaimhs").html(html);
		}
	})
}

function tampilkoreksi(tipetugas) {
	$.ajax({
		url: "nilai/ambilkoreksi/" + tipetugas,
		type: "POST",
		dataType: "JSON",
		success: function (data) {
            var html = "";
			for (i = 0; i < data.length; i++) {
				html += "<tr>" +
					"<td>" + data[i].nim + "</td>" +
					"<td>" + data[i].namamhs + "</td>" +
					"<td>" + data[i].prodi + "</td>" +
					"<td align='center'>" + data[i].semester + "</td>" +
					"<td align='center'>" + data[i].tanggal + "</td>" +
					"<td style='width:70px;'>" +
					"<button  class='btn btn-info btn-block' id='btnberinilai' data-nama='" + data[i].namamhs + "' data-id='" + data[i].idsoalriw + "' data-tipetugas='" + data[i].tipetugas + "' data-tipesoal='" + data[i].tipesoal + "' data-nim='" + data[i].nim + "'>Koreksi " +
					" <span class='icon-check'></span>" +
					"</button>" +
					"</td>" +
					"</tr>";
			}
			$("tbody#tblkoreksi").html(html);
		}
	})
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