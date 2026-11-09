<?php
/** Header template. */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#main-content"><?php esc_html_e( 'Skip to content', 'kato-geoscience-consulting' ); ?></a>
<header class="site-header">
	<div class="wrap header-inner">
		<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<?php if ( has_custom_logo() ) : ?><?php the_custom_logo(); ?><?php else : ?><span class="brand-mark" aria-hidden="true">K</span><?php endif; ?>
			<span class="brand-name"><?php echo esc_html( get_bloginfo( 'name' ) ? get_bloginfo( 'name' ) : 'Kato Geoscience Consulting' ); ?></span>
		</a>
		<button class="menu-toggle" type="button" aria-expanded="false" aria-controls="primary-menu"><?php esc_html_e( 'Menu', 'kato-geoscience-consulting' ); ?></button>
		<nav class="primary-nav" id="primary-menu" aria-label="<?php esc_attr_e( 'Primary navigation', 'kato-geoscience-consulting' ); ?>">
			<?php if ( has_nav_menu( 'primary' ) ) : wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'fallback_cb' => false ) ); else : ?>
			<ul><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>#about"><?php esc_html_e( 'About', 'kato-geoscience-consulting' ); ?></a></li><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>#services"><?php esc_html_e( 'Services', 'kato-geoscience-consulting' ); ?></a></li><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>#approach"><?php esc_html_e( 'Approach', 'kato-geoscience-consulting' ); ?></a></li><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>#contact"><?php esc_html_e( 'Contact', 'kato-geoscience-consulting' ); ?></a></li></ul>
			<?php endif; ?>
		</nav>
		<a class="button header-cta" href="<?php echo esc_url( home_url( '/' ) ); ?>#contact"><?php esc_html_e( 'Discuss a project', 'kato-geoscience-consulting' ); ?> <span aria-hidden="true">↗</span></a>
	</div>
</header>
