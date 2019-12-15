$(document).ready(function(){ 
    // console.log('ready');
    tampiladmin(); 

    $("#reload").click(function(){
        tampiladmin();
    });

    $("#tambah").click(function(){
        // alert("tambah");
        mode = "add";
        $("#simpandata").css("display", "none");
        $("form")[0].reset();
        $("#mode").html("Tambah");
        $("span.help-block").remove();
        $(".form-group").removeClass("has-error");
        $("input[name='idadmin']").removeAttr("readonly");
        $("#form-admin").modal("show");
    });

    $("tbody").on("click","#rubah",function(){
        mode = "edit";
        var id = $(this).data("id");
        $("#simpandata").css("display", "inline");
        $("span.help-block").remove();
        $(".form-group").removeClass("has-error");

        $("input[name='idadmin']").attr("readonly",true);
        idadmin = $("#idadmin").val();
        $("#idadmin1").val(idadmin);
        bacaadmin(id);
    });

    $("tbody").on("click","#hapus",function(){
        var id = $(this).data("id");
        hapusadmin(id);
    });

    $("#simpan").click(function(){
        // simpanadmin();
        // $("#form-gambar").modal("show");
        // $("#form-admin").modal("show"); 
        simpanval();
    });

    $("#simpandata").click(function(){        
        simpanadmin();
        // tampilMahasiswa();
        tampiladmin();        
    });

    $("#simpangbr").click(function(){
        event.preventDefault();
        if ($('#image').get(0).files.length === 0) {
            alert("Pilih gambar terlebih dahulu!!!")
        }else if ($('#image').get(0).files.length != 0){
            idadmin = $("#idadmin").val();
            $("#idadmin1").val(idadmin);
            simpanadmin();
            if (mode == 'add') {
                simpangambar();               
            } else {
                editgambar();
                tampiladmin();
                $("#form-gambar").modal("hide");
            };
        }
    });

    $("tbody").on("click","#reset",function(){
        var id = $(this).data("id");
        resetUser(id);
    });
})

function simpanval(){
    $.ajax({
        url: "admin/simpanval/"+mode,
        type: "POST",
        data: $("form").serialize(),
        dataType: "JSON",
        success: function(data){
            if(data.status){
                $("#form-admin").modal("hide");
                $('#form-gambar').modal({
                    backdrop: 'static',
                    keyboard: false  // to prevent closing with Esc button (if you want this too)
                });
            }else{
                $("span.help-block").remove();
                $(".form-group").removeClass("has-error");
                $.each(data.message,function(index,value){
                    if(value){
                        $("input[name="+index+"]")
                            .after(value)
                            .parent()
                            .addClass("has-error");
                        $("span[name=" + index + "]")
                            .after(value)
                            .parent()
                            .addClass("has-error");
                    }
                });
            }
        }
    })
}

function editgambar(){
    var form = $('form')[1]; // You need to use standard javascript object here
        var formData = new FormData(form);
        $.ajax({
            url: "admin/uploadedit/",
            data: formData,
            type: "POST", //ADDED THIS LINE
            // THIS MUST BE DONE FOR FILE UPLOADING
            contentType: false,
            processData: false,
            complete: function(data){
                // location.reload();                
                tampiladmin();
                $("#form-gambar").modal("hide");
            }
            // ... Other options like success and etc
        })
}

function simpanadmin(){
    $.ajax({
        url: "admin/simpan/"+mode,
        type: "POST",
        data: $("form").serialize(),
        dataType: "JSON",
        success: function(data){
            if(data.status){
                console.log(data.status);
                tampiladmin();
                showMessage(mode);
                $("#form-admin").modal("hide");
            }else{
                $("span.help-block").remove();
                $(".form-group").removeClass("has-error");

                $.each(data.message,function(index,value){
                    if(value){
                        $("input[name="+index+"]")
                            .after(value)
                            .parent()
                            .addClass("has-error");
                        $("span[name=" + index + "]")
                            .after(value)
                            .parent()
                            .addClass("has-error");
                    }
                });
            }
        }
    })
}

function simpangambar(){
    var form = $('form')[1]; // You need to use standard javascript object here
        var formData = new FormData(form);
        $.ajax({
            url: "admin/upload/",
            data: formData,
            type: "POST", //ADDED THIS LINE
            // THIS MUST BE DONE FOR FILE UPLOADING
            contentType: false,
            processData: false,
            complete: function(data){
                // location.reload();
                tampiladmin();
                $("#prodifil").val('');
                $("#kelasfil").val('');
                $("#form-gambar").modal("hide");
            }
            // ... Other options like success and etc
        });
}

function showMessage(mode){
    var divMessage = "<div class='alert alert-success'>" +
                            "Berhasil <strong>" + mode.toUpperCase() + "</strong> Data admin" +
                        "</div>";
    $(divMessage)
        .prependTo(".ini")
        .delay(2000)
        .slideUp("slow");
}

function hapusadmin(id){
    if(confirm("Anda yakin hapus ?")){
        $.ajax({
            url: "admin/hapus/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data){
                if(data.status){
                    tampiladmin();
                    showMessage("delete");
                }
            }
        });
    }
}

function bacaadmin(id){
    $("form")[0].reset();

    $.ajax({
        url: "admin/baca/"+id,
        type: "POST",
        dataType: "JSON",
        success: function(data){
            $("#idadmin").val(data.idadmin);
            $("#namaadmin").val(data.namaadmin);
            $("#alamat").val(data.alamat);
            $("#email").val(data.email);
            $("#tanggallahir").val(data.tanggallahir);
            $("#agama").val(data.agama);
            $("#jekel").val(data.jekel);
            $("#telepon").val(data.telepon);
            $("#status").val(data.status);
        
            $("#mode").html("Rubah");
            $("#form-admin").modal("show");
        }
    })
}

function resetUser(id){
    if(confirm("Anda yakin reset ?")){
        $.ajax({
            url: "admin/reset/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data){
                if(data.status){
                    tampiladmin();
                    showMessage("reset");
                }
            }
        });
    }
}

function simpanadmin(){
    $.ajax({
        url: "admin/simpan/"+mode,
        type: "POST",
        data: $("form").serialize(),
        dataType: "JSON",
        success: function(data){
            if(data.status){
                console.log(data.status);
                tampiladmin();
                showMessage(mode);
                $("#form-admin").modal("hide");
            }else{
                $("span.help-block").remove();
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

function tampiladmin(){
    $.ajax({
        type: "ajax",
        url: "admin/data",
        dataType: "JSON",
        success: function(data){
            var html = "";
            for(i=0;i < data.length;i++){
                html += "<tr>" +
							"<td>"+ data[i].idadmin +"</td>"+
							"<td>"+ data[i].namaadmin +"</td>"+
							"<td>"+ data[i].alamat +"</td>"+
                            "<td>"+ data[i].email +"</td>"+
                            "<td>"+ data[i].tanggallahir +"</td>"+
                            "<td>"+ data[i].agama +"</td>"+
                            "<td>"+ konversiJekel(data[i].jekel) +"</td>"+
                            "<td>"+ data[i].telepon +"</td>"+             
                            "<td>"+ data[i].status +"</td>"+							
							"<td style='width:70px;'><button id='rubah' class='btn btn-info btn-block' data-id='" + data[i].idadmin + "'>"+
									"<span class='icon-pencil'></span> Rubah</button>"+
                            "</td>"+
                            "<td style='width:100px;'><button id='reset' class='btn btn-warning btn-block' data-id='" + data[i].idadmin + "'>"+
									"<span class='icon-refresh'></span> Reset Pass</button>"+
							"</td>"+
							"<td style='width:70px;'><button class='btn btn-danger btn-block' id='hapus' data-id='" + data[i].idadmin + "'>"+
									"<span class='icon-trash'></span> Hapus</button>"+
                            "</td>"+
                            
						"</tr>";
            }
            $("tbody#tbladmin").html(html);
        }
    })
}