<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
		
		<title>SMKN 1 KATAPANG</title>
		
		<link rel="icon" type="image/png" href="<?php echo base_url('media')?>/assets/img/logosmkn1katapang.png"/>
		<link rel="stylesheet" href="<?php echo base_url('media')?>/assets/css/pe-icon-7-stroke.css"/>
		<link rel="stylesheet" href="<?php echo base_url('media')?>/plugins/materialize/css/materialize.min.css"/>
		<link rel="stylesheet" href="<?php echo base_url('media')?>/plugins/SweetAlert/sweetalert.css"/>
		<link rel="stylesheet" href="<?php echo base_url('media')?>/assets/css/demo.css"/>
	</head>

    <body>
		<div class="slider fullscreen">
			<ul class="slides">
				<li>
					<img src="<?php echo base_url('media')?>/assets/img/fotosekolah.jpg"/>
					<div class="caption center-align">
						<h3>Selamat Datang!</h3>
						<h5 class="light grey-text text-lighten-3">SMKN 1 KATAPANG</h5>
						<a href="<?= site_url('login/pilih_role') ?>" class="btn-flat bg-aqua waves-effect waves-light">Login</a>
					</div>
				</li>
				<li>
					<img src="<?php echo base_url('media')?>/assets/img/fotosekolah-1.jpg"/>
					<div class="caption left-align">
						<h3>Penilaian Kinerja Guru</h3>
						<h5 class="light grey-text text-lighten-3">SMKN 1 KATAPANG</h5>
						<a href="<?= site_url('login/pilih_role') ?>" class="btn-flat bg-green waves-effect waves-light">Login</a>
					</div>
				</li>
				<li>
					<img src="<?php echo base_url('media')?>/assets/img/fotosekolah-2.jpg"/>
					<div class="caption right-align">
						<h3>Sasaran Kerja Pegawai</h3>
						<h5 class="light grey-text text-lighten-3">SMKN 1 KATAPANG</h5>
						<a href="<?= site_url('login/pilih_role') ?>" class="btn-flat bg-yellow waves-effect waves-light">Login</a>
					</div>
				</li>
			</ul>
		</div>
    </body>
	
	<script src="<?php echo base_url('media')?>/assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url('media')?>/plugins/SweetAlert/sweetalert.min.js"></script>
	<script src="<?php echo base_url('media')?>/plugins/materialize/js/materialize.min.js"></script>
	<script>
    $(document).ready(function(){
		$('.slider').slider({full_width: true});
		<?php if(!empty($error)){?>
			swal("Gagal!", "<?php echo $error ?>", "error");
		<?php }?>
    });
    </script>
</html>