<?php

    require '../../../../wp-config.php';

    

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $value_answer = $_POST['value_answer'];
        $answer = $_POST['answer'];
        $position = $_POST['position'];
        $array_adj = ['one','two','three','four'];
        //$rand_adj = [];//variavel para armazenar nomes das variaveis

        $num_question = $_POST['num_q']; //numero da questao
        $page_id = $_POST['page_id']; //get page id
        
        $adjetivos = get_post_meta($page_id, 'area_adjetivos', true);//get the adjetivos
        $count_adj = count($adjetivos); //contagem de perguntas

        $in_prev = $num_question - 1; //essa variavel vai servir para verificar a questao anterior
        $adj_position = ""; //essa variavel vai complementar o texto que vai dentro do array de perguntas para verificar qual a questao a  ser verificada

        switch($value_answer):
            case $GLOBALS['d']:
                $_SESSION['d'] += 1;
            break;
            case $GLOBALS['i']:
                $_SESSION['i'] += 1;
            break;
            case $GLOBALS['si']:
                $_SESSION['s'] += 1;
            break;
            case $GLOBALS['c']:
                $_SESSION['c'] += 1;
            break;
            default:
                $adj_position = "";
        endswitch;

        $_SESSION['contagem_questions'] += 1;
        if($_SESSION['contagem_questions'] == $count_adj):
            $n1 = $_SESSION['d']/$count_adj * 100;
            $n2 = $_SESSION['i']/$count_adj * 100;
            $n3 = $_SESSION['s']/$count_adj * 100;
            $n4 = $_SESSION['c']/$count_adj * 100;


            $r_d = number_format($n1, 2, ',', '');
            $r_i = number_format($n2, 2, ',', '');
            $r_s = number_format($n3, 2, ',', '');
            $r_c = number_format($n4, 2, ',', '');


            $fator_predominante = "";
            if($n1 >= $n2 && $n1 >= $n3 && $n1 >= $n4){
                if($n1 == $n2){
                    $fator_predominante = "Dominância";
                }elseif($n1 == $n3){
                    $fator_predominante = "Dominância";
                }elseif($_d == $n4){
                    $fator_predominante = "Dominância";
                }else{
                    $fator_predominante = "Dominância";
                }
            }elseif($n2 >= $n1 && $n2 >= $n3 && $n2 >= $n4){
                if($n2 == $n1){
                    $fator_predominante = "Influência";
                }else if($n2 == $n3){
                    $fator_predominante = "Influência";
                }elseif($n2 == $n4){
                    $fator_predominante = "Influência";
                }else{
                    $fator_predominante = "Influência";
                }
            }elseif($n3 >= $n1 && $n3 >= $n2 && $n3 >= $n4){
                if($n3 == $n1){
                    $fator_predominante = "Estabilidade";
                }elseif($n3 == $n2){
                    $fator_predominante = "Estabilidade";
                }elseif($n3 == $n4){
                    $fator_predominante = "Estabilidade";
                }else{
                    $fator_predominante = "Estabilidade";
                }
            }else{
                $fator_predominante = "Conformidade";
            }


            $results_test[0] = $r_d;
            $results_test[1] = $r_i;
            $results_test[2] = $r_s;
            $results_test[3] = $r_c;


            function checkResults($first, $second, $third, $fourth, $word1, $word2, $word3, $word4){
                if($first >= $second && $first >= $third && $first >= $fourth){
    
                    $_SESSION['first_default'] = $word1;

                    if($second >= 20){
                        if($second >= $third && $second >= $fourth){
                            
                            $_SESSION['second_default'] = $word2;

                            if($third >= 20){
                                if($third >= $fourth){
                                    $_SESSION['third_default'] = $word3;
                                }else{
                                    $_SESSION['fourth_default'] = $word4;
                                }
                            }else if($fourth > 20){
                                if($fourth >= $third){
                                    $_SESSION['third_default'] = $word4;
                                }else{
                                    $_SESSION['fourth_default'] = $word3;
                                }
                            }            

                        }
                    }else if($third >= 20){
                        if($third >= $second && $third >= $fourth){

                            $_SESSION['second_default'] = $word3;

                            if($second >= 20){
                                if($second >= $fourth){
                                    $_SESSION['third_default'] = $word2;
                                }
                                else{
                                    $_SESSION['fourth_default'] = $word4;
                                }
                            }else if($fourth >= 20){
                                if($fourth >= $second){
                                    $_SESSION['third_default'] = $word4;
                                }
                                else{
                                    $_SESSION['fourth_default'] = $word2;
                                }
                            }       

                        }
                    }else if($fourth >= 20){
                        if($fourth >= $second && $fourth >= $third){

                            $_SESSION['second_default'] = $word4;

                            if($second >= 20){
                                if($second >= $third){
                                    $_SESSION['third_default'] = $word2;
                                }else{
                                    $_SESSION['fourth_default'] = $word3;
                                }
                            }else if($third >= 20){
                                if($third >= $second){
                                    $_SESSION['third_default'] = $word3;
                                }else{
                                    $_SESSION['fourth_default'] = $word2;
                                }
                            }
                            
                        }
                    }
                }
            }

            $w1 = "dominancia";
            $w2 = "influencia";
            $w3 = "estabilidade";
            $w4 = "conformidade";

        
            checkResults(round($n4), round($n1), round($n2), round($n3), $w4, $w1, $w2, $w3);
            checkResults(round($n3), round($n4), round($n1), round($n2), $w3, $w4, $w1, $w2);
            checkResults(round($n2), round($n3), round($n4), round($n1), $w2, $w3, $w4, $w1);
            checkResults(round($n1), round($n2), round($n3), round($n4), $w1, $w2, $w3, $w4);


        

            ?>
            <style>
                h2{
                    width: 100%;
                }
            </style>
            <?php
        
           
 
            ?>
                <div class="graphs">
                    <h4>Seu Resultado</h4>
                    <div class="fi_div field_dom">
                        <span>Dominância</span>
                        <div class="bar dom_bar">
                            <span class="dom_bar_progress" data-progress="<?= round($r_d) ?>">
                                <span class="tooltip_progress dom_tooltip"><?= $r_d ?>%</span>
                                <input type="hidden" name="input_dom" id="input_dom" value="<?= round($r_d); ?>">
                            </span>
                        </div>
                    </div>

                    <div class="fi_div field_inf">
                        <span>Influência</span>
                        <div class="bar inf_progress">
                            <span class="inf_bar_progress" data-progress="<?= round($r_i) ?>">
                                <span class="tooltip_progress inf_tooltip"><?= $r_i ?>%</span>
                                <input type="hidden" name="input_inf" id="input_inf" value="<?= round($r_i); ?>">
                            </span>
                        </div>
                    </div>

                    <div class="fi_div field_est">
                        <span>Estabilidade</span>
                        <div class="bar est_bar">
                            <span class="est_bar_progress" data-progress="<?= round($r_s) ?>">
                                <span class="tooltip_progress est_tooltip"><?= $r_s ?>%</span>
                                <input type="hidden" name="input_est" id="input_est" value="<?= round($r_s); ?>">
                            </span>
                        </div>
                    </div>

                    <div class="fi_div field_conf">
                        <span>Conformidade</span>
                        <div class="bar con_bar">
                            <span class="con_bar_progress" data-progress="<?= round($r_c) ?>">
                                <span class="tooltip_progress con_tooltip"><?= $r_c ?>%</span>
                                <input type="hidden" name="input_con" id="input_con" value="<?= round($r_c); ?>">
                            </span>
                        </div>
                    </div>

                    <script id="script-test">
                        
                    </script>
                </div>

                <div class="r_info">
                    <?php
                        $color_word_result = "";
                        switch($fator_predominante):
                            case "Dominância":
                                $color_word_result = "dominancia";
                            break;
                            case "Influência":
                                $color_word_result = "influencia";
                            break;
                            case "Estabilidade":
                                $color_word_result = "estabilidade";
                            break;
                            case "Conformidade":
                                $color_word_result = "conformidade";
                            break;
                            default:
                                $color_word_result = "";
                        endswitch;
                    ?>
                    <p>Fator Predominante: <span class="result_word color_word_<?= $color_word_result; ?>"><?= $fator_predominante ?></span></p>
                    <p><?= get_post_meta($page_id, 'resumo_'.$color_word_result, true); ?></p>
                    <p><strong>Pontos Fortes: </strong> <?= get_post_meta($page_id, 'ponto_forte_'.$color_word_result, true); ?></p>
                    <p><strong>Pontos Fracos: </strong><?= get_post_meta($page_id, 'ponto_fraco_'.$color_word_result, true); ?></p>
                    
                </div>
           
            <?php
        else:

            if(!empty($value_answer) && !empty($answer) && !empty($position)):

                

               
              
                    
                    if($num_question < $count_adj):
                        //echo " | ".$num_question;

                        

                        if(!empty($adjetivos[$num_question])):
                            //echo "<h1>Variável: ";
                            shuffle($array_adj);
                           
                            
                            ?>

                            <ul class="resps">
                                <li>
                                    <button onclick="sendResp(1,'<?= $adjetivos[$num_question]['select_cat_adj_'.$array_adj[0]]; ?>', '<?= $adjetivos[$num_question]['adjetivo_'.$array_adj[0]]; ?>')" class="btn_resp"><?= $adjetivos[$num_question]['adjetivo_'.$array_adj[0]] ?></button>
                                </li>   
                                <li>
                                    <button onclick="sendResp(2,'<?= $adjetivos[$num_question]['select_cat_adj_'.$array_adj[1]]; ?>', '<?= $adjetivos[$num_question]['adjetivo_'.$array_adj[1]]; ?>')" class="btn_resp"><?= $adjetivos[$num_question]['adjetivo_'.$array_adj[1]] ?></button>
                                </li>
                                <li>
                                    <button onclick="sendResp(3,'<?= $adjetivos[$num_question]['select_cat_adj_'.$array_adj[2]]; ?>', '<?= $adjetivos[$num_question]['adjetivo_'.$array_adj[2]]; ?>')" class="btn_resp"><?= $adjetivos[$num_question]['adjetivo_'.$array_adj[2]] ?></button>
                                </li>
                                <li>
                                    <button onclick="sendResp(4,'<?= $adjetivos[$num_question]['select_cat_adj_'.$array_adj[3]]; ?>', '<?= $adjetivos[$num_question]['adjetivo_'.$array_adj[3]]; ?>')" class="btn_resp"><?= $adjetivos[$num_question]['adjetivo_'.$array_adj[3]] ?></button>
                                </li>

                                
                            </ul>
                            <?php
                            
                        else:
                            
                            echo "Nada";

                        endif;

                    else:

                        echo "0";
                        //echo var_dump($adjetivos[$num_question]);
                        //echo " | ".$num_question;
                        //echo $page_id;
                        //session_destroy();
                    endif;
                
                //endif;

            else:
                echo "Algo saiu errado";
            endif;

        endif;

    }else{
        
        echo "...";

    }

?>