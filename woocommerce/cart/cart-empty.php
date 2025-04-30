<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

/*
 * @hooked wc_empty_cart_message - 10
 */

if (wc_get_page_id('shop')>0)
{
    $shortcode=
	'
        [vc_autoride_theme_notice icon="error" header_text="'.__('Error','autoride').'" subheader_text="'.__('Your cart is currently empty.','autoride').'&nbsp;<a href=\''.apply_filters('woocommerce_return_to_shop_redirect',get_permalink(wc_get_page_id('shop'))).'\'>'.__('Return to shop.','autoride').'"]
	';
	
	echo Autoride_ThemePlugin::doShortcode('ARCAutorideCore',$shortcode);
}