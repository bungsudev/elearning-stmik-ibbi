var prodi = "";
var matakuliah = "";
var semester = ""; 
var idmateri = "";
var idusr = "";
var idbtn = "";
$(document).ready(function(){    
    $("#filter").click(function(){
        event.preventDefault();
        if ($("#matakuliahfil").val() == ""){
            alert("Pilih data dahulu!!!");
        }else{            
            prodi = $("#prodifil").val();
            matakuliah = $("#matakuliahfil").val();
            semester = $("#semesterfil").val();
            tampildiskusi(prodi,semester,matakuliah);
        }
    });
    $("tbody#tbldiskusi").on("click", "#lihat", function () {
        var pertemuan = $(this).data("pertemuan");  
        var judul = $(this).data("judul");
        var isi = $(this).data("isi");  
        idmateri = $(this).data("id");  
        kdmk = $("#matakuliahfil").val();
        // console.log(isi);
        $("#tampilsoal").css("display", "block");
        $("#tampilawal").css("display", "none");
        $("#idsoaltp").text(pertemuan);
        $("#tipesoaltp").text(judul);  
        $("#idmateri").val(idmateri);
        bacaisidiskusi(pertemuan,kdmk);
        ambilkomentar(idmateri);
    });
    $("#kembali").click(function () {
        // location.reload();
        CKEDITOR.instances.kirimdiskusi.setData('');
        $(".komentarapp").remove();
		$("#tampilawal").css("display", "block");
		$("#tampilsoal").css("display", "none");		
    });
    $("#kirim").click(function(){
        event.preventDefault();
        idmateri = $("#idmateri").val();
        $("#kirimdiskusi").val(CKEDITOR.instances.kirimdiskusi.getData());
        kirimkomen();
        $(".komentarapp").remove();
        
    });

    $('#matakuliahfil').on('change', function() {
        // alert('asd');
        prodi = $(this).find(':selected').data('prodi');
        semester = $(this).find(':selected').data('sem');
        $("#prodifil").val(prodi);
        $("#semesterfil").val(semester);
    });
});

function kirimkomen() {
	$.ajax({
		type: "POST",
		url: "diskusi/kirimkomen/",
		dataType: "JSON",
		data: $('#formkirim').serialize(),
		success: function (data) {
			if (data.status) {
                CKEDITOR.instances.kirimdiskusi.setData('');
                ambilkomentar(idmateri);
                // bacaisidiskusi(pertemuan);
				// showalert("success", "Soal terkirim ke mahasiswa!");				
			}else{
                ambilkomentar(idmateri);
			}
			
		}
	});
	return false;
}


function tampildiskusi(prodi,semester,matakuliah){
    $.ajax({
        url: "diskusi/ambildiskusi/"+prodi+"/"+semester+"/"+matakuliah,
        type: "POST",
        dataType: "JSON",
        success: function(data){            
            var html = "";
            for(i=0;i<data.length;i++){
                html += "<tr>" +
                            "<td class='isitbl'>"+ data[i].pertemuan +"</td>" +
                            "<td class='isitbl'>"+ data[i].judulmateri +"</td>" +
                            " <td class='isitbl'>"+ data[i].tanggal +"</td> " +
                            "<td style='width:100px;'>" +
                                "<button  class='btn btn-info btn-block' id='lihat' data-id='"+ data[i].idmateri +"' data-isi='"+ data[i].file +"' data-judul='"+ data[i].judulmateri +"' data-pertemuan='"+ data[i].pertemuan +"'>Lihat " +
                                        "<span class='glyphicon glyphicon-eye-open'></span>" +
                                "</button>" +
                            "</td>" +
                            // "<td style='width:100px;'>" +
                            //         "<button id='hapus' data-id='"+ data[i].idmateri +"' class='btn btn-danger btn-block'>Hapus" +
                            //                 "<span class='glyphicon glyphicon-trash'></span>" +
                            //         "</button>" +
                            // "</td>" +
                        "</tr>";
            }
            $("tbody#tbldiskusi").html(html);
        }
    })
} //tabel awal diskusi

function hapuskomentar(iddiskusi){
    if(confirm("Anda yakin hapus ?")){
        $.ajax({
            url: "diskusi/hapuskomen/"+iddiskusi,
            type: "POST",
            dataType: "JSON",
            success: function(data){
                if(data.status){
					ambilkomentar(idmateri);
                }
            }
        });
    }
}

function balas(idbtn){
    var tes = $( idbtn ).attr( "data-isi" );
    CKEDITOR.instances['kirimdiskusi'].setData(tes);
    $("#kirim").focus();
}

function ambilkomentar(idmateri) {
	$.ajax({
		type: "ajax",
        url: "diskusi/ambilkomentar/"+idmateri,
        dataType: "JSON",
		success: function (data) {
            $('table#kir tr').remove();
            idusr = $("#userid").val();            
			var html1 = "";
			for (i = 0; i < data.length; i++) {
                idbtn = "balas"+ data[i].iddiskusi +"";
                var balasisi = "<blockquote><strong>"+ data[i].nama +" </strong> <span> :"+ data[i].komentar +" </span></blockquote></br>";
                if (data[i].userid == idusr) {                    
                    // console.log(balasisi);
                    html1 += 
                    "<tr><td colspan='2' align='right' style='font-size:10px;'>"+
                    "<button data-isi='"+ balasisi +"' id='balas"+ data[i].iddiskusi +"' name='balas"+ data[i].iddiskusi +"' onclick='balas("+ idbtn +");' class='btn btn-info pull-right'>"+
                    "<span class='icon-share-alt'></span></button>"+
                    "<button id='"+ data[i].iddiskusi +"' name='"+ data[i].iddiskusi +"' onclick='hapuskomentar("+data[i].iddiskusi+");' class='btn btn-danger pull-right'>"+
                    "<span class='icon-trash'></span></button> </td></tr>"+
                    // =====
                            "<tr style='vertical-align: top;' class='komentarapp'>"+
                            "<td style='width:100px; height:130px;'>"+
                                "<img style='width:100px; height:130px;' "+
                                    "src='assets/img/fotomahasiswa/"+ data[i].userid +".jpg' alt=''>"+
                                    "<div class='namafotodiskusi'>"+ data[i].nama +"</div>"+
                            "</td>"+
                            // ===============================
                            "<td>"+
                                "<div style=' margin:10px 0px 10px 10px;' class='isidiskusi'>"+ data[i].komentar +"</div>"+
                            "</td>"+
                            "</tr>"+
                            "<tr class='komentarapp'><td colspan='2' align='right' style='font-size:10px;'>"+ data[i].tanggal +"</td></tr>"+
                            "<tr class='komentarapp'><td colspan='2'><hr></td></tr>";  
                } else {
                    html1 += 
                            "<tr><td colspan='2' align='right' style='font-size:10px;'>"+
                            "<button data-isi='"+ balasisi +"' id='balas"+ data[i].iddiskusi +"' name='balas"+ data[i].iddiskusi +"' onclick='balas("+ idbtn +");' class='btn btn-info pull-right'>"+
                            "<span class='icon-share-alt'></span></button>"+
                            // =====
                            "<tr style='vertical-align: top;' class='komentarapp'>"+
                            "<td style='width:100px; height:130px;'>"+
                                "<img style='width:100px; height:130px;' "+
                                    "src='assets/img/fotomahasiswa/"+ data[i].userid +".jpg' alt=''>"+
                                    "<div class='namafotodiskusi'>"+ data[i].nama +"</div>"+
                            "</td>"+
                            // ===============================
                            "<td>"+
                                "<div style=' margin:10px 0px 10px 10px;' class='isidiskusi'>"+ data[i].komentar +"</div>"+
                            "</td>"+
                            "</tr>"+
                            "<tr class='komentarapp'><td colspan='2' align='right' style='font-size:10px;'>"+ data[i].tanggal +"</td></tr>"+
                            "<tr class='komentarapp'><td colspan='2'><hr></td></tr>";
                };                
			}
            $("#kir").prepend(html1);
		}
	})
} // isi diskusi

function bacaisidiskusi(pertemuan,kdmk) {
	$.ajax({
		url: "diskusi/ambilisi/" + pertemuan +"/"+kdmk,
		type: "POST",
		dataType: "JSON",
		success: function (data) {
            nama = $("#nama").val();
			var html = "";
			for (i = 0; i < data.length; i++) {
				html += "<tr style='vertical-align: top;'>"+
                    "<td style='width:100px; height:130px;'>"+
                        "<img style='width:100px; height:130px;' "+
                            "src='http://localhost/online/assets/img/fotomahasiswa/"+ data[i].idpengirim +".jpg' alt=''>"+
                            "<div class='namafotodiskusi'>"+ data[i].namapengirim +"</div>"+
                    "</td>"+
                    // ===============================
                    
                    "<td>"+
                        "<div style=' margin:10px 0px 10px 10px;' class='isidiskusi'>"+ data[i].file +"</div>"+
                    "</td>"+
                    "</tr>"+
                    "<tr class='komentarapp'><td colspan='2' align='right' style='font-size:10px;'>"+ data[i].tanggal +" </td></tr>"+
                    "<tr><td colspan='2'><hr></td></tr>";
			}
            $("table#isidiskusi").html(html);		
            CKEDITOR.replaceAll();	
		}
	}) 
} // isi diskusi pertanyaan