<div class="wrap">
	<h2><img src="<?php echo WP_PLUGIN_URL; ?>/sb-login/img/icon1.png" alt="SB Login Settings"> SB Login Settings</h2>
	<?php if ( isset($_GET['settings-updated']) && $_GET['settings-updated'] == 'true' ) { 
		echo '<div id="message" class="updated"><p>'. __('Settings saved.') .'</p></div>'.PHP_EOL;
	} ?>

	<div style="width: 68%; float: left;">
		<form method="post" action="options.php">
		<?php
			settings_fields( 'sbl-settings-group' );
			$sbl_option_dash = get_option('sbl_option_dash');
			$sbl_option_lost = get_option('sbl_option_lost');
			$sbl_option_lost = get_option('sbl_option_pro');
			$sbl_option_xtra = get_option('sbl_option_xtra');
			$sbl_option_xtra_c = get_option('sbl_option_xtra_c');
			$sbl_option_xtra_link = get_option('sbl_option_xtra_link');
			$sbl_option_lost = get_option('sbl_option_recent');
			$sbl_option_info = get_option('sbl_option_info');
			$email_name_c = get_option('email_name_c');
			$email_email_c = get_option('email_email_c');
			$email_name = get_option('email_name');
			$email_email = get_option('email_email');
			$sbl_cap_log = get_option('sbl_cap_log');
			$sbl_cap_reg = get_option('sbl_cap_reg');				
		?>
		<div class="postbox" style="display: block;float:left;margin:5px;clear:left; width: 99%;">
			<h3 class="hndle" style="padding:5px; color:#007193;">Show/Add Links</h3>
			<div class="inside">
				<div>
					<table class="form-table">
<tr valign="top">
   							<p><b>If you want to show Captcha form please install <a href="http://wordpress.org/plugins/captcha/" target="_blank">Captcha Plugin</a>. Than it will automatically show Captcha form.</b></p>
   							
   						</tr>
   						<tr valign="top">
   							<th scope="row">Show Dashboard Link:</th>
   							<td><input type="checkbox" name="sbl_option_dash" value="Enabled" <?php if(get_option('sbl_option_dash')==Enabled) echo('checked="checked"'); ?>/></td>
   						</tr>
<tr valign="top">
   							<th scope="row">Show  Lost your password:</th>
   							<td><input type="checkbox" name="sbl_option_lost" value="Enabled" <?php if(get_option('sbl_option_lost')==Enabled) echo('checked="checked"'); ?>/></td>
   						</tr>
<tr valign="top">
   							<th scope="row">Show Profile Link:</th>
   							<td><input type="checkbox" name="sbl_option_pro" value="Enabled" <?php if(get_option('sbl_option_pro')==Enabled) echo('checked="checked"'); ?>/></td>
   						</tr>
<tr valign="top">
   							<th scope="row">Show Recent Activity Tab:</th>
   							<td><input type="checkbox" name="sbl_option_recent" value="Enabled" <?php if(get_option('sbl_option_recent')==Enabled) echo('checked="checked"'); ?>/></td>
   						</tr>
<tr valign="top">
   							<th scope="row">Show Info Tab:</th>
   							<td><input type="checkbox" name="sbl_option_info" value="Enabled" <?php if(get_option('sbl_option_info')==Enabled) echo('checked="checked"'); ?>/></td>
   						</tr>
<tr valign="top">
   							<th scope="row">Show Captcha In Login:</th>
   							<td><input type="checkbox" name="sbl_cap_log" value="Enabled" <?php if(get_option('sbl_cap_log')==Enabled) echo('checked="checked"'); ?>/></td>
   						</tr>
<tr valign="top">
   							<th scope="row">Show Show Captcha In Registration:</th>
   							<td><input type="checkbox" name="sbl_cap_reg" value="Enabled" <?php if(get_option('sbl_cap_reg')==Enabled) echo('checked="checked"'); ?>/></td>
   						</tr>
<tr valign="top">
   							<th scope="row">Add Extra Link:</th>
   							<td><input type="checkbox" name="sbl_option_xtra_c" value="Enabled" <?php if(get_option('sbl_option_xtra_c')==Enabled) echo('checked="checked"'); ?>/></td>
   						</tr>

<tr valign="top">
   							<th scope="row">Add Extra Link:</th>
   							<td><input type="text" name="sbl_option_xtra" value="<?php $sbl_option_xtra = get_option('sbl_option_xtra'); if(!empty($sbl_option_xtra)) {echo $sbl_option_xtra;} else {echo "";}?>" placeholder="Text for Link"><input type="text" name="sbl_option_xtra_link" value="<?php $sbl_option_xtra_link = get_option('sbl_option_xtra_link'); if(!empty($sbl_option_xtra_link)) {echo $sbl_option_xtra_link;} else {echo "";}?>" placeholder="Link address for button"></td>
   						</tr>
<tr><th style="padding: 5px;color:#007193;font-size:16px;border-bottom: 1px solid #EEEEEE;">Email Customization</th></tr>


<tr valign="top">
   							<th scope="row">Customize Email From Name:</th>
   							<td><input type="checkbox" name="email_name_c" value="Enabled" <?php if(get_option('email_name_c')==Enabled) echo('checked="checked"'); ?>/></td>
   						</tr>

<tr valign="top">
   							<th scope="row">Email From Name:</th>
   							<td><input type="text" name="email_name" value="<?php $email_name = get_option('email_name'); if(!empty($email_name)) {echo $email_name;} else {echo "";}?>"></td>
   						</tr>

</tr>
<tr valign="top">
   							<th scope="row">Customize From Email Address:</th>
   							<td><input type="checkbox" name="email_email_c" value="Enabled" <?php if(get_option('email_email_c')==Enabled) echo('checked="checked"'); ?>/></td>
   						</tr>
<tr valign="top">
   							<th scope="row">Email Address From:</th>
   							<td><input type="text" name="email_email" value="<?php $email_email = get_option('email_email'); if(!empty($email_email)) {echo $email_email;} else {echo "";}?>"></td>
   						</tr>

					</table>
					

					<?php submit_button(); ?>	    
				</div>

			</div>
		</div>
		</form>
</div>
<?php echo sbl_sidebar(); ?>