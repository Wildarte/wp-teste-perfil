<script src="<?= get_template_directory_uri() ?>/assets/js/script.js"></script>
    <script>
        <?php

            $adjetivos = get_post_meta(get_the_ID(), 'area_adjetivos', true);
            $count_questions = count($adjetivos);
            $width = 100/$count_questions;
        
        ?>
        
        get_num(<?= $width; ?>);
        get_url('<?= get_template_directory_uri(); ?>');
        get_page_id(<?= get_the_ID(); ?>);
        get_action_pos_send = "<?= get_post_meta(get_the_ID(), 'action_pos_send', true); ?>";
        get_link_pos_send = "<?= get_post_meta(get_the_ID(), 'link_redirect_pos_send', true); ?>";
        get_text_pos_send = "<?= get_post_meta(get_the_ID(), 'text_post_send', true); ?>";
        get_text_btn_pos_send = "<?= get_post_meta(get_the_ID(), 'text_btn_post_send', true); ?>";
        get_link_btn_pos_send = "<?= get_post_meta(get_the_ID(), 'link_btn_post_send', true); ?>";
        
    </script>

</body>
</html>