<?php
	$page = $_SESSION['page'];
?>
<nav class="navbar-default navbar-static-side" role="navigation">
	<div class="sidebar-collapse">
		<ul class="nav metismenu" id="side-menu">
			<li class="nav-header">
				<div class="dropdown profile-element"> 
					<span>
						<a href="<?= base_url()?>admin/home">
							<img src="<?= base_url()?>assets_admin/img/logo-large.png" style="width: 100%; border-radius: 4px;" alt="" />
						</a>
					</span>
				</div>
				<div class="logo-element">
					<div>
						<a href="<?= base_url()?>admin/home">
							<img src="<?= base_url()?>assets_admin/img/logo.png" style="width:50px; height:auto; border-radius: 4px;" alt="" />
						</a>
					</div>
				</div>
			</li>
			<li <?php if($page == 'index'){ ?> class="active"<?php } ?>>
				<a href="<?= base_url()?>admin/home"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
			</li>

			<li <?php if($page == 'user'){ ?> class="active"<?php } ?>>
				<a href="<?= base_url()?>admin/users"><i class="fa fa-user"></i> <span class="nav-label">Users</span></a>
			</li>

			<li <?php if($page == 'todo'){ ?> class="active"<?php } ?>>
				<a href="<?= base_url()?>admin/todo"><i class="fa fa-user"></i> <span class="nav-label">Tasks</span></a>
			</li>

			<li <?php if($page == 'todo'){ ?> class="active"<?php } ?>>
				<a href="<?= base_url()?>admin/pending-task"><i class="fa fa-user"></i> <span class="nav-label">Pending Tasks</span></a>
			</li>

			<li <?php if($page == 'todo'){ ?> class="active"<?php } ?>>
				<a href="<?= base_url()?>admin/completed-task"><i class="fa fa-user"></i> <span class="nav-label">Completed Tasks</span></a>
			</li>
			
		</ul>
	</div>
</nav>
