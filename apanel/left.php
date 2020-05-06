<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<img src="<?php echo ADMINURL?>assets/images/no_user.png" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p><?php echo isset($_SESSION[SESS_PRE.'_ADMIN_SESS_NAME']) ? $_SESSION[SESS_PRE.'_ADMIN_SESS_NAME'] : "ADMIN"; ?></p>
				<a href="javascript:void(0);"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>
		
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header">MAIN NAVIGATION</li>
			<li <?php if($main_page=="home"){ ?> class="active" <?php }?>>
				<a href="<?php echo ADMINURL?>dashboard/">
					<i class="fa fa-dashboard"></i> <span>Dashboard</span>
				</a>
			</li>
			<?php
				include("../include/left_var.php");		
			?>
			<?php
			$arc = 0;
			foreach($left_main_array as $arr){
			?>
			<li class="treeview">
				<a href="javascript:void(0);">
					<i class="<?php echo $arr[3]; ?>"></i><span> <?php echo $arr[0]; ?> </span> 
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
					<ul class="treeview-menu">
						<?php 
						$trc = 0;
						foreach($arr[2] as $trr){
						?>
						<li><a href="<?php echo ADMINURL.$trr[2]; ?>"><i class="fa fa-circle-o"></i> <?php echo $trr[0]; ?></a></li>
						<?php
						$trc++;
						}
						?>
					</ul>
			</li>
			<?php
			$arc++;
			}
			?>
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>