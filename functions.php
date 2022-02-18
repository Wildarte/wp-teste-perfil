<?php

    //variaveis para armazenar os
    $GLOBALS['d'] = "Fdj32dsj";
    $GLOBALS['i'] = "m90dsOcs";
    $GLOBALS['si'] = "lnM02sla";
    $GLOBALS['c'] = "cmaJdnsx";

    

    // Funções para Limpar o Header
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'start_post_rel_link', 10, 0 );
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
    remove_action('wp_head', 'feed_links_extra', 3);
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');


    include('admin/fields_control.php');

    //Essa função gera um valor de String aleatório do tamanho recebendo por parametros
    function randString($size){
        //String com valor possíveis do resultado, os caracteres pode ser adicionado ou retirados conforme sua necessidade
        $basic = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

        $return= "";

        for($count= 0; $size > $count; $count++){
            //Gera um caracter aleatorio
            $return.= $basic[rand(0, strlen($basic) - 1)];
        }

        return $return;
    }

    //Imprime uma String randônica com 20 caracteres
    


    if(!function_exists('setup_session_start')):

        function setup_session_start(){
        
            if(!session_id()) session_start();
        
        }
        add_action('init', 'setup_session_start');

    endif;

    

?>