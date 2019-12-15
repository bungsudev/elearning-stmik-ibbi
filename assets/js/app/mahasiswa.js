var prodi = '';
var kelas = '';
var id = '';
$(document).ready(function(){
    // console.log('ready');
    // tampilMahasiswa();

    $("#filter").click(function(){
        prodi = $("#prodifil option:selected").val();
        kelas = $("#kelasfil option:selected").val();
        if (prodi == '' || kelas == '') {
            alert("Pilih dengan benar!");
        } else {
            tampilMahasiswafil(prodi,kelas);
        }
        return false;        
    });
  
    $("#filterall").click(function(){
        $("#kelasfil").val('');
        $("#prodifil").val('');
        tampilMahasiswa();
        return false;
    });

    $("#tambah").click(function(){
        // alert("tambah");
        mode = "add";
        $("#simpandata").css("display", "none");
        $("form")[0].reset(); 
        $('#form2')[0].reset();
        $(".image_preview").empty();
        $("#image").val(null);
        $("#mode").html("Tambah");
        $("span.help-inline").remove();
		$("span.alert").remove();
        $("input[name='nim']").removeAttr("readonly");
        $("#form-mahasiswa").modal("show");
    });

    $("tbody").on("click","#rubah",function(){
        mode = "edit";
        id = $(this).data("id");
        $("#simpandata").css("display", "inline");
        $("span.help-block").remove();
        $(".form-group").removeClass("has-error");

        $("input[name='nim']").attr("readonly",true);

        bacaMahasiswa(id);
    });

    $("tbody").on("click","#hapus",function(){
        id = $(this).data("id");
        hapusMahasiswa(id);
        hapusabsen(id);
    });

    $("#simpan").click(function(){
        // $("#form-gambar").modal("show");
        // $("#form-mahasiswa").modal("hide");
        prodi = $("#prodi option:selected").val();
        kelas = $("#kelas option:selected").val();
        simpanval();
        
    });
   
    $("#simpandata").click(function(){        
        simpanMahasiswa();
        // tampilMahasiswa();
        tampilMahasiswafil(prodi,kelas);
        
    });

    $("#simpangbr").click(function(){
        event.preventDefault();
        if ($('#image').get(0).files.length === 0) {
            alert("Pilih gambar terlebih dahulu!!!")
        }else if ($('#image').get(0).files.length != 0){
            nim = $("#nim").val();
            $("#nim1").val(nim);
            simpanMahasiswa();   
            if (mode == 'add') {
                simpangambar();               
            } else {
                editgambar();
                tampilMahasiswafil(prodi,kelas);
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
        url: "mahasiswa/simpanval/"+mode,
        type: "POST",
        data: $("form").serialize(),
        dataType: "JSON",
        success: function(data){
            if(data.status){      
                $("#form-mahasiswa").modal("hide");
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
            url: "mahasiswa/uploadedit/",
            data: formData,
            type: "POST", //ADDED THIS LINE
            // THIS MUST BE DONE FOR FILE UPLOADING
            contentType: false,
            processData: false,
            complete: function(data){
                // location.reload();                
                tampilMahasiswafil(prodi,kelas);
                $("#form-gambar").modal("hide");
            }
            // ... Other options like success and etc
        })
}

function simpangambar(){
    var form = $('form')[1]; // You need to use standard javascript object here
        var formData = new FormData(form);
        $.ajax({
            url: "mahasiswa/upload/",
            data: formData,
            type: "POST", //ADDED THIS LINE
            // THIS MUST BE DONE FOR FILE UPLOADING
            contentType: false,
            processData: false,
            complete: function(data){
                // location.reload();              
                tampilMahasiswafil(prodi,kelas);
                $("#prodifil").val('');
                $("#kelasfil").val('');
                $("#form-gambar").modal("hide");
            }
            // ... Other options like success and etc
        })
}


function simpanMahasiswa(){
    $.ajax({
        url: "mahasiswa/simpan/"+mode,
        type: "POST",
        data: $("form").serialize(),
        dataType: "JSON",
        success: function(data){
            if (mode == 'add') {
                simpanabsen();    
            }            
            if(data.status){                
                showMessage(mode);
                $("#form-mahasiswa").modal("hide");
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

function simpanabsen(){
    $.ajax({
        url: "mahasiswa/createabsen/",
        type: "POST",
        data: $("form").serialize(),
        dataType: "JSON",
        success: function(data){
        }
    })
}

function showMessage(mode){
    var divMessage = "<div class='alert alert-success'>" +
                            "Berhasil <strong>" + mode.toUpperCase() + "</strong> Data Mahasiswa" +
                        "</div>";
    $(divMessage)
        .prependTo(".ini")
        .delay(2000)
        .slideUp("slow");
}

function hapusMahasiswa(id){
    if(confirm("Anda yakin hapus ?")){
        $.ajax({
            url: "mahasiswa/hapus/"+id,
            type: "POST",
            dataType: "JSON",
            complete: function(data){
                if(data.status){
                    tampilMahasiswafil(prodi,kelas);
                    showMessage("delete");
                }
            }
        });
    }
}

function hapusabsen(id){
    $.ajax({
        url: "mahasiswa/hapusabsen/"+id,
        type: "POST",
        dataType: "JSON",
        success: function(data){
            if(data.status){
                tampilMahasiswafil(prodi,kelas);
            }
        }
    });
}

function bacaMahasiswa(id){
    $("form")[0].reset();

    $.ajax({
        url: "mahasiswa/baca/"+id,
        type: "POST",
        dataType: "JSON",
        success: function(data){
            $("#nim").val(data.nim);
            $("#namamhs").val(data.namamhs);
            $("#alamat").val(data.alamat);
            $("#email").val(data.email);
            $("#tanggallahir").val(data.tanggallahir);
            $("#agama").val(data.agama);
            $("#jekel").val(data.jekel);
            $("#telepon").val(data.telepon);
            $("#prodi").val(data.prodi);
            $("#semester").val(data.semester);
            $("#kelas").val(data.kelas);
        
            $("#mode").html("Rubah");
            $("#form-mahasiswa").modal("show");
        }
    })
}

function resetUser(id){
    if(confirm("Anda yakin reset ?")){
        $.ajax({
            url: "mahasiswa/reset/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data){
                if(data.status){
                    tampilMahasiswafil(prodi,kelas);
                    showMessage("reset");
                }
            }
        });
    }
}

function tampilMahasiswafil(prodi,kelas){
    $.ajax({
        type: "ajax",
        url: "mahasiswa/ambil/"+prodi+"/"+kelas,
        dataType: "JSON",
        success: function(data){
            var html = "";
            for(i=0;i < data.length;i++){
                html += "<tr>" +
                            // "<td class='pasfoto'><img src='assets/img/fotomahasiswa/"+ data[i].nim +".jpg' alt=''>"+
                            "</td>"+
							"<td>"+ data[i].nim +"</td>"+
							"<td>"+ data[i].namamhs +"</td>"+
                            "<td>"+ konversiJekel(data[i].jekel) +"</td>"+
                            "<td>"+ data[i].prodi +"</td>"+
                            "<td>"+ konversiSemester(data[i].semester) +"</td>"+
                            "<td>"+ data[i].kelas +"</td>"+							
							"<td  style='width:70px;'><button id='rubah' class='btn btn-info btn-block' data-id='" + data[i].nim + "'>"+
									"<span class='icon-pencil'></span> Rubah</button>"+
                            "</td>"+
                            "<td style='width:100px;'><button id='reset' class='btn btn-warning btn-block' data-id='" + data[i].nim + "'>"+
									"<span class='icon-refresh'></span> Reset Pass</button>"+
							"</td>"+
							"<td style='width:70px;'><button class='btn btn-danger btn-block' id='hapus' data-id='" + data[i].nim + "'>"+
									"<span class='icon-trash'></span> Hapus</button>"+
                            "</td>"+                            
						"</tr>";
            }
            $("tbody#tbldatamhs").html(html);
        }
    })
}

function tampilMahasiswa(){
    $.ajax({
        type: "ajax",
        url: "mahasiswa/data",
        dataType: "JSON",
        success: function(data){
            var html = "";
            for(i=0;i < data.length;i++){
                html += "<tr>" +
							"<td>"+ data[i].nim +"</td>"+
							"<td>"+ data[i].namamhs +"</td>"+
                            "<td>"+ konversiJekel(data[i].jekel) +"</td>"+
                            "<td>"+ data[i].prodi +"</td>"+
                            "<td>"+ konversiSemester(data[i].semester) +"</td>"+
                            "<td>"+ data[i].kelas +"</td>"+							
							"<td  style='width:70px;'><button id='rubah' class='btn btn-info btn-block' data-id='" + data[i].nim + "'>"+
									"<span class='icon-pencil'></span> Rubah</button>"+
                            "</td>"+
                            "<td style='width:100px;'><button id='reset' class='btn btn-warning btn-block' data-id='" + data[i].nim + "'>"+
									"<span class='icon-refresh'></span> Reset Pass</button>"+
							"</td>"+
							"<td style='width:70px;'><button class='btn btn-danger btn-block' id='hapus' data-id='" + data[i].nim + "'>"+
									"<span class='icon-trash'></span> Hapus</button>"+
                            "</td>"+                            
						"</tr>";
            }
            $("tbody#tbldatamhs").html(html);
        }
    })
}