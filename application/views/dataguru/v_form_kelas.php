<div class="content-wrapper">
	<section class="content-header">
		<div class="col-lg-12 bred">
			 <ol class="breadcrumb">
				<li><a href="<?= site_url("home");?>"><i class="fa fa-dashboard"></i> Dashboard </a></li>
				<li><a href="<?= site_url("DataGuru");?>"> Data Instansi </a></li>
				<li class="active">Edit Data Kelas</li>        
			</ol>
		</div>
	</section>
	
	<section class="container-fluid">
		<div class="row">
			<div class="col-md-8">
				<div class="card">
					<div class="header">
						<h4 class="title"> Edit Data Kelas</h4>
					</div>
					
					<div class="content">
						<form action="<?= site_url("datakelas/do_edit/".$result->id_kelas);?>" method="post">
							<!-- <div class="alert alert-warning">
								<button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>
								<strong>Warning!</strong> Pastikan Format Tanggal : YYYY-MM-DD
							</div> -->
							
							<div class="form-group">
								<label for="nama_kelas"> NAMA KELAS</label>
								<input type="text" name="nama_kelas" class="form-control" id="nama_kelas" placeholder="NAMA KELAS" value="<?php echo @$result->nama_kelas?>">
							</div>
							
							<div class="pull-right">
								<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">Submit</button>
							</div>
                            <div class="clearfix"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

</div>