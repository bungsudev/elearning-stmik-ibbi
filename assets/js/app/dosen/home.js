$(document).ready(function () {
    tampil();
    $("#buat").click(function () {
        $("#form1")[0].reset();
        $("#form-horn").modal("show");
    });
    $("#kirim").click(function () {
        if (confirm("Kirim jawaban Anda?")) {
        isi = CKEDITOR.instances.isi.getData();
        $("#isihide").val(isi);
        simpan();
        }
        return false;
    });
    $("#tblpeng").on("click","#hapus",function(){
        id = $(this).data("id");
        hapus(id);
        return false;
    });
});

function hapus(id){
    if(confirm("Anda yakin hapus ?")){
        $.ajax({
            url: "dosen/home/hapus/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data){
                if(data.status){
                    tampil();
                    showMessage("delete");
                }
            }
        });
    }
}

function simpan() {
    $.ajax({
        url: "dosen/home/simpan/",
        type: "POST",
        data: $('#form1').serialize(),
        dataType: "JSON",
        success: function (data) {
            if (data.status) {
                tampil();
                $("#form-horn").modal("hide");
                CKEDITOR.instances.isi.setData( '' );
                showMessage("tambah");
            } else {
                alert("Isi dengan benar!");
            }
        }
    });
}

function tampil(){
    $.ajax({
        type: "ajax",
        url: "dosen/home/data",
        dataType: "JSON",
        success: function(data){
            var html = "";
            iddsn = $('#iddsn').val();
            console.log(iddsn);
            for(i=0;i < data.length;i++){
                if (data[i].idpengirim == iddsn) {
                    html += 
                    // "<tr><td colspan='3'></td></tr>"+
                    "<tr><td rowspan='2' valign='top' style='width:100px; height:130px;' ><img style='width:100px; height:130px;' alt='User'"+
                    "src='assets/img/fotomahasiswa/"+ data[i].idpengirim +".jpg'></td>"+
                    "<td rowspan='2' width='10px;'></td>"+
                        "<td> By: "+ data[i].nama +" / Date: "+ data[i].tanggal +""+
                        "<button class='btn btn-danger pull-right'"+
                            "data-id='"+ data[i].idpengumuman +"' id='hapus'><span class='icon-trash'></span></button>"+                            
                        "</td></tr>"+
                        "<hr>"+
                    "<tr><td colspan='2'>"+data[i].isi+"</td></tr>"+
                    "<hr>";   
                } else {
                    html += 
                    // "<tr><td colspan='3'></td></tr>"+
                    "<tr><td rowspan='2' valign='top' style='width:100px; height:130px;' ><img style='width:100px; height:130px;' alt='User'"+
                    "src='assets/img/fotomahasiswa/"+ data[i].idpengirim +".jpg'></td>"+
                    "<td rowspan='2' width='10px;'></td>"+
                        "<td> By: "+ data[i].nama +" / Date: "+ data[i].tanggal +""+
                                                   
                        "</td></tr>"+
                        "<hr>"+
                    "<tr><td colspan='2'>"+data[i].isi+"</td></tr>"+
                    "<tr><td colspan='3'><hr></td</tr>";
                }
                
            }
            $("#tblpeng").html(html);
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