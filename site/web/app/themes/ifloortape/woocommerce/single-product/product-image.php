<?php
/**
 * Single Product Image
 *
 * @version     7.8.0
 */

defined( 'ABSPATH' ) || exit;

global $post, $woocommerce, $product, $porto_settings, $porto_settings_optimize, $porto_product_layout, $porto_product_info;
$attachment_ids = $product->get_gallery_image_ids();

$items_count            = 1;
$product_images_classes = '';
$product_image_classes  = 'img-thumbnail';
$product_images_attrs   = '';

if ( 'extended' === $porto_product_layout ) {
	$items_count               = get_post_meta( get_the_ID(), 'product_layout_columns', true );
	$items_count               = ( ! $items_count && isset( $porto_settings['product-single-columns'] ) ) ? $porto_settings['product-single-columns'] : 3;
	if ( ! empty( $porto_product_info['items'] ) ) {
		$product_images_attrs .= ' data-items="' . $porto_product_info['items'] . '"';
	} else {
		$product_images_attrs .= ' data-items="3"';
	}
	if ( ! isset( $porto_product_info['center_mode'] ) || ! empty( $porto_product_info['center_mode'] ) ) {
		$product_images_attrs .= ' data-centeritem';
	}
	if ( ! empty( $porto_product_info['responsive'] ) ) {
		$product_images_attrs .= ' data-responsive="' . esc_attr( json_encode( $porto_product_info['responsive'] ) ) . '"';
	} else {
		$columns_responsive        = array();
		$columns_responsive['768'] = 3;
		$columns_responsive['0']   = 1;
		$product_images_attrs     .= ' data-responsive="' . esc_attr( json_encode( $columns_responsive ) ) . '"';
	}
	if ( isset( $porto_product_info['loop'] ) ) {
		$product_images_attrs .= ' data-loop="' . esc_attr( $porto_product_info['loop'] ) . '"';
	}
	if ( ! empty( $porto_product_info['margin'] ) ) {
		$product_images_attrs .= ' data-margin="' . esc_attr( $porto_product_info['margin'] ) . '"';
	}
}
if ( 'grid' === $porto_product_layout ) {
	$product_images_classes = 'product-images-block row';
	$items_count            = get_post_meta( get_the_ID(), 'product_layout_grid_columns', true );
	$items_count            = ( ! $items_count && isset( $porto_settings['product-single-columns'] ) ) ? $porto_settings['product-single-columns'] : 2;
	$items_count            = '2';
	if ( '1' === $items_count ) {
		$product_image_classes .= ' col-lg-12';
	} elseif ( '2' === $items_count ) {
		$product_image_classes .= ' col-sm-6';
	} elseif ( '3' === $items_count ) {
		$product_image_classes .= ' col-sm-6 col-lg-4';
	} elseif ( '4' === $items_count ) {
		$product_image_classes .= ' col-sm-6 col-lg-3';
	}
} elseif ( 'sticky_info' === $porto_product_layout || 'sticky_both_info' === $porto_product_layout ) {
	$product_images_classes = 'product-images-block';
} else {
	$product_images_classes = 'product-image-slider owl-carousel show-nav-hover';
	if ( 'extended' === $porto_product_layout ) {
		if ( ! empty( $porto_product_info['columns_class'] ) ) {
			$product_images_classes .= ' ' . $porto_product_info['columns_class'];
		} else {
			$product_images_classes .= ' has-ccols ccols-1 ccols-md-3';
		}
		if ( ! empty( $porto_product_info['enable_flick'] ) ) {
			$product_images_classes .= ' flick-carousel';
		}
	} else {
		$product_images_classes .= ' has-ccols ccols-1';
	}
}

?>
<div class="product-images images">
	<?php
	$html            = '<div class="' . esc_attr( $product_images_classes ) . '"' . $product_images_attrs . '>';
	$attachment_id   = method_exists( $product, 'get_image_id' ) ? $product->get_image_id() : get_post_thumbnail_id();
	$product_icon_cl = 'porto-icon-plus';
	if ( ! empty( $porto_product_info['icon_cl'] ) ) {
		$product_icon_cl = $porto_product_info['icon_cl'];
	}

	if ( $attachment_id ) {

		$image_link = wp_get_attachment_image_url( $attachment_id, 'full' );

		$html .= '<div class="' . esc_attr( $product_image_classes ) . '"><div class="inner">';
		$html .= wp_get_attachment_image(
			$attachment_id,
			'full_width' === $porto_product_layout ? 'full' : 'woocommerce_single',
			false,
			array(
				'href'  => esc_url( $image_link ),
				'class' => 'woocommerce-main-image img-responsive',
				'title' => _wp_specialchars( get_post_field( 'post_title', $attachment_id ), ENT_QUOTES, 'UTF-8', true ),
			)
		);
		if ( $porto_settings['product-image-popup'] && ( 'grid' === $porto_product_layout || 'sticky_info' === $porto_product_layout ) ) {
			$html .= '<a class="zoom" href="' . esc_url( $image_link ) . '"><i class="' . esc_attr( $product_icon_cl ) . '"></i></a>';
		}
		$html .= '</div></div>';

	} else {

		$image_link = wc_placeholder_img_src( 'woocommerce_single' );
		$html      .= '<div class="' . esc_attr( $product_image_classes ) . '"><div class="inner">';
		$html      .= '<img src="' . esc_url( $image_link ) . '" alt="placeholder" href="' . esc_url( $image_link ) . '" class="woocommerce-main-image img-responsive" />';
		$html      .= '</div></div>';
	}

	if ( $attachment_ids ) {
		foreach ( $attachment_ids as $attachment_id ) {

			$image_link = wp_get_attachment_image_url( $attachment_id, 'full' );

			if ( ! $image_link ) {
				continue;
			}

			$html .= '<div class="' . esc_attr( $product_image_classes ) . '"><div class="inner">';
			$size  = 'full_width' === $porto_product_layout ? 'full' : 'woocommerce_single';
			if ( strpos( $product_images_classes, 'product-image-slider owl-carousel' ) !== false && isset( $porto_settings_optimize['lazyload'] ) && $porto_settings_optimize['lazyload'] ) {
				$thumb_image = wp_get_attachment_image_src( $attachment_id, $size );
				if ( $thumb_image && is_array( $thumb_image ) && count( $thumb_image ) >= 3 ) {
					$placeholder = porto_generate_placeholder( $thumb_image[1] . 'x' . $thumb_image[2] );
					$html       .= wp_get_attachment_image(
						$attachment_id,
						$size,
						false,
						array(
							'data-src' => esc_url( $thumb_image[0] ),
							'src'      => esc_url( $placeholder[0] ),
							'href'     => esc_url( $image_link ),
							'class'    => 'img-responsive owl-lazy',
						)
					);
				}
			} else {
				$html .= wp_get_attachment_image(
					$attachment_id,
					$size,
					false,
					array(
						'href'  => esc_url( $image_link ),
						'class' => 'img-responsive',
					)
				);
			}
			if ( $porto_settings['product-image-popup'] && ( 'grid' === $porto_product_layout || 'sticky_info' === $porto_product_layout ) ) {
				$html .= '<a class="zoom" href="' . esc_url( $image_link ) . '"><i class="' . esc_attr( $product_icon_cl ) . '"></i></a>';
			}
			$html .= '</div></div>';

		}
	}

	$html .= '</div>';

	if ( $porto_settings['product-image-popup'] && ( 'default' === $porto_product_layout || 'full_width' === $porto_product_layout || 'transparent' === $porto_product_layout || 'centered_vertical_zoom' === $porto_product_layout || 'extended' === $porto_product_layout || 'left_sidebar' === $porto_product_layout ) ) {
		$html .= '<span class="zoom" data-index="0"><i class="' . esc_attr( $product_icon_cl ) . '"></i></span>';
	}

	echo apply_filters( 'woocommerce_single_product_image_html', $html, $post->ID ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped

	?>
</div>

<?php
if ( $porto_settings['product-thumbs'] ) {
	do_action( 'woocommerce_product_thumbnails' );
}
