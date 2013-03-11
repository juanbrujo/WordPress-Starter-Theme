<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title( '|', true, 'right' ); bloginfo( 'name' ); $site_description = get_bloginfo( 'description', 'display' ); echo " | $site_description"; ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>

<body>
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div id="container"><!-- #container -->
		<?php the_title(); ?>
	</div><!-- /#container -->
	<?php endwhile; else: ?>
	<p>:( Donnow what's that...</p>
	<?php endif; ?>

	<?php wp_footer(); ?>
</body>
</html>