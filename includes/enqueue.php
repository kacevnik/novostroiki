<?php

    function novos_load_admin_style(){
        wp_register_style( 'novos-admin', get_template_directory_uri() . '/css/style.admin.css', array(), '1.0.0', 'all' );
        wp_enqueue_style( 'novos-admin' );

        wp_enqueue_media();

        wp_register_script( 'novos-admin-script', get_template_directory_uri() . '/js/script.admin.js', array('jquery'), '1.0.0', true );
        wp_enqueue_script( 'novos-admin-script' );
    }

    add_action( 'admin_enqueue_scripts', 'novos_load_admin_style' );