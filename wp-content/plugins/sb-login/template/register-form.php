<form action="<?php echo nd_login_current_url(); ?>" method="post" class="nd_form" autocomplete="off" id="nd_register_form" style="display:none"><div class="nd_form_inner">
	
	<?php
		global $nd_reg_errors;
		if (isset($nd_reg_errors) && sizeof($nd_reg_errors)>0 && $nd_reg_errors->get_error_code()) :
			echo '<ul class="errors">';
			foreach ($nd_reg_errors->errors as $error) {
				echo '<li>'.$error[0].'</li>';
				break;
			}
			echo '</ul>';
		endif; 
	?>
	
	<p><label for="nd_reg_username"><?php _e('Username','sb-login'); ?>:</label> <input type="text" class="text" name="username" id="nd_reg_username" placeholder="<?php _e('Username', 'sb-login'); ?>" /></p>
	<p><label for="nd_reg_email"><?php _e('Email','sb-login'); ?>:</label> <input type="text" class="text" name="email" id="nd_reg_email" placeholder="<?php _e('you@yourdomain.com', 'sb-login'); ?>" /></p>
	<p class="column"><label for="nd_reg_password"><?php _e('Password','sb-login'); ?>:</label> <input type="password" class="text" name="password" id="nd_reg_password" placeholder="<?php _e('Password','sb-login'); ?>" /></p>
	<p class="column column-alt"><label for="nd_reg_password_2" class="hidden"><?php _e('Re-enter','sb-login'); ?>:</label> <input type="password" class="text" name="password2" id="nd_reg_password_2" placeholder="<?php _e('Re-enter Password','sb-login'); ?>" /></p>
<?php if (get_option('sbl_cap_reg')) : ?><p><?php if( function_exists( 'cptch_display_captcha_custom' ) ) { echo "<input type='hidden' name='cntctfrm_contact_action' value='true' />"; echo cptch_display_captcha_custom(); } ?></p><?php endif; ?>		
	<p><input type="submit" class="button" value="<?php _e('Register &rarr;','sb-login'); ?>" /><input name="nd_register" type="hidden" value="true"  /></p>

</div></form>