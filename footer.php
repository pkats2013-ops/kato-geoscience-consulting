<?php
/** Footer template. */
?>
<footer class="site-footer">
	<div class="wrap footer-inner">
		<span><?php echo esc_html( get_bloginfo( 'name' ) ? get_bloginfo( 'name' ) : 'Kato Geoscience Consulting' ); ?> · <?php echo esc_html( gmdate( 'Y' ) ); ?></span>
		<span><?php esc_html_e( 'Geological & geophysical consulting', 'kato-geoscience-consulting' ); ?> · <?php esc_html_e( 'Website by WordPress', 'kato-geoscience-consulting' ); ?></span>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
