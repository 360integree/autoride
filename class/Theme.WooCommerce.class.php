<?php

/******************************************************************************/
/******************************************************************************/

class Autoride_ThemeWooCommerce
{
	/**************************************************************************/
	
	function __construct()
	{
		
	}
	
	/**************************************************************************/
	
	function addAction()
	{
		remove_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title');
		
		remove_action('woocommerce_single_product_summary','woocommerce_template_single_title',5);
		remove_action('woocommerce_single_product_summary','woocommerce_template_single_price');
		remove_action('woocommerce_single_product_summary','woocommerce_template_single_rating');

		add_action('woocommerce_shop_loop_item_title',array($this,'shopLoopItemTitle'));	
		add_action('woocommerce_single_product_summary',array($this,'shopSingleItemTitle'),5);	
		add_action('woocommerce_single_product_summary','woocommerce_template_single_price',10);	
		add_action('woocommerce_single_product_summary','woocommerce_template_single_rating',15);	
		
		add_action('wp_enqueue_scripts',array($this,'wpEnqueueScripts'));
		
		add_action('wp_ajax_cart_count_get',array($this,'getCartCount'));
		add_action('wp_ajax_nopriv_cart_count_get',array($this,'getCartCount'));
		
	}
	
	/**************************************************************************/
	
	function addFilter()
	{
		add_filter('loop_shop_columns',array($this,'loopColumn'));
		add_filter('loop_shop_per_page',array($this,'loopShopPerPage'));
		add_filter('woocommerce_single_product_image_html',array($this,'woocommerceSingleProductImageHtml'));
		add_filter('woocommerce_single_product_image_thumbnail_html',array($this,'woocommerceSingleProductImageHtml'));
		add_filter('wc_add_to_cart_message_html',array($this,'wcAddToCartMessage'));
	}
	
	/**************************************************************************/
	
	function wpEnqueueScripts()
	{
		wp_dequeue_style('woocommerce_prettyPhoto_css');
		wp_dequeue_script('prettyPhoto');
		wp_dequeue_script('prettyPhoto-init');
	}
	
	/**************************************************************************/
	
	function woocommerceSingleProductImageHtml($html)
	{
		return($html);
	}
	
	/**************************************************************************/
 
	function wcAddToCartMessage($message) 
	{
		$message='<span class="theme-wc-add-to-cart-notice">'.$message.'</span>';
		return($message);
	}
	
	/**************************************************************************/
	
	function loopColumn()
	{
		return(3);
	}
	
	/**************************************************************************/
	
	function loopShopPerPage()
	{
		return(6);
	}
	
	/**************************************************************************/
	
	function shopLoopItemTitle()
	{
		echo '<h3>'.get_the_title().'</h3>';
	}
	
	/**************************************************************************/
	
	function shopSingleItemTitle()
	{
		echo '<h3 class="product_title">'.get_the_title().'</h3>';
	}

	/**************************************************************************/
	
	function isWooCommercePost()
	{
		if(!Autoride_ThemePlugin::isActive('WooCommerce')) return(false);		
		return((is_woocommerce()) || (is_cart()) || (is_checkout()) || (is_account_page()));
	}
	
	/**************************************************************************/
	
	function isWooCommerceSingleProduct()
	{
		if(!Autoride_ThemePlugin::isActive('WooCommerce')) return(false);
		return(get_post_type()=='product');
	}
	
	/**************************************************************************/
	
	function getProductListLayout()
	{
		global $autoride_Sidebar;
		return($autoride_Sidebar ? 'vc_col-sm-6' : 'vc_col-sm-3');
	}
	
	/**************************************************************************/
	
	function getCartCount()
	{
		global $woocommerce;
		
		$response=array('count'=>(int)$woocommerce->cart->cart_contents_count);
		
		echo json_encode($response);
		exit;
	}
	
	/**************************************************************************/
}

/******************************************************************************/
/******************************************************************************/