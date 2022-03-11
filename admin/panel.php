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


function fields_email_smtp(){

    add_settings_section('smtp_section','','display_smtp_options_content','options_contato');

    add_settings_field('show_username', 'Username', 'display_username', 'options_contato', 'smtp_section');
    add_settings_field('show_host', 'host', 'display_host', 'options_contato', 'smtp_section');
    add_settings_field('show_email', 'email', 'display_email', 'options_contato', 'smtp_section');
    add_settings_field('show_password', 'password', 'display_password', 'options_contato', 'smtp_section');
    add_settings_field('show_secure', 'secure', 'display_secure', 'options_contato', 'smtp_section');
    add_settings_field('show_port', 'port', 'display_port', 'options_contato', 'smtp_section');


    register_setting('contato_section','show_username');
    register_setting('contato_section','show_host');
    register_setting('contato_section','show_email');
    register_setting('contato_section','show_password');
    register_setting('contato_section','show_secure');
    register_setting('contato_section','show_port');

}
add_action('admin_init','fields_email_smtp');

function display_smtp_options_content(){
    ?>
        <hr>
        <h2>Configurações SMTP</h2>
    <?php
}

function display_username(){
    ?>
        <input type="text" name="show_username" id="show_username" value="<?= get_option('show_username') ?>">
    <?php
}

function display_host(){
    ?>
        <input type="text" name="show_host" id="show_host" value="<?= get_option('show_host'); ?>">
    <?php
}

function display_email(){
    ?>
        <input type="text" name="show_email" id="show_email" value="<?= get_option('show_email'); ?>">
    <?php
}

function display_password(){
    ?>
        <input type="password" name="show_password" id="show_password" value="<?= get_option('show_password'); ?>">
    <?php
}

function display_secure(){
    ?>
        <select name="show_secure" id="show_secure" value="<?= get_option('show_secure'); ?>">
            <option value="ssl" <?= get_option('show_secure') == "ssl" ? "selected" : "" ?>>ssl</option>
            <option value="tls" <?= get_option('show_secure') == "tls" ? "selected" : "" ?>>tls</option>
        </select>
    <?php
}

function display_port(){
    ?>
        <input type="number" style="width: 90px;" name="show_port" id="show_port" value="<?= get_option('show_port'); ?>">

        <div style="margin: 18px 0;">
            <button id="smtp_test">Teste Conexão</button><span id="result"></span>
        </div>


        <script>

            document.getElementById('smtp_test').addEventListener('click', function(e){

                e.preventDefault();
                
                this.innerHTML = "Testando...";

                let username = document.getElementById('show_username').value;
                let host = document.getElementById('show_host').value;
                let email = document.getElementById('show_email').value;
                let password = document.getElementById('show_password').value;
                let secure = document.getElementById('show_secure').value;
                let port = document.getElementById('show_port').value;


                var params = "username="+username+"&host="+host+"&password="+password+"&port="+port;

                const xmlhttp = new XMLHttpRequest();
                xmlhttp.onload = function(){
                    let resp = this.responseText;

                    document.getElementById('result').innerHTML = resp;

                    document.getElementById('smtp_test').innerHTML = "Teste Conexão"
                    
                }
                xmlhttp.open("post", "<?= get_template_directory_uri(); ?>/admin/test_smtp.php", true);
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xmlhttp.send(params);

            });
        </script>
    <?php
}

} 
add_action('admin_menu',  'add_new_menu_itens');


?>
