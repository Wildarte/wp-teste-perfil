<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        
        ?>
            <ul class="resps">
                <li>
                    <button onclick="sendResp()" class="btn_resp">saudavel</button>
                </li>   
                <li>
                    <button onclick="sendResp()" class="btn_resp">bravo</button>
                </li>
                <li>
                    <button onclick="sendResp()" class="btn_resp">flexivel</button>
                </li>
                <li>
                    <button onclick="sendResp()" class="btn_resp">engraçado</button>
                </li>
            </ul>
        <?php

    }else{
        
        echo "não houve POST";

    }

?>