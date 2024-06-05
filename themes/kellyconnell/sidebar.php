<div class="sidebar">
    <nav class="sidebar">
        <div class="logo">
            <a href="<?php echo site_url('/'); ?>">Kelly Connell
            <span class="jobTitle">Band Director</span></a>
        </div>
            <?php
                $args = array(
                    'menu'      => 'menu-1',
                    'container' => 'ul',
                    'menu_class'      => 'nav flex-column',
                );
                wp_nav_menu( $args );
            ?>
    </nav>

</div>