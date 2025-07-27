<div class="content-wrapper">
	<section class="content-header">
		<div class="col-lg-12 bred">
			 <ol class="breadcrumb">
				<li><a href="<?= site_url("home");?>"><i class="fa fa-dashboard"></i> Dashboard </a></li>
				<li><a href="<?= site_url("DataGuru");?>"> Data Instansi </a></li>
				<li class="active">Edit Data Siswa</li>        
			</ol>
		</div>
	</section>
	
	<section class="container-fluid">
		<div class="row">
			<div class="col-md-8">
				<div class="card">
					<div class="header">
						<h4 class="title"> Edit Data Siswa</h4>
					</div>
					
					<div class="content">
						<form action="<?= site_url("datasiswa/do_edit/".$result->id_siswa);?>" method="post">
							<!-- <div class="alert alert-warning">
								<button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>
								<strong>Warning!</strong> Pastikan Format Tanggal : YYYY-MM-DD
							</div> -->
							
							<div class="form-group">
								<label for="NIS"> NIS </label>
								<input type="text" name="NIS" class="form-control" id="NIS" placeholder="NIS" value="<?php echo @$result->NIS?>" readonly>
							</div>
							
							<div class="form-group">
								<label for="nama_siswa"> NAMA </label>
								<input type="text" name="nama_siswa" class="form-control" id="nama_siswa" placeholder="NAMA" value="<?php echo @$result->nama_siswa?>">
							</div>
							
							<div class="form-group">
								<label for="id_kelas"> KELAS </label>
									<select name="id_kelas" id="id_kelas" class="form-control">
										<?php
											foreach($kelas as $kls){
												echo "<option value='".$kls->id_kelas."'>".$kls->nama_kelas."</option>";
											}
										?>
									</select>
							</div>
							
							<div class="form-group">
								<label for="alamat"> Alamat </label>
								<input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat" value="<?php echo @$result->alamat?>">
							</div>
							
							<div class="form-group">
								<label for="agama"> Agama </label>
								<input type="text" name="agama" class="form-control" id="agama" placeholder="Agama" value="<?php echo @$result->agama?>">
							</div>

							<div class="form-group">
								<label for="no_hp"> NO HP </label>
								<input type="text" name="no_hp" class="form-control" id="no_hp" placeholder="NO HP" value="<?php echo @$result->no_hp?>">
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