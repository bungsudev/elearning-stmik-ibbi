$(document).ready(function(){
    console.log('ready');

    $("#uploadmateri").click(function(){ 
        mode = "upload"
        alert("sss");
        // showMessage(mode);
        console.log("isi");
        tampil();
    });

    $('#matakuliah').on('change', function() {
        alert('asd');
        // kdmk = this.value;
		// mprodi = $("#"+kdmk).val();
		// $("#kodemk").val(kdmk);
		// cekpertemuan(kdmk);
		// $("#mprodi").val(mprodi);
	});
})

// function showMessage(mode){
//     var divMessage = "<div class='alert alert-success'>" +
//                             "Berhasil <strong>" + mode.toUpperCase() + "</strong> Data Mahasiswa" +
//                         "</div>";
//     $(divMessage)
//         .prependTo(".container")
//         .delay(2000)
//         .slideUp("slow");
// }

function tampil(){
    $.ajax({
        url: "subuploadmateri/do_upload",
        type: "POST",
        dataType: "JSON",
        success: function(data){
            if(data.status){
                console.log("ini");
                showMessage(mode);
            }
        }
    });    
}