<?php
/**
 * @package Mundico
 */

	get_header();
?>
<?php if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow( "home", "" ); } ?>


<div class="home">
	<div id="navigation">
		<div class="container">
		<a href="<?php echo get_site_url(); ?>"><h1><img src="<?php echo get_template_directory_uri() ?>/img/logo.png" /></h1></a>
		<?php
			wp_nav_menu();
		?>
		</div>
	</div>

	<header class="wrapper">
		<div id="slides">
			<div class="slides-container">
			<?php $slider_post = get_ID_by_slug('slides'); ?>
			<?php $childpages = query_posts('orderby=menu_order&order=asc&post_type=page&post_parent='+$slider_post); ?>
			<?php if($childpages){ ?>
	  		<?php foreach ($childpages as $post) : setup_postdata($post); ?>
	  			<div>
					<?php if ( has_post_thumbnail() ) { ?>
						<?php 
						$post_image_id = get_post_thumbnail_id($post_to_use->ID);
						if ($post_image_id) {
							$thumbnail = wp_get_attachment_image_src( $post_image_id, 'post-thumbnail', false);
							if ($thumbnail) (string)$thumbnail = $thumbnail[0];
						}
						echo '<img src="'.$thumbnail.'">'; ?>
					<?php } ?>
					</div>
				<?php endforeach; ?>
			<?php } ?>
			</div>
		</div>	
	</header>
	<section class="gradient"></section>

	<section class="wrapper payoff">
		<div class="container">
			<?php
			$payoff = get_post(55); 
			$title = $payoff->post_title;
			$content = $payoff->post_content;
			?>
			<h1><?php echo $title; ?></h1>
			<?php echo $content; ?>
		</div>
	</section>
	<section class="wrapper projects">
		<div class="left">
			<?php
			$payoff = get_post(29); 
			$title = $payoff->post_title;
			$content = $payoff->post_content;
			$url = get_permalink(29);
			?>
			<h1><?php echo $title; ?></h1>
			<?php echo $content; ?>
			<a href="<?php echo $url ?>" class="button">Lees meer over dit project</a>		
		</div>
		<div class="right" style="<?php if ( has_post_thumbnail(29) ) {
			$post_image_id = get_post_thumbnail_id(29);
			if ($post_image_id) {
				$thumbnail = wp_get_attachment_image_src( $post_image_id, 'large', false);
				if ($thumbnail) (string)$thumbnail = $thumbnail[0];
			}
			echo 'background:url(\''.$thumbnail.'\') no-repeat center center;background-size:cover;'; ?>
			<?php } ?>
			">

			<?php // echo get_the_post_thumbnail( $payoff->ID); ?>
		</div>			
	</section>
	<section class="wrapper people">
		<div class="container">
			<?php
			$payoff = get_post(28); 
			$title = $payoff->post_title;
			?>
			<h1><?php echo $title; ?></h1>

	<?php $args = array(
		'sort_order' => 'ASC',
		'sort_column' => 'post_title',
		'child_of' => 45
	); 
	$pages = get_pages($args); 
	foreach ( $pages as $page ) {
	?>
		<div class="person"><a href="<?php echo get_page_link($page->ID); ?>">
			<?php echo get_the_post_thumbnail( $page->ID, 'thumbnail'); ?>
			<h2 class="name"><?php echo $page->post_title; ?></h2>
			<h2 class="title"><?php echo get_post_meta( $page->ID, 'Functie', true ); ?></h2>
		</a></div>

	<?php } ?>
			
		</div>
	</section>
</div>
<?php get_footer() ?>