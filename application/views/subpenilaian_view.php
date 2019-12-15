<?php $this->load->view('components/head'); ?>
<?php $this->load->view('components/navbar'); ?>

                    <li >
                        <a class="active-menu"  href="home"><i class="icon-home"></i> Dashboard</a>
                    </li>
                    <!-- ================ -->
                    <li>
                        <a href="#" ><i class="icon-list"></i> Manage materi<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="mahasiswa" > Data Mahasiswa</a>
                            </li>    
                            <li>
                                <a href="absensi" > Absensi</a>
                            </li>
                            <li>
                                <a href="nilai" >Nilai</a>
                            </li>
                        </ul>
                      </li>
                      <!-- ================== -->
                      <li>
                        <a href="#"><i class="icon-list"></i> Manage Matakuliah<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="materi" > Materi</a>
                            </li>
                            <li>
                                <a href="soal">Pertanyaan</a>
                            </li>
                            <li>
                                <a href="diskusi">Forum Diskusi</a>
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
<div id="page-wrapper" >
    <div id="page-inner">
        
        <!-- modal -->
            <div class="modal fade" tabindex="-1" role="dialog" id="form-rubahsoal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header"><h3>Rubah soal</h3></div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="idsoale">ID Soal</label>
                                    <input type="text" id="idsoale" name="idsoale" class="form-control">
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="matkul">Matkul</label>
                                    <select name="matkul" id="matkul" class="form-control">
                                        <option value="matkul1">Matkul1</option>
                                        <option value="matkul2">Matkul2</option>                                            
                                    </select>  
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="tipesoal">Tipe Soal</label>
                                    <select name="tipesoal" id="tipesoal" class="form-control">
                                        <option value="matkul1">Quiz</option>
                                        <option value="matkul2">Tugas</option>
                                        <option value="matkul1">UTS</option>
                                        <option value="matkul2">UAS</option>                                            
                                    </select>  
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="judulsoale">Judul Soal</label>
                                    <input type="text" id="judulsoale" name="judulsoale" class="form-control">
                                </div>
                            </div>
                                <div class="form-group">
                                        <label for="isisoale">Soal Esai</label>
                                        <textarea class="form-control" rows="3" id="isisoale" ></textarea>
                                </div>                                                                                                            
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success">
                            <span class="icon-floppy-disk"></span> Simpan</button>
                            <button class="btn btn-danger" data-dismiss="modal">
                            <span class="icon-remove"></span> Batal</button>
                        </div>
                    </div>
                </div>
            </div> <!-- ./modal rubah-->

            <!-- modal Lihat -->
            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="form-lihatsoal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header"><h3>Lihat soal</h3></div>
                        <div class="modal-body">
                                                                                                                         
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success">
                            <span class="icon-floppy-disk"></span> Simpan</button>
                            <button class="btn btn-danger" data-dismiss="modal">
                            <span class="icon-remove"></span> Batal</button>
                        </div>
                    </div>
                </div>
            </div> <!-- ./modal lihat-->
            
            <div class="page-header">
                <h1><span class="icon-briefcase"></span> 
                    Lihat soal <small>Informasi soal</small></h1> 
            </div>
            <div class="panel panel-success">
                <!-- Default panel contents -->
                <div class="panel-heading"><h4>Daftar soal Online STMIK IBBI</h4></div>
                    <div class="panel-body">
                        <div class="form-inline" style="margin-left:20px; margin-bottom:20px;">
                            <div class="form-group">
                                        <label for="matkul">Matakuliah</label>
                                        <select name="matkul" id="matkul" class="form-control">
                                            <option value="matkul1">Matkul1</option>
                                            <option value="matkul2">Matkul2</option>                                            
                                        </select>                
                                    </div>
                            <div class="form-group">
                                <label for="tipesoal">Tipe Soal</label>
                                <select name="tipesoal" id="tipesoal" class="form-control">
                                    <option value="matkul1">Quiz</option>
                                    <option value="matkul2">Tugas</option>
                                    <option value="matkul1">UTS</option>
                                    <option value="matkul2">UAS</option>                                            
                                </select> 
                            </div>
                        <button id="filter" class="btn btn-primary">Filter</button>
                    </div>
                    <div class="clearfix"></div>
                    <table class="table table-bordered table-striped table-hover"
                        style="margin-top:10px;">
                        <thead>
                            <tr>
                                <th>ID soal</th>
                                <th>Judul soal</th>
                                <th>Matakuliah</th>
                                <th>Tgl Publish</th>
                                <th colspan="3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>M01</td>
                                <td>Pengenalan Logika</td>
                                <td>Algoritma dan Pemrograman</td>
                                <td>07-04-2019</td>
                                <td><button class="btn btn-success btn-block" data-toggle="modal" data-target="#form-lihatsoal">
                                    <span class="icon-eye-open"></span> Lihat</button>
                                </td>
                                <td><button class="btn btn-warning btn-block" data-toggle="modal" data-target="#form-rubahsoal">
                                    <span class="icon-pencil"></span> Rubah</button>
                                </td>
                                <td><button class="btn btn-danger btn-block">
                                    <span class="icon-trash"></span> Hapus</button>
                                </td>
                            </tr>                            
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

<?php $this->load->view('components/foot'); ?>