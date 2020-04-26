<?php
    if( get_row_layout() == 'two-col_wysiwyg'):
        // Columns
        $column_sizes= get_sub_field('column_sizes');
        $col_arr = explode (",", $column_sizes);
        $col1_size = $col_arr[0];
        $col2_size = $col_arr[1];
?>
    <div class="row">
        <div class="col-md-<?php echo $col1_size?>">
            <?php the_sub_field('left_col1_of_2'); ?>
        </div>
        <div class="col-md-<?php echo $col2_size?>">
            <?php the_sub_field('right_col2_of_2'); ?>
        </div>    
    </div>

<?php endif; 