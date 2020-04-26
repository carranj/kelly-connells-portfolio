<?php
    if( get_row_layout() == 'three-col_wysiwyg'):
        // Columns
        $column_sizes= get_sub_field('column_sizes-3');
        $col_arr = explode (",", $column_sizes);
        $col1_size = $col_arr[0];
        $col2_size = $col_arr[1];
        $col3_size = $col_arr[2];
?>
    <div class="row">
        <div class="col-md-<?php echo $col1_size?>">
            <?php the_sub_field('col1_of_3'); ?>
        </div>
        <div class="col-md-<?php echo $col2_size?>">
            <?php the_sub_field('col2_of_3'); ?>
        </div>
        <div class="col-md-<?php echo $col3_size?>">
            <?php the_sub_field('col3_of_3'); ?>
        </div>    
    </div>

<?php endif; 