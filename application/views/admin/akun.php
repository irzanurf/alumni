<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="page-title mb-0 p-0">Akun</h3>
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
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12 col-xlg-12">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="#home"
                                        role="tab">Daftar Akun</a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="home" role="tabpanel">
                                <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}?>
                                    <div class="card-body">
                                        <button class="btn btn-info" type="button" data-toggle="modal" data-target="#tambah" style="color:white; font-weight:bold"><i class="mdi me-2 mdi-plus-circle-outline" style="font-weight: bold;"></i>Tambah</button>
                                        <div class="table-responsive">
                                            
                                            <table class="table table-bordered" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            Username
                                                        </th>
                                                        <th>
                                                            Fakultas
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
                                                <?php foreach($akun as $a){ ?>
                                                    <tr>    
                                                        <td>
                                                            <?= $a->username ?>
                                                        </td>
                                                        <td>
                                                            <?= $a->fakultas ?>
                                                        </td>
                                                        <td>
                                                            <form style="display:inline-block;" method="get" action="<?= base_url('admin/passakun');?>">
                                                            <input type='hidden' name="username" value="<?= $a->username ?>">
                                                            <button type="Submit" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="fas fa-fw fa-edit" style="color: white;"></i>
                                                            </button>
                                                            </form>

                                                            <form style="display:inline-block;" method="post" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?');" action="<?= base_url('admin/delete_akun');?>">
                                                            <input type='hidden' name="username" value="<?= $a->username ?>">
                                                            <button type="Submit" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus">
                                                            <i class="fas fa-fw fa-trash" style="color: white;"></i>
                                                            </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
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
                                                                        <h5 class="modal-title" id="exampleModalLabel" style="color: black; font-weight:bold">Tambah Akun</h5>
                                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>
                                                                    <form autocomplete="off" role="form" method="post" action="<?= base_url('admin/insert_akun');?>" enctype="multipart/form-data">
                                                                    <div class="modal-body">
                                                                        <label style="font-weight: bold; color:black">Username</label>
                                                                        <input class="form-control" name="username" required><br>
                                                                        <label style="font-weight: bold; color:black">Fakultas</label>
                                                                        <input class="form-control" name="fakultas" required><br>
                                                                        <label style="font-weight: bold; color:black">Password</label>
                                                                        <input class="form-control" type="password" name="password" required><br>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button class="btn btn-success" type="submit">Submit</button>
                                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                                    </div>
                                                                    </form>
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