<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
/**
 * @var string $before_widget
 * @var string $after_widget
 */

echo wp_kses_post( $before_widget );

if ( !empty($params['title']) )  {

	echo $before_title . esc_html( $params['title'] ) . $after_title;
}

if ( $params['list-type'] == 'same') $target = ''; else $target = '_blank';

?>
<?php if ( is_array( $params['items'] ) ) : ?>
<?php if ( $params['list-type'] == 'icons-list' ) : ?><ul class="social-icons-list"><?php endif; ?>
<?php if ( $params['list-type'] == 'icons-inline-large' ) : ?><ul class="social-big"><?php endif; ?>
<?php if ( $params['list-type'] == 'icons-inline-small' ) : ?><ul class="social-small"><?php endif; ?>
	<?php foreach ( $params['items'] as $item ) : ?>
		<?php

			$img = '';
			if ( empty($item['icon']) ) {

				if ( !empty($item['iconv2']['icon-class']) ) {

					$item['icon'] = $item['iconv2']['icon-class'];
				}
					else
				if ( $item['iconv2']['type'] == 'custom-upload' AND !empty($item['iconv2']['url']) ) {

					$img = wp_get_attachment_image( $item['iconv2']['attachment-id'], 'full' );
					$item['icon'] = 'img';
				}
			}

			if ( empty($item['icon']) ) $item['icon'] = '';
		?>
		<?php if ( $params['list-type'] == 'icons-list' ) : ?>
			<?php if ( empty( $item['href'] ) ) : ?>
			<li><span class="<?php echo esc_attr( $item['icon'] ); ?>"></span><?php echo esc_html( $item['text'] ); ?></li>
			<?php else : ?>
			<li><a target="<?php echo esc_attr($target); ?>" href="<?php echo esc_url( $item['href'] ); ?>"><span class="<?php echo esc_attr( $item['icon'] ); ?>"><?php echo $img ?></span><?php echo esc_html( $item['text'] ); ?></a></li>
			<?php endif; ?>
		<?php elseif ( $params['list-type'] == 'icons-inline-large' ) : ?>
			<li><a target="<?php echo esc_attr($target); ?>" href="<?php echo esc_url( $item['href'] ); ?>" class="<?php echo esc_attr( $item['icon'] ); ?>"><?php echo $img ?></a></li>
		<?php else : ?>
			<li><a target="<?php echo esc_attr($target); ?>" href="<?php echo esc_url( $item['href'] ); ?>" class="<?php echo esc_attr( $item['icon'] ); ?>"><?php echo $img ?></a></li>
		<?php endif; ?>
	<?php endforeach; ?>
<?php if ( $params['list-type'] == 'icons-inline-small' ) : ?>	
</ul>
<?php else : ?>
</ul>
<?php endif; ?>
<?php endif; ?>
<?php echo wp_kses_post( $after_widget ) ?>
