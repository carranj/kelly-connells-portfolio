<?php
    if( get_row_layout() == 'two-col_wysiwyg'):
        // Columns
        $column_sizes= get_sub_field('column_sizes');
        $has_title = get_sub_field('has_title_2');
        $col_arr = explode (",", $column_sizes);
        $col1_size = $col_arr[0];
        $col2_size = $col_arr[1];
        $responsize_breakpoint = get_sub_field('responsive_breakpoint');
?>
    <?php
    if ($has_title) :
    ?>
        <div class="row">
            <div class="col-md-12">
                <h2><?php the_sub_field('title_2'); ?></h2>
            </div>
        </div>
    <?php
    endif;
    ?>
    
    <div class="row">
        <div class="col<?php
        if($responsize_breakpoint !== 'none'){
            the_sub_field('responsive_breakpoint');
        }
        ?>-<?php echo $col1_size?>">
            <?php the_sub_field('left_col1_of_2'); ?>
        </div>
        <div class="col<?php
        if($responsize_breakpoint !== 'none'){
            the_sub_field('responsive_breakpoint');
        }
        ?>-<?php echo $col2_size?>">
            <?php the_sub_field('right_col2_of_2'); ?>
        </div>    
    </div>

<?php endif; 