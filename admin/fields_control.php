<?php

function cmb2_fields_teste(){

    $cmb2_area_teste = new_cmb2_box([
        'id' => 'area_teste',
        'title' => 'Título',
        'object_types' => 'page',
        'show_on' => [
            'key' => 'page-template',
            'value' => 'page-test.php'
        ]
    ]);

    $campos_teste = $cmb2_area_teste->add_field([
        'name' => 'Título',
        'id' => 'area_teste',
        'type' => 'text'
    ]);

}
add_action('cmb2_admin_init', 'cmb2_fields_teste');
?>