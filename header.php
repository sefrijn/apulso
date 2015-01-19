<?php 
/**
 * @package Mundico
 */

?>

<!DOCTYPE html>
<html>
<head>
	<title>aPulso</title>
	<script src="<?php echo get_template_directory_uri(); ?>/bower_components/jquery/dist/jquery.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/main.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/jquery.superslides.min.js"></script>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700|Montserrat' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	<script>
		$( document ).ready(function() {
			$('h1').click(function(){
				console.log("test");
			});
			$('.menu-item-has-children').hover(
		    	function () {
		            //show its submenu
		            $('ul', this).toggle();
		        },
		        function () {
		            //hide its submenu
		            $('ul', this).toggle();         
		        }
		    );
      $('#slides').superslides({
        hashchange: true,
        play: 4000,
        inherit_height_from: '#slides'
      });
 		});
	</script>
	<?php wp_head(); ?>
</head>

<body>