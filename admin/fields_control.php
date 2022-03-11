<?php

function cmb2_fields_teste(){


    $cmb2_area_teste = new_cmb2_box([
        'id' => 'area_teste',
        'title' => 'Perguntas',
        'object_types' => 'page',
        'show_on' => [
            'key' => 'page-template',
            'value' => 'page-test.php'
        ]
    ]);

    $campos_teste = $cmb2_area_teste->add_field([
        'name' => 'Adjetivos',
        'id' => 'area_adjetivos',
        'type' => 'group',
        'repeatable' => true,
        'description' => __('Coloque aqui as Adjetivos','cmb2'),
        'options' => [
            'group_title' => __('Pergunta {#}','cmb2'),
            'add_button' => __('Add Pergunta', 'cmb2'),
            'remove_button' => __('Remove Pergunta', 'cmb2'),
            'sortable' => true,
            'closed' => true
        ]
    ]);


    /*
    $cmb2_area_teste->add_group_field($campos_teste, [
        'name' => 'code',
        'id' => 'code_generator',
        'type' => 'text',
        'cmb2_show' => false,
        'attributes' => [
            'value' => $code1
        ]
    ]);
    */

   

    $cmb2_area_teste->add_group_field($campos_teste, [
        'name' => 'Adjetivo 1',
        'id' => 'adjetivo_one',
        'description' => 'Primeiro Adjetivo',
        'type' => 'text',
        'attributes' => [
            'maxlength' => 20
        ]
    ]);
    
    $cmb2_area_teste->add_group_field($campos_teste, [
        'name'             => 'Categoria Adjetivo 1',
        'desc'             => 'Selecione a categoria do adjetivo 1',
        'id'               => 'select_cat_adj_one',
        'type'             => 'select',
        'show_option_none' => true,
        'default'          => 'd',
        'options'          => array(
            "".$GLOBALS['d']."" => __( 'D', 'cmb2' ),
            "".$GLOBALS['i']."" => __( 'I', 'cmb2' ),
            "".$GLOBALS['si']."" => __( 'S', 'cmb2' ),
            "".$GLOBALS['c']."" => __( 'C', 'cmb2' ),
        ),
    ]);



    $cmb2_area_teste->add_group_field($campos_teste, [
        'name' => 'Adjetivo 2',
        'id' => 'adjetivo_two',
        'description' => 'Segundo Adjetivo',
        'type' => 'text',
        'attributes' => [
            'maxlength' => 20
        ]
    ]);
    $cmb2_area_teste->add_group_field($campos_teste, [
        'name'             => 'Categoria Adjetivo 2',
        'desc'             => 'Selecione a categoria do adjetivo 2',
        'id'               => 'select_cat_adj_two',
        'type'             => 'select',
        'show_option_none' => true,
        'default'          => 'd',
        'options'          => array(
            "".$GLOBALS['d']."" => __( 'D', 'cmb2' ),
            "".$GLOBALS['i']."" => __( 'I', 'cmb2' ),
            "".$GLOBALS['si']."" => __( 'S', 'cmb2' ),
            "".$GLOBALS['c']."" => __( 'C', 'cmb2' ),
        ),
    ]);



    $cmb2_area_teste->add_group_field($campos_teste, [
        'name' => 'Adjetivo 3',
        'id' => 'adjetivo_three',
        'description' => 'Terceiro Adjetivo',
        'type' => 'text',
        'attributes' => [
            'maxlength' => 20
        ]
    ]);
    $cmb2_area_teste->add_group_field($campos_teste, [
        'name'             => 'Categoria Adjetivo 2',
        'desc'             => 'Selecione a categoria do adjetivo 2',
        'id'               => 'select_cat_adj_three',
        'type'             => 'select',
        'show_option_none' => true,
        'default'          => 'd',
        'options'          => array(
            "".$GLOBALS['d']."" => __( 'D', 'cmb2' ),
            "".$GLOBALS['i']."" => __( 'I', 'cmb2' ),
            "".$GLOBALS['si']."" => __( 'S', 'cmb2' ),
            "".$GLOBALS['c']."" => __( 'C', 'cmb2' ),
        ),
    ]);



    $cmb2_area_teste->add_group_field($campos_teste, [
        'name' => 'Adjetivo 4',
        'id' => 'adjetivo_four',
        'description' => 'Quarto Adjetivo',
        'type' => 'text',
        'attributes' => [
            'maxlength' => 20
        ]
    ]);
    $cmb2_area_teste->add_group_field($campos_teste, [
        'name'             => 'Categoria Adjetivo 2',
        'desc'             => 'Selecione a categoria do adjetivo 2',
        'id'               => 'select_cat_adj_four',
        'type'             => 'select',
        'show_option_none' => true,
        'default'          => 'd',
        'options'          => array(
            "".$GLOBALS['d']."" => __( 'D', 'cmb2' ),
            "".$GLOBALS['i']."" => __( 'I', 'cmb2' ),
            "".$GLOBALS['si']."" => __( 'S', 'cmb2' ),
            "".$GLOBALS['c']."" => __( 'C', 'cmb2' ),    
        ),
    ]);

    //=====================================================================================================================================


    $cmb_resumo_result = new_cmb2_box([
        'id' => 'area_resumo_result',
        'title' => 'Informações dos resultados',
        'object_types' => 'page',
        'show_on' => [
            'key' => 'page-template',
            'value' => 'page-test.php'
        ]
    ]);

    $cmb_resumo_result->add_field([
        'name' => '<h1>Resumo sobre <strong>Dominância</strong></h1>',
        'id' => 'resumo_dominancia',
        'desc' => 'Coloque aqui um resumo sobre a dominância (será exibido no resultado do teste)',
        'type' => 'textarea'
    ]);

    $cmb_resumo_result->add_field([
        'name' => 'Pontos fortes de <strong>Dominância</strong></p>',
        'id' => 'ponto_forte_dominancia',
        'desc' => 'Descreva aqui os pontos fortes de dominância <strong>separados por vírgula</strong>',
        'type' => 'text'
    ]);

    $cmb_resumo_result->add_field([
        'name' => 'Pontos Fracos de <strong>Dominância</strong>',
        'id' => 'ponto_fraco_dominancia',
        'desc' => 'Descreva aqui os pontos fracos de dominância <strong>separados por vírgula</strong>',
        'type' => 'text'
    ]);




    $cmb_resumo_result->add_field([
        'name' => '<h1>Resumo sobre <strong>Influência</strong></h1>',
        'id' => 'resumo_influencia',
        'desc' => 'Coloque aqui um resumo sobre a Influência (será exibido no resultado do teste)',
        'type' => 'textarea'
    ]);

    $cmb_resumo_result->add_field([
        'name' => 'Pontos fortes de <strong>Influência</strong></p>',
        'id' => 'ponto_forte_influencia',
        'desc' => 'Descreva aqui os pontos fortes de Influência <strong>separados por vírgula</strong>',
        'type' => 'text'
    ]);

    $cmb_resumo_result->add_field([
        'name' => 'Pontos Fracos de <strong>Influência</strong>',
        'id' => 'ponto_fraco_influencia',
        'desc' => 'Descreva aqui os pontos fracos de Influência <strong>separados por vírgula</strong>',
        'type' => 'text'
    ]);





    $cmb_resumo_result->add_field([
        'name' => '<h1>Resumo sobre <strong>Estabilidade</strong></h1>',
        'id' => 'resumo_estabilidade',
        'desc' => 'Coloque aqui um resumo sobre a Estabilidade (será exibido no resultado do teste)',
        'type' => 'textarea'
    ]);

    $cmb_resumo_result->add_field([
        'name' => 'Pontos fortes de <strong>Estabilidade</strong></p>',
        'id' => 'ponto_forte_estabilidade',
        'desc' => 'Descreva aqui os pontos fortes de Estabilidade <strong>separados por vírgula</strong>',
        'type' => 'text'
    ]);

    $cmb_resumo_result->add_field([
        'name' => 'Pontos Fracos de <strong>Estabilidade</strong>',
        'id' => 'ponto_fraco_estabilidade',
        'desc' => 'Descreva aqui os pontos fracos de Estabilidade <strong>separados por vírgula</strong>',
        'type' => 'text'
    ]);





    $cmb_resumo_result->add_field([
        'name' => '<h1>Resumo sobre <strong>Conformidade</strong></h1>',
        'id' => 'resumo_conformidade',
        'desc' => 'Coloque aqui um resumo sobre a Conformidade (será exibido no resultado do teste)',
        'type' => 'textarea'
    ]);

    $cmb_resumo_result->add_field([
        'name' => 'Pontos fortes de <strong>Conformidade</strong></p>',
        'id' => 'ponto_forte_conformidade',
        'desc' => 'Descreva aqui os pontos fortes de Conformidade <strong>separados por vírgula</strong>',
        'type' => 'text'
    ]);

    $cmb_resumo_result->add_field([
        'name' => 'Pontos Fracos de <strong>Conformidade</strong>',
        'id' => 'ponto_fraco_conformidade',
        'desc' => 'Descreva aqui os pontos fracos de Conformidade <strong>separados por vírgula</strong>',
        'type' => 'text'
    ]);





    // =====================================================================================================================================

    $cmb2_area_text_email = new_cmb2_box([
        'id' => 'area_text_email',
        'title' => 'Informações para E-mail',
        'object_types' => 'page',
        'show_on' => [
            'key' => 'page-template',
            'value' => 'page-test.php'
        ]
    ]);

    $cmb2_area_text_email->add_field([
        'name' => 'Assunto do email',
        'id' => 'text_email_assunto',
        'desc' => 'Específique um texto para o assunto dos emails de relatório',
        'type' => 'text'
    ]);

    $cmb2_area_text_email->add_field([
        'name' => 'Remetente',
        'id' => 'text_email_remetente',
        'desc' => 'Quem está enviando o email',
        'type' => 'text'
    ]);

    $cmb2_area_text_email->add_field( array(
        'name'    => 'Imagem cabeçalho email',
        'desc'    => 'Insira uma imagem que será exibida no cabeçalho do email',
        'id'      => 'image_email',
        'type'    => 'file',
        // Optional:
        'options' => array(
            'url' => false, // Hide the text input for the url
        ),
        'text'    => array(
            'add_upload_file_text' => 'Add imagem' // Change upload button text. Default: "Add or Upload File"
        ),
        // query_args are passed to wp.media's library query.
        'query_args' => array(
            // Or only allow gif, jpg, or png images
             'type' => array(
                 'image/gif',
                 'image/jpeg',
                 'image/png',
             ),
        ),
        'preview_size' => 'thumb', // Image size to use when previewing in the admin.
    ) );

    $cmb2_area_text_email->add_field( array(
        'name'    => 'Informações para Email (Dominância)',
        'desc'    => 'Essa informação aqui é enviada por E-mail para o usuário que solicitar',
        'id'      => 'text_email_dominancia',
        'type'    => 'wysiwyg',
        'options' => array(
            'wpautop' => false, // use wpautop?
            'media_buttons' => false, // show insert/upload button(s)
            //'textarea_name' => $editor_id, // set the textarea name to something different, square brackets [] can be used here
            'textarea_rows' => get_option('default_post_edit_rows', 10), // rows="..."
            'tabindex' => '',
            'editor_css' => '', // intended for extra styles for both visual and HTML editors buttons, needs to include the `<style>` tags, can use "scoped".
            'editor_class' => '', // add extra class(es) to the editor textarea
            'teeny' => false, // output the minimal editor config used in Press This
            'dfw' => false, // replace the default fullscreen with DFW (needs specific css)
            'tinymce' => true, // load TinyMCE, can be used to pass settings directly to TinyMCE using an array()
            'quicktags' => true // load Quicktags, can be used to pass settings directly to Quicktags using an array()
        )
    ) );

    $cmb2_area_text_email->add_field( array(
        'name'    => 'Informações para Email (Influência)',
        'desc'    => 'Essa informação aqui é enviada por E-mail para o usuário que solicitar',
        'id'      => 'text_email_influencia',
        'type'    => 'wysiwyg',
        'options' => array(
            'wpautop' => false, // use wpautop?
            'media_buttons' => false, // show insert/upload button(s)
            //'textarea_name' => $editor_id, // set the textarea name to something different, square brackets [] can be used here
            'textarea_rows' => get_option('default_post_edit_rows', 10), // rows="..."
            'tabindex' => '',
            'editor_css' => '', // intended for extra styles for both visual and HTML editors buttons, needs to include the `<style>` tags, can use "scoped".
            'editor_class' => '', // add extra class(es) to the editor textarea
            'teeny' => false, // output the minimal editor config used in Press This
            'dfw' => false, // replace the default fullscreen with DFW (needs specific css)
            'tinymce' => true, // load TinyMCE, can be used to pass settings directly to TinyMCE using an array()
            'quicktags' => true // load Quicktags, can be used to pass settings directly to Quicktags using an array()
        )
    ) );

    $cmb2_area_text_email->add_field( array(
        'name'    => 'Informações para Email (Estabilidade)',
        'desc'    => 'Essa informação aqui é enviada por E-mail para o usuário que solicitar',
        'id'      => 'text_email_estabilidade',
        'type'    => 'wysiwyg',
        'options' => array(
            'wpautop' => false, // use wpautop?
            'media_buttons' => false, // show insert/upload button(s)
            //'textarea_name' => $editor_id, // set the textarea name to something different, square brackets [] can be used here
            'textarea_rows' => get_option('default_post_edit_rows', 10), // rows="..."
            'tabindex' => '',
            'editor_css' => '', // intended for extra styles for both visual and HTML editors buttons, needs to include the `<style>` tags, can use "scoped".
            'editor_class' => '', // add extra class(es) to the editor textarea
            'teeny' => false, // output the minimal editor config used in Press This
            'dfw' => false, // replace the default fullscreen with DFW (needs specific css)
            'tinymce' => true, // load TinyMCE, can be used to pass settings directly to TinyMCE using an array()
            'quicktags' => true // load Quicktags, can be used to pass settings directly to Quicktags using an array()
        )
    ) );

    $cmb2_area_text_email->add_field( array(
        'name'    => 'Informações para Email (Conformidade)',
        'desc'    => 'Essa informação aqui é enviada por E-mail para o usuário que solicitar',
        'id'      => 'text_email_conformidade',
        'type'    => 'wysiwyg',
        'options' => array(
            'wpautop' => false, // use wpautop?
            'media_buttons' => false, // show insert/upload button(s)
            //'textarea_name' => $editor_id, // set the textarea name to something different, square brackets [] can be used here
            'textarea_rows' => get_option('default_post_edit_rows', 10), // rows="..."
            'tabindex' => '',
            'editor_css' => '', // intended for extra styles for both visual and HTML editors buttons, needs to include the `<style>` tags, can use "scoped".
            'editor_class' => '', // add extra class(es) to the editor textarea
            'teeny' => false, // output the minimal editor config used in Press This
            'dfw' => false, // replace the default fullscreen with DFW (needs specific css)
            'tinymce' => true, // load TinyMCE, can be used to pass settings directly to TinyMCE using an array()
            'quicktags' => true // load Quicktags, can be used to pass settings directly to Quicktags using an array()
        )
    ) );


    $cmb2_area_text_email->add_field( array(
        'name'    => 'Informações do rodapé',
        'desc'    => 'Esse conteúdo vai no rodapé de todos os relatórios',
        'id'      => 'text_email_rodape',
        'type'    => 'wysiwyg',
        'options' => array(
            'wpautop' => false, // use wpautop?
            'media_buttons' => false, // show insert/upload button(s)
            //'textarea_name' => $editor_id, // set the textarea name to something different, square brackets [] can be used here
            'textarea_rows' => get_option('default_post_edit_rows', 10), // rows="..."
            'tabindex' => '',
            'editor_css' => '', // intended for extra styles for both visual and HTML editors buttons, needs to include the `<style>` tags, can use "scoped".
            'editor_class' => '', // add extra class(es) to the editor textarea
            'teeny' => false, // output the minimal editor config used in Press This
            'dfw' => false, // replace the default fullscreen with DFW (needs specific css)
            'tinymce' => true, // load TinyMCE, can be used to pass settings directly to TinyMCE using an array()
            'quicktags' => true // load Quicktags, can be used to pass settings directly to Quicktags using an array()
        )
    ) );



    $cmb2_are_pos_send = new_cmb2_box([
        'id' => 'area_pos_send',
        'title' => 'Comportamento após envio do formulário',
        'object_types' => 'page',
        'show_on' => [
            'key' => 'page-template',
            'value' => 'page-test.php'
        ]
    ]);

    $cmb2_are_pos_send->add_field([
        'name'    => 'Redirecionar para link',
        'desc'    => 'Se essa opção estiver marcada você poderá inserir um link de redirecionamento no campo abaixo no qual o usuário será redirecionado após receber o relatório por email',
        'id'      => 'action_pos_send',
        'type'    => 'checkbox'
    ]);

    $cmb2_are_pos_send->add_field([
        'name' => 'Link de redirecionamento',
        'desc' => 'Link para redirecionamento após envio do relatório do teste DISC',
        'id' => 'link_redirect_pos_send',
        'type' => 'text_url'
    ]);

    $cmb2_are_pos_send->add_field([
        'name' => 'Texto',
        'id' => 'text_post_send',
        'desc' => 'Insira um texto que será exibido após o envio do formulário',
        'type' => 'text'
    ]);

    $cmb2_are_pos_send->add_field([
        'name' => 'Texto do botão',
        'id' => 'text_btn_post_send',
        'desc' => 'Texto do botão',
        'type' => 'text'
    ]);

    $cmb2_are_pos_send->add_field([
        'name' => 'Link do botão',
        'id' => 'link_btn_post_send',
        'desc' => 'Insira um link para o botão',
        'type' => 'text_url'
    ]);
    
  

}
add_action('cmb2_admin_init', 'cmb2_fields_teste');
?>