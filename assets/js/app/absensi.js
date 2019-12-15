var mk = '';
$(document).ready(function(){
    // console.log('ready');
    // tampilabsensi();
    $("#filter").click(function(){
        mk = $("#matakuliahfil option:selected").val();
        kelas = $("#kelasfil option:selected").val();
        if (mk == '' || kelas == '') {
            alert("Pilih dengan benar!");
        } else {
            tampilabsensifil(mk,kelas);
        }
        return false;        
    });

    $("tbody").on("click","#rubah",function(){
        mode = "edit";
        var id = $(this).data("id");
        $("input[name='nim']").attr("readonly",true);
        $("#form-absensi").modal("show");
        tampilabsensi()
    });

    $("tbody").on("click","#hapus",function(){
        var id = $(this).data("id");
        hapusabsensi(id,mk);
    });

    $("#simpan").click(function(){
        var id = $(this).data("id");
        editabsen();
    });
})

function tampilabsensifil(mk,kelas){
    $.ajax({
        type: "ajax",
        url: "absensi/data/"+mk+"/"+kelas,
        dataType: "JSON",
        success: function(data){
            var html = "";
            console.log(data);
            for(i=0;i < data.length;i++){
                html += "<tr>"+
                    "<td>"+ data[i].nim +"</td>" +
                    "<td>"+ data[i].namamhs +"</td>" +
                    "<td style='text-align:center; width:30px;'>"+ data[i].kelompok +"</td>" +
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
					// "<td><button class='btn btn-danger btn-block' id='hapus' data-id='" + data[i].nim + "'>" +
					// "<span class='icon-trash'></span> Hapus</button>" +
					// "</td>" +
					"</tr>";
			} 
			$("tbody#tabelabsen").html(html);
        }
    })
}

function showMessage(mode){
    var divMessage = "<div class='alert alert-success'>" +
                            "Berhasil <strong>" + mode.toUpperCase() + "</strong> Data absensi" +
                        "</div>";
    $(divMessage)
        .prependTo(".container")
        .delay(2000)
        .slideUp("slow");
}

function hapusabsensi(id,mk){
    if(confirm("Anda yakin hapus ?")){
        $.ajax({
            url: "absensi/hapus/"+id+"/"+mk,
            type: "POST",
            dataType: "JSON",
            success: function(data){
                if(data.status){
                    tampilabsensi();
                    showMessage("delete");
                }
            }
        });
    }
}

function tampilabsensi(){
    $.ajax({
        type: "ajax",
        url: "absensi/data",
        dataType: "JSON",
        success: function(data){
            var html = "";
            console.log(data);
            for(i=0;i < data.length;i++){
                console.log(i);
                html += "<tr>"+
                    "<td>"+ data[i].nim +"</td>" +
                    "<td>"+ data[i].namamhs +"</td>" +
                    "<td style='text-align:center; width:30px;'>"+ data[i].kelompok +"</td>" +
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
					// "<td><button class='btn btn-danger btn-block' id='hapus' data-id='" + data[i].nim + "'>" +
					// "<span class='icon-trash'></span> Hapus</button>" +
					"</td>" +
					"</tr>";
			}
			$("tbody#tabelabsen").html(html);
        }
    })
}

// function bacaabsensi(id){
//     $("form")[0].reset();

//     $.ajax({
//         url: "absensi/baca/"+id,
//         type: "POST",
//         dataType: "JSON",
//         success: function(data){
//             $("#nim").val(data.nim);
//             $("#namamhs").val(data.namamhs);
// 			$("#a1").val(data.a1);
//             $("#a2").val(data.a2);
//             $("#a3").val(data.a3);
//             $("#a4").val(data.a4);
//             $("#a5").val(data.a5);
//             $("#a6").val(data.a6);
//             $("#a7").val(data.a7);
//             $("#a8").val(data.a8);
//             $("#a9").val(data.a9);
//             $("#a10").val(data.a10);
//             $("#a11").val(data.a11);
//             $("#a12").val(data.a12);
//             $("#a13").val(data.a13);
//             $("#a14").val(data.a14);
//             $("#a15").val(data.a15);
//             $("#a16").val(data.a16);
        
//             $("#mode").html("Rubah");
//             $("#form-absensi").modal("show");
//         }
//     })
// }

