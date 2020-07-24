<?php
/**
 * The header for our theme.
 *
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
		<link rel="stylesheet" href="/wp-content/themes/cube/css/nice-select.css">
		<script src="/wp-content/themes/cube/js/site.js"></script>
		<script src="https://kit.fontawesome.com/ab9acf446f.js"></script>
		<?php
			$title = get_the_title();
			$name           = get_bloginfo('name');
			echo '<title>' . $title . ' | ' . $name . '</title>';
		?>
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<div id="page" class="hfeed site">
			<header id="masthead" class="site-header">
				<div class="header-container">
					<div class="logo-text">
						<h1>Staff Directory - Create By Hanyu Zhang</h1>
					</div>
				</div>
			</header>
			<div id="content" class="site-content">



