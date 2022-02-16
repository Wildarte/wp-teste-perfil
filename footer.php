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

        let <?= $GLOBALS['d']; ?> = 0;
        let <?= $GLOBALS['i']; ?> = 0;
        let <?= $GLOBALS['si']; ?> = 0;
        let <?= $GLOBALS['c']; ?> = 0;

        function calcResult(value){
            switch(value){
                case "<?= $GLOBALS['d']; ?>":
                    <?= $GLOBALS['d']; ?> += 1;
                break;
                case "<?= $GLOBALS['i']; ?>":
                    <?= $GLOBALS['i']; ?> += 1;
                break;
                case "<?= $GLOBALS['si']; ?>":
                    <?= $GLOBALS['si']; ?> += 1;
                break;
                case "<?= $GLOBALS['c']; ?>":
                    <?= $GLOBALS['c']; ?> += 1;
                break;
                default:

                console.log('<?= $GLOBALS['d']; ?>: '+<?= $GLOBALS['d']; ?>);
                console.log('<?= $GLOBALS['i']; ?>: '+<?= $GLOBALS['i']; ?>);
                console.log('<?= $GLOBALS['si']; ?>: '+<?= $GLOBALS['si']; ?>);
                console.log('<?= $GLOBALS['c']; ?>: '+<?= $GLOBALS['c']; ?>);
            }
        }
    </script>

</body>
</html>