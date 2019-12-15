$(document).ready(function(){
    // console.log('ready'); 
    // tampilmatakuliah();
    var namadosen = '';
    $("#filter").click(function(){
        event.preventDefault();
        prodi = $( "#prodifil option:selected" ).val();
        semester = $( "#semesterfil option:selected" ).val();
        if (prodi == '' || semester == '') {
            alert("Pilih dengan benar!");
        } else {
            tampilmatakuliah(prodi,semester);   
        }
    });

    $("#filterall").click(function(){
        event.preventDefault();
        $("#semesterfil").val('');
        $("#prodifil").val('');
        tampilmatakuliahall();
    });

    $("#tambah").click(function(){
        // alert("tambah");
        console.log('ready');
        mode = "add";
        $("#tkdmk").css("display", "none");
        $("form")[0].reset();
        $("#mode").html("Tambah");
        $("span.help-block").remove();
        $(".form-group").removeClass("has-error");
        $("input[name='kodemk']").removeAttr("readonly");
        $("#form-matakuliah").modal("show");
    });

    $("tbody").on("click","#rubah",function(){
        mode = "edit";
        var id = $(this).data("id");
        $("#tkdmk").css("display", "block");
        $("span.help-block").remove();
        $(".form-group").removeClass("has-error");

        $("input[name='kodemk']").attr("readonly",true);

        bacamatakuliah(id);
    });

    $("tbody").on("click","#hapus",function(){
        var id = $(this).data("id");
        hapusmatakuliah(id);
    });

    $("#simpan").click(function(){
        simpanmatakuliah();
    });

    $("tbody").on("click","#reset",function(){
        var id = $(this).data("id");
        resetUser(id);
    });
    $('#iddosen').on('change', function() {
        namadosen = $(this).find(':selected').data('nama');
        $("#namadosen").val(namadosen);
    });
})

function tampilmatakuliahall(){
    $.ajax({
        type: "ajax",
        url: "matakuliah/datasemua",
        dataType: "JSON",
        success: function(data){
            var html = "";
            for(i=0;i < data.length;i++){
                html += "<tr>" +
							"<td style='width:50px;'>"+ data[i].kodemk +"</td>"+
                            "<td>"+ data[i].namamk +"</td>"+
                            "<td style='width:50px;'>"+ data[i].namadosen +"</td>"+
							"<td style='width:150px;'>"+ konversiJurusan(data[i].prodi) +"</td>"+
                            "<td style='width:50px; text-align:center;'>"+ konversiSemester(data[i].semester) +"</td>"+						
							"<td><button style='width:70px;' id='rubah' class='btn btn-info btn-block' data-id='" + data[i].kodemk + "'>"+
									"<span class='icon-pencil'></span> Rubah</button>"+
                            "</td>"+
							"<td><button style='width:70px;' class='btn btn-danger btn-block' id='hapus' data-id='" + data[i].kodemk + "'>"+
									"<span class='icon-trash'></span> Hapus</button>"+
                            "</td>"+
                            
						"</tr>";
            }
            $("tbody#tbldatamk").html(html);
        }
    })
}

function tampilmatakuliah(prodi,semester){
    $.ajax({
        type: "ajax",
        url: "matakuliah/data/"+prodi+"/"+semester,
        dataType: "JSON",
        success: function(data){
            var html = "";
            for(i=0;i < data.length;i++){
                html += "<tr>" +
							"<td style='width:50px;'>"+ data[i].kodemk +"</td>"+
                            "<td>"+ data[i].namamk +"</td>"+
                            "<td style='width:50px;'>"+ data[i].namadosen +"</td>"+
							"<td style='width:150px;'>"+ konversiJurusan(data[i].prodi) +"</td>"+
                            "<td style='width:50px; text-align:center;'>"+ konversiSemester(data[i].semester) +"</td>"+						
							"<td><button style='width:70px;' id='rubah' class='btn btn-info btn-block' data-id='" + data[i].kodemk + "'>"+
									"<span class='icon-pencil'></span> Rubah</button>"+
                            "</td>"+
							"<td><button style='width:70px;' class='btn btn-danger btn-block' id='hapus' data-id='" + data[i].kodemk + "'>"+
									"<span class='icon-trash'></span> Hapus</button>"+
                            "</td>"+
                            
						"</tr>";
            }
            $("tbody#tbldatamk").html(html);
        }
    })
}

function showMessage(mode){
    var divMessage = "<div class='alert alert-success'>" +
                            "Berhasil <strong>" + mode.toUpperCase() + "</strong> Data matakuliah" +
                        "</div>";
    $(divMessage)
        .prependTo(".ini")
        .delay(2000)
        .slideUp("slow");
}

function hapusmatakuliah(id){
    if(confirm("Anda yakin hapus ?")){
        $.ajax({
            url: "matakuliah/hapus/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data){
                if(data.status){
                    tampilmatakuliah();
                    showMessage("delete");
                }
            }
        });
    }
}

function bacamatakuliah(id){
    $("form")[0].reset();

    $.ajax({
        url: "matakuliah/baca/"+id,
        type: "POST",
        dataType: "JSON",
        success: function(data){
            $("#kodemk").val(data.kodemk);
            $("#namamk").val(data.namamk);
            $("#prodi").val(data.prodi);
            $("#semester").val(data.semester);
            $("#iddosen").val(data.iddosen);
            // $("#iddosen select").val(data.iddosen);
            $("#namadosen").val(data.namadosen);
            $("#mode").html("Rubah");
            $("#form-matakuliah").modal("show");
        }
    })
}

function resetUser(id){
    if(confirm("Anda yakin reset ?")){
        $.ajax({
            url: "matakuliah/reset/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data){
                if(data.status){
                    tampilmatakuliah();
                    showMessage("reset");
                }
            }
        });
    }
}

function simpanmatakuliah(){
    $.ajax({
        url: "matakuliah/simpan/"+mode,
        type: "POST",
        data: $("form").serialize(),
        dataType: "JSON",
        success: function(data){
            if(data.status){
                console.log(data.status);
                tampilmatakuliahall();
                showMessage(mode);
                $("#form-matakuliah").modal("hide");
            }else{
                $("span.help-block").remove();
                $(".form-control").removeClass("has-error");

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

