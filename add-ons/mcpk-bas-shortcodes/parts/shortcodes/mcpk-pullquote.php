<?php
/*
Shortcode: mcpk-pullquote
Credit: adapted from Piklist Demos
NOTE: assumes that the data is sanitized, not just entered from external
*/
?>

<blockquote class="mcpk-pullquote">

<?php
	echo wpautop( wptexturize( $quote ) );
	if ( !empty( $source ) ) {
?>
	<cite><?php echo wptexturize( $source ); ?></cite>
<?php
	}
?>
</blockquote>