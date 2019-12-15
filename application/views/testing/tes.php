html += "<table class='fontsoal' style='width:500px; font-size:15px;'>"+
                            "<tr>"+
                                "<td style='width:50px;'><strong>NIM</strong></td>"+
                                "<td style='width:180px;'>: <?= $this->session->userdata('ses_id')?></td>"+
                                "<td style='width:100px;'><strong>Tipe Soal</strong></td>"+
                                "<td>: <span id='tipesoal'>UTS - Essai</span></td>"+
                            "</tr>"+
                            "<tr>"+
                                "<td style='width:50px;'><strong>Nama</strong></td>"+
                                "<td style='width:180px;'>: <?= $this->session->userdata('ses_nama')?></td>"+
                                "<td style='width:100px;'><strong>Tanggal kirim</strong></td>"+
                                "<td>: <span id='tipesoal'>12:12:12</span></td>"+
                            "</tr>"+
                            "<tr>"+
                                "<td style='width:50px;'><strong>ID Soal</strong></td>"+
                                "<td style='width:180px;'>: 1</td>"+
                                "<td style='width:100px;'><strong>Tanggal nilai</strong></td>"+
                                "<td>: <span id='tipesoal'>12:12:12</span></td>"+
                            "</tr>"+
                            "<tr>"+
                                "<td style='width:50px;'><strong>Matkul</strong></td>"+
                                "<td style='width:180px;' colspan='3'>: Algoritma dan pemrograman</td>"+
                            "</tr>"+
                        "</table>"+
                        "<hr>"+
                        "<table class='fontsoal' style='width:500px; font-size:32px; margin-top:20px; text-align:center;'>"+
                            "<tr>"+
                                "<td><strong>Nilai : 90</strong></td>"+
                            "</tr>"+
                        "</table>"+
                        "<hr>";