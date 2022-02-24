const btn_share = document.querySelectorAll('.share');
const btn_start = document.getElementById('btn_wizard');
const conts_btn = document.getElementById('continue_test');
const btn_relat = document.getElementsByClassName('btn_relatorio');


let nextOk = false;

let global_url = "";
function get_url(url){
    global_url = url;
}

//get num max questions -------
let num_max
function get_num(num){
    num_max = num;
}
//get num max questions -------

let page_id = 0;
function get_page_id(page){
    page_id = page;
}


btn_share.forEach((item) => {
    item.addEventListener('mouseover', function(){
        this.querySelector('span.s').classList.remove('closeShare');
        this.querySelector('span.s').classList.add('openShare');
    })
    item.addEventListener('mouseleave', function(){
        this.querySelector('span.s').classList.remove('openShare');
        this.querySelector('span.s').classList.add('closeShare');
    })
});


document.addEventListener('DOMContentLoaded', function(){
    btn_start.innerText = "Começar o teste";

    /*
    btn_start.addEventListener('click', () => {
        document.querySelector('.wizard_text').classList.add('hidden');
        document.querySelector('.f_ask').classList.add('show');
    });
    */
    
    btn_start.addEventListener('click', (e) => {
        e.preventDefault();

        document.querySelector('.wizard_text').classList.add('hidden');
        document.querySelector('.f_ask').classList.add('show');
        document.querySelector('.box_test').classList.add('show');

        /*
        verifica_check = false;
        document.querySelectorAll('input[class="pesquisa"]').forEach((item) => {
            if(item.checked){
                verifica_check = true;
            }
        });
        if(verifica_check){
            document.querySelector('.content_ask').classList.add('hidden');
            document.querySelector('.box_test').classList.add('show');
        }else{
            alert('Primeiro selecione um alternativa');
        }
        */
        
    });
});

for(let i = 0; i < btn_relat.length; i++){
    btn_relat[i].addEventListener('click', function(){
        document.querySelector('.result_over').style.display = "none";
        document.querySelector('.request_result').style.display = "flex";
    });
}

let count = 1;//controle do progresso da barra
function controllBar(num){
    document.getElementById('test').addEventListener('click', function(e){
    
        e.preventDefault();
        const max_progress = parseInt(document.getElementById('max_progress').innerText);
        
        if(count < max_progress){
            let progress = document.getElementById('progress').style.width;
            let val_point = document.getElementById('val_point').innerText;
        
            val_point_plus = parseInt(val_point);
            val_point_plus += 1;

            let progress_plus = parseFloat(progress.replace("%", ""));
            progress_plus += num;
            
            console.log(progress_plus);
            console.log(val_point_plus);
            document.getElementById('progress').style.width = progress_plus+"%";
            document.getElementById('progress').style.transition = "all 1s";
            document.getElementById('val_point').innerText = val_point_plus;
    
            count += 1;//incremento bar
        }
        
    });
}

function updateProgress(){
    setTimeout(function(){
        const dom_pro = document.querySelector('.dom_bar_progress');
        const inf_pro = document.querySelector('.inf_bar_progress');
        const est_pro = document.querySelector('.est_bar_progress');
        const con_pro = document.querySelector('.con_bar_progress');

        let valor1 = dom_pro.getAttribute('data-progress');
        let valor2 = inf_pro.getAttribute('data-progress');
        let valor3 = est_pro.getAttribute('data-progress');
        let valor4 = con_pro.getAttribute('data-progress');

        document.querySelector('.dom_bar_progress').style.width = `${valor1}%`;
        document.querySelector('.dom_bar_progress').style.transition = '2s';

        document.querySelector('.inf_bar_progress').style.width = `${valor2}%`;
        document.querySelector('.inf_bar_progress').style.transition = '2s';

        document.querySelector('.est_bar_progress').style.width = `${valor3}%`;
        document.querySelector('.est_bar_progress').style.transition = '2s';

        document.querySelector('.con_bar_progress').style.width = `${valor4}%`;
        document.querySelector('.con_bar_progress').style.transition = '2s';
    },250);
}

function reqAsk(url, num, page_id, value, resp, pos){

    let num_q = num; //numero da questão

    var params = "&num_q="+num_q+"&page_id="+page_id+"&value_answer="+value+"&answer="+resp+"&position="+pos;
    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function(){
        let resp = this.responseText;

        if(resp.includes('ul class="resps"')){
            document.getElementsByClassName('box_resps')[0].innerHTML = resp;
            changeMouse();
            reChangeMouse();
        }else{
            document.querySelector('.f_ask').classList.remove('show');
            document.querySelector('.result_over').style.display = 'flex';
            document.querySelector('.result').style.display = 'flex';
            document.querySelector('.result').innerHTML = this.response;
            updateProgress();
            reChangeMouse();
        }

        /*
        switch(resp){
            case "0":
                
                const xmlhttp2 = new XMLHttpRequest();
                xmlhttp2.onload = function(){
                    let resp2 = this.responseText;
                    document.querySelector('.result .graphs').append(resp2);
                }

                xmlhttp2.open("get", url, true);
                //xmlhttp2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xmlhttp2.send();

                /*
                document.querySelector('.f_ask').classList.remove('show');
                document.querySelector('.result').style.display = "flex";
                alert('test');

                document.querySelector('.dom_bar_progress').style.width = "70%";
                document.querySelector('.dom_bar_progress').style.transition = "1.6s";

                document.querySelector('.inf_bar_progress').style.width = "30%";
                document.querySelector('.inf_bar_progress').style.transition = "1.6s";

                document.querySelector('.est_bar_progress').style.width = "60%";
                document.querySelector('.est_bar_progress').style.transition = "1.6s";

                document.querySelector('.con_bar_progress').style.width = "90%";
                document.querySelector('.con_bar_progress').style.transition = "1.6s";
                
            break;
            default:
                document.getElementsByClassName('box_resps')[0].innerHTML = resp;

        }
        */
    }
    xmlhttp.open("post", url, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(params);

}


//function that change the icon mouse and disable buttons
function changeMouse(){
    document.body.style.cursor = "wait";
    const btns = document.querySelectorAll('ul.resps li button');
    btns.forEach((btn) => {
        btn.disabled = true;
    })
}


//function that change button mouse to default and enable buttons
function reChangeMouse(){
    setTimeout(function(){
        document.body.style.cursor = "default";
        const btns = document.querySelectorAll('ul.resps li button');
        btns.forEach((btn) => {
            btn.disabled = false;
        });
    }, 400);
   
}

function sendResp(pos, value, resp){
    
    changeMouse();

    //e.preventDefault();
    reqAsk(`${global_url}/admin/ask.php`, count, page_id, value, resp, pos);
    //calcResult(value);

    //aumenta a barra de progresso
    const max_progress = parseInt(document.getElementById('max_progress').innerText);
    console.log("count: "+count);


    //incrementa a barra se for menor que o tamanho maximo
    if(count < max_progress){
        let progress = document.getElementById('progress').style.width;
        let val_point = document.getElementById('val_point').innerText;
    
        val_point_plus = parseInt(val_point);
        val_point_plus += 1;

        let progress_plus = parseFloat(progress.replace("%", ""));
        progress_plus += num_max;
        
        console.log(progress_plus);
        console.log(val_point_plus);
        document.getElementById('progress').style.width = progress_plus+"%";
        document.getElementById('progress').style.transition = "all 1s";
        document.getElementById('val_point').innerText = val_point_plus;

        count += 1;//incremento bar
    }
}

