<div class="wrap">
    <h2><?php echo get_admin_page_title() ?></h2>
    <?php screen_icon(); ?>
    <?php settings_errors(); ?>
    <form action="options.php" method="post">
        <?php
        settings_fields( 'novo_option_group' );
        do_settings_sections( 'novos' );
        submit_button();
        ?>
    </form>
</div>