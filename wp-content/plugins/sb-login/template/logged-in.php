<?php
	global $before_title, $after_title, $current_user; 
	$current_user = wp_get_current_user();
?>
<div class="nd_logged_in" id="nd_user">
	
	<?php echo get_avatar( $current_user->ID, '65' ); ?>
	
<?php echo $before_title; ?><?php _e('Welcome','sb-login'); ?> <strong><a style="color:#0176AB;" title="Go to your wall" href="<?php echo get_site_url(); ?>/author/<?php echo $current_user->user_login; ?>"><?php echo $current_user->display_name; ?></a></strong><?php echo $after_title; ?>
	
<?php
         global $userdata;
         get_currentuserinfo();
	 echo '<br>';
         echo  _e('You logged in on ', 'sb-login');
	 echo '<strong>';
         get_last_login($userdata->ID);
	 echo '</strong>';
?>	

<?php		
		$posts = wp_count_posts('post')->publish - (int) get_user_meta($current_user->ID, 'nd_num_posts', true);
		$comments = wp_count_comments()->approved - (int) get_user_meta($current_user->ID, 'nd_num_comments', true);
		
		echo '<p>';
		echo _n('After logging in there has been ', 'After logging in there have been ', $posts,'sb-login');
		echo '<span class="count">'.$posts.'</span>';
		echo _n('new post and ', 'new posts and ', $posts,'sb-login');
		echo '<span class="count">'.$comments.'</span>';
		echo _n('new comment', 'new comments', $comments, 'sb-login');
	?>
	
	<ul class="links">
		<?php if(get_option('sbl_option_dash')==Enabled) { echo '<li><a href="/wp-admin">'.__('Dashboard', 'sb-login').'</a></li>'; } else { echo ''; } ?>
		<?php if(get_option('sbl_option_pro')==Enabled) { echo '<li><a href="/wp-admin/profile.php">'.__('Profile', 'sb-login').'</a></li>'; } else { echo ''; } ?>
<?php if (get_option('sbl_option_xtra_c')) : ?><li><a href="<?php $sbl_option_xtra_link = get_option('sbl_option_xtra_link'); if(!empty($sbl_option_xtra_link)) {echo $sbl_option_xtra_link;} else {echo "";}?>"><?php $sbl_option_xtra = get_option('sbl_option_xtra'); if(!empty($sbl_option_xtra)) {echo $sbl_option_xtra;} else {echo "";}?></a></li><?php endif; ?>
		
		<li><a href="<?php echo wp_logout_url( nd_login_current_url() ); ?>"><?php _e('Log out','sb-login'); ?></a></li>
	</ul>
</div>
<div class="nd_logged_in" id="nd_recently_viewed" style="display:none;">
	
	<?php echo $before_title; ?><strong><span style="color:#0176AB;font-size:13px;"><?php _e('Recently Viewed Posts','sb-login'); ?></span></strong><br><?php echo $after_title; ?>
	<?php
		$viewed_posts = get_user_meta($current_user->ID, 'nd_viewed_posts', true);
		if (is_array($viewed_posts) && sizeof($viewed_posts)>0) :
			echo '<ul class="linkss">';
			$viewed_posts = array_reverse($viewed_posts);
			foreach ($viewed_posts as $viewed) :
				$viewed_post = get_post($viewed);
				if ($viewed_post) echo '<li><a href="'.get_permalink($viewed).'">'.$viewed_post->post_title.'</a></li>';
			endforeach;
			echo '</ul>';
		else :
			_e('You have not viewed any posts recently.', 'sb-login');	
		endif;
	?>
	<hr/>
	<?php echo $before_title; ?><strong><span style="color:#0176AB;font-size:13px;"><?php _e('My Recent Comments','sb-login'); ?></span></strong><br><?php echo $after_title; ?>
	<?php
		global $wpdb;
		$sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID,
			comment_post_ID, user_id, comment_approved, comment_date_gmt,
			comment_type, SUBSTRING(comment_content,1,30) AS com_excerpt
			FROM $wpdb->comments
			LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID =
			$wpdb->posts.ID)
			WHERE comment_approved = '1' AND comment_type = '' AND
			post_password = '' AND user_id = '".$current_user->ID."'
			ORDER BY comment_date_gmt DESC LIMIT 5";
		$comments = $wpdb->get_results($sql);
		if ($comments) :
			echo '<ul class="linkss">';
			foreach ($comments as $comment) :
				echo '<li><a href="'.get_permalink($comment->ID).'#comment-'.$comment->comment_ID.'">'.strip_tags($comment->com_excerpt).'&hellip;</a></li>';
			endforeach;
			echo '</ul>';
		else :
			_e('You have not made any comments.', 'sb-login');	
		endif;
	?>
</div>
<div class="nd_logged_in" id="sb_info">
<ul style="list-style: none outside;margin-left: 0px;">
<li><strong><span style="color:#0176AB;"><?php _e('Your ID:', 'sb-login'); ?></span> <?php
$id = get_current_user_id();
echo '' . the_author_meta('ID', $id) . '';
?></strong></li>
<li><strong><span style="color:#0176AB;"><?php _e('First joined here:', 'sb-login'); ?></span> <?php
$id = get_current_user_id();
echo '' . the_author_meta('user_registered', $id) . '';
?></strong></li>
<li><strong><span style="color:#0176AB;"><?php _e('Total posts of yours:', 'sb-login'); ?></span></strong> <?php
$id = get_current_user_id();
echo '<strong>' . count_user_posts( $id ) . '</strong>';
?></li>
<li><strong><span style="color:#0176AB;"><?php _e('Total comments of yours:', 'sb-login'); ?></span></strong> <?php
global $wpdb, $current_user;
get_currentuserinfo();
$userId = $current_user->ID;
$where = 'WHERE comment_approved = 1 AND user_id = ' . $userId ;
$comment_count = $wpdb->get_var("SELECT COUNT( * ) AS total 
                                 FROM {$wpdb->comments}
                                 {$where}");
echo '<strong>' . $comment_count . '</strong>';
?></li>
<li><strong><span style="color:#0176AB;"><?php _e('Your level:', 'sb-login'); ?></span> <?php
$id = get_current_user_id();
echo '' . the_author_meta('user_level', $id) . '';
?></strong></li>
<li><strong><span style="color:#0176AB;"><?php _e('Your posts feed:', 'sb-login'); ?></span> <a style="color:#222;" href="/author/<?php the_author_meta('user_login'); ?>/feed"><?php _e('Author Feed', 'sb-login'); ?></a></strong></li>
<li><strong><span style="color:#0176AB;"><?php _e('All comments feed:', 'sb-login'); ?></span> <a style="color:#222;" href="/comments/feed"><?php _e('Comments Feed', 'sb-login'); ?></a></strong></li>
</ul>
</div>