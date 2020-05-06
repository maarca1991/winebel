<!-- Logo -->
<a href="<?php echo ADMINURL?>" class="logo">
	<!-- mini logo for sidebar mini 50x50 pixels -->
	<span class="logo-mini"><b>WLS</b></span>
	<!-- logo for regular state and mobile devices -->
	<span class="logo-lg" style="font-size: 19px !important;"><b><?php echo SITETITLE; ?></b></span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top">
  <!-- Sidebar toggle button-->
	<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
		<span class="sr-only">Toggle navigation</span>
	</a>
  <!-- Navbar Right Menu -->
  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <!-- User Account: style can be found in dropdown.less -->
      <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <img src="<?php echo ADMINURL?>assets/images/no_user.png" class="user-image" alt="User Image">
          <span class="hidden-xs"><?php echo isset($_SESSION[SESS_PRE.'_ADMIN_SESS_NAME']) ? $_SESSION[SESS_PRE.'_ADMIN_SESS_NAME'] : "ADMIN"; ?></span>
        </a>
        <ul class="dropdown-menu">
          <!-- User image -->
          <li class="user-header">
            <img src="<?php echo ADMINURL?>assets/images/no_user.png" class="img-circle" alt="User Image">
            <p>Hi, <?php echo isset($_SESSION[SESS_PRE.'_ADMIN_SESS_NAME']) ? $_SESSION[SESS_PRE.'_ADMIN_SESS_NAME'] : "ADMIN"; ?></p>
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            <div class="pull-left">
              <a href="<?php echo ADMINURL?>my-account/" class="btn btn-default btn-flat">Profile</a>
            </div>
            <div class="pull-right">
              <a href="<?php echo ADMINURL?>logout/" class="btn btn-default btn-flat">Sign out</a>
            </div>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</nav>