<?php

// Check value exists.
if( have_rows('flexible_content') ):

    // Loop through rows.
    while ( have_rows('flexible_content') ) : the_row();
        get_template_part( 'page-templates/flexible_content/flex_templates/full_width_wysiwyg' );
        get_template_part( 'page-templates/flexible_content/flex_templates/2_col_wysiwyg' );
        get_template_part( 'page-templates/flexible_content/flex_templates/3_col_wysiwyg' );
    endwhile;
endif;
        ?>
            