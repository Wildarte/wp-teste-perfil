<?php

    // Template Name: Teste DISC
    get_header();
    
    
    
    $adjetivos = get_post_meta(get_the_ID(), 'area_adjetivos', true);

    $count_questions = count($adjetivos);

    //echo $adjetivos[1]['adjetivo_one'];

    echo "<br>";

    if(is_array($adjetivos)):

        //foreach($adjetivos as $adjetivo):

            echo "<h4>".$adjetivos[0]['adjetivo_one']."</h4>";
            echo "<h4>".$adjetivos[0]['adjetivo_two']."</h4>";
            echo "<h4>".$adjetivos[0]['adjetivo_three']."</h4>";
            echo "<h4>".$adjetivos[0]['adjetivo_four']."</h4>";

        //endforeach;

    endif;

?>
    
    <header class="header_top_area">
        <h1 class="header_title">Teste Disc</h1>
        <h2 class="header_subtitle">Avaliação de Perfil Comportamental gratuito.</h2>
    </header>
    <section class="page_bottom">
        <div class="container_wizard">
            <div class="wizard_top">
                <img src="<?= get_template_directory_uri() ?>/assets/img/barra-disc.png" alt="">
            </div>
            <div class="wizard_text">
                <header class="header_wizard_text">
                    <h3 class="wizard_title">Você está pronta(o) para conhecer seu perfil comportamental predominante?</h3>
                </header>
                <div class="wizard_body">
                    <div class="wizard_tips">
                        <h4 class="tips_title">DICAS:</h4>
                        <ol class="tips_list">
                            <li>Não há resultado bom ou ruim, por isso, seja sincera(o).</li>
                            <li>Escolha um momento tranquilo para fazer o teste.</li>
                            <li>Não pense muito, a primeira resposta geralmente será a mais correta.</li>
                            <li>Responda pensando em quem você é e não em quem gostaria de ser.</li>
                        </ol>
                    </div>
                    <div class="wizard_action">
                        <h4 class="wizard_action_title">Clique no botão!</h4>
                        <button class="btn_wizard" id="btn_wizard">Carregando...</button>
                    </div>
                </div>
                
            </div>
            <div class="f_ask">
                <div class="content_ask">
                    <div class="ask_top">
                        <p class="title_ask">Por qual motivo você está fazendo o teste DISC?</p>
                    </div>
                    <div class="wizard_start">
                        <p>
                            <label for="">
                                <input type="radio" name="pesquisa" id="pesquisa" class="pesquisa">
                                Participando de um processo de seleção.
                            </label>
                        </p>
                        <p>
                            <label for="">
                                <input type="radio" name="pesquisa" id="pesquisa" class="pesquisa">
                                Pedido da empresa em que trabalho
                            </label>
                        </p>
                        <p>
                            <label for="">
                                <input type="radio" name="pesquisa" id="pesquisa" class="pesquisa">
                                Aumentar seu autoconhecimento.
                            </label>
                        </p>
                        <p>
                            <label for="">
                                <input type="radio" name="pesquisa" id="pesquisa" class="pesquisa">
                                Apenas Curiosidade
                            </label>
                        </p>
                    </div>
                    <div class="ask_bottom">
                        <button class="continue_test" id="continue_test">Continuar para o teste</button>
                    </div>
                </div>
                

                <div class="box_test">
                    <div class="box_top">
                        <h4 class="box_test_title">Selecione o adjetivo que melhor descreve você!</h4>
                        <p class="box_test_subtitle">(Mesmo que você se identifique com mais de um, escolha o que mais se encaixa)</p>
                    </div>
                    <div class="box_resps">
                        <?php
                            $adjetivos = get_post_meta(get_the_ID(), 'area_adjetivos', true);
                        ?>
                        <?php if(!empty($adjetivos)): ?>
                        <ul class="resps">
                            
                                <?php if(!empty($adjetivos[0]['adjetivo_one'])): ?>
                            <li>
                                <button onclick="sendResp(1,'<?= $adjetivos[0]['select_cat_adj_one']; ?>', '<?= $adjetivos[0]['adjetivo_one']; ?>')" class="btn_resp"><?= $adjetivos[0]['adjetivo_one']; ?></button>
                            </li>
                            <?php
                                endif;
                                if(!empty($adjetivos[0]['adjetivo_two'])):
                            ?>   
                            <li>
                                <button onclick="sendResp(2,'<?= $adjetivos[0]['select_cat_adj_two']; ?>', '<?= $adjetivos[0]['adjetivo_two']; ?>')" class="btn_resp"><?= $adjetivos[0]['adjetivo_two']; ?></button>
                            </li>
                            <?php
                                endif;
                                if(!empty($adjetivos[0]['adjetivo_three'])):
                            ?>
                            <li>
                                <button onclick="sendResp(3,'<?= $adjetivos[0]['select_cat_adj_three']; ?>', '<?= $adjetivos[0]['adjetivo_three']; ?>')" class="btn_resp"><?= $adjetivos[0]['adjetivo_three']; ?></button>
                            </li>
                            <?php
                                endif;
                                if(!empty($adjetivos[0]['adjetivo_four'])):
                            ?>
                            <li>
                                <button onclick="sendResp(4,'<?= $adjetivos[0]['select_cat_adj_four']; ?>', '<?= $adjetivos[0]['adjetivo_four']; ?>')" class="btn_resp"><?= $adjetivos[0]['adjetivo_four']; ?></button>
                            </li>
                            <?php endif; ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                    <div class="box_bar">
                        <div class="bar_progress">
                            <?php $width = 100/$count_questions; ?>
                            <div class="progress" id="progress" style="width: <?= $width ?>%"><span id="val_point">1</span>/<span id="max_progress"><?= $count_questions; ?></span></div>
                        </div>
                    </div>
                    
                </div>
            </div>

            <div class="result">

            </div>
        </div>

        <div class="social_share_box">
            <ul>
                <li class="share_top">
                    <p class="num_share">10k</p>
                    <p class="share_text">Partilhas</p>
                </li>
                <li class="share share_facebook">
                    <img src="<?= get_template_directory_uri() ?>/assets/img/icons/facebook.svg" alt="">
                    <span class="s share_not_facebook">Partilhar</span>
                </li>
                <li class="share share_twitter">
                    <img src="<?= get_template_directory_uri() ?>/assets/img/icons/twitter.svg" alt="">
                    <span class="s share_not_twitter">Partilhar</span>
                </li>
                <li class="share share_linkedin">
                    <img src="<?= get_template_directory_uri() ?>/assets/img/icons/linkedin.svg" alt="">
                    <span class="s share_not_linkedin">Partilhar</span>
                </li>
                <li class="share share_link">
                    <img src="<?= get_template_directory_uri() ?>/assets/img/icons/share.svg" alt="">
                    <span class="s share_not_share">Partilhar</span>
                </li>
            </ul>
        </div>
    </section>

<?php get_footer(); ?>

   