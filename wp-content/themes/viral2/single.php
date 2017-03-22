<?php get_header(); ?>
<?php
get_template_part('navigation');
?>
<?php
if (have_posts()) : while (have_posts()) : the_post();
    $post_name = $post->post_name;
    $post_id = get_the_ID();
?>

<div <?php post_class(); ?>>
	<div class="page-heading">
		<div class="container">
			<div class="sixteen columns table">
			<div class="ten columns alpha cell">
			<h4><?php the_title(); ?></h4>
			</div>
			<div class="six columns omega cell">
			<?php the_breadcrumb(); ?>
			</div>
			</div>
		</div>
	</div>
	<div class="page-section-continued">
		<div class="container">
			<div class="two columns">
				<div class="content">
				<div class="the-date">
				<h2><?php echo get_the_date('d'); ?></h2>
				<h3><?php echo get_the_date('M, y'); ?></h3>
				</div>
				</div>
			</div>
			<div class="ten columns">
				<div class="content">
					<?php get_template_part( 'post-formats/single', get_post_format() );  ?>
					<h4 class="post-title"><?php the_title(); ?></h4>
					<div class="postinfo">
						<div class="post-author"><i class="fa fa-pencil"> </i><b>
						<?php echo '' . __('Posted by: ', 'exquisite') . ' <span>' . get_the_author_link() . '</span>'; ?> </b>
						</div>
						<div class="post-category"><i class="fa fa-folder-open"> </i>
						<?php echo '' . __('in ', 'exquisite') . ' <span>' . get_the_category_list(', ', 'single', $post -> ID) . '</span>'; ?>
						</div>
						<div class="comments-links"><i class="fa fa-comments"> </i>
						<a href="<?php comments_link(); ?>" title="<?php comments_number(); ?>"><?php comments_number(); ?></a>
						</div>
						<?php
						if (has_tag()) {
										the_tags('<div class="posttags"><i class="fa fa-tags"> </i><p class="post-tags">Tags: ', ', ', '</p></div>');
			
						}
						?>
					</div>
					<div class="post">
					<?php the_content('', FALSE); ?>
					</div>
					<?php wp_link_pages(); ?>
					<?php comments_template(); ?>
				</div>
			</div>
			<div class="four columns ">
				<div class="content">
					<?php get_sidebar('blog'); ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
endwhile;
 else : ?>
<p><?php _e('No posts found', 'exquisite'); ?></p>
<?php
endif;
wp_reset_query();
?>
<?php get_footer(); ?>