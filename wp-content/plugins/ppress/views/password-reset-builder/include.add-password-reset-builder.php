<?php
require_once VIEWS . '/include.settings-page-tab.php';

$default_password_reset_structure = '<div>

<p>
Please enter your username or email address.
You will receive a link to create a new password via email.

[user-login id="login" placeholder="Username or E-mail:" class="user-login"]
</p>


<p>
[reset-submit value="Reset Password" class="submit" id="submit-button"]
</p>

</div>';

$default_password_reset_css = '/* css class for the password reset form generated errors */

.profilepress-reset-status {
color: #ffffff;
background-color: #34495e;
padding: 2px 3px;
margin: 4px 1px;
}';
?>
<br/>
<a class="button-secondary" href="?page=<?php echo PASSWORD_RESET_BUILDER_SETTINGS_PAGE_SLUG; ?>" title="Back to Catalog">Back to Catalog</a>

<div id="poststuff" class="ppview">
	<div id="post-body" class="metabox-holder columns-2">
		<div id="post-body-content">
			<div class="meta-box-sortables ui-sortable">
				<form method="post">
					<div class="postbox">
						<div class="handlediv" title="Click to toggle"><br></div>
						<h3 class="hndle ui-sortable-handle"><span>Add New Password Reset</span></h3>

						<div class="inside">
							<table class="form-table">
								<tr>
									<th scope="row"><label for="title">Theme Name</label></th>
									<td>
										<input type="text" id="title" name="prb_title" class="regular-text code" value="<?php echo isset( $_POST['prb_title'] ) ? esc_attr( $_POST['prb_title'] ) : ''; ?>" required="required"/>

										<p class="description">This is the internal title of your
											<strong>Password Reset</strong> for easy reference..</p>
									</td>
								</tr>

								<tr>
									<th scope="row"><label for="structure">Password Reset Design</label>
									</th>
									<td>
										<?php
										$content        = isset( $_POST['prb_structure'] ) ? stripslashes( $_POST['prb_structure'] ) : $default_password_reset_structure;
										$editor_id      = 'pp_password_structure';
										$wp_editor_args = array(
											'textarea_name' => 'prb_structure',
											'textarea_rows' => 20,
											'wpautop'       => true,
											'teeny'         => false,
											'tinymce'       => false
										);
										wp_editor( $content, $editor_id, $wp_editor_args ); ?>
										<p class="description">Password Reset Design & Structure</p>
									</td>
								</tr>
							</table>

							<p>
								<?php wp_nonce_field( 'add_password_reset_builder' ); ?>
								<input class="button-primary" type="submit" name="add_password_reset" value="<?php _e( 'Save Changes', 'profilepress' ); ?>">
							</p>
						</div>
					</div>

					<div style="margin-top: -5px;" class="postbox">
						<div class="handlediv" title="Click to toggle"><br></div>
						<h3 class="hndle ui-sortable-handle" style="font-size: 18px;text-align: center"><span>Password Reset Form Preview</span></h3>

						<div class="inside">
							<iframe width="100%" height="500px" id="indexIframe" src="<?php echo admin_url( 'admin-ajax.php?action=pp-builder-preview' ); ?>"></iframe>
							<img style="display:none" id="loadingimg" src="<?php echo ASSETS_URL; ?>/images/loading.gif"/> &nbsp;&nbsp;
							<a style="text-align: center" class="button-secondary" id="preview_iframe">Preview Design</a>
						</div>
					</div>

					<div style="margin-top: -15px;" class="postbox">
						<div class="inside">
							<table class="form-table">
								<tr>
									<th scope="row"><label for="description">CSS Stylesheet</label>
									</th>
									<td>
										<textarea rows="30" name="prb_css" id="description"><?php echo isset( $_POST['prb_css'] ) ? stripslashes( $_POST['prb_css'] ) : $default_password_reset_css; ?></textarea>
										<p class="description">CSS Stylesheet for the Password Reset</p>
									</td>
								</tr>
								<tr>
									<th scope="row">
										<label for="message_success">Message on successful password reset</label>
									</th>
									<td>
										<textarea name="prb_success_password_reset" id="message_success"><?php echo isset( $_POST['prb_success_password_reset'] ) ? $_POST['prb_success_password_reset'] : 'Check your e-mail for further instruction.'; ?></textarea>

										<p class="description">Message to display on successful user password reset </p>
									</td>
								</tr>
							</table>
						</div>
					</div>

					<div style="margin-top: -15px;" class="postbox">
						<div class="inside">
							<table class="form-table">
								<tr>
									<th scope="row"><label for="description">Create Widget</label>
									</th>
									<td>
										<input type="checkbox" disabled="disabled" name="prb_make_widget" id="make-login-widget" value="yes" />
										<label for="make-login-widget"><strong>Make this a Widget</strong></label>

										<p class="description">Available in	<a href="http://profilepress.net/features/one-click-wordpress-widget-creation/" target="_blank">premium version</a> of the plugin</p>
									</td>
								</tr>
							</table>
							<p>
								<?php wp_nonce_field( 'add_password_reset_builder' ); ?>
								<input class="button-primary" type="submit" name="add_password_reset" value="<?php _e( 'Save Changes', 'profilepress' ); ?>">
							</p>
						</div>
					</div>
				</form>
			</div>
		</div>
		<?php include_once VIEWS . '/include.plugin-settings-sidebar.php'; ?>
	</div>
	<br class="clear">
</div>

<script type="text/javascript">
	var codemirror_editor = CodeMirror.fromTextArea(document.getElementById("description"), {lineNumbers: true});

	(function ($) {
		window.onbeforeunload = function (e) {
			return 'The changes you made will be lost if you navigate away from this page.';
		};

		$('input[type="submit"]').click(function () {
			window.onbeforeunload = function (e) {
				e = null;
			};
		});

		$(window).load(function () {
			/* Check if TinyMCE visual or TinyMCE is active. Note: the text version doesn't load TinyMCE JS object */
			var is_tinymce_rich = (typeof tinyMCE != "undefined") && tinyMCE.activeEditor && !tinyMCE.activeEditor.isHidden();

			// if Tinymce is in visual mode
			if (is_tinymce_rich) {
				// detect if change even is fired in TinyMCE visual
				tinymce.activeEditor.on('change', function (e) {
					window.onbeforeunload = function (e) {
						return 'The changes you made will be lost if you navigate away from this page.';
					};
				});
			}
			else {
				// if TinyMCE is in text mode
				$('#pp_password_structure').on('change', function (e) {
					window.onbeforeunload = function (e) {
						return 'The changes you made will be lost if you navigate away from this page.';
					};
				});
			}

			/* If TinyMCE visual is active, get the content using "tinymce" JS object otherwise use jQuery to get the Text version content */
			var raw_builder_structure = is_tinymce_rich ? tinymce.get('pp_password_structure').getContent() : $('#pp_password_structure').val();

			$.ajax({
				type: "POST",
				url: ajaxurl,
				data: {
					builder_structure: raw_builder_structure,
					action: 'pp-builder-preview'
				}
			})
				.done(function (builder_structure) {

					var builder_css = codemirror_editor.getValue();
					var iframe1 = $('#indexIframe').contents();

					$(iframe1).contents().find('body').html(builder_structure);
					$(iframe1).contents().find('style').html(builder_css);
				});

			$('input[type="submit"]').click(function () {
				window.onbeforeunload = function (e) {
					e = null;
				};
			});
		});

		$('#preview_iframe').click(function () {
			var is_tinymce_rich = (typeof tinyMCE != "undefined") && tinyMCE.activeEditor && !tinyMCE.activeEditor.isHidden();
			var raw_builder_structure = is_tinymce_rich ? tinymce.get('pp_password_structure').getContent() : $('#pp_password_structure').val();
			var builder_css = codemirror_editor.getValue();
			var iframe1 = $('#indexIframe').contents();

			// show pre-loader
			$("#loadingimg").show();

			$.ajax({
				type: "POST",
				url: ajaxurl,
				data: {
					builder_structure: raw_builder_structure,
					action: 'pp-builder-preview'
				}
			})
				.done(function (builder_structure) {
					$(iframe1).contents().find('body').html(builder_structure);
					$(iframe1).contents().find('style').html(builder_css);
					$("#loadingimg").hide();
				});
		});
	})(jQuery);
</script>