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
        add_settings_field( 'novos-logo', 'Логотип', 'new_castom_fild', 'novos', 'novos-header-options', array( 'type' => 'img_load', 'value' => '', 'name' => 'novos_logo', 'button' => 'Загрузить логотип', 'id' => 'novos_logo' ) );
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

        //type*, name*, value, placeholder, desc
        if($type == 'text'){
            echo '<input class="regular-text" type="text" value="'. $i_value .'" name="' . $name . '" placeholder="'. $placeholder .'">';
            if( $desc ){echo "<br /><span class='description'>$desc</span>"; }
        }

        //type*, id*, name*, button, desc
        if($type == 'img_load'){
            if($i_value){$class_del = ' show_del';}else{$class_del = '';}
            $img_load_img = '<img src="'. get_template_directory_uri() .'/img/no-image.png" alt="Нет картинки">';
            if($i_value){$img_load_img = '<img src="'.$i_value.'">';}
            echo '<div class="novos-thumb'.$class_del.'" id="'.$id.'-img"><a href="#" data-uri="'. get_template_directory_uri() .'/img/no-image.png">x</a>'.$img_load_img.'</div><br>';
            echo '<input type="hidden" value="'. $i_value .'" name="' . $name . '" id="' . $id . '-hidden">';
            echo '<button class="button button-secondary" id="' . $id . '">' . $button . '</button>';
            if( $desc ){echo "<br /><span class='description'>$desc</span>"; }
            echo <<<JS
            <script>
                var mediaUploader;
            
                $('#$id').on('click', function (e) {
                   e.preventDefault();
                   if( mediaUploader){
                       mediaUploader.open();
                       return;
                   }
            
                   mediaUploader = wp.media.frames.file_frame = wp.media({
                       title: 'Установите или загрузите логотип',
                       button: {
                           text: 'Выбрать логотип'
                       },
                        multiple: false
                   });
            
                   mediaUploader.on('select', function(){
                       attacment = mediaUploader.state().get('selection').first().toJSON();
                       $('#$id-hidden').val(attacment.url);
                       $('#$id-img img').attr('src', attacment.url);
                       $('#$id-img').addClass('show_del');
                   });
            
                   mediaUploader.open();
            
                });
            
                $('#$id-img a').on('click', function(e){
                    e.preventDefault();
                    $('#$id-img img').attr('src', $(this).attr('data-uri'));
                    $('#$id-hidden').val('');
                    $(this).parent().removeClass('show_del');
                });
                </script>
JS;

        }
    }


    function novos_create_admin_page(){
        require_once( get_template_directory() . '/includes/template/admin-setting-page.php' );
    }

    function novos_create_css_page(){

    }
