<?php
/*  
Title: 3 Columns
Class: 
Width: 600
*/

namespace McPik\Basics\Cols3;

function print_column ( $column, $content ) {
?>
	<div class="col-sm-4 <?php echo $column; ?>">
			<?php echo wptexturize( wpautop( $content ) );?>
	</div>
<?php
}

	echo $before_widget;
	print_column( 'column_1', $settings['column_1'] );
	print_column( 'column_2', $settings['column_2']  );
	print_column( 'column_3', $settings['column_3']  );
	echo $after_widget;
