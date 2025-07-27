<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <title>Login - SMKN 1 KATAPANG</title>

    <link rel="icon" type="image/png" href="<?php echo base_url('media') ?>/assets/img/logosmkn1katapang.png" />
    <link rel="stylesheet" href="<?php echo base_url('media') ?>/assets/css/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="<?php echo base_url('media') ?>/plugins/materialize/css/materialize.min.css" />
    <link rel="stylesheet" href="<?php echo base_url('media') ?>/plugins/SweetAlert/sweetalert.css" />
    <link rel="stylesheet" href="<?php echo base_url('media') ?>/assets/css/demo.css" />

    <style>
        .role-card {
            transition: all 0.3s ease;
            cursor: pointer;
            margin-bottom: 20px;
        }

        .role-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 17px rgba(0, 0, 0, 0.2);
        }

        .role-icon {
            font-size: 4rem;
            margin-bottom: 15px;
        }

        .back-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            z-index: -1;
        }

        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .white-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 40px;
            max-width: 800px;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="back-overlay"></div>

    <div class="login-container">
        <div class="white-card">
            <div class="row">
                <div class="col s12 center-align">
                    <img src="<?php echo base_url('media') ?>/assets/img/logosmkn1katapang.png" alt="Logo"
                        style="width: 80px; margin-bottom: 20px;">
                    <h4>PKG SMKN 1 KATAPANG</h4>
                    <p class="grey-text">Silakan pilih jenis akun Anda</p>
                </div>
            </div>

            <div class="row">
                <div class="col s12 m6 l4">
                    <div class="card role-card center-align hoverable"
                        onclick="window.location='<?= site_url("login/form_login/operator") ?>'">
                        <div class="card-content">
                            <i class="pe-7s-config role-icon blue-text"></i>
                            <h6>Login Sebagai</h6>
                            <h5 class="blue-text">Operator</h5>
                            <p class="grey-text">Mengelola data sistem</p>
                        </div>
                    </div>
                </div>

                <div class="col s12 m6 l4">
                    <div class="card role-card center-align hoverable"
                        onclick="window.location='<?= site_url("login/form_login/penilai") ?>'">
                        <div class="card-content">
                            <i class="pe-7s-note2 role-icon green-text"></i>
                            <h6>Login Sebagai</h6>
                            <h5 class="green-text">Penilai</h5>
                            <p class="grey-text">Melakukan penilaian guru</p>
                        </div>
                    </div>
                </div>

                <div class="col s12 m6 l4">
                    <div class="card role-card center-align hoverable"
                        onclick="window.location='<?= site_url("login/form_login/guru") ?>'">
                        <div class="card-content">
                            <i class="pe-7s-user role-icon orange-text"></i>
                            <h6>Login Sebagai</h6>
                            <h5 class="orange-text">Guru</h5>
                            <p class="grey-text">Melihat hasil penilaian</p>
                        </div>
                    </div>
                </div>

                <div class="col s12 m6 l4">
                    <div class="card role-card center-align hoverable"
                        onclick="window.location='<?= site_url("login/form_login/siswa") ?>'">
                        <div class="card-content">
                            <i class="pe-7s-study role-icon red-text"></i>
                            <h6>Login Sebagai</h6>
                            <h5 class="red-text">Siswa</h5>
                            <p class="grey-text">Melihat data guru</p>
                        </div>
                    </div>
                </div>

                <div class="col s12 m6 l4">
                    <div class="card role-card center-align hoverable"
                        onclick="window.location='<?= site_url("login/form_login/wali_siswa") ?>'">
                        <div class="card-content">
                            <i class="pe-7s-users role-icon purple-text"></i>
                            <h6>Login Sebagai</h6>
                            <h5 class="purple-text">Wali Siswa</h5>
                            <p class="grey-text">Melihat data siswa</p>
                        </div>
                    </div>
                </div>

                <div class="col s12 m6 l4">
                    <div class="card role-card center-align hoverable"
                        onclick="window.location='<?= site_url("login") ?>'">
                        <div class="card-content">
                            <i class="pe-7s-back role-icon grey-text"></i>
                            <h6>Kembali ke</h6>
                            <h5 class="grey-text">Beranda</h5>
                            <p class="grey-text">Halaman utama</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="<?php echo base_url('media') ?>/assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('media') ?>/plugins/SweetAlert/sweetalert.min.js"></script>
<script src="<?php echo base_url('media') ?>/plugins/materialize/js/materialize.min.js"></script>
<script>
    $(document).ready(function () {
        <?php if (!empty($error)) { ?>
            swal("Gagal!", "<?php echo $error ?>", "error");
        <?php } ?>
    });
</script>

</html>