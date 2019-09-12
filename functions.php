/*Remove-Backorder-Text*/
add_filter( 'woocommerce_get_availability_text', 'filter_product_availability_text', 10, 2 );
function filter_product_availability_text( $availability, $product ) {

    if( $product->backorders_require_notification() ) {
        $availability = str_replace('(can be backordered)', '', $availability);
    }
    return $availability;
}

function change_backorder_message( $text, $product ){
    if ( $product->managing_stock() && $product->is_on_backorder( 1 ) ) {
        $text = __( ' ' );
    }
    return $text;
}
add_filter( 'woocommerce_get_availability_text', 'change_backorder_message', 10, 2 );
