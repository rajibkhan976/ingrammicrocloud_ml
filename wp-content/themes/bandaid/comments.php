<div class="comments">
	<?php if ( post_password_required() ) : ?>
	<p class="access-denied"><?php _e('Access denied. This post is password protected.', 'exquisite'); ?></p>
		<?php
		return;
		endif;
		?>
	<?php if ( have_comments() ) : ?>
		<h3><?php printf(_n(__('1 Comment', 'exquisite'), '%1$s ' . __('Comments', 'exquisite') . '', get_comments_number()), number_format_i18n(get_comments_number())); ?>
		</h3>
		<ol class="display-comments">
			<?php wp_list_comments(array('avatar_size' => '48', 'type' => 'comment')); ?>
		</ol>
	<?php
	function comment_pagination() {
		$comment_page = paginate_comments_links('echo=0');
		if (!empty($comment_page)) {
			echo "<p class=\"comment-pagination\">\n";
			echo $comment_page;
			echo "\n</p>\n";
		}
	}
	?>
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<div class="comment-pagination">
			<div class="nav-previous"><?php previous_comments_link(__('&lt; Older Comments', 'exquisite')); ?></div>
			<div class="nav-next"><?php next_comments_link(__('Newer Comments &gt;', 'exquisite')); ?></div>
		</div>
	<?php endif; ?>
<?php endif; ?>

<?php
$commenter = wp_get_current_commenter();
	$req = get_option('require_name_email');
	$aria_req = ($req ? " aria-required='true'" : '');

	if (esc_attr($commenter['comment_author']) != '') { $val_author = esc_attr($commenter['comment_author']);
	} else { $val_author = 'Name';
	}
	if (esc_attr($commenter['comment_author_email']) != '') { $val_author_email = esc_attr($commenter['comment_author_email']);
	} else { $val_author_email = 'E-mail';
	}
	if (esc_attr($commenter['comment_author_url']) != '' && esc_attr($commenter['comment_author_url']) != 'http://') { $val_author_url = esc_attr($commenter['comment_author_url']);
	} else { $val_author_url = 'http://';
	}

	$fields = array('author' => '
	<ul class="commentform">
		<li>
			<input onblur="blur_search(this)" onfocus="focus_search(this)" id="author" name="author" class="txtFld required" type="text" value="' . $val_author . '" size="30"' . $aria_req . ' />
		</li>
		', 'email' => '
		<li>
			<input onblur="blur_search(this)" onfocus="focus_search(this)" id="email" name="email" class="txtFld required" type="text" value="' . $val_author_email . '" size="30"' . $aria_req . ' />
		</li>
		', 'url' => '
		<li>
			<input onblur="blur_search(this)" onfocus="focus_search(this)" id="url" name="url" class="txtFld" type="text" value="' . $val_author_url . '" size="30" />
		</li>
	</ul>
	', );
	$comments_args = array('fields' => $fields, 'title_reply' => '' . __('Drop a comment', 'exquisite') . '', 'title_reply_to' => '' . __('Leave a reply to', 'exquisite') . ' %s', 'comment_notes_after' => '', 'comment_field' => '
	<ul style="width:100%; margin-right:0;">
		<li style="width:100%;">
			<textarea id="comment" name="comment" class="txtAra comment required" cols="32" rows="8" aria-required="true"></textarea>
</li>	</ul>', );
	comment_form($comments_args);
	?>

</div>