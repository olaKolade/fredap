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

	$aquaterias_sidebar = fw_get_db_post_option( $wp_query->get_queried_object_id(), 'sidebar-layout' );
	if ( $aquaterias_sidebar == 'disabled' ) {

		$aquaterias_sidebar_hidden = true;
	}

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

				if ( get_query_var( 'paged' ) ) {

					$paged = get_query_var( 'paged' );

				} elseif ( get_query_var( 'page' ) ) {

					$paged = get_query_var( 'page' );
					
				} else {

					$paged = 1;
				}

				if (isset($_GET['s'])) {

					$wp_query = new WP_Query( array(
						's'		=> esc_sql( $_GET['s'] ),
						'paged' => (int) $paged,
					) );
				}
					else {

					$wp_query = new WP_Query( array(
						'post_type' => 'post',
						'paged' => (int) $paged,
					) );
				}

            	echo '<div class="row">';
				if ( $wp_query->have_posts() ) :

					while ( $wp_query->have_posts() ) : the_post();

						if ( !function_exists( 'fw_get_db_settings_option' ) ) {

							get_template_part( 'tmpl/content', $wp_query->get_post_format() );
						}
							else {

							set_query_var( 'aquaterias_layout', $aquaterias_layout );

							if ($aquaterias_layout == 'three-cols') {

								get_template_part( 'tmpl/content-three-cols', $wp_query->get_post_format() );
							}
								else
							if ($aquaterias_layout == 'two-cols') {

								get_template_part( 'tmpl/content-two-cols', $wp_query->get_post_format() );
							}
								else {

								get_template_part( 'tmpl/content', $wp_query->get_post_format() );
							}
						}

						endwhile;

					else :
						// If no content, include the "No posts found" template.
						get_template_part( 'tmpl/content', 'none' );

					endif;
				echo '</div>';
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
