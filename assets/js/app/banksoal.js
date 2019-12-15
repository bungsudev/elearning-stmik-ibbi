var klik = "";
$(document).ready(function () {
	$("#tampilpilgan").click(function () {
		tampilpilgan();
		$("#judul").text("Pilihan Berganda");
		klik = "pilgan";
	});
	$("#tampilesai").click(function () {
		tampilesai();
		$("#judul").text("Essai");
		klik = "esai";
	});
	$("tbody#tblbanksoal").on("click", "#hapus", function () {
		var id = $(this).data("idsoal");
		hapuspilgan(id);
	});
	$("tbody#tblbanksoal").on("click", "#hapus1", function () {
		var id = $(this).data("idsoal");
		hapusesai(id);
	});
	$("tbody#tblbanksoal").on("click", "#kirim", function () {
		var id = $(this).data("idsoal");
		$("#idsoal").val(id);
		$("#absen").css("display", "none");
		if (klik=="esai"){
			tipe = "e";
		}else if(klik=="pilgan"){
			tipe = "p";
		}
		$("#tipesoal").val(tipe);
		// alert(tipe);
		$("#tipe").val(tipe);
		$("#modalkirim").modal("show");
	});
	$("#kirimsoal").click(function () {
		kirim();
		
	});
	$("tbody#tblbanksoal").on("click", "#lihat", function () {
		var idsoal = $(this).data("idsoal");
		if (klik=="esai"){			
			bacaesai(idsoal); //masukan dalam json cari
			$("#tampilsoal").css("display", "block");
			$("#tampilawal").css("display", "none");
			$("#idsoaltp").text(idsoal);
			$("#tipesoaltp").text("Essai");
		}else if(klik=="pilgan"){
			bacapilgan(idsoal); //masukan dalam json cari
			$("#tampilsoal").css("display", "block");
			$("#tampilawal").css("display", "none");
			$("#idsoaltp").text(idsoal);
			$("#tipesoaltp").text("Pilihan Berganda");
		}		
	});
	$("#kembali").click(function () {
		$("#tampilawal").css("display", "block");
		$("#tampilsoal").css("display", "none");		
	});
});

function bacapilgan(idsoal) {
	$.ajax({
		url: "banksoal/bacapilgan/" + idsoal,
		type: "POST",
		dataType: "JSON",
		success: function (data) {
			var html = "";
			for (i = 0; i < data.length; i++) {
				var s = data[i].a;
				var o = $(s);
				var texta = o.text();
				var b = data[i].b;
				var x = $(b);
				var textb = x.text();
				var y = data[i].c;
				var n = $(y);
				var textc = n.text();
				var z = data[i].d;
				var g = $(z);
				var textd = g.text();
				html += "<li id='pertanyaan" + i + "'>" + data[i].isipilgan + "</li>" +
					"<ol start='1' type='A' data-id='" + data[i].idsoalpil + "'>" +
					// <label for=""><input type="radio" name="radio1" id="radio1"></label>
					"<li id='lia" + i + "'>" + texta + "</li>" +
					"<li id='lib" + i + "'>" + textb + "</li>" +
					"<li id='lic" + i + "'>" + textc + "</li>" +
					"<li id='lid" + i + "'>" + textd + "</li>" +
					"<blockquote>Jawaban "+ data[i].jawabanpilgan +"</blockquote>" +
					"</ol>" +
					"<br>";
			}
			$("#formlistesai").html(html);
		}
	})
}

function bacaesai(idsoal) {
	$.ajax({
		url: "banksoal/bacaesai/" + idsoal,
		type: "POST",
		dataType: "JSON",
		success: function (data) {
			var html = "";
			for (i = 0; i < data.length; i++) {
				html += "<li id='pertanyaan" + i + "'>" + data[i].isiesai + "</li>" +
					"<blockquote>Kunci Jawaban:"+ data[i].jawaban +"</blockquote>" +
					"<br>" ;					
			}
			$("#formlistesai").html(html);			
		}
	})
}

function kirim() {
	$.ajax({
		type: "POST",
		url: "banksoal/kirimsoal",
		dataType: "JSON",
		data: $('#form2').serialize(),
		complete: function (data) {
			if (data.status) {				
				showalert("success", "Soal terkirim ke mahasiswa!");
				$('#form2')[0].reset();
				$("#modalkirim").modal("hide");
			}else{
				$('#form2')[0].reset();
				$("#modalkirim").modal("hide");
				showalert("danger","Gagal","mengirimkan soal!!!");
				$("html, body").animate({
					scrollTop: 0
				}, 1000);
			}
			
		}
	});
	return false;
}

function hapuspilgan(id) {
	if (confirm("Anda yakin hapus ?")) {
		$.ajax({
			url: "banksoal/hapuspilgan/" + id,
			type: "POST",
			dataType: "JSON",
			success: function (data) {
				if (data.status) {
					tampilpilgan();
					showMessage("delete");
				}
			}
		});
	}
}

function hapusesai(id) {
	if (confirm("Anda yakin hapus ?")) {
		$.ajax({
			url: "banksoal/hapusesai/" + id,
			type: "POST",
			dataType: "JSON",
			success: function (data) {
				if (data.status) {
					tampilesai();
					showMessage("delete");
				}
			}
		});
	}
}

function tampilpilgan() {
	$.ajax({
		type: "ajax",
		url: "banksoal/datapilgan",
		dataType: "JSON",
		success: function (data) {
			var html = "";
			for (i = 0; i < data.length; i++) {
				html += "<tr>" +
					"<td class='isitbl'>" + data[i].idsoalpil + "</td>" +
					"<td class='isitbl' style='width:80px;'>" + data[i].jumlah + "</td>" +
					"<td class='isitbl'>" + data[i].matakuliah + "</td>" +
					"<td class='isitbl'>" + data[i].tanggal + "</td>" +
					// "<td style='width:70px;'><button id='kirim' class='btn btn-warning btn-block' data-id='" + data[i].idpilgan + "' data-idsoal='" + data[i].idsoalpil + "'>" +
					// "<span class='icon-upload'></span> Kirim</button>" +
					"</td>" +
					"<td style='width:70px;'><button id='lihat' class='btn btn-success btn-block' data-id='" + data[i].idpilgan + "' data-idsoal='" + data[i].idsoalpil + "'>" +
					"<span class='icon-eye-open'></span> Lihat</button>" +
					"</td>" +
					"<td style='width:70px;'><button class='btn btn-danger btn-block' id='hapus'  data-id='" + data[i].idpilgan + "' data-idsoal='" + data[i].idsoalpil + "'>" +
					"<span class='icon-trash'></span> Hapus</button>" +
					"</td>" +

					"</tr>";
			}
			$("tbody#tblbanksoal").html(html);
		}
	})
}

function tampilesai() {
	$.ajax({
		type: "ajax",
		url: "banksoal/dataesai",
		dataType: "JSON",
		success: function (data) {
			var html = "";
			for (i = 0; i < data.length; i++) {
				html += "<tr>" +
					"<td class='isitbl'>" + data[i].idsoal + "</td>" +
					"<td class='isitbl' style='width:80px;'>" + data[i].jumlah + "</td>" +
					"<td class='isitbl'>" + data[i].matakuliah + "</td>" +
					"<td class='isitbl'>" + data[i].tanggal + "</td>" +
					// "<td style='width:70px;'><button id='kirim' class='btn btn-warning btn-block' data-id='" + data[i].idesai + "' data-idsoal='" + data[i].idsoal + "'>" +
					// "<span class='icon-upload'></span> Kirim</button>" +
					"</td>" +
					"<td style='width:70px;'><button id='lihat' class='btn btn-success btn-block' data-id='" + data[i].idesai + "' data-idsoal='" + data[i].idsoal + "'>" +
					"<span class='icon-eye-open'></span> Lihat</button>" +
					"</td>" +
					"<td style='width:70px;'><button class='btn btn-danger btn-block' id='hapus1'  data-id='" + data[i].idesai + "' data-idsoal='" + data[i].idsoal + "'>" +
					"<span class='icon-trash'></span> Hapus</button>" +
					"</td>" +
					"</tr>";
			}
			$("tbody#tblbanksoal").html(html);
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


function showMessage(mode) {
	var divMessage = "<div class='alert alert-success'>" +
		"Berhasil <strong>" + mode.toUpperCase() + "</strong> pertanyaan" +
		"</div>";
	$(divMessage)
		.prependTo(".ini")
		.delay(2000)
		.slideUp("slow");
}