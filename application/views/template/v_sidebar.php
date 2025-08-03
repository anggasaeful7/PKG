<div class="sidebar lazy" data-color="red" data-image="<?php echo base_url('media')?>/assets/img/sidebar.png">

<!--

	Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
	Tip 2: you can also add an image using data-image tag

-->

	<div class="sidebar-wrapper" style="height: auto;">
		<div class="logo">
			<a href="#" class="simple-text">
				SMKN 1 KATAPANG
			</a>
		</div>
		
		<div class="cardi">
            <div class="content">
                <div class="text-center image">
				<?php if(empty($this->session->userdata('image'))){?>
					<img class="avatar img-circle" src="<?php echo base_url('media')?>/assets/img/faces/face-0.jpg" alt="..."/>
				<?php }else{ ?>
					<img class="avatar img-circle" src="<?php echo base_url('media')?>/assets/img/users/<?= $this->session->userdata('image');?>" alt="..."/>
                <?php } ?>
				</div>
				<div class="info">
					<h4 class="title text-center"><?= $this->session->userdata('nama');?></h4>
				</div>
            </div>
        </div>
		
		<ul class="nav">
			<li class="<?php if(@$home){echo 'active';}?>">
				<a href="<?= site_url("Home")?>">
					<i class="pe-7s-graph"></i>
					<p>Dashboard</p>
				</a>
			</li>
			
			<li class="<?php if(@$vprofil){echo 'active';}?>">
				<a href="<?= site_url("Profil")?>">
					<i class="pe-7s-user"></i>
					<p>Profil</p>
				</a>
			</li>
			
			<?php if($this->session->userdata('level')==1){?>
			<li class="<?php if(@$vadmin){echo 'active';}?>">
				<a href="<?= site_url("DataGuru")?>">
					<i class="pe-7s-note2"></i>
					<p>Data Instansi</p>
				</a>
			</li>
			<?php } ?>
			
			<?php if($this->session->userdata('level')==2){?>
			<li>
				<a href="<?= site_url("Penilaian/index/").$id_guru?>">
					<i class="pe-7s-notebook"></i>
					<p>Penilaian PKG</p>
				</a>
			</li>
			
			<li>
				<a href="<?= site_url("Penilaianskp")?>">
					<i class="pe-7s-ribbon"></i>
					<p>Penilaian SKP</p>
				</a>
			</li>
			<?php } ?>
			
			<?php if($this->session->userdata('level')==4){?>
			<li>
				<a href="<?= site_url("Penilaiansiswa")?>">
					<i class="pe-7s-ribbon"></i>
					<p>Penilaian Guru Oleh Siswa</p>
				</a>
			</li>
			<?php } ?>
			
			<?php if($this->session->userdata('level')==5){?>
			<li>
				<a href="<?= site_url("Penilaianskp")?>">
					<i class="pe-7s-ribbon"></i>
					<p>Penilaian Guru Oleh Wali Siswa</p>
				</a>
			</li>
			<?php } ?>
		</ul>
	</div>
</div>