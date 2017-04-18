<?php
/*
Shortcode: mcpk-button-group
*/
?>

<div class="button-group">
	<a class="btn btn-primary" href="<?php echo esc_url( $link1 );?>"><?php echo esc_html( $title1 );?></a>
	<a class="btn btn-primary" href="<?php echo esc_url( $link2 );?>"><?php echo esc_html( $title2 );?></a>
<?php
	if ( $link3 ) {
?>
	<a class="btn btn-primary" href="<?php echo esc_url( $link3 );?>"><?php echo esc_html( $title3 );?></a>
<?php
	}
?>
</div>