<?php
/**
 * @package Mundico
 */

	get_header();
?>
<div class="page">
	<div id="navigation">
		<div class="container">
		<a href="<?php echo get_site_url(); ?>"><h1><img src="<?php echo get_template_directory_uri() ?>/img/logo.png" />aPulso</h1></a>
		<?php
			wp_nav_menu();
		?>
		</div>
	</div>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<header class="wrapper hero page" style="
				<?php if ( has_post_thumbnail() ) { ?>
					<?php $post_image_id = get_post_thumbnail_id($post_to_use->ID);
					if ($post_image_id) {
						$thumbnail = wp_get_attachment_image_src( $post_image_id, 'post-thumbnail', false);
						if ($thumbnail) (string)$thumbnail = $thumbnail[0];
					}
					echo 'background:url(\''.$thumbnail.'\') no-repeat center center;background-size:cover;'; ?>
					<?php } ?>
				">
			</header>
			<section class="gradient"></section>

			<section class="container content">
				<h1 class="entrytitle" id="post-<?php the_ID(); ?>"><?php the_title(); ?></h1>
				<div class="meta">
				</div>
				<?php the_content(); ?>
			</section>
		<?php endwhile; ?>
	<?php else : ?>
		<h6 class="center">Not Found</h6>
	<?php endif; ?>
</div>
<?php get_footer() ?>