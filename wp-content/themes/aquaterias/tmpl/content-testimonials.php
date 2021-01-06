<?php
/**
	Testimonials Single Item
 */

$subheader = fw_get_db_post_option(get_The_ID(), 'subheader');

?>
<div class="col-lg-6">
	<article class="inner matchHeight">
		<div class="top">
			<?php the_post_thumbnail('aquaterias-client'); ?>
			<div class="name font-headers color-black"><?php the_title(); ?></div>
			<?php if (!empty($subheader)) echo '<div class="subheader color-main font-main">'. wp_kses_post($subheader) .'</div>'; ?>
		</div>
		<div class="clearfix"></div>
		<div class="text"><span class="quote font-headers">&rdquo;</span><?php the_content() ?></div>	
	</article>
</div>
