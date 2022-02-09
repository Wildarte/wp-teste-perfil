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
    </script>

</body>
</html>