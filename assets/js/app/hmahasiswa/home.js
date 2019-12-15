$(document).ready(function () {
    tampil();
});
function tampil(){
    $.ajax({
        type: "ajax",
        url: "hmahasiswa/home/data",
        dataType: "JSON",
        success: function(data){
            var html = "";
            for(i=0;i < data.length;i++){
                html += 
                    // "<tr><td colspan='3'></td></tr>"+
                    "<tr><td rowspan='2' valign='top' style='width:100px; height:130px;'><img style='width:100px; height:130px;' alt='User'"+
                    "src='assets/img/fotomahasiswa/"+ data[i].idpengirim +".jpg'></td>"+
                    "<td rowspan='2' width='10px;'></td>"+
                        "<td> By: "+ data[i].nama +" / Date: "+ data[i].tanggal +" </td></tr>"+
                        "<hr>"+
                    "<tr><td colspan='2'>"+data[i].isi+"</td></tr>"+
                    "<tr><td colspan='3'><hr></td</tr>";
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