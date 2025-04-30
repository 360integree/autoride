<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="woocommerce-order">

	<?php if ( $order ) :

		do_action( 'woocommerce_before_thankyou', $order->get_id() ); ?>

		<?php if ( $order->has_status( 'failed' ) ) : ?>

<?php
        $content=esc_html__('Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.','autoride');

        $content.='&nbsp;<a href="'.esc_url($order->get_checkout_payment_url()).'">'.esc_html__('Pay','autoride').'</a>';

        if(is_user_logged_in())
            $content.='&nbsp;<a href="'.esc_url(wc_get_page_permalink('myaccount')).'">'.esc_html__('My account','autoride').'</a>';
        
        $shortcode=
        '
            [vc_autoride_theme_notice icon="error" header_text="'.__('Error','autoride').'" subheader_text="'.$content.'"]
        ';

		echo Autoride_ThemePlugin::doShortcode('ARCAutorideCore',$shortcode);
?>

		<?php else : ?>
    
<?php
        $content=esc_html__('Your order has been received.','autoride');
        
        $shortcode=
        '
            [vc_autoride_theme_notice icon="check" header_text="'.__('Thank you','autoride').'" subheader_text="'.$content.'"]
        ';

        echo Autoride_ThemePlugin::doShortcode('ARCAutorideCore',$shortcode);
?>
            <table class="woocommerce-table woocommerce-table--customer-details shop_table customer_details">

                <tbody>
                    
                    <tr>
                        <th><?php _e('Order number:','autoride'); ?></th>
                        <td><?php echo esc_html($order->get_order_number()); ?></td>
                    </tr>
                    <tr>
                        <th><?php _e('Date:','autoride'); ?></th>
                        <td><?php echo wc_format_datetime($order->get_date_created()); ?></td>
                    </tr>                    
                    <?php if($order->get_payment_method_title()) : ?>
                    <tr>
                        <th><?php _e('Payment method:','autoride'); ?></th>
                        <td><?php echo wp_kses_post($order->get_payment_method_title()); ?></td>
                    </tr>
                    <?php endif; ?>

                </tbody>

            </table>

		<?php endif; ?>

		<?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
		<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

	<?php else : ?>

		<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'autoride' ), null ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>

	<?php endif; ?>

</div>