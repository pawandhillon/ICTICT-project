<?php
 if (is_user_logged_in()) : 
	
	global $current_user;
	$current_user = wp_get_current_user();
	?>

	<ul class="nd_tabs">
		<li class="active"><a href="#nd_user"><?php echo $current_user->user_login; ?></a></li>
		<?php if(get_option('sbl_option_recent')==Enabled) { echo '<li><a href="#nd_recently_viewed">'.__('Activity', 'sb-login').'</a></li>'; } else { echo ''; } ?>
<?php if (get_option('sbl_option_info')) : ?><li><a href="#sb_info"><?php _e('Info', 'sb-login'); ?></a></li><?php endif; ?>
	</ul>
	
<?php else : ?>

	<ul class="nd_tabs">
		<li class="active"><a href="#nd_login_form"><?php _e('Login', 'sb-login'); ?></a></li>
		<?php if (get_option('users_can_register')) : ?><li><a href="#nd_register_form"><?php _e('Register', 'sb-login'); ?></a></li><?php endif; ?>
	</ul>

<?php endif; ?>