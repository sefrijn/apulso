<?php
/**
 * @package Mundico
 * Template Name: News
 */

	get_header();
?>

<div class="page news">
	<div id="navigation">
		<div class="container">
		<a href="<?php echo get_site_url(); ?>"><h1><img src="<?php echo get_template_directory_uri() ?>/img/logo.png" />aPulso</h1></a>
		<?php
			wp_nav_menu();
		?>
		</div>
	</div>
			<header class="wrapper hero">
			</header>
			<section class="gradient"></section>
			
			<section class="container">
				<h1 class="entrytitle" id="archive archive-<?php single_cat_title( '', true ); ?>"><?php single_cat_title( '', true ); ?></h1>
			</section>

	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
		<section class="container posts">
			<?php the_post_thumbnail('news-thumb'); ?>
			<div class="content">
				<h2><?php the_title(); ?></h2>
				<div class="meta">
					<?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?>
					door <?php the_author(); ?> &#183; <?php the_category(' '); ?> &#183; <?php the_date(); ?>
				</div>
				<div><?php the_excerpt(); ?></div>
				<a href="<?php the_permalink(); ?>">lees meer</a>
			</div>
		</section>
		<?php endwhile; ?>
	<?php else : ?>
		<h6 class="center">Not Found</h6>
	<?php endif; ?>
</div>

<?php get_footer() ?>