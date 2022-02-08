const btn_share = document.querySelectorAll('.share');
const btn_start = document.getElementById('btn_wizard');
const conts_btn = document.getElementById('continue_test');

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

    btn_start.addEventListener('click', () => {
        document.querySelector('.wizard_text').classList.add('hidden');
        document.querySelector('.f_ask').classList.add('show');
    });
    conts_btn.addEventListener('click', (e) => {
        e.preventDefault();
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
        
    });
});

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


function reqAsk(url, num){

    let num_q = num; //numero da questão

    var params = "&num_q="+num_q;
    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function(){
        let resp = this.responseText;

        document.getElementsByClassName('box_resps')[0].innerHTML = resp;
    }
    xmlhttp.open("post", url, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(params);

}

function sendResp(){
    //e.preventDefault();
    reqAsk(`${global_url}/admin/ask.php`, num_max);

    //aumenta a barra de progresso
    const max_progress = parseInt(document.getElementById('max_progress').innerText);
    console.log("Contagem: "+count);


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