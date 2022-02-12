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
            "d" => __( 'D', 'cmb2' ),
            "i" => __( 'I', 'cmb2' ),
            "s" => __( 'S', 'cmb2' ),
            "c" => __( 'C', 'cmb2' ),
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
            "d" => __( 'D', 'cmb2' ),
            "i" => __( 'I', 'cmb2' ),
            "s" => __( 'S', 'cmb2' ),
            "c" => __( 'C', 'cmb2' ),
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
            "d" => __( 'D', 'cmb2' ),
            "i" => __( 'I', 'cmb2' ),
            "s" => __( 'S', 'cmb2' ),
            "c" => __( 'C', 'cmb2' ),
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
            "d" => __( 'D', 'cmb2' ),
            "i" => __( 'I', 'cmb2' ),
            "s" => __( 'S', 'cmb2' ),
            "c" => __( 'C', 'cmb2' ),    
        ),
    ]);

}
add_action('cmb2_admin_init', 'cmb2_fields_teste');
?>