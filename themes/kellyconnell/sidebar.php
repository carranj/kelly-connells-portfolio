<div class="sidebar">
<nav class="d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <?php
            $args = array(
                'menu'      => 'menu-1',
                'container' => 'ul',
                'menu_class'      => 'nav flex-column',
            );
            wp_nav_menu( $args );
        ?>
    </div>
</nav>

	<?php if ( ! dynamic_sidebar ('page') ): ?>

    <h3>Sidebar Setup</h3>
    <p>Please add widgets to the page sidebar to have them display here.</p>
    <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>

	<?php endif; ?>
</div>