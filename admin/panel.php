<?php


function add_new_menu_itens(){

    add_menu_page(
        'Configuração do Tema',
        'Configuração do Tema',
        '',
        'theme-options',
        100
    );



add_submenu_page(
    'theme-options',
    'E-mail contato',
    'E-mail contato',
    'manage_options',
    'options_contato',
    'callback_contato'
);

function callback_contato(){
    ?>

        <div>

            <?php settings_errors(); ?>
            <h1>Configurações de e-mail</h1>
            <form action="options.php" method="post">
                <?php

                    settings_fields("contato_section");

                    do_settings_sections("options_contato");

                    submit_button();

                ?>
            </form>

        </div>

    <?php
}

function fields_email_contato(){

    add_settings_section('contato_section','','display_emailcontato_options_content','options_contato');

    add_settings_field('show_email_contato', 'E-mail para contato', 'display_email_contato', 'options_contato', 'contato_section');


    register_setting('contato_section','show_email_contato');

}
add_action('admin_init','fields_email_contato');

function display_emailcontato_options_content(){
    ?>
        <hr>
        <h2>E-mail para contato</h2>
    <?php
}

function display_email_contato(){
    ?>
        <input type="email" name="show_email_contato" id="show_email_contato" value="<?= get_option('show_email_contato') ?>">
    <?php
}

} 
add_action('admin_menu',  'add_new_menu_itens');


?>
