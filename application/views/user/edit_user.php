<section class="content-header">
    <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0">Rincian User</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <?php if ($this->session->userdata('level') == "Admin") {
                $home = 'dashboard_controllers/Administrator';
            } else {
                $home = 'dashboard_controllers/User';
            };
            ?>
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= site_url($home) ?>">Beranda</a></li>
                <li class="breadcrumb-item"><a href="<?= site_url('User') ?>">Manajemen User</a></li>
                <li class="breadcrumb-item active">Rincian User</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</section>

<style>
    overflow {
        display: block;
        width: 112px;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        text-align: left;
    }

    overflow_th {
        display: block;
        text-align: center;
    }

    .first-column {
        width: 40%;
        float: left;
    }

    .second-column {
        width: 40%;
        float: right;
    }
</style>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-info">
                <?php $no = 1;
                foreach ($user_data as $user) : ?>
                    <div class="card-header">
                        <h3 class="card-title"><?php echo $user->nama; ?></h3>
                    </div>
                    <br>
                    <div class="card-body">
                        <div class="m-4 justify-content-center">
                            <div class="scrollable_item_form">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form method="post" action="<?php echo base_url() . 'User/simpan_edit_user/' . $user->id_user ?>">
                                                <div class="first-column">
                                                    <div class="form-group">
                                                        <input type="hidden" name="id_user" id="id_user" class="form-control" value="<?php echo $user->id_user; ?>" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Nama User</label>
                                                        <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $user->nama; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Nama Instansi</label>
                                                        <input type="text" name="nama_instansi" id="nama_instansi" class="form-control" value="<?php echo $user->nama_instansi; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Level</label>
                                                        <select name="level" class="form-control" value="<?php echo $user->level; ?>" required>
                                                            <option value="Admin">Admin</option>
                                                            <option value="Marketing">Marketing</option>
                                                            <option value="Mitra">Mitra</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Alamat</label>
                                                        <input type="text" name="alamat" id="alamat" class="form-control" value="<?php echo $user->alamat; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Nomor Handphone</label>
                                                        <input type="number" name="no_hp" id="no_hp" class="form-control" value="<?php echo $user->no_hp; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Username</label>
                                                        <input type="text" name="username" id="username" class="form-control" value="<?php echo $user->username; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input type="text" name="password" id="password" class="form-control" value="<?php echo $user->password; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="hidden" id="profile_pic" name="profile_pic" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="second-column">
                                                    <div class="form-group">
                                                        <div class="container" align="center">
                                                            <br />
                                                            <h3 align="center">Foto Profil</h3>
                                                            <br />
                                                            <div class="row">
                                                                <div class="col-md-4">&nbsp;</div>
                                                                <div class="col-md-4">
                                                                    <div class="image_area">
                                                                        <form method="post">
                                                                            <label for="upload_image">
                                                                                <img src="<?= base_url() ?><?php echo $user->profile_pic; ?>" id="uploaded_image" class="img-responsive img-circle" />
                                                                                <div class="overlay">
                                                                                    <div class="text">Input Foto Profil</div>
                                                                                </div>
                                                                                <input type="file" class="image" id="upload_image" style="display:none">
                                                                            </label>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog modal-lg" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="modalLabel">Crop Image Before Upload</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">×</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="img-container">
                                                                                    <div class="row">
                                                                                        <div class="col-md-8">
                                                                                            <img id="sample_image" />
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <div class="preview"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                                <button type="button" class="btn btn-primary" id="crop">Crop</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer right">
                                                            <button type="submit" class="btn btn-outline-success fa fa-save"> Simpan</button>
                                                        </div>
                                            </form>
                                        <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
</section>