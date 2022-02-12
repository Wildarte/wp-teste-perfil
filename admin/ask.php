<?php

    require '../../../../wp-config.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $value_answer = $_POST['value_answer'];
        $answer = $_POST['answer'];
        $position = $_POST['position'];

        if(!empty($value_answer) && !empty($answer) && !empty($position)):

            $num_question = $_POST['num_q']; //numero da questao
            $page_id = $_POST['page_id']; //get page id
            
            $adjetivos = get_post_meta($page_id, 'area_adjetivos', true);//get the adjetivos
            $count_adj = count($adjetivos); //contagem de perguntas

            $in_prev = $num_question - 1; //essa variavel vai servir para verificar a questao anterior
            $adj_position = ""; //essa variavel vai complementar o texto que vai dentro do array de perguntas para verificar qual a questao a  ser verificada

            switch($position):
                case 1:
                    $adj_position = "one";
                break;
                case 2:
                    $adj_position = "two";
                break;
                case 3:
                    $adj_position = "three";
                break;
                case 4:
                    $adj_position = "four";
                break;
                default:
                    $adj_position = "";
            endswitch;

            if($adjetivos[$in_prev]['select_cat_adj_'.$adj_position.''] != $value_answer || $adjetivos[$in_prev]['adjetivo_'.$adj_position.''] != $answer):
            
                echo "Existe um diferente";

                echo "adj_position: ".$adj_position."<br>";
                echo "value_answer: ".$value_answer."<Br>";
                echo "answer: ".$answer."<br>";
                echo "position: ".$position."<br>";
                echo "select_adj: ".$adjetivos[$in_prev]['select_cat_adj_'.$adj_position]."<br>";
                echo "adjetivo: ".$adjetivos[$in_prev]['adjetivo_'.$adj_position]."<br>";
                echo "in_prev: ".$in_prev."<br>";

            else:
            
                echo "adj_position: ".$adj_position."<br>";
                echo "value_answer: ".$value_answer."<Br>";
                echo "answer: ".$answer."<br>";
                echo "position: ".$position."<br>";
                echo "select_adj: ".$adjetivos[$in_prev]['select_cat_adj_'.$adj_position.'']."<br>";
                echo "adjetivo: adjetivo_".$adj_position."<br>";
                echo "in_prev: ".$in_prev."<br>";

                
                if($num_question < $count_adj):
                    echo " | ".$num_question;

                    if(!empty($adjetivos[$num_question])):

                        echo "Número da questão: ".$num_question." | Contagem de perguntas: ".$count_adj;
                
                        ?>
                        <ul class="resps">
                            <li>
                                <button onclick="sendResp(1,'<?= $adjetivos[$num_question]['select_cat_adj_one']; ?>', '<?= $adjetivos[$num_question]['adjetivo_one']; ?>')" class="btn_resp"><?= $adjetivos[$num_question]['adjetivo_one'] ?></button>
                            </li>   
                            <li>
                                <button onclick="sendResp(2,'<?= $adjetivos[$num_question]['select_cat_adj_two']; ?>', '<?= $adjetivos[$num_question]['adjetivo_two']; ?>')" class="btn_resp"><?= $adjetivos[$num_question]['adjetivo_two'] ?></button>
                            </li>
                            <li>
                                <button onclick="sendResp(3,'<?= $adjetivos[$num_question]['select_cat_adj_three']; ?>', '<?= $adjetivos[$num_question]['adjetivo_three']; ?>')" class="btn_resp"><?= $adjetivos[$num_question]['adjetivo_three'] ?></button>
                            </li>
                            <li>
                                <button onclick="sendResp(4,'<?= $adjetivos[$num_question]['select_cat_adj_four']; ?>', '<?= $adjetivos[$num_question]['adjetivo_four']; ?>')" class="btn_resp"><?= $adjetivos[$num_question]['adjetivo_four'] ?></button>
                            </li>

                            
                        </ul>
                        <?php

                    else:
                        
                        echo "Nada";

                    endif;

                else:

                    echo "Acabaram as perguntas";
                    //echo var_dump($adjetivos[$num_question]);
                    echo " | ".$num_question;
                    //echo $page_id;
                endif;
            
            endif;

        else:
            echo "Algo saiu errado";
        endif;

    }else{
        
        echo "não houve POST";

    }

?>