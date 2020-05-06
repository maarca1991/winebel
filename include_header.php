<header>
	<nav class="navbar navbar-expand navbar-dark px-md-5 align-items-center">
		<a class="navbar-brand" href="<?php echo SITEURL; ?>">
			<img src="<?php echo SITEURL; ?>images/logo.png" class="navbar-logo">
		</a>
		<!-- <button class="navbar-toggler" type="button" data-toggle="collapse"
				data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button> -->
		<div class="loader" style="display:none;">
			<div><img src="<?php echo SITEURL?>images/winebel-loader.gif"></div>
		</div>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto language-menu">
				<li class="language-menu">
	                <select id="lang">
	                    <option value="1" <?php if($_SESSION[SESS_PRE.'_SESS_LANG'] == 1){ echo "selected"; } ?> hidden="<?php if($_SESSION[SESS_PRE.'_SESS_LANG'] == 1){ echo "hidden"; } ?>">EN</option>
	                    <option value="2" <?php if($_SESSION[SESS_PRE.'_SESS_LANG'] == 2){ echo "selected"; } ?>>DE</option>
	                    <option value="3" <?php if($_SESSION[SESS_PRE.'_SESS_LANG'] == 3){ echo "selected"; } ?>>IT</option>
	                    <option value="4" <?php if($_SESSION[SESS_PRE.'_SESS_LANG'] == 4){ echo "selected"; } ?>>FR</option>
	                    <option value="5" <?php if($_SESSION[SESS_PRE.'_SESS_LANG'] == 5){ echo "selected"; } ?>>SP</option>
	                </select>
	            </li>
			</ul>
		</div>
	</nav>
</header>
