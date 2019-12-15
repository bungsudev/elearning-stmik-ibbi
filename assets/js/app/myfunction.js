function konversiSemester(nilai){
    var hasil = "";
    switch(nilai){
        case "1": hasil = "I"; break;
        case "2": hasil = "II"; break;
        case "3": hasil = "III"; break;
        case "4": hasil = "IV"; break;
        case "5": hasil = "V"; break;
        case "6": hasil = "VI"; break;
        case "7": hasil = "VII"; break;
        case "8": hasil = "VIII"; break;
    }
    return hasil;
}

function konversiAbsensi(nilai){
    var hasil = "";
    if(nilai=="Hadir"){
        hasil = "<i class='icon-ok'></i>";        
    }else{
        hasil="-";
    }
    return hasil;
}

function konversiJurusan(nilai){
    var hasil = "";
    if(nilai=="TI"){
        hasil="Teknik Informatika";
    }else if(nilai=="SI"){
        hasil = "Sistem Informasi";
    }
    return hasil;
}

function konversiJekel(nilai){
    var hasil = "";
    if(nilai=="L"){
        hasil="Laki-laki";
    }else if(nilai=="P"){
        hasil = "Perempuan";
    }
    return hasil;
}

function konversiStatusKrs(nilai){
    var hasil = "";
    if(nilai=="Y"){
        hasil="<td><span class='icon-ok-circle' style='color:rgb(224, 224, 33);'></span> Disetujui PA</td>";
    }else if(nilai=="N"){
        hasil ="<td><span class='icon-remove-circle' style='color:rgb(211, 0, 0);'></span> Belum Disetujui PA</td>";
    }
    return hasil;
}

function konversiStatusUser(nilai){
    var hasil = "";
    switch(nilai){
        case "AKD": hasil = "Akademik"; break;
        case "DOS": hasil = "Dosen"; break;
        case "MHS": hasil = "Mahasiswa"; break;
    }
    return hasil;
}

function konversiStatussoal(nilai){
    var hasil = "";
    if(nilai=="belum"){
        hasil="<span class='icon-time' style='color:rgb(180,209,67);'> Sudah terkirim, belum di jawab</span>";
    }else if(nilai=="selesai"){
        hasil = "<span class='icon-ok-circle' style='color:rgb(67,209,99);'> Soal telah di dinilai</span>";
    }else if(nilai=="proses"){
        hasil= "<span class='icon-exclamation-sign' style='color:rgb(217,80,96)'> Sudah selesai, belum di nilai</span>"
    }
    return hasil;
}

function Statustampil(nilai){
    var hasil = "";
    if(nilai=="proses"){
        hasil="<td class='taskStatus'><span class='in-progress'>Menunggu di nilai</span></td>";
    }else if(nilai=="selesai"){
        hasil = "<td class='taskStatus'><span class='done'>Selesai</span></td>";
    }else if(nilai=="belum"){
        hasil= "<td class='taskStatus'><span class='pending'>Belum di jawab</span></td>";
    }
    return hasil;
}

function konversiTipesoal(nilai){
    var hasil = "";
    if(nilai=="e"){
        hasil="Essai";
    }else if(nilai=="p"){
        hasil = "Pilihan berganda";
    }
    return hasil;
}

function konversiMatkul(nilai){
    var hasil = "";
    if(nilai=="1"){
        hasil="Algoritma dan Pemrograman";
    }else if(nilai=="2"){
        hasil = "Algoritma & Pemrograman 2";
    }else if(nilai=="3"){
        hasil = "Analisis Perancangan";
    }
    return hasil;
}

function nextweek(){
    var today = new Date();
    var nextweek = new Date(today.getFullYear(), today.getMonth(), today.getDate()+7);
    return nextweek;
}

function absensi(nilai){
    var hasil = "";
    if (nilai != 0) {
        hasil = "| Absensi ke - "+nilai;
    } else {
        hasil='';
    }
    return hasil;
}