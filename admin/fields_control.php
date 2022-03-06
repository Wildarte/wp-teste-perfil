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




    // =======================================================================
    $cmb2_area_teste->add_field( array(
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



    $cmb2_area_teste->add_field([
        'name' => 'title',
        'desc' => 'tt',
        'id' => 'test_title',
        'type' => 'text'
    ]);

}
add_action('cmb2_admin_init', 'cmb2_fields_teste');
?>