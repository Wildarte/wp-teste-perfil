<?php

    require '../../../../wp-config.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $num_question = $_POST['num_q'];
        $page_id = $_POST['page_id'];

        $adjetivos = get_post_meta($page_id, 'area_adjetivos', true);

        

        if(!empty($adjetivos[$num_question])):
        
        ?>
            <ul class="resps">
                <li>
                    <button onclick="sendResp()" class="btn_resp"><?= $adjetivos[$num_question]['adjetivo_one'] ?></button>
                </li>   
                <li>
                    <button onclick="sendResp()" class="btn_resp"><?= $adjetivos[$num_question]['adjetivo_two'] ?></button>
                </li>
                <li>
                    <button onclick="sendResp()" class="btn_resp"><?= $adjetivos[$num_question]['adjetivo_three'] ?></button>
                </li>
                <li>
                    <button onclick="sendResp()" class="btn_resp"><?= $adjetivos[$num_question]['adjetivo_four'] ?></button>
                </li>

                
            </ul>
        <?php

        else:

            echo "nada";
            echo var_dump($adjetivos[$num_question]);
            echo $num_question;
            echo $page_id;
        endif;

    }else{
        
        echo "não houve POST";

    }

?>