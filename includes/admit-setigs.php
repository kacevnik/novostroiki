<?php

    function novos_add_admin_page(){

        add_menu_page( 'Настройки темы Novostroiki-M', 'Новостройки', 'manage_options', 'novos', 'novos_create_admin_page', '
dashicons-admin-multisite', 3 );

        add_submenu_page( 'novos', 'Настройки темы Novostroiki-M', 'Настройки', 'manage_options', 'novos', 'novos_create_admin_page' );

        add_submenu_page( 'novos', 'Кастомные стили CSS', 'Стили CSS', 'manage_options', 'novos_css', 'novos_create_css_page' );

        add_action( 'admin_init', 'novo_register_setting' );
    }

    add_action( 'admin_menu', 'novos_add_admin_page' );

    function novo_register_setting(){
        register_setting( 'novo_option_group', 'novos_logo' );
        add_settings_section( 'novos-header-options', 'Настройки Header', 'novos_header_options', 'novos' );
        add_settings_field( 'novos-logo', 'Логотип', 'new_castom_fild', 'novos', 'novos-header-options', array( 'type' => 'text', 'value' => '', 'name' => 'novos_logo', 'placeholder' => 'Укажите Ваше имя', 'desc' => 'Простое текстовое поле' ) );
    }

    function novos_header_options(){

    }

    function new_castom_fild( $val ){
        extract( $val );
        if( esc_attr( get_option( $name ) ) ){
            $i_value = esc_attr( get_option( $name ) );
        }else{
            $i_value = $value;
        }
        if($type == 'text'){
            echo '<input class="regular-text" type="text" value="'. $value .'" name="' . $name . '" placeholder="'. $placeholder .'">';
            if( $desc ){echo "<br /><span class='description'>$desc</span>"; }
        }
    }

    function novos_create_admin_page(){
        require_once( get_template_directory() . '/includes/template/admin-setting-page.php' );
    }

    function novos_create_css_page(){

    }
