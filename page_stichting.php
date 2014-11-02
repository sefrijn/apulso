<?php
/**
 * @package Mundico
 * Template Name: Stichting
 */

	get_header();
?>

<div class="page news stichting">
	<div id="navigation">
		<div class="container">
		<a href="<?php echo get_site_url(); ?>"><h1><img src="<?php echo get_template_directory_uri() ?>/img/logo.png" /></h1></a>
		<?php
			wp_nav_menu();
		?>
		</div>
	</div>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<header class="wrapper hero" style="
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
			
			<section class="container intro">
				<h1 class="entrytitle" id="post-<?php the_ID(); ?>"><?php the_title(); ?></h1>
				<?php the_content(); ?>
				<?php $thispage=$post->ID; ?>
			</section>
		<?php endwhile; ?>
	<?php else : ?>
		<h6 class="center">Not Found</h6>
	<?php endif; ?>

	<?php $childpages = query_posts('orderby=menu_order&order=asc&post_type=page&post_parent='.$thispage);
	if($childpages){ /* display the children content  */
	  foreach ($childpages as $post) :
	  setup_postdata($post); ?>
		<section class="container posts">
			<?php the_post_thumbnail('news-thumb'); ?>
			<div class="content">
				<h2><?php the_title(); ?></h2>
				<div><?php the_excerpt(); ?></div>
				<a href="<?php the_permalink(); ?>">lees meer</a>
			</div>
		</section>
	<?php
	  endforeach;
	} ?>

</div>

<?php get_footer() ?>