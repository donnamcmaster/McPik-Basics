<?php
/*
Shortcode: mcpk-button
Uses Bootstrap CSS
*/

$button_class = isset( $button_class ) ? $button_class : 'btn-default';
$button_class .= isset( $add_class ) ? ' '.$add_class : '';
$button_class = esc_html( $button_class );
?>

<a class="btn <?php echo $button_class; ?>" href="<?php echo esc_url( $link );?>"><?php echo esc_html( $title );?></a>