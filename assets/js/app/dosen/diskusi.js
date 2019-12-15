
var idmateri = "";
var idusr = "";
var idbtn = "";
$(document).ready(function(){ 
    upload = "m";
    diskusi = "d";
    tampilmateridownload(upload);
    tampildiskusi(diskusi);
    $("tbody#tbldownload").on("click","#lihat",function(){
        mode = "Upload";
        var file = $(this).data("file");
        var a="assets/materi/";
        var loc = a.concat(file); 
        // alert(loc);
        // window.location.href = loc;
        go = window.open(loc, '_blank');
        go.focus();
    });
    $("tbody#tbldiskusi").on("click", "#lihat", function () {
        var pertemuan = $(this).data("pertemuan");  
        var judul = $(this).data("judul");
        var isi = $(this).data("isi");  
        idmateri = $(this).data("id");  
        $("#tampilsoal").css("display", "block");
        $("#tampilawal1").css("display", "none");
        $("#tampilawal2").css("display", "none");
        $("#idsoaltp").text(pertemuan);
        $("#tipesoaltp").text(judul);  
        $("#idmateri").val(idmateri);
        bacaisidiskusi(pertemuan);
        ambilkomentar(idmateri);
    });
    $("#kembali").click(function () {
        // location.reload();
        CKEDITOR.instances.kirimdiskusi.setData('');
        $(".komentarapp").remove();
        $("#tampilawal1").css("display", "block");
        $("#tampilawal2").css("display", "block");
		$("#tampilsoal").css("display", "none");		
    });
    $("#kirim").click(function(){
        event.preventDefault();
        idmateri = $("#idmateri").val();
        $("#kirimdiskusi").val(CKEDITOR.instances.kirimdiskusi.getData());
        kirimkomen();
        $(".komentarapp").remove();
    });
});


function hapuskomentar(iddiskusi){
    if(confirm("Anda yakin hapus ?")){
        $.ajax({
            url: "dosen/diskusi/hapuskomen/"+iddiskusi,
            type: "POST",
            dataType: "JSON",
            success: function(data){
                if(data.status){
                    console.log(idmateri);
                    console.log(data);
					ambilkomentar(idmateri);
                }
            }
        });
    }
}

function tampilmateridownload(upload) {
	$.ajax({
		url: "dosen/diskusi/data/" + upload,
		type: "POST",
		dataType: "JSON",
		success: function (data) {
			var html = "";
			for (i = 0; i < data.length; i++) {
                no = i+1;
				html += "<tr>"+
                            "<td class='taskStatus'>"+no+"</td>"+
                            "<td>"+data[i].judulmateri+"</td>"+
                            "<td class='taskStatus'>"+data[i].tanggal+"</td>"+                            
                            "<td style='width:85px;'><button id='lihat' class='btn btn-info btn-block' data-file='" + data[i].file + "'>"+
									"<span class='icon-eye-open'></span> Lihat</button>"+
                            "</td>"+
                        "</tr>";
			}
			$("tbody#tbldownload").html(html);
		}
	})
}

function tampildiskusi(diskusi) {
	$.ajax({
		url: "dosen/diskusi/data/" + diskusi,
		type: "POST",
		dataType: "JSON",
		success: function (data) {
			var html = "";
			for (i = 0; i < data.length; i++) {
                no = i+1;
				html += "<tr>"+
                            "<td class='taskStatus'>"+no+"</td>"+
                            "<td class='taskStatus'>"+data[i].judulmateri+"</td>"+
                            "<td class='taskStatus'>"+data[i].tanggal+"</td>"+
                            "<td style='width:100px;'>" +
                                "<button  class='btn btn-info btn-block' id='lihat' data-id='"+ data[i].idmateri +"' data-isi='"+ data[i].file +"' data-judul='"+ data[i].judulmateri +"' data-pertemuan='"+ data[i].pertemuan +"'>"+
                                "<span class='icon-circle-arrow-right'></span> Masuk " +
                                "</button>" +
                            "</td>" +
                        "</tr>";
			}
			$("tbody#tbldiskusi").html(html);
		}
	})
}

// =============================================

function kirimkomen() {
	$.ajax({
		type: "POST",
		url: "dosen/diskusi/kirimkomen/",
		dataType: "JSON",
		data: $('#formkirim').serialize(),
		success: function (data) {
			if (data.status) {
                CKEDITOR.instances.kirimdiskusi.setData('');
                ambilkomentar(idmateri);
				// showalert("success", "Soal terkirim ke mahasiswa!");				
			}else{
                ambilkomentar(idmateri);
			}
			
		}
	});
	return false;
}

function balas(idbtn){
    var tes = $( idbtn ).attr( "data-isi" );
    CKEDITOR.instances['kirimdiskusi'].setData(tes);
    $("#kirim").focus();
}

function ambilkomentar(idmateri) {
	$.ajax({
		type: "ajax",
        url: "dosen/diskusi/ambilkomentar/"+idmateri,
        dataType: "JSON",
		success: function (data) {
			$('table#kir tr').remove();
            idusr = $("#userid").val();            
			var html1 = "";
			for (i = 0; i < data.length; i++) {
                idbtn = "balas"+ data[i].iddiskusi +"";
                var balasisi = "<blockquote><strong>"+ data[i].nama +" </strong>:"+ data[i].komentar +" </blockquote></br>";
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
                                    "src='http://localhost/online/assets/img/fotomahasiswa/"+ data[i].userid +".jpg' alt=''>"+
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
                                    "src='http://localhost/online/assets/img/fotomahasiswa/"+ data[i].userid +".jpg' alt=''>"+
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
}

function bacaisidiskusi(pertemuan) {
	$.ajax({
		url: "dosen/diskusi/ambilisi/" + pertemuan,
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
}

