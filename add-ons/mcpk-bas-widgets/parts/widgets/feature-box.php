<?php
/*
Title: Feature Box
Description: Each feature box includes a title, an image, 
wysiwyg content, and a button linking to more information.
All fields but the title are optional. 
*/


echo $before_widget;
if ( !empty( $settings['box_title'] ) ) {
	echo $before_title;
	echo wptexturize( $settings['box_title'] );
	echo $after_title;
}
?>
<div class="box-body">
<?php
	if ( isset( $box_image ) ) {
		$image_post = get_post( $box_image );
		$image_title = trim( strip_tags( $image_post->post_title ) );

		$image_src = wp_get_attachment_image_src( $box_image, 'medium' );
		$image_alt = trim( strip_tags( get_post_meta( $box_image, '_wp_attachment_image_alt', true ) ) );
		
		// if no alt text, use the title for alt
		$image_alt = $image_alt ? $image_alt : $image_title;

		echo '<img src="', $image_src[0], '" alt="', $image_alt, '" title="', $image_title, '">', PHP_EOL;
	}
	echo $box_text;
	echo '<a href="', $box_link, '">', $box_link_text, '</a>', PHP_EOL;
?>
</div><!-- .box-body -->
<?php
	echo $after_widget;