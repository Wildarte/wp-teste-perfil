<?php

    require '../../../../wp-config.php';

    
    

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $value_answer = $_POST['value_answer'];
        $answer = $_POST['answer'];
        $position = $_POST['position'];
        $array_adj = ['one','two','three','four'];
        $rand_adj = [];//variavel para armazenar nomes das variaveis

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
            if($r_d >= $r_i && $r_d >= $r_s && $r_d >= $r_c){
                if($r_d == $r_i){
                    $fator_predominante = "Dominância";
                }elseif($r_d == $r_s){
                    $fator_predominante = "Dominância";
                }elseif($_d == $r_c){
                    $fator_predominante = "Dominância";
                }else{
                    $fator_predominante = "Dominância";
                }
            }elseif($r_i >= $r_d && $r_i >= $r_s && $r_i >= $r_c){
                if($r_i == $r_d){
                    $fator_predominante = "Influência";
                }else if($r_i == $r_s){
                    $fator_predominante = "Influência";
                }elseif($r_i == $r_c){
                    $fator_predominante = "Influência";
                }else{
                    $fator_predominante = "Influência";
                }
            }elseif($r_s >= $r_d && $r_s >= $r_i && $r_s >= $r_c){
                if($r_s == $r_d){
                    $fator_predominante = "Estabilidade";
                }elseif($r_s == $r_i){
                    $fator_predominante = "Estabilidade";
                }elseif($r_s == $r_c){
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

        
            checkResults(round($r_c), round($r_d), round($r_i), round($r_s), $w4, $w1, $w2, $w3);
            checkResults(round($r_s), round($r_c), round($r_d), round($r_i), $w3, $w4, $w1, $w2);
            checkResults(round($r_i), round($r_s), round($r_c), round($r_d), $w2, $w3, $w4, $w1);
            checkResults(round($r_d), round($r_i), round($r_s), round($r_c), $w1, $w2, $w3, $w4);



            /*
            if($results_test[0] >= $results_test[1]){
                if($results_test[0] >= $results_test[2]){
                    if($results_test[0] >= $results_test[3] ){

                        $_SESSION['first_default'] = "dominancia";

                        if($results_test[1] > 20){
                            if($results_test[1] >= $results_test[2]){
                                if($results_test[1] >= $results_test[3]){
    
                                    $_SESSION['second_default'] = "influencia";

                                    if($results_test[2] > 20 && $results_test[2] > $results_test[3]){
                                        $_SESSION['third_default'] = 'estabilidade';
                                        $_SESSION['fourth_default'] = 'conformidade';
                                    }
    
                                }
                            }
                        }
                        
                    }
                }
            }
            */

            //echo "Domin: ".$r_d." / Influ: ".$r_i." / Estab: ".$r_s." / Conform: ".$r_c."<br>";

            ?>
            <style>
                h2{
                    width: 100%;
                }
            </style>
            <?php
            echo "<h2>primeiro: ".$_SESSION["first_default"]."</h2> <br>";
            echo "<h2>segundo: ".$_SESSION["second_default"]."</h2><br>";
            echo "<h2>terceiro: ".$_SESSION["third_default"]."</h2> <br>";
            echo "<h2>quarto: ".$_SESSION["fourth_default"]."</h2 ><br>";

            echo "Dom ".$r_d;
            echo "Inf ".$r_i;
            echo "Est ".$r_s;
            echo "Conf ".$r_c;
            ?>
                <div class="graphs">
                    <h4>Seu Resultado</h4>
                    <div class="fi_div field_dom">
                        <span>Dominância</span>
                        <div class="bar dom_bar">
                            <span class="dom_bar_progress" data-progress="<?= round($r_d) ?>">
                                <span class="tooltip_progress dom_tooltip"><?= $r_d ?>%</span>
                                <input type="hidden" name="input_dom" value="<?= round($r_d); ?>">
                            </span>
                        </div>
                    </div>

                    <div class="fi_div field_inf">
                        <span>Influência</span>
                        <div class="bar inf_progress">
                            <span class="inf_bar_progress" data-progress="<?= round($r_i) ?>">
                                <span class="tooltip_progress inf_tooltip"><?= $r_i ?>%</span>
                                <input type="hidden" name="input_inf" value="<?= round($r_d); ?>">
                            </span>
                        </div>
                    </div>

                    <div class="fi_div field_est">
                        <span>Estabilidade</span>
                        <div class="bar est_bar">
                            <span class="est_bar_progress" data-progress="<?= round($r_s) ?>">
                                <span class="tooltip_progress est_tooltip"><?= $r_s ?>%</span>
                                <input type="hidden" name="input_est" value="<?= round($r_d); ?>">
                            </span>
                        </div>
                    </div>

                    <div class="fi_div field_conf">
                        <span>Conformidade</span>
                        <div class="bar con_bar">
                            <span class="con_bar_progress" data-progress="<?= round($r_c) ?>">
                                <span class="tooltip_progress con_tooltip"><?= $r_c ?>%</span>
                                <input type="hidden" name="input_con" value="<?= round($r_d); ?>">
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
                    <p>Esta dimensão enfatiza a possibilidade de trabalhar para assegurar a qualidade e a precisão em todas as tarefas.</p>
                    <p><strong>Pontos Fortes: </strong> digno de confiança, prático, diplomata, objetivo, organizado e eficiente.</p>
                    <p><strong>Pontos Fracos: </strong>egoísta, avarento, indeciso, desmotivado, preguiçoso e preocupado.</p>
                    
                </div>
            <script>

                    

                    //let val = document.querySelector('.dom_bar_progress').getAttribute('data-progress');
                    //console.log(val);
                    //document.getElementsByClassName('.dom_bar_progress')[0].style.width = "20%";
                    //document.getElementsByClassName('.dom_bar_progress')[0].style.transition = '1.6s';
                    
                    

                    //document.querySelector('.inf_bar_progress').style.width = '30%';
                    //document.querySelector('.inf_bar_progress').style.transition = '1.6s';

                    //document.querySelector('.est_bar_progress').style.width = '60%';
                    //document.querySelector('.est_bar_progress').style.transition = '1.6s';

                    //document.querySelector('.con_bar_progress').style.width = '90%';
                    //document.querySelector('.con_bar_progress').style.transition = '1.6s';
                
                
            </script>
            <?php
        else:

            if(!empty($value_answer) && !empty($answer) && !empty($position)):

                

               
                /*
                if($adjetivos[$in_prev]['select_cat_adj_'.$adj_position.''] != $value_answer || $adjetivos[$in_prev]['adjetivo_'.$adj_position.''] != $answer):
                
                    echo "Existe um diferente";

                    echo "adj_position: ".$adj_position."<br>";
                    echo "value_answer: ".$value_answer."<Br>";
                    echo "answer: ".$answer."<br>";
                    echo "position: ".$position."<br>";
                    echo "select_adj: ".$adjetivos[$in_prev]['select_cat_adj_'.$adj_position]."<br>";
                    echo "adjetivo: ".$adjetivos[$in_prev]['adjetivo_'.$adj_position]."<br>";
                    echo "in_prev: ".$in_prev."<br>";

                else:*/
                
                    //echo "adj_position: ".$adj_position."<br>";
                    //echo "value_answer: ".$value_answer."<br>";
                    //echo "answer: ".$answer."<br>";
                    //echo "position: ".$position."<br>";
                    //echo "select_adj: ".$adjetivos[$in_prev]['select_cat_adj_'.$adj_position.'']."<br>";
                    //echo "adjetivo: adjetivo_".$adj_position."<br>";
                    //echo "in_prev: ".$in_prev."<br>";
                    
                    
                    if($num_question < $count_adj):
                        //echo " | ".$num_question;

                        

                        if(!empty($adjetivos[$num_question])):
                            //echo "<h1>Variável: ";
                            shuffle($array_adj);
                            //for($i = 0; $i < 4; $i++){
                            //    echo $array_adj[$i]." / ";
                            //}
                            //echo "</h1>";
                            //echo "Número da questão: ".$num_question." | Contagem de perguntas: ".$count_adj;
                            
                            
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
                        session_destroy();
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