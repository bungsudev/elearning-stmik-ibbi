<?php $this->load->view('components/head'); ?>
<?php $this->load->view('components/navbar'); ?>

<li>
    <a href="home"><i class="icon-home"></i> Dashboard</a>
</li>
<!-- ================ -->
<li>
    <a href="#"><i class="icon-list"></i> Manage Mahasiswa<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li>
            <a href="mahasiswa"> Data mahasiswa</a>
        </li>
        <li>
            <a href="absensi"> Absensi</a>
        </li>
        <li>
            <a href="Nilai">Nilai</a>
        </li>
    </ul>
</li>
<!-- ================== -->
<li class="active">
    <a href="#"><i class="icon-list"></i> Manage Matakuliah<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li>
            <a href="materi"> Materi </a>
        </li>
        <li>
            <a href="soal">Pertanyaan</a>
        </li>
        <li>
            <a href="diskusi" class="active-menu">Forum Diskusi</a>
        </li>
    </ul>
</li>
<!-- =============== -->
<li>
    <a href="admin"><i class="icon-user"></i> Manage Admin</a>
</li>
<li>
    <a href="statistik"><i class="icon-stats"></i>Statistik Pengguna</a>
</li>
</ul>

</div>

</nav>
<!-- /. NAV SIDE  -->
<!-- ========================================================================================================== -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="page-header">
            <h1><span class="icon-briefcase"></span>
                Forum Diskusi <small>Judul Topik</small></h1>
        </div>
        <div class="panel panel-success">
            <!-- Default panel contents -->
            <div class="panel-heading">
                <h4>Forum Diskusi Kelas TI - P1 </h4>
                <h5>Matakuliah : Algoritma</h5>
            </div>
            <div class="panel-body">
                <hr>
                <table>
                    <tr>
                        <td><img class="imgforum" src="assets/img/avatar.jpg" alt=""></td>
                        <td class="boxkomen"><textarea name="" id="" cols="95" rows="6" disabled></textarea></td>
                    </tr>
                    <tr>
                        <td class="profilename">AL AZMI</td>
                    </tr>
                </table>
                <hr>
                <table>
                    <tr>
                        <td><img class="imgforum" src="assets/img/avatar.jpg" alt=""></td>
                        <td class="boxkomen"><textarea name="" id="" cols="95" rows="6" disabled></textarea></td>
                    </tr>
                    <tr>
                        <td class="profilename">AL AZMI</td>
                    </tr>
                </table>
                <hr>
                <table>
                    <tr valign="top">
                        <td width="150px">&nbsp;</td>
                        <td width="175px"><strong>Komentar</strong></td>
                        <td><textarea name="komen" cols="99%" rows="5"></textarea>
                            <!-- <input name="" value="1832" > -->
                        </td>

                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <hr>
                            <button class="btn btn-success pull-right">
                                <span class="icon-floppy-disk"></span> Kirim</button>
                        </td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
</div>

<?php $this->load->view('components/foot'); ?>