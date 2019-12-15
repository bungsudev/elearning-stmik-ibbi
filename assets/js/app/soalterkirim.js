$(document).ready(function(){
	// tampilriwayat();
	$("#filter").click(function(){
		kdmk = $("#matakuliahfil option:selected").val();
		// $("tbody#tblterkirim tr").remove();
        if (kdmk == '') {
            alert("Pilih dengan benar!");
        } else {
            tampilriwayatfil(kdmk);
        }
        return false;        
    });
	$("tbody#tblterkirim").on("click", "#lihat", function () {
		var idsoal = $(this).data("idsoal");
		var tipe = $(this).data("tipe");
		console.log(idsoal,tipe);
		if (tipe=="e"){			
			bacaesai(idsoal); //masukan dalam json cari
			$("#tampilsoal").css("display", "block");
			$("#tampilawal").css("display", "none");
			$("#idsoaltp").text(idsoal);
			$("#tipesoaltp").text("Essai");
		}else if(tipe=="p"){
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

function tampilriwayatfil(kdmk) {
	$.ajax({
		type: "ajax",
		url: "soalterkirim/datafil/"+kdmk,
		dataType: "JSON",
		success: function (data) { 
			var html = "";
			for (i = 0; i < data.length; i++) {
				html += "<tr>" +
					"<td class='isitbl'>" + data[i].idsoalriw + "</td>" +
					"<td class='isitbl'>" + konversiTipesoal(data[i].tipesoal) + "</td>" +
					"<td class='isitbl'>" + data[i].tipetugas + "</td>" +
					// "<td class='isitbl'>" + konversiStatussoal(data[i].status) + "</td>" +
					"<td class='isitbl'>" + data[i].tanggal + "</td>" +
					"<td style='width:70px;'><button id='lihat' class='btn btn-success btn-block' data-tipe='" + data[i].tipesoal + "' data-id='" + data[i].idriwayatsoal + "' data-idsoal='" + data[i].idsoalriw + "'>" +
					"<span class='icon-eye-open'></span> Lihat</button>" +
					"</td>" +
					// "<td style='width:70px;'><button class='btn btn-danger btn-block' id='hapus1' data-tipe='" + data[i].tipesoal + "' data-id='" + data[i].idriwayatsoal + "' data-idsoal='" + data[i].idsoalriw + "'>" +
					// "<span class='icon-trash'></span> Hapus</button>" +
					// "</td>" +
					"</tr>";
			}
			$("tbody#tblterkirim").html(html);
		}
	})
}

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

// function tampilriwayat() {
// 	$.ajax({
// 		type: "ajax",
// 		url: "soalterkirim/data",
// 		dataType: "JSON",
// 		success: function (data) { 
// 			var html = "";
// 			for (i = 0; i < data.length; i++) {
// 				html += "<tr>" +
// 					"<td class='isitbl'>" + data[i].idsoalriw + "</td>" +
// 					"<td class='isitbl'>" + konversiTipesoal(data[i].tipesoal) + "</td>" +
// 					"<td class='isitbl'>" + data[i].tipetugas + "</td>" +
// 					// "<td class='isitbl'>" + konversiStatussoal(data[i].status) + "</td>" +
// 					"<td class='isitbl'>" + data[i].tanggal + "</td>" +
// 					"<td style='width:70px;'><button id='lihat' class='btn btn-success btn-block' data-tipe='" + data[i].tipesoal + "' data-id='" + data[i].idriwayatsoal + "' data-idsoal='" + data[i].idsoalriw + "'>" +
// 					"<span class='icon-eye-open'></span> Lihat</button>" +
// 					"</td>" +
// 					// "<td style='width:70px;'><button class='btn btn-danger btn-block' id='hapus1' data-tipe='" + data[i].tipesoal + "' data-id='" + data[i].idriwayatsoal + "' data-idsoal='" + data[i].idsoalriw + "'>" +
// 					// "<span class='icon-trash'></span> Hapus</button>" +
// 					// "</td>" +
// 					"</tr>";
// 			}
// 			$("tbody#tblterkirim").html(html);
// 		}
// 	})
// }