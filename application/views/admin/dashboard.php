<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="page-title mb-0 p-0">Dashboard</h3>
                        <div class="d-flex align-items-center">
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <?php $this->load->view('chart') ?>
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12 col-xlg-12">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="#home"
                                        role="tab">Daftar Alumni</a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="home" role="tabpanel">
                                <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}?>
                                    <div class="card-body">
                                        <button class="btn btn-info" type="button" data-toggle="modal" data-target="#tambah" style="color:white; font-weight:bold"><i class="mdi me-2 mdi-plus-circle-outline" style="font-weight: bold;"></i>Tambah</button>
                                        <button class="btn btn-success" type="button" data-toggle="modal" data-target="#import" style="color:white; font-weight:bold"><i class="mdi me-2 mdi-file-excel-box" style="font-weight: bold;"></i>Import</button><hr>
                                        <div class="table-responsive">
                                            <div>
                                                <form style="width: 100%;" method="GET" action="<?= base_url('Admin');?>">
                                                    <div class="input-group">
                                                        <input type="text" name="q" class="border border-primary rounded-100 form-control bg-light small" placeholder="Pencarian" aria-label="Search" aria-describedby="basic-addon2">
                                                        <input type="hidden" name="page" value="1">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-primary" type="submit">
                                                                <i class="fas fa-search fa-sm"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <?= $hasil ?> hasil
                                            <table class="table table-bordered" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            Tanggal
                                                        </th>
                                                        <th>
                                                            Identitas
                                                        </th>
                                                        <th>
                                                            Pekerjaan
                                                        </th>
                                                        <th>
                                                            Alumni
                                                        </th>
                                                        <th>
                                                            Action
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>

                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                <?php foreach($search as $s){ 
                                                    $tgl = date('d-m-Y', strtotime($s->date));    ?>
                                                    <tr>    
                                                        <td>
                                                            <?= $tgl ?>
                                                        </td>
                                                        <td>
                                                            <b>Nama</b><br>
                                                            <?php echo("$s->nama_depan $s->nama_belakang") ?><br><br>
                                                            <b>E-Mail</b><br>
                                                            <?= $s->email ?><br><br>
                                                            <b>No HP(WA)</b><br>
                                                            <?= $s->no_hp ?><br><br>
                                                            <b>Alamat</b><br>
                                                            <?php echo("$s->alamat $s->kode_pos") ?>
                                                        </td>
                                                        <td>
                                                            <b>Pekerjaan</b><br>
                                                            <?= $s->pekerjaan ?><br><br>
                                                            <b>Sektor</b><br>
                                                            <?= $s->sektor ?><br><br>
                                                            <b>Tempat</b><br>
                                                            <?= $s->tempat ?>
                                                        </td>
                                                        <td>
                                                            <b>Angkatan</b><br>
                                                            <?= $s->angkatan ?><br><br>
                                                            <b>Fakultas</b><br>
                                                            <?= $s->fakultas ?><br><br>
                                                            <b>Departemen</b><br>
                                                            <?= $s->departemen ?>
                                                        </td>
                                                        <td>
                                                            <a data-toggle="modal" data-target="#edit<?=$s->id?>" href="#edit<?=$s->id?>">
                                                            <button class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-edit" style="color: white;"></i></button>
                                                            </a>
                                                            <form style="display:inline-block;" method="post" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?');" action="<?= base_url('admin/delete_data_alumni');?>">
                                                            <input type='hidden' name="id" value="<?= $s->id ?>">
                                                            <input type="hidden" name="q" value="<?=$cari?>">
                                                            <input type="hidden" name="page" value="<?=$page?>">
                                                            <button type="Submit" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus">
                                                            <i class="fas fa-fw fa-trash" style="color: white;"></i>
                                                            </button>
                                                            </form>
                                                        </td>
                                                        <div class="modal fade" id="edit<?=$s->id?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel" style="color: black; font-weight:bold">Edit Data Alumni</h5>
                                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>
                                                                    <form role="form" method="post" action="<?= base_url('admin/update_data_alumni');?>" enctype="multipart/form-data">
                                                                    <div class="modal-body">
                                                                        <input type="hidden" name="id" value="<?=$s->id?>">
                                                                        <input type="hidden" name="q" value="<?=$cari?>">
                                                                        <input type="hidden" name="page" value="<?=$page?>">
                                                                        <label style="font-weight: bold; color:black">Nama Depan</label>
                                                                        <textarea class="form-control" rows="2" name="nama_depan" required=""><?=$s->nama_depan?></textarea><br>
                                                                        <label style="font-weight: bold; color:black">Nama Belakang</label>
                                                                        <textarea class="form-control" rows="2" name="nama_belakang" required=""><?=$s->nama_belakang?></textarea><br>
                                                                        <label style="font-weight: bold; color:black">Alamat</label>
                                                                        <textarea class="form-control" rows="2" name="alamat" required=""><?=$s->alamat?></textarea><br>
                                                                        <label style="font-weight: bold; color:black">Kode Pos</label>
                                                                        <input class="form-control" name="kode_pos" type="number" value="<?=$s->kode_pos?>"><br>
                                                                        <label style="font-weight: bold; color:black">Pekerjaan</label>
                                                                        <input class="form-control" name="pekerjaan" value="<?=$s->pekerjaan?>"><br>
                                                                        <label style="font-weight: bold; color:black">Sektor</label>
                                                                        <input class="form-control" name="sektor" value="<?=$s->sektor?>"><br>
                                                                        <label style="font-weight: bold; color:black">Tempat</label>
                                                                        <textarea class="form-control" rows="2" name="tempat"><?=$s->tempat?></textarea><br>
                                                                        <label style="font-weight: bold; color:black">Email</label>
                                                                        <input class="form-control" name="email" type="email" value="<?=$s->email?>"><br>
                                                                        <label style="font-weight: bold; color:black">No. HP(WA)</label>
                                                                        <input class="form-control" name="no_hp" type="number" value="<?=$s->no_hp?>"><br>
                                                                        <label style="font-weight: bold; color:black">Fakultas</label>
                                                                        <select class="form-control" name="fakultas" placeholder="prestasi" required="">
                                                                            <option value="">Please Select</option>
                                                                            <option value="Teknik" <?php echo ($s->fakultas=="Teknik") ? "selected='selected'" : "" ?>>Teknik</option>
                                                                            <option value="Ilmu Sosial dan Ilmu Politik" <?php echo ($s->fakultas=="Ilmu Sosial dan Ilmu Politik") ? "selected='selected'" : "" ?>>Ilmu Sosial dan Ilmu Politik</option>
                                                                            <option value="Kedokteran" <?php echo ($s->fakultas=="Kedokteran") ? "selected='selected'" : "" ?>>Kedokteran</option>
                                                                            <option value="Ekonomika dan Bisnis" <?php echo ($s->fakultas=="Ekonomika dan Bisnis") ? "selected='selected'" : "" ?>>Ekonomika dan Bisnis</option>
                                                                            <option value="Hukum" <?php echo ($s->fakultas=="Hukum") ? "selected='selected'" : "" ?>>Hukum</option>
                                                                            <option value="Perikanan dan Ilmu Kelautan" <?php echo ($s->fakultas=="Perikanan dan Ilmu Kelautan") ? "selected='selected'" : "" ?>>Perikanan dan Ilmu Kelautan</option>
                                                                            <option value="Psikologi" <?php echo ($s->fakultas=="Psikologi") ? "selected='selected'" : "" ?>>Psikologi</option>
                                                                            <option value="Peternakan dan Pertanian" <?php echo ($s->fakultas=="Peternakan dan Pertanian") ? "selected='selected'" : "" ?>>Peternakan dan Pertanian</option>
                                                                            <option value="Ilmu Budaya" <?php echo ($s->fakultas=="Ilmu Budaya") ? "selected='selected'" : "" ?>>Ilmu Budaya</option>
                                                                            <option value="Kesehatan Masyarakat" <?php echo ($s->fakultas=="Kesehatan Masyarakat") ? "selected='selected'" : "" ?>>Kesehatan Masyarakat</option>
                                                                            <option value="Sains dan Matematika" <?php echo ($s->fakultas=="Sains dan Matematika") ? "selected='selected'" : "" ?>>Sains dan Matematika</option>
                                                                            <option value="Sekolah Vokasi" <?php echo ($s->fakultas=="Sekolah Vokasi") ? "selected='selected'" : "" ?>>Sekolah Vokasi</option>
                                                                            <option value="Pasca Sarjana" <?php echo ($s->fakultas=="Pasca Sarjana") ? "selected='selected'" : "" ?>>Pasca Sarjana</option>
                                                                        </select><br>
                                                                        <label style="font-weight: bold; color:black">Departemen</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                                                        <input class="form-control" name="departemen" value="<?=$s->departemen?>" required=""><br>
                                                                        <label style="font-weight: bold; color:black">Angkatan</label>
                                                                        <select class="form-control" name="angkatan">
                                                                            <?php
                                                                            for ($year = (int)date('Y'); 1980 <= $year; $year--): ?>
                                                                            <option value="<?php echo $year; ?>"><?php echo $year; ?> </option>
                                                                            <?php endfor; ?>
                                                                        </select><br>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button class="btn btn-success" type="submit">Submit</button>
                                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                                    </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row">
                                            <div style="text-align:center; width:100%; padding:0;">
                                                <?php if ($previous == 0): ?>

                                                <?php else: 
                                                    $previous = $page-1?>
                                                <form style="display:inline-block;" method="get" action="<?= base_url('admin');?>">
                                                <input type='hidden' name="q" value="<?= $cari ?>">
                                                <input type='hidden' name="page" value="<?= $previous ?>">
                                                <button type="Submit" class="btn btn-primary">
                                                <i class="fa fa-arrow-left"></i>
                                                </button>
                                                </form>
                                                <?php endif; ?>
                                                <button class="btn btn-primary" style="background:none; border:none"><span style="color: black; font-weight:bold"><?=$page?></span></button>
                                                <?php if ($next == 0): ?>
                                                    
                                                <?php else: 
                                                    $next = $page+1?>
                                                <form style="display:inline-block;" method="get" action="<?= base_url('admin');?>">
                                                <input type='hidden' name="q" value="<?= $cari ?>">
                                                <input type='hidden' name="page" value="<?= $next ?>">
                                                <button type="Submit" class="btn btn-primary">
                                                <i class="fa fa-arrow-right"></i>
                                                </button>
                                                </form>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                                                        <!-- Tambah Modal -->
                                                        <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel" style="color: black; font-weight:bold">Tambah Data Alumni</h5>
                                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>
                                                                    <form role="form" method="post" action="<?= base_url('admin/tambah_data_alumni');?>" enctype="multipart/form-data">
                                                                    <div class="modal-body">
                                                                        <label style="font-weight: bold; color:black">Nama Depan</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                                                        <textarea class="form-control" rows="2" name="nama_depan" required=""></textarea><br>
                                                                        <label style="font-weight: bold; color:black">Nama Belakang</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                                                        <textarea class="form-control" rows="2" name="nama_belakang" required=""></textarea><br>
                                                                        <label style="font-weight: bold; color:black">Alamat</label>
                                                                        <textarea class="form-control" rows="2" name="alamat" required=""><?=$s->alamat?></textarea><br>
                                                                        <label style="font-weight: bold; color:black">Kode Pos</label>
                                                                        <input class="form-control" name="kode_pos" type="number" value="<?=$s->kode_pos?>"><br>
                                                                        <label style="font-weight: bold; color:black">Pekerjaan</label>
                                                                        <input class="form-control" name="pekerjaan" ><br>
                                                                        <label style="font-weight: bold; color:black">Sektor</label>
                                                                        <input class="form-control" name="sektor" ><br>
                                                                        <label style="font-weight: bold; color:black">Tempat</label>
                                                                        <textarea class="form-control" rows="2" name="tempat"></textarea><br>
                                                                        <label style="font-weight: bold; color:black">Email</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                                                        <input class="form-control" name="email" type="email" required=""><br>
                                                                        <label style="font-weight: bold; color:black">No. HP(WA)</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                                                        <input class="form-control" name="no_hp" type="number" required=""><br>
                                                                        <select class="form-control" name="fakultas" placeholder="prestasi" required="">
                                                                            <option value="">Please Select</option>
                                                                            <option value="Teknik">Teknik</option>
                                                                            <option value="Ilmu Sosial dan Ilmu Politik">Ilmu Sosial dan Ilmu Politik</option>
                                                                            <option value="Kedokteran">Kedokteran</option>
                                                                            <option value="Ekonomika dan Bisnis">Ekonomika dan Bisnis</option>
                                                                            <option value="Hukum">Hukum</option>
                                                                            <option value="Perikanan dan Ilmu Kelautan">Perikanan dan Ilmu Kelautan</option>
                                                                            <option value="Psikologi">Psikologi</option>
                                                                            <option value="Peternakan dan Pertanian">Peternakan dan Pertanian</option>
                                                                            <option value="Ilmu Budaya">Ilmu Budaya</option>
                                                                            <option value="Kesehatan Masyarakat">Kesehatan Masyarakat</option>
                                                                            <option value="Sains dan Matematika">Sains dan Matematika</option>
                                                                            <option value="Sekolah Vokasi">Sekolah Vokasi</option>
                                                                            <option value="Pasca Sarjana">Pasca Sarjana</option>
                                                                        </select><br>
                                                                        <label style="font-weight: bold; color:black">Departemen</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                                                        <input class="form-control" name="departemen" required=""><br>
                                                                        <label style="font-weight: bold; color:black">Angkatan</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                                                        <select class="form-control" name="angkatan" required="">
                                                                            <?php
                                                                            for ($year = (int)date('Y'); 1990 <= $year; $year--): ?>
                                                                            <option value="<?php echo $year; ?>"><?php echo $year; ?> </option>
                                                                            <?php endfor; ?>
                                                                        </select><br>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button class="btn btn-success" type="submit">Submit</button>
                                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                                    </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Modal Import -->
                                                        <div class="modal fade import" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title h4" id="myLargeModalLabel">Import Data Alumni</h5>
                                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>
                                                                    <form role="form" method="post" action="<?= base_url('admin/import');?>" enctype="multipart/form-data">
                                                                    <div class="modal-body">
                                                                    <h4>Import File CSV</h4>
                                                                    <span style="color: red;">Sebelum mengupload file csv, mohon untuk disesuaikan dengan <a href="<?=base_url('assets/template/template.csv')?>">format terlebih dahulu</a> (perhatikan titik, koma dan titik koma dalam template)</span>
                                                                    <hr>
                                                                    <label>File Csv</label><br>
                                                                    <input type="file" accept=".csv" name="file"><br>
                                                                    <label style="color:red; font-size:12px;">.csv maks 8mb</label><br>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" id="submit" class="btn btn-success">Submit</button>
                                                                    </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Loading Modal-->
                                                        <div class="modal fade" id="loading" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true" data-backdrop="static" data-keyboard="false" >
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content text-center">
                                                                    <div class="modal-header text-center">
                                                                        <h5 class="modal-title text-center" style="color: black; text-align:center" id="exampleModalLabel">Sedang merekam data, mohon tunggu!!</h5>
                                                                    </div>
                                                                    <div class="modal-body"><img id="loading_gif" src="<?= base_url('assets/loading.gif');?>" width="100%"/></div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                                                        <script type="text/javascript"> 
                                                            $(document).ready(function(){
                                                                $('#submit').click(function (e) {
                                                            // e.preventDefault();
                                                            $('#loading').modal('show');
                                                            });
                                                                });
                                                        </script>   
                <!-- ============================================================== -->
                <!-- Table -->
                <!-- ============================================================== -->

                
            </div>