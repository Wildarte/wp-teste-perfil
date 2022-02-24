<?php
    
    // Template Name: Teste DISC
    get_header();
    
    setup_session_start();

    $_SESSION['d'] = 0;
    $_SESSION['i'] = 0;
    $_SESSION['s'] = 0;
    $_SESSION['c'] = 0;

    $_SESSION['contagem_questions'] = 0;

    $adjetivos = get_post_meta(get_the_ID(), 'area_adjetivos', true);

    $count_questions = count($adjetivos);

    //echo $adjetivos[1]['adjetivo_one'];

    if(is_array($adjetivos)):

        //foreach($adjetivos as $adjetivo):

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
                <!-- 
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
                 -->

                <div class="box_test">
                    <div class="box_top">
                        <h4 class="box_test_title">Selecione o adjetivo que melhor descreve você!</h4>
                        <p class="box_test_subtitle">(Mesmo que você se identifique com mais de um, escolha o que mais se encaixa)</p>
                    </div>
                    <div class="box_resps">
                        <?php
                            $adjetivos = get_post_meta(get_the_ID(), 'area_adjetivos', true);
                        ?>
                        <?php if(!empty($adjetivos)): $array_adj = ['one','two','three','four']; 
                            shuffle($array_adj);
                        ?>
                        <ul class="resps">
                            
                                <?php if(!empty($adjetivos[0]['adjetivo_'.$array_adj[0]])): ?>
                            <li>
                                <button onclick="sendResp(1,'<?= $adjetivos[0]['select_cat_adj_'.$array_adj[0]]; ?>', '<?= $adjetivos[0]['adjetivo_'.$array_adj[0]]; ?>')" class="btn_resp"><?= $adjetivos[0]['adjetivo_'.$array_adj[0]]; ?></button>
                            </li>
                            <?php
                                endif;
                                if(!empty($adjetivos[0]['adjetivo_'.$array_adj[1]])):
                            ?>   
                            <li>
                                <button onclick="sendResp(2,'<?= $adjetivos[0]['select_cat_adj_'.$array_adj[1]]; ?>', '<?= $adjetivos[0]['adjetivo_'.$array_adj[1]]; ?>')" class="btn_resp"><?= $adjetivos[0]['adjetivo_'.$array_adj[1]]; ?></button>
                            </li>
                            <?php
                                endif;
                                if(!empty($adjetivos[0]['adjetivo_'.$array_adj[2]])):
                            ?>
                            <li>
                                <button onclick="sendResp(3,'<?= $adjetivos[0]['select_cat_adj_'.$array_adj[2]]; ?>', '<?= $adjetivos[0]['adjetivo_'.$array_adj[2]]; ?>')" class="btn_resp"><?= $adjetivos[0]['adjetivo_'.$array_adj[2]]; ?></button>
                            </li>
                            <?php
                                endif;
                                if(!empty($adjetivos[0]['adjetivo_'.$array_adj[3]])):
                            ?>
                            <li>
                                <button onclick="sendResp(4,'<?= $adjetivos[0]['select_cat_adj_'.$array_adj[3]]; ?>', '<?= $adjetivos[0]['adjetivo_'.$array_adj[3]]; ?>')" class="btn_resp"><?= $adjetivos[0]['adjetivo_'.$array_adj[3]]; ?></button>
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
            
            <div class="result_over" style="display: none; flex-wrap: wrap">
                <div class="result" data-pro="3">
                
                </div>
                <div class="" style="width: 100%; padding: 10px 80px 20px; margin-bottom: 20px; display: flex; justify-content: flex-end">
                    <button style="" class="btn_relatorio" id="btn_relatorio">Quero um relatório do teste (grátis)</button>
                </div>
                
            </div>
            

            <div class="request_result">
                <div class="request_result_left">
                    <h3 class="request_title">Receba seu relatório:</h3>
                    <p>Insira seu nome e seu melhor e-mail nos campos ao lado para receber gratuitamente o resultado do seu teste de perfil comportamental.</p>
                    <p>Você também pode enviar uma cópia do seu relatório para outra pessoa, como uma empresa que tenha lhe solicitado o teste ou para seu coach, por exemplo.</p>
                    <p>Para isso, basta preencher (no campo especificado) também o e-mail de quem deseja que receba a cópia do seu relatório DISC.</p>
                </div>
                <div class="request_result_right">
                    <div class="row_input">
                        <label for="nome">nome*</label>
                        <input type="text" name="nome" id="nome" required>
                    </div>
                    <div class="row_input">
                        <label for="email">email*</label>
                        <input type="email" name="email" id="" required>
                    </div>
                    <div class="row_input">
                        <button class="btn_send_result">Enviar meu relatótio</button>
                    </div>
                </div>
            </div>
        
            <script>
                
                

                //let val = document.querySelector('.result');
                //let valor = val.getAttribute('data-pro');
                //val.style.border = `${valor}px solid`;
                    //console.log(val);
            </script>
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

   