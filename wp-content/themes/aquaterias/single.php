<?php
/**
 * The Template for displaying all single posts
 */

$sidebar = 'visible';
if ( function_exists( 'FW' ) ) {

	$sidebar = fw_get_db_settings_option( 'blog_post_sidebar' );
}

get_header(); 

?>
<div class="inner-page margin-default">
    <div class="row <?php if ( $sidebar == 'hidden' ) echo 'centered'; ?>">
        <div class="col-xl-9 col-lg-8 col-md-8">
            <section class="blog-post">
				<?php
					// Start the Loop.
				while ( have_posts() ) : the_post();

					get_template_part( 'tmpl/content-blog-full', get_post_format() );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
					endwhile;
				?>                    
            </section>
        </div>
		<?php
			if ( $sidebar != 'hidden' ) {

				get_sidebar();
			}
		?>
    </div>
</div>
<?php

get_footer();
