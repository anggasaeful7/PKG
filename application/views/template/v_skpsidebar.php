<div class="sidebar" data-color="red" data-image="<?php echo base_url('media')?>/assets/img/sidebar.png">

<!--

	Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
	Tip 2: you can also add an image using data-image tag

-->

	<div class="sidebar-wrapper">
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
			<li>
				<a href="<?= site_url("Home")?>">
					<i class="pe-7s-graph"></i>
					<p>Dashboard</p>
				</a>
			</li>
			
			<li class="<?php if(@$nilskp){echo 'active';}?>">
				<a href="<?= site_url("Penilaianskp")?>">
					<i class="pe-7s-news-paper"></i>
					<p>Penilaian SKP</p>
				</a>
			</li>
			
			<li class="<?php if(@$rekap){echo 'active';}?>">
				<a href="<?= site_url("Rekapskp")?>">
					<i class="pe-7s-paperclip"></i>
					<p>Rekap SKP</p>
				</a>
			</li>
		</ul>
	</div>
</div>