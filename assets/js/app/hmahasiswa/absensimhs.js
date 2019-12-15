var nim ="";
$(document).ready(function(){ 
    nim = $("#nim").text();
    tampilabsensi();
});

function tampilabsensi(){
    $.ajax({
        type: "ajax",
        url: "hmahasiswa/absensimhs/dataall",
        dataType: "JSON",
        success: function(data){
            var html = "";
            for(i=0;i < data.length;i++){
                // console.log(data);
                if (nim == data[i].nim) {
                    html += "<tr style='color:#c7184b;'>"+
                    "<td>"+ data[i].nim +"</td>" +
                    "<td>"+ data[i].namamhs +"</td>" +
                    "<td>"+ data[i].kelompok +"</td>" +
					"<td>"+ konversiAbsensi(data[i].a1) +"</td>"+
                    "<td>"+ konversiAbsensi(data[i].a2) +"</td>"+
                    "<td>"+ konversiAbsensi(data[i].a3) +"</td>"+
                    "<td>"+ konversiAbsensi(data[i].a4) +"</td>"+
                    "<td>"+ konversiAbsensi(data[i].a5) +"</td>"+
                    "<td>"+ konversiAbsensi(data[i].a6) +"</td>"+
                    "<td>"+ konversiAbsensi(data[i].a7) +"</td>"+
                    "<td>"+ konversiAbsensi(data[i].a8) +"</td>"+
                    "<td>"+ konversiAbsensi(data[i].a9) +"</td>"+
                    "<td>"+ konversiAbsensi(data[i].a10) +"</td>"+
                    "<td>"+ konversiAbsensi(data[i].a11) +"</td>"+
                    "<td>"+ konversiAbsensi(data[i].a12) +"</td>"+
                    "<td>"+ konversiAbsensi(data[i].a13) +"</td>"+
                    "<td>"+ konversiAbsensi(data[i].a14) +"</td>"+
                    "<td>"+ konversiAbsensi(data[i].a15) +"</td>"+
                    "<td>"+ konversiAbsensi(data[i].a16) +"</td>"+
					// "<td><button class='btn btn-success btn-block' id='cek' data-id='" + data[i].nim + "'>" +
					// "<span class='icon-ok'></span> Cek Hadir</button>" +
					// "</td>" +
					"</tr>";
                } else {
                    html += "<tr>"+
                    "<td>"+ data[i].nim +"</td>" +
                    "<td>"+ data[i].namamhs +"</td>" +
                    "<td>"+ data[i].kelompok +"</td>" +
					"<td>"+ konversiAbsensi(data[i].a1) +"</td>"+
                    "<td>"+ konversiAbsensi(data[i].a2) +"</td>"+
                    "<td>"+ konversiAbsensi(data[i].a3) +"</td>"+
                    "<td>"+ konversiAbsensi(data[i].a4) +"</td>"+
                    "<td>"+ konversiAbsensi(data[i].a5) +"</td>"+
                    "<td>"+ konversiAbsensi(data[i].a6) +"</td>"+
                    "<td>"+ konversiAbsensi(data[i].a7) +"</td>"+
                    "<td>"+ konversiAbsensi(data[i].a8) +"</td>"+
                    "<td>"+ konversiAbsensi(data[i].a9) +"</td>"+
                    "<td>"+ konversiAbsensi(data[i].a10) +"</td>"+
                    "<td>"+ konversiAbsensi(data[i].a11) +"</td>"+
                    "<td>"+ konversiAbsensi(data[i].a12) +"</td>"+
                    "<td>"+ konversiAbsensi(data[i].a13) +"</td>"+
                    "<td>"+ konversiAbsensi(data[i].a14) +"</td>"+
                    "<td>"+ konversiAbsensi(data[i].a15) +"</td>"+
                    "<td>"+ konversiAbsensi(data[i].a16) +"</td>"+
					// "<td><button class='btn btn-success btn-block' id='cek' data-id='" + data[i].nim + "'>" +
					// "<span class='icon-ok'></span> Cek Hadir</button>" +
					// "</td>" +
					"</tr>";   
                }
			}
			$("tbody#tabelabsenmhs").html(html);
        }
    });
}