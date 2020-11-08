const form = document.getElementById('form');
const compilername = document.getElementById('compilername');
const compilername2 = document.getElementById('compilername2');


        // let input = document.getElementById('input');
        //      input.addEventListener("keydown", function(event) {
        //     // Number 13 is the "Enter" key on the keyboard
        //     if (event.keyCode === 9) {
        //         // Cancel the default action, if needed
        //         event.preventDefault();
        //         // Trigger the button element with a click
        //         input.textContent+= '&emsp;'
        //     }
        // });
        let choosecompiler = document.getElementById('choosecompiler');
        let otherlang = document.getElementById('ccppjava');
        let htmlouput = document.getElementById('htmlouput');
        let styling = document.getElementById('styling');
        let html = document.getElementById('html');

        choosecompiler.addEventListener('change',() =>{
            //console.log(choosecompiler.value);

            if(choosecompiler.value  === 'HTML'){
                compilername2.value='';
                compilername.value ='HTML';
                otherlang.className = 'notvisible' ;
                html.className = 'visible';
                document.getElementById('default').style.display = 'none';
                document.getElementById('htmlouput').style.display = 'block';
                

            }else if(choosecompiler.value  == ''){
                otherlang.className = 'notvisible' ;
                html.className = 'notvisible';
                document.getElementById('default').style.display = 'block';
                document.getElementById('htmlouput').style.display = 'none';


            }
            else{
                if(choosecompiler.value  === 'java'){
                    document.getElementById('code').placeholder = 'Use Class Name as Main';
                }
                // console.log(choosecompiler.value);
                compilername.value='';
                compilername2.value = choosecompiler.value;
                document.getElementById('default').style.display = 'none';
                otherlang.className ='visible';
                html.className = 'notvisible';
                document.getElementById('htmlouput').style.display = 'none';
            }
        });

        function compileHtml(field,e){
            htmlouput.innerHTML = field.value;
        }
        function compileCss(field,e){
            styling.innerHTML = field.value;
        }
        function htmltlayout(){
            if(document.getElementById('htmldisplay').style.display === 'flex' ){
                document.getElementById('htmldisplay').style.display = 'block';
                document.getElementById('htmldisplay').firstElementChild = 
                document.getElementById('htmldisplay').firstElementChild.nextElementSibling =  
                console.log(document.getElementById('htmldisplay').firstElementChild.nextElementSibling);
            }else{
                document.getElementById('htmldisplay').style.display = 'flex' ;
            }
        }
        function login(){
            if(document.getElementById('logintag').style.display === 'none' || document.getElementById('logintag').style.display === '' ){
                document.getElementById('logintag').style.display = 'block';
                document.getElementById('signintag').style.display = 'none';
                document.getElementById('backdrop').style.display = 'block';
                document.getElementById('backdrop').style.pointerEvents = 'all';
            }else{
                document.getElementById('backdrop').style.pointerEvents = 'none';
                document.getElementById('backdrop').style.display = 'none';
                document.getElementById('logintag').style.display = 'none';
            }
        }
        function signin(){
            if(document.getElementById('signintag').style.display === 'none' || document.getElementById('signintag').style.display === '' ){
                document.getElementById('signintag').style.display = 'block';
                document.getElementById('logintag').style.display = 'none';
                document.getElementById('backdrop').style.display = 'block';
                document.getElementById('backdrop').style.pointerEvents = 'all';
            }else{
                document.getElementById('backdrop').style.display = 'none';
                document.getElementById('backdrop').style.pointerEvents = 'none';
                document.getElementById('signintag').style.display = 'none';
            }
        }
        document.getElementById('backdrop').addEventListener('click', ()=>{
            if(document.getElementById('signintag').style.display === 'block' ||  
            document.getElementById('logintag').style.display === 'block'
            ){
                document.getElementById('backdrop').style.display = 'none';
                document.getElementById('backdrop').style.pointerEvents = 'none';
                document.getElementById('signintag').style.display = 'none';
                document.getElementById('logintag').style.display = 'none';
            }
        });
      
        
      
