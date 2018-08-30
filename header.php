<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <title><?php wp_title('/'); ?></title>
    <link rel="alternate" type="application/rdf+xml" title="RDF mapping" href="<?php bloginfo('rdf_url'); ?>">
    <link rel="alternate" type="application/rss+xml" title="RSS" href="<?php bloginfo('rss_url'); ?>">
    <link rel="alternate" type="application/rss+xml" title="Comments RSS" href="<?php bloginfo('comments_rss2_url'); ?>">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header>
        <div class="container">
            <div class="row header-wrap">
                <div class="header-top">
                    <div class="col-md-6 logo">
                        <a href="<?php echo home_url(); ?>" class="logo-home">
                            <img src="" alt="<?php bloginfo( 'name' ); ?>">
                            <span>Novostroiki-M.ru</span>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <div class="header-login-form">
                            <form action="post">
                                <input type="text" name="login" class="input-lg">
                                <input type="pass" name="login" class="input-lg">
                                <input type="submit" value="Вход" class="btn-default">
                            </form>
                        </div>
                        <div class="header-login-link">
                            <ul>
                                <li><a href="#">Регистрация</a></li>
                                <li><a href="">Забыли пароль?</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $args = array('theme_location' => 'top', 'container'=> 'nav', 'menu_class' => 'bottom-menu', 'menu_id' => 'bottom-nav');
            wp_nav_menu($args);
            ?>
        </div>
    </header>