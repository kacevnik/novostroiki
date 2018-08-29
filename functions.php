<?php

    add_action('after_setup_theme', function(){
        register_nav_menus( array(
            'top'    => 'Меню в Header',
            'bottom' => 'Меню в Footer'
        ) );
    });

?>