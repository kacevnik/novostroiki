<?php

    require get_template_directory() . '/includes/admit-setigs.php';

    add_action('after_setup_theme', function(){
        register_nav_menus( array(
            'top'    => 'Меню в Header',
            'bottom' => 'Меню в Footer'
        ) );
    });

    add_action('wp_footer', 'add_scripts');
    if (!function_exists('add_scripts')) {
        function add_scripts() {
            if(is_admin()) return false;
            wp_deregister_script('jquery');
            wp_enqueue_script('jquery', get_template_directory_uri().'/js/jquery-3.2.0.min.js', '','3.2.0', true); // jQuery
            wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', '','3.3.7', true); // бутстрап
            wp_enqueue_script('main', get_template_directory_uri().'/js/main.js','','1.0.0', true); // основные скрипты шаблона
        }
    }

    add_action('wp_print_styles', 'add_styles');
    if (!function_exists('add_styles')) {
        function add_styles() {
            if(is_admin()) return false;
            wp_enqueue_style('bs', get_template_directory_uri().'/css/bootstrap.min.css', array(), '3.3.7', 'all'); // бутстрап
            wp_enqueue_style('main-style', get_template_directory_uri().'/css/style.css', array(), '1.0.0', 'all'); // Основной файл стилие
            wp_enqueue_style('media', get_template_directory_uri().'/css/media.css', array(), '1.0.0', 'all'); // адаптивные стили
        }
    }

?>