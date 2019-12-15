$(document).ready(function(){
    console.log('ready');
    tampilmateriup();
    mode = "Upload";
    $("#reload").click(function(){
        tampilmateri();
    });

    $("tbody#tblup").on("click","#lihat",function(){
        mode = "Upload";
        var file = $(this).data("file");
        var a="assets/materi/";
        var loc = a.concat(file); 
        // alert(loc);
        // window.location.href = loc;
        go = window.open(loc, '_blank');
        go.focus();
    });

    $("tbody").on("click","#hapus",function(){
        var id = $(this).data("id");
        hapusmateri(id);
    });

    $("#simpan").click(function(){
        simpanmateri();
    });

    $("tbody").on("click","#reset",function(){
        var id = $(this).data("id");
        resetUser(id);
    });
})

function showMessage(mode){
    var divMessage = "<div class='alert alert-success'>" +
                            "Berhasil <strong>" + mode.toUpperCase() + "</strong> materi" +
                        "</div>";
    $(divMessage)
        .prependTo(".ini")
        .delay(2000)
        .slideUp("slow");
}

function hapusmateri(id){
    if(confirm("Anda yakin hapus ?")){
        $.ajax({
            url: "lihatup/hapus/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data){
                if(data.status){
                    tampilmateriup();
                    showMessage("delete");
                }
            }
        });
    }
}

function bacamateri(id){
    $("form")[0].reset();

    $.ajax({
        url: "dosen/lihatup/baca/"+id,
        type: "POST",
        dataType: "JSON",
        success: function(data){
            $("#idmateri").val(data.idmateri);
            $("#matakuliah").val(data.matakuliah);
            $("#judulmateri").val(data.judulmateri);
            $("#tanggal").val(data.tanggal);
            // $("#upload").val(data.file);
            $("#upload").change(function() {
                var filename = $("#upload").val();
                $("#upload").html(filename);
            });
        
            $("#mode").html("Upload");
            $("#form-rubah").modal("show");
        }
    })
}

function resetUser(id){
    if(confirm("Anda yakin reset ?")){
        $.ajax({
            url: "dosen/materi/reset/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data){
                if(data.status){
                    tampilmateri();
                    showMessage("reset");
                }
            }
        });
    }
}

function simpanmateri(){
    $.ajax({
        url: "dosen/materi/simpan/"+mode,
        type: "POST",
        data: $("form").serialize(),
        dataType: "JSON",
        success: function(data){
            if(data.status){
                console.log("simpan");
                tampilmateri();
                showMessage(mode);
                $("#form-materi").modal("hide");
            }else{
                $("span.help-inline").remove();
                $(".form-group").removeClass("has-error");

                $.each(data.message,function(index,value){
                    if(value){
                        $("input[name="+index+"]")
                            .after(value)
                            .parent()
                            .addClass("has-error");
                    }
                });
            }
        }
    })
}

function tampilmateriup(){
    $.ajax({
        type: "ajax",
        url: "dosen/lihatup/dataup",
        dataType: "JSON",
        success: function(data){
            var html = "";
            for(i=0;i < data.length;i++){
                html += "<tr>" +
							"<td>"+ data[i].idmateri +"</td>"+
							"<td>"+ data[i].matakuliah +"</td>"+
							"<td>"+ data[i].judulmateri +"</td>"+
                            "<td>"+ data[i].tanggal +"</td>"+
                            "<td>"+ data[i].file +"</td>"+                            		
							"<td style='width:85px;'><button id='lihat' class='btn btn-info btn-block' data-file='" + data[i].file + "'>"+
									"<span class='icon-eye-open'></span> Lihat</button>"+
                            "</td>"+
							"<td style='width:90px;'><button class='btn btn-danger btn-block' id='hapus' data-id='" + data[i].idmateri + "'>"+
									"<span class='icon-trash'></span> Hapus</button>"+
                            "</td>"+
                            
						"</tr>";
            }
            $("tbody#tblup").html(html);
        }
    })
}