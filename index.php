<?php
/** Standard content fallback and blog index. */
get_header();
?>
<main id="main-content" class="content-area"><div class="wrap">
	<?php if ( have_posts() ) : ?>
		<?php if ( is_home() && ! is_front_page() ) : ?><header class="section-heading"><p class="eyebrow"><?php esc_html_e( 'Updates', 'kato-geoscience-consulting' ); ?></p><h1><?php single_post_title(); ?></h1></header><?php endif; ?>
		<?php while ( have_posts() ) : the_post(); ?><article <?php post_class( 'entry-content' ); ?>><header><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><p class="eyebrow"><?php echo esc_html( get_the_date() ); ?></p></header><?php if ( has_post_thumbnail() ) : ?><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large' ); ?></a><?php endif; ?><div><?php the_excerpt(); ?></div></article><hr><?php endwhile; ?>
		<div class="pagination"><?php the_posts_pagination(); ?></div>
	<?php else : ?><article class="entry-content"><h1><?php esc_html_e( 'Nothing here yet', 'kato-geoscience-consulting' ); ?></h1><p><?php esc_html_e( 'Add a page or post from your WordPress dashboard.', 'kato-geoscience-consulting' ); ?></p></article><?php endif; ?>
</div></main>
<?php get_footer(); ?>
