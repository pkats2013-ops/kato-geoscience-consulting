<?php
/** Page template. */
get_header();
?>
<main id="main-content" class="content-area"><div class="wrap">
	<?php while ( have_posts() ) : the_post(); ?><article <?php post_class( 'entry-content' ); ?>><header class="section-heading"><p class="eyebrow"><?php esc_html_e( 'Kato Geoscience Consulting', 'kato-geoscience-consulting' ); ?></p><h1><?php the_title(); ?></h1></header><?php if ( has_post_thumbnail() ) : the_post_thumbnail( 'large' ); endif; ?><div class="entry-content"><?php the_content(); ?></div></article><?php endwhile; ?>
</div></main>
<?php get_footer(); ?>
