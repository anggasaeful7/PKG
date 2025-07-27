<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <title>Login <?= ucfirst(str_replace('_', ' ', $role)) ?> - SMKN 1 KATAPANG</title>

    <link rel="icon" type="image/png" href="<?php echo base_url('media') ?>/assets/img/logosmkn1katapang.png" />
    <link rel="stylesheet" href="<?php echo base_url('media') ?>/assets/css/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="<?php echo base_url('media') ?>/plugins/materialize/css/materialize.min.css" />
    <link rel="stylesheet" href="<?php echo base_url('media') ?>/plugins/SweetAlert/sweetalert.css" />
    <link rel="stylesheet" href="<?php echo base_url('media') ?>/assets/css/demo.css" />

    <style>
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
            max-width: 450px;
            width: 100%;
        }

        .role-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .role-icon {
            font-size: 4rem;
            margin-bottom: 15px;
        }

        .btn-login {
            width: 100%;
            margin-top: 20px;
            border-radius: 25px;
            height: 50px;
            line-height: 50px;
            padding: 0;
        }

        .input-field {
            margin-bottom: 25px;
        }
    </style>
</head>

<body>
    <div class="back-overlay"></div>

    <div class="login-container">
        <div class="white-card">
            <div class="role-header">
                <img src="<?php echo base_url('media') ?>/assets/img/logosmkn1katapang.png" alt="Logo"
                    style="width: 80px; margin-bottom: 20px;">

                <?php
                $role_config = array(
                    'operator' => array('icon' => 'pe-7s-config', 'color' => 'blue-text', 'title' => 'Operator'),
                    'penilai' => array('icon' => 'pe-7s-note2', 'color' => 'green-text', 'title' => 'Penilai'),
                    'guru' => array('icon' => 'pe-7s-user', 'color' => 'orange-text', 'title' => 'Guru'),
                    'siswa' => array('icon' => 'pe-7s-study', 'color' => 'red-text', 'title' => 'Siswa'),
                    'wali_siswa' => array('icon' => 'pe-7s-users', 'color' => 'purple-text', 'title' => 'Wali Siswa')
                );

                $current_role = $role_config[$role];
                ?>

                <i class="<?= $current_role['icon'] ?> role-icon <?= $current_role['color'] ?>"></i>
                <h5 class="<?= $current_role['color'] ?>">Login <?= $current_role['title'] ?></h5>
                <p class="grey-text">Masukkan username dan password Anda</p>
            </div>

            <form action="<?= site_url("Login/do_login") ?>" method="POST">
                <input type="hidden" name="role" value="<?= $role ?>">

                <div class="input-field">
                    <i class="pe-7s-user prefix <?= $current_role['color'] ?>"></i>
                    <input id="username" type="text" name="username" class="validate" required>
                    <label for="username">
                        <?php
                        switch ($role) {
                            case 'guru':
                                echo 'NIP / Username';
                                break;
                            case 'siswa':
                                echo 'NIS';
                                break;
                            default:
                                echo 'Username';
                                break;
                        }
                        ?>
                    </label>
                </div>

                <div class="input-field">
                    <i class="pe-7s-door-lock prefix <?= $current_role['color'] ?>"></i>
                    <input id="password" type="password" name="password" class="validate" required>
                    <label for="password">Password</label>
                </div>

                <button
                    class="btn waves-effect waves-light btn-login <?= str_replace('-text', '', $current_role['color']) ?>"
                    type="submit">
                    Masuk Sebagai <?= $current_role['title'] ?>
                    <i class="pe-7s-paper-plane right"></i>
                </button>
            </form>

            <div class="center-align" style="margin-top: 30px;">
                <a href="<?= site_url('login/pilih_role') ?>" class="btn-flat grey-text">
                    <i class="pe-7s-back left"></i>
                    Kembali ke Pilihan Role
                </a>
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