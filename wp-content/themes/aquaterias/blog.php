<?php
/**
 * The blog template file
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 */

$aquaterias_sidebar_hidden = false;
$aquaterias_layout = '';
if ( function_exists( 'fw_get_db_settings_option' ) ) {

	$aquaterias_layout = fw_get_db_post_option( $wp_query->get_queried_object_id(), 'blog-layout' );
	if ( empty($aquaterias_layout) ) $aquaterias_layout = fw_get_db_settings_option( 'blog_layout' );
	if ($aquaterias_layout == 'three-cols') {

		$aquaterias_sidebar_hidden = true;
	}
}

get_header(); ?>
<div class="inner-page margin-default">
	<?php if ( !$aquaterias_sidebar_hidden ): ?><div class="row"><?php endif; ?>
        <div class="<?php if ( !$aquaterias_sidebar_hidden ): ?> col-xl-9 col-lg-8 col-md-8<?php endif; ?>">
            <div class="blog blog-block layout-<?php echo esc_attr($aquaterias_layout); ?>">
				<?php

				if ( $wp_query->have_posts() ) :

	            	echo '<div class="row">';
					while ( $wp_query->have_posts() ) : the_post();

						// Showing classic blog without framework
						if ( !function_exists( 'fw_get_db_settings_option' ) ) {

							get_template_part( 'tmpl/content', get_post_format() );
						}
							else {

							set_query_var( 'aquaterias_layout', $aquaterias_layout );

							if ($aquaterias_layout == 'three-cols') {

								get_template_part( 'tmpl/content-three-cols', get_post_format() );
							}
								else
							if ($aquaterias_layout == 'two-cols') {

								get_template_part( 'tmpl/content-two-cols', get_post_format() );
							}
								else {

								get_template_part( 'tmpl/content', get_post_format() );
							}
						}

					endwhile;
					echo '</div>';
				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'tmpl/content', 'none' );

				endif;

				?>
				<?php
				if ( have_posts() ) {

					aquaterias_paging_nav();
				}
	            ?>
	        </div>
	    </div>
	    <?php if ( !$aquaterias_sidebar_hidden ) :?>
            <?php
            	get_sidebar();
            ?>
		<?php endif; ?>
	<?php if ( !$aquaterias_sidebar_hidden ): ?></div><?php endif; ?>
</div>
<?php

get_footer();
