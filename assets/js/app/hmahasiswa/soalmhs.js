prodi = $("#prodi").val();
semester = $("#semester").val();
nim = $("#nim").val();
var idsoal = "";
var tipesoal = "";
var tipetugas = "";
var absen = "";
var intervalId = null;

katahbs = 'waktu kamu sudah habis!';
kataselesai = 'Jawaban tersimpan!';
$(document).ready(function () {
	tampilsoal(prodi, semester, nim); 
	$("#tampilsoal").css("display", "none");
	$("#tampilriwayat").css("display", "none");
	$("#tampilnilai").css("display", "none");
	$("#tampilstart").css("display", "none");

	$("tbody#tblsoalmhs").on("click", "#kerjakan", function () {
		// if (confirm("Anda yakin ingin mengerjakan soal?")) {
			idsoal = $(this).data("id");
			tipesoal = $(this).data("tipesoal");
			tipetugas = $(this).data("tipetugas");
			absen = $(this).data("absenke");
			
			absenke = generateabs(absen);
			$("#abske").val(absenke);
			$("#temp").val(absen);
			// console.log(tipetugas,tipesoal,absen,absenke);
			if (tipesoal == "e" && (tipetugas == 'quiz' || tipetugas == 'uts') ) {
				bacasoalesai(idsoal); //masukan dalam json cari
				$("#tampilstart").css("display", "block");
				$("#startkembali").css("display", "inline");
				// $("#tampilsoal").css("display", "block");
				$("#tampilawal").css("display", "none");
				$("#idsoaltp").text(idsoal);
				$("#tipesoaltp").text("Essai");
				$("#tipetugastp1").val(tipetugas);				
			} else if (tipesoal == "p" && (tipetugas == 'quiz' || tipetugas == 'uts')) {
				bacasoalpilgan(idsoal); //masukan dalam json cari
				$("#tampilstart").css("display", "block");
				$("#startkembali").css("display", "inline");
				// $("#tampilsoal").css("display", "block");
				$("#tampilawal").css("display", "none");
				$("#idsoaltp").text(idsoal);
				$("#tipesoaltp").text("Pilihan berganda");
				$("#tipetugastp1").val(tipetugas);
			} else if (tipesoal == "e" && (tipetugas == 'tugas' || tipetugas == 'kelompok')) {
				bacasoalesai(idsoal); //masukan dalam json cari
				$("#timer").css("display", "none");
				$("#tampilsoal").css("display", "block");
				$("#tampilawal").css("display", "none");
				$("#idsoaltp").text(idsoal);
				$("#tipesoaltp").text("Essai");
				$("#tipetugastp1").val(tipetugas);				
			} else if (tipesoal == "p" && (tipetugas == 'tugas' ||  tipetugas == 'kelompok')) {
				bacasoalpilgan(idsoal); //masukan dalam json cari
				$("#timer").css("display", "none");
				$("#tampilsoal").css("display", "block");
				$("#tampilawal").css("display", "none");
				$("#idsoaltp").text(idsoal);
				$("#tipesoaltp").text("Pilihan berganda");
				$("#tipetugastp1").val(tipetugas);
		}
	});
	$("#start").click(function () {
		if (confirm("Waktu akan dimulai ketika Anda klik OK!")) {
		$("#tampilstart").css("display", "none");
		$("#tampilsoal").css("display", "block");
		klikstart();
		$("#timer").css("display", "block");
		waktu(30,00);
		intervalId = window.setInterval('up()', 1000);
		window.setTimeout("setelahtimeout(katahbs)",1000*60*30);
		window.onbeforeunload = function() {
		return "Soal akan terkirim jika anda meninggalkan page ini, Anda yakin?";
		  };
		}
		// 1000*60*2 2=1menit
	});
	$("#selesai").click(function () {
		if (confirm("Kirim jawaban ?")) {
			if (tipesoal == "e" && tipetugas == 'quiz' || tipetugas == 'uts' ) {
					setelahtimeout(kataselesai);
			} else if (tipesoal == "p" && tipetugas == 'quiz' || tipetugas == 'uts') {
				setelahtimeout(kataselesai);
			} else if (tipesoal == "e" && tipetugas == 'tugas' || tipetugas == 'kelompok') {
				klikstart();
				alert(kataselesai);
				$("#tampilsoal").css("display", "none");
				$("#tampilawal").css("display", "block");
				tampilsoal(prodi, semester, nim); 
			} else if (tipesoal == "p" && tipetugas == 'tugas' ||  tipetugas == 'kelompok') {
				klikstart();
				alert(kataselesai);
				$("#tampilsoal").css("display", "none");
				$("#tampilawal").css("display", "block");
				tampilsoal(prodi, semester, nim); 
			}
		}
	});

	$("#startkembali").click(function () {
		// if (confirm("Data akan terhapus, tetap kembali ?")) {
            // location.reload();
            tampilsoal(prodi, semester, nim);
            $("#tampilawal").css("display", "block");
            $("#tampilsoal").css("display", "none");
            $("#tampilriwayat").css("display", "none");
			$("#tampilnilai").css("display", "none");
			$("#startkembali").css("display", "none");
			$("#tampilstart").css("display", "none");
			// $("#start").css("display", "none");
		// }
	});
	$("#kembali").click(function () {
		if (confirm("Data akan terhapus, tetap kembali ?")) {
            // location.reload();
            tampilsoal(prodi, semester, nim);
            $("#tampilawal").css("display", "block");
            $("#tampilsoal").css("display", "none");
            $("#tampilriwayat").css("display", "none");
            $("#tampilnilai").css("display", "none");
		}
	});
	$("#kembali1").click(function () {
        // location.reload();
        tampilsoal(prodi, semester, nim);
        $("#tampilawal").css("display", "block");
        $("#tampilsoal").css("display", "none");
        $("#tampilriwayat").css("display", "none");
        $("#tampilnilai").css("display", "none");
    });
    $("#kembali2").click(function () {
        // location.reload();
        tampilsoal(prodi, semester, nim);
        $("#tampilawal").css("display", "block");
        $("#tampilsoal").css("display", "none");
        $("#tampilriwayat").css("display", "none");
        $("#tampilnilai").css("display", "none");
	});

	$("tbody#tblsoalmhs").on("click", "#lihat", function () {
		var idsoal = $(this).data("id");
		var tipesoal = $(this).data("tipesoal");
		if (tipesoal == "e") {
			lihatsoalesai(nim, tipesoal, idsoal);
			$("#tampilsoal").css("display", "none");
			$("#tampilawal").css("display", "none");
			$("#tampilriwayat").css("display", "block");
			$("#idsoaltp1").text(idsoal);
			$("#tipesoaltp1").text("Essai");
		} else if (tipesoal == "p") {
			lihatsoalpilgan(nim, tipesoal, idsoal);
			$("#tampilsoal").css("display", "none");
			$("#tampilawal").css("display", "none");
			$("#tampilriwayat").css("display", "block");
			$("#idsoaltp1").text(idsoal);
			$("#tipesoaltp1").text("Pilihan berganda");
		}
	});
	$("tbody#tblsoalmhs").on("click", "#lihatnilai", function () {
		var idsoal = $(this).data("id");
		var tipesoal = $(this).data("tipesoal");
		lihatnilai(nim, tipesoal, idsoal);
		$("#tampilnilai").css("display", "block");
		$("#tampilawal").css("display", "none");
	});
});

function klikstart(){
	var tipesoal = $(this).data("tipesoal");		
		tp = $("span#tipesoaltp").text();
		if (tp == "Essai") {
			var textarea = $("#form1").find($("textarea")); 
			nim = $("#nim1").val();
			idsoal = $("#jawaban0").data("id");
			$("#idsoal").val(idsoal);
			$("#jlh").val(textarea.length - 1);
			$("#jlhup").val(textarea.length);
			var tanya = [];
			var input = [];
			for (let i = 0; i < textarea.length; i++) {
				str = "jawaban"; 
				str += i;
				$("#jawaban" + i).val(CKEDITOR.instances[str].getData());
				tanya[i] = $("#pertanyaan" + i).text();
				input[i] = "<input class='del' type='hidden' name='tanya" + i + "' id='tanya" + i + "'>";
				$('#form2').append(input[i]);
				$("#tanya" + i).val(tanya[i]);
			}
			simpanesai(); 
			// =========================================
		} else if (tp == "Pilihan berganda") {
			// console.log($("#li0").eq(0).text());
			var ol = $("#form1").find($("ol"));
			nim = $("#nim1").val();
			// nama = $("#nama1").val();
			idsoal = $("#idsoaltp").text();
			$("#idsoal").val(idsoal);
			$("#jlh").val(ol.length - 1);
			var tanya = [];
			var input = [];
			var pila = [];
			var pilb = [];
			var pilc = [];
			var pild = [];
			var exa = [];
			var exb = [];
			var exc = [];
			var exd = [];
			var jb = [];
			var jwbpil = [];
			for (let i = 0; i < ol.length; i++) {
				tanya[i] = $("#pertanyaan" + i).html();
				input[i] = "<input class='del' type='hidden' name='tanya" + i + "' id='tanya" + i + "'>";
				$('#form2').append(input[i]);
				$("#tanya" + i).val(tanya[i]);
				
				pila[i] = $("label[for='radioa"+i+"'] #lia"+i+" input").next("span.ra"+i+"").html();
				pilb[i] = $("label[for='radiob"+i+"'] #lib"+i+" input").next("span.rb"+i+"").html();
				pilc[i] = $("label[for='radioc"+i+"'] #lic"+i+" input").next("span.rc"+i+"").html();
				pild[i] = $("label[for='radiod"+i+"'] #lid"+i+" input").next("span.rd"+i+"").html();
				// console.log(pila[i]);
				// pila[i] = $("#lia" + i).html();
				// pilb[i] = $("#lib" + i).html();
				// pilc[i] = $("#lic" + i).html();
				// pild[i] = $("#lid" + i).html();
				exa[i] = "<input class='del' type='hidden' name='pila" + i + "' id='pila" + i + "'>";
				exb[i] = "<input class='del' type='hidden' name='pilb" + i + "' id='pilb" + i + "'>";
				exc[i] = "<input class='del' type='hidden' name='pilc" + i + "' id='pilc" + i + "'>";
				exd[i] = "<input class='del' type='hidden' name='pild" + i + "' id='pild" + i + "'>"; //buat input ke controler
				$('#form2').append(exa[i]);
				$('#form2').append(exb[i]);
				$('#form2').append(exc[i]);
				$('#form2').append(exd[i]);
				$("#pila" + i).val(pila[i]);
				$("#pilb" + i).val(pilb[i]);
				$("#pilc" + i).val(pilc[i]);
				$("#pild" + i).val(pild[i]); //pertanyaan a b c d
				jb[i] = $('input[name=radio' + i + ']:checked').val(); //jawaban
				jwbpil[i] = "<input  class='del' type='hidden' name='jbpil" + i + "' id='jbpil" + i + "'>";
				$('#form2').append(jwbpil[i]);
				$("#jbpil" + i).val(jb[i]);
			}
			
			simpanpilgan();
		}
}

function setelahtimeout(kata){
	clearInterval(intervalId);
	alert(kata);
	$("#tampilsoal").css("display", "none");
	$("#tampilawal").css("display", "block");
	tampilsoal(prodi, semester, nim); 
}

function up(){
	stop = $("#time").text();
	// console.log(stop);
	tp = $("span#tipesoaltp").text();
	if (tp == "Essai") {
		esai();	
	} else if(tp == "Pilihan berganda"){
		pilgan();
	}
}

function esai(){
			var textarea = $("#form1").find($("textarea")); 
			nim = $("#nim1").val();
			idsoal = $("#jawaban0").data("id");
			$("#idsoal").val(idsoal);
			$("#jlh").val(textarea.length - 1);
			$("#jlhup").val(textarea.length);
			var tanya = [];
			var input = [];
			for (let i = 0; i < textarea.length; i++) {
				str = "jawaban";
				str += i;
				$("#jawaban" + i).val(CKEDITOR.instances[str].getData());
				tanya[i] = $("#pertanyaan" + i).text();
				input[i] = "<input class='del' type='hidden' name='tanya" + i + "' id='tanya" + i + "'>";
				$('#form2').append(input[i]);
				$("#tanya" + i).val(tanya[i]);
			}
			// simpanesai(); 
			updatenilaiesai();
}

function updatenilaiesai() {
	$.ajax({
		url: "hmahasiswa/soalmhs/upesai",
		type: "POST",
		data: $('#form1,#form2').serialize(),
		dataType: "JSON",
		success: function (data) {
			console.log($('#form1,#form2').serialize());
			$( ".del" ).remove();
		}
	});
	// setTimeout(updatenilaiesai, 2000);
}
 
function pilgan(){
	// console.log($("#li0").eq(0).text());
	var ol = $("#form1").find($("ol"));
	nim = $("#nim1").val();
	// nama = $("#nama1").val();
	idsoal = $("#idsoaltp").text();
	$("#idsoal").val(idsoal);
	$("#jlh").val(ol.length - 1);
	$("#jlhup").val(ol.length);
	var tanya = [];
	var input = [];
	var pila = [];
	var pilb = [];
	var pilc = [];
	var pild = [];
	var exa = [];
	var exb = [];
	var exc = [];
	var exd = [];
	var jb = [];
	var jwbpil = [];
	for (let i = 0; i < ol.length; i++) {
		tanya[i] = $("#pertanyaan" + i).html();
		input[i] = "<input class='del' type='hidden' name='tanya" + i + "' id='tanya" + i + "'>";
		$('#form2').append(input[i]);
		$("#tanya" + i).val(tanya[i]);

		pila[i] = $("#lia" + i).html();
		pilb[i] = $("#lib" + i).html();
		pilc[i] = $("#lic" + i).html();
		pild[i] = $("#lid" + i).html();
		exa[i] = "<input class='del' type='hidden' name='pila" + i + "' id='pila" + i + "'>";
		exb[i] = "<input class='del' type='hidden' name='pilb" + i + "' id='pilb" + i + "'>";
		exc[i] = "<input class='del' type='hidden' name='pilc" + i + "' id='pilc" + i + "'>";
		exd[i] = "<input class='del' type='hidden' name='pild" + i + "' id='pild" + i + "'>"; //buat input ke controler
		$('#form2').append(exa[i]);
		$('#form2').append(exb[i]);
		$('#form2').append(exc[i]);
		$('#form2').append(exd[i]);
		$("#pila" + i).val(pila[i]);
		$("#pilb" + i).val(pilb[i]);
		$("#pilc" + i).val(pilc[i]);
		$("#pild" + i).val(pild[i]); //pertanyaan a b c d
		jb[i] = $('input[name=radio' + i + ']:checked').val(); //jawaban
		jwbpil[i] = "<input class='del' type='hidden' name='jbpil" + i + "' id='jbpil" + i + "'>";
		$('#form2').append(jwbpil[i]);
		$("#jbpil" + i).val(jb[i]);
	}
	// simpanpilgan();
	updatenilaipilgan();
}

function updatenilaipilgan() {
	$.ajax({
		url: "hmahasiswa/soalmhs/uppilgan",
		type: "POST",
		data: $('#form1,#form2').serialize(),
		dataType: "JSON",
		success: function (data) {
			console.log($('#form1,#form2').serialize());
			$( ".del" ).remove();
		}
	});
	// setTimeout(updatenilaiesai, 2000);
}

function waktu(menit,detik){
	document.getElementById('timer').innerHTML =
		menit + ":" + detik;
	startTimer();
}

function startTimer() {
	var presentTime = document.getElementById('timer').innerHTML;
	var timeArray = presentTime.split(/[:]+/);
	var m = timeArray[0];
	var s = checkSecond((timeArray[1] - 1));
	if (s == 59) {
		m = m - 1
	}
	//if(m<0){alert('timer completed')}

	document.getElementById('timer').innerHTML =
		m + ":" + s;
	setTimeout(startTimer, 1000);
}

function checkSecond(sec) {
	if (sec < 10 && sec >= 0) {
		sec = "0" + sec
	}; // add zero in front of numbers < 10
	if (sec < 0) {
		sec = "59"
	};
	return sec;
}

function generateabs(nilai) {
	nilai = "a"+nilai;
	return nilai;
}

function updateabsen(abs) {
	$.ajax({
		url: "hmahasiswa/soalmhs/updateabsen/"+abs,
		type: "POST",
		data: $('#form1,#form2').serialize(),
		dataType: "JSON",
		success: function (data) {
			console.log("absen update",data);
		}
	});
}

function lihatnilai(nim, tipesoal, idsoal) {
	$.ajax({
		url: "hmahasiswa/soalmhs/tampil/" + nim + "/" + tipesoal + "/" + idsoal,
		type: "POST",
		dataType: "JSON",
		success: function (data) {
            nama = $("#nama").val();
			var html = "";
			for (i = 0; i < 1; i++) {
				str = data[i].jawabesai;
				hasil = $(str).text();
				html += "<table class='fontsoal' style='width:500px; font-size:15px;'>" +
					"<tr>" +
					"<td style='width:50px;'><strong>NIM</strong></td>" +
					"<td style='width:180px;'>: " + data[i].nim + "</td>" +
					"<td style='width:100px;'><strong>Tipe soal</strong></td>" +
					"<td>: <span id='tipesoal'>" + data[i].tipetugas.toUpperCase() + " - " + konversiTipesoal(data[i].tipesoal) + "</span></td>" +
					"</tr>" +
					"<tr>" +
					"<td style='width:50px;'><strong>Nama</strong></td>" +
					"<td style='width:180px;'>: " + nama + "</td>" +
					"<td style='width:100px;'><strong>Tanggal kirim</strong></td>" +
					"<td>: <span id='tipesoal'>" + data[i].tanggal + "</span></td>" +
					"</tr>" +
					"<tr>" +
					"<td style='width:50px;'><strong>ID Soal</strong></td>" +
					"<td style='width:180px;'>: " + data[i].idsoal + "</td>" +
					"<td style='width:100px;'></td>" +
					"<td></td>" +
					"</tr>" +
					"</table>" +
					"<hr>" +
					"<table class='fontsoal' style='width:500px; font-size:32px; margin-top:20px; text-align:center;'>" +
					"<tr>" +
					"<td><strong>Nilai : "+data[i].nilai+"</strong></td>" +
					"</tr>" +
					"</table>" +
					"<hr>";
			}
			$("#hasilnilai").html(html);
			CKEDITOR.replaceAll();
		}
	})
}

function lihatsoalpilgan(nim, tipesoal, idsoal) {
	$.ajax({
		url: "hmahasiswa/soalmhs/tampil/" + nim + "/" + tipesoal + "/" + idsoal,
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
				var res = hasil.replace("<p>", "").replace("</p>", "");
				html += "<li>" + data[i].isisoal + "</li>" +
					"<strong>Jawaban</strong>" +
					"<blockquote>" + jb.toUpperCase() + ". " + res + "</blockquote>" +
					"<br>";
			}
			$("#form3").html(html);
			CKEDITOR.replaceAll();
		}
	})
}

function lihatsoalesai(nim, tipesoal, idsoal) {
	$.ajax({
		url: "hmahasiswa/soalmhs/tampil/" + nim + "/" + tipesoal + "/" + idsoal,
		type: "POST",
		dataType: "JSON",
		success: function (data) {
			var html = "";
			for (i = 0; i < data.length; i++) {
				str = data[i].jawabesai;
				hasil = $(str).text();
				html += "<li>" + data[i].isisoal + "</li>" +
					"<strong>Jawaban</strong>" +
					"<blockquote>" + data[i].jawabesai + "</blockquote>" +
					"<br>";
			}
			$("#form3").html(html);
			CKEDITOR.replaceAll();
		}
	})
}

function simpanpilgan() {
	// if (confirm("Kirim jawaban Anda?")) {
	// 	alert("Jawaban terkirim!");
		$.ajax({
			url: "hmahasiswa/soalmhs/simpanpilgan",
			type: "POST",
			data: $('#form1,#form2').serialize(),
			dataType: "JSON",
			success: function (data) {
				if (data.status) {
					var abs = $("#abske").val();
					updateabsen(abs);
					$( ".del" ).remove();
					// tampilsoal(prodi, semester, nim);
					// $("#tampilsoal").css("display", "none");
					// $("#tampilawal").css("display", "block");
					// location.reload();
				} else {
					alert('No');
				}
			}
		});
	// }

}

function simpanesai() {
	// if (confirm("Kirim jawaban Anda?")) {
		// alert("Jawaban terkirim!");
		$.ajax({
			url: "hmahasiswa/soalmhs/simpanesai",
			type: "POST",
			data: $('#form1,#form2').serialize(),
			dataType: "JSON",
			success: function (data) {
				if (data.status) {
					var abs = $("#abske").val();
					updateabsen(abs);
					console.log(abs+"ini absensi ke");
					$( ".del" ).remove();
				} else {
					alert('No');
				}
			}
		});
	// }

}

function bacasoalpilgan(idsoal) {
	$.ajax({
		url: "hmahasiswa/soalmhs/bacapilgan/" + idsoal,
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
				var a = s.replace(/<p[^>]*>/g, '').replace(/<\/p>/g, '');
				var b = b.replace(/<p[^>]*>/g, '').replace(/<\/p>/g, '');
				var c = y.replace(/<p[^>]*>/g, '').replace(/<\/p>/g, '');
				var d = z.replace(/<p[^>]*>/g, '').replace(/<\/p>/g, '');
				html += 
					"<li id='pertanyaan" + i + "'>" + data[i].isipilgan + "</li>" +
					"<blockquote><ol start='1' type='A' data-id='" + data[i].idsoalpil + "'>" +
					"<div class='form-inline' style='margin-top:15px;'><label for='radioa" + i + "'> <li id='lia" + i + "'><input type='radio' name='radio" + i + "' id='radioa" + i + "' style='margin-bottom:5px;' value='a'><span class='ra"+i+"'>" + a + "</span></li> </label> </div>" +
					"<div class='form-inline' style='margin-top:15px;'><label for='radiob" + i + "'> <li id='lib" + i + "'><input type='radio' name='radio" + i + "' id='radiob" + i + "' style='margin-bottom:5px;' value='b'><span class='rb"+i+"'>" + b + "</span></li> </label> </div>" +
					"<div class='form-inline' style='margin-top:15px;'><label for='radioc" + i + "'> <li id='lic" + i + "'><input type='radio' name='radio" + i + "' id='radioc" + i + "' style='margin-bottom:5px;' value='c'><span class='rc"+i+"'>" + c + "</span></li> </label> </div>" +
					"<div class='form-inline' style='margin-top:15px;'><label for='radiod" + i + "'> <li id='lid" + i + "'><input type='radio' name='radio" + i + "' id='radiod" + i + "' style='margin-bottom:5px;' value='d'><span class='rd"+i+"'>" + d + "</span></li> </label> </div>" +
					"</ol></blockquote>" +
					"<br>";
			}
			$("#form1").html(html);
		}
	})
}

function bacasoalesai(idsoal) {
	$.ajax({
		url: "hmahasiswa/soalmhs/bacaesai/" + idsoal,
		type: "POST",
		dataType: "JSON",
		success: function (data) {
			var html = "";
			for (i = 0; i < data.length; i++) {
				html += "<li id='pertanyaan" + i + "'>" + data[i].isiesai + "</li>" +
					"<br>" +
					"<textarea class='span12' rows='4' name='jawaban" + i + "' id='jawaban" + i + "'" +
					"placeholder='Ketikan soal...'data-id='" + data[i].idsoal + "'></textarea>" +
					"<br>";
			}
			$("#form1").html(html);
			CKEDITOR.replaceAll();
		}
	})
}

function tampilsoal(prodi, semester, nim) {
	$.ajax({
		url: "hmahasiswa/soalmhs/ambilriwayat/" + prodi + "/" + semester+ "/" + nim,
		type: "POST",
		dataType: "JSON",
		success: function (data) {
			var html = "";  
			for (i = 0; i < data.length; i++) {
				if (data[i].status == 'belum') {
					html += "<tr>" +
						"<td class='taskDesc'><i class='icon-info-sign alert-danger'></i>" + (data[i].tipetugas).toUpperCase() + "  " + absensi(data[i].absensike) + " </td>" +
						"<td class='taskDesc'><i class='icon-info-sign'></i> ID Soal : " + data[i].idsoalriw + " - Tipe Soal : " + konversiTipesoal(data[i].tipesoal) + "</td>" +
						"<td class='taskStatus'>" + data[i].tanggal + "</td>" +
						"" + Statustampil(data[i].status) + "" +
						"<td style='width:80px;'><button id='kerjakan' class='btn btn-warning btn-block' data-absenke='" + data[i].absensike + "' data-tipetugas='" + data[i].tipetugas + "' data-tipesoal='" + data[i].tipesoal + "' data-id='" + data[i].idsoalriw + "'>" +
						"<span class='icon-circle-arrow-up'></span> Kerjakan</button>" +
						"</td>" +
						"</tr>";
				} else if (data[i].status == 'proses') {
					html += "<tr>" +
					"<td class='taskDesc'><i class='icon-info-sign alert-success'></i>" + (data[i].tipetugas).toUpperCase() + "  " + absensi(data[i].absensike) + " </td>" +
						"<td class='taskDesc'><i class='icon-info-sign'></i> ID Soal : " + data[i].idsoalriw + " - Tipe Soal : " + konversiTipesoal(data[i].tipesoal) + "</td>" +
						"<td class='taskStatus'>" + data[i].tanggal + "</td>" +
						"" + Statustampil(data[i].status) + "" +
						"<td style='width:80px;'><button id='lihat' class='btn btn-info btn-block'  data-tipetugas='" + data[i].tipetugas + "' data-tipesoal='" + data[i].tipesoal + "' data-id='" + data[i].idsoalriw + "'>" +
						"<span class='icon-circle-arrow-up'></span> Lihat</button>" +
						"</td>" +
						"</tr>";
				} else if (data[i].status == 'selesai') {
					html += "<tr>" +
					"<td class='taskDesc'><i class='icon-info-sign alert-info'></i>" + (data[i].tipetugas).toUpperCase() + "  " + absensi(data[i].absensike) + " </td>" +
						"<td class='taskDesc'><i class='icon-info-sign'></i> ID Soal : " + data[i].idsoalriw + " - Tipe Soal : " + konversiTipesoal(data[i].tipesoal) + "</td>" +
						"<td class='taskStatus'>" + data[i].tanggal + "</td>" +
						"" + Statustampil(data[i].status) + "" +
						"<td style='width:80px;'><button id='lihatnilai' class='btn btn-success btn-block' data-tipetugas='" + data[i].tipetugas + "' data-tipesoal='" + data[i].tipesoal + "' data-id='" + data[i].idsoalriw + "'>" +
						"<span class='icon-circle-arrow-up'></span> Lihat</button>" +
						"</td>" +
						"</tr>";
				}

			}
			$("tbody#tblsoalmhs").html(html);
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