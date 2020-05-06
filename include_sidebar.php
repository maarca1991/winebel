<div class="sidebar">
	<div class="user">
		<span><?php echo E; ?></span>
	</div>
	<ul class="nav flex-column">
		<li>
			<a href="<?php echo SITEURL.'upload-label/' ?>" class="<?php if("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" == SITEURL.'upload-label/'){ echo "active"; } ?>" >
				<i class="ti-plus"></i>
			</a>
			<span class="menu-item"><?php echo UPLOAD_LABEL; ?></span>
		</li>
		<li>
			<a href="<?php echo SITEURL.'label/' ?>" class="<?php if("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" == SITEURL.'label/'){ echo "active"; } ?>">
				<i class="ti-layout-width-default"></i>
			</a>
			<span class="menu-item"><?php echo MY_LABELS; ?></span>
		</li>
		<li>
			<a href="<?php echo SITEURL.'cart/' ?>" class="<?php if("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" == SITEURL.'cart/'){ echo "active"; } ?>">
				<i class="ti-shopping-cart"></i>
			</a>
			<span class="menu-item"><?php echo CART; ?></span>
		</li>
		<li>
			<a href="<?php echo SITEURL.'order/' ?>" class="<?php if("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" == SITEURL.'order/'){ echo "active"; } ?>">
				<i class="ti-layout-list-thumb"></i>
			</a>
			<span class="menu-item"><?php echo ORDER_HISTORY; ?></span>
		</li>
		<li>
			<a href="<?php echo SITEURL; ?>" class="<?php if("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" == SITEURL){ echo "active"; } ?>">
				<i class="ti-user"></i>
			</a>
			<span class="menu-item"><?php echo USER_PROFILE; ?></span>
		</li>
		<li>
			<a href="<?php echo SITEURL.'change-password/' ?>"  class="<?php if("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" == SITEURL.'change-password/'){ echo "active"; } ?>" >
				<i class="ti-lock"></i>
			</a>
			<span class="menu-item"><?php echo CHANGE_PASSWORD; ?></span>
		</li>

	</ul>
	<ul class="nav flex-column mt-auto">
		<li>
			<a href="<?php echo SITEURL.'logout/'; ?>">
				<i class="ti-power-off"></i>
			</a>
			<span class="menu-item"><?php echo LOG_OUT; ?></span>
		</li>
	</ul>
</div>