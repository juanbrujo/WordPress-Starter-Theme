<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />

	<title><?php wp_title('&raquo;','true','right'); bloginfo('name'); if( is_home() ) { echo " &raquo; " . get_bloginfo( 'description', 'display' ); } ?></title>

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<?php the_title(); ?>
	
	<?php endwhile; else: ?>

	¯\_(ツ)_/¯

	<?php endif; ?>

	<?php wp_footer(); ?>
	
</body>
</html>