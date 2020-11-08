<?php
    session_start();
    // if(isset($_POST['action'])){

    //     $_SESSION['compiler'] = $_POST['compiler'];
        
    //     if($_POST['action'] == 'Click to Compile'){

    //         $_SESSION['compileit'] = "compile";
    //         $_SESSION['code'] = trim($_POST['cppcode']) ;
    //         header("Location: compiler.php");
    //     }else{
    //         $_SESSION['code'] = $_POST['code'];
    //         $_SESSION['saveit'] = "Present";
    //         if(strlen($_POST['csscode'])!=0)
    //             $_SESSION['csscode'] = $_POST['csscode'];
    //         $_SESSION['filename'] = $_POST['filename'];
    //         header("Location: save.php");
           
    //     }
    // }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta charset="UTF-8" http-equiv="refresh" content="350"> -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="index.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="js/compilerender.js" async></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="js/vendor/jquery-1.12.0.min.js"></script> -->
    <title>Compiler</title>
</head>
<body>

    <style id="styling">
    </style>
    
    <div id="backdrop"></div>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark" onclick="sliderclose()">
        <a class="navbar-brand" href="#">
        <img style="border-radius: 50%;" src="Gallery/logo.jpeg" width="50" height="40" alt="Logo">&nbsp;
        </a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            &#9776;
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="https://dassagarkp.000webhostapp.com/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Compiler</a>
                </li>
                
            </ul>
            <div class="right">
                <?php 
                    if( !isset($_SESSION['name']) ){
                        session_destroy();
                     ?>
                <ul class="navbar-nav mr-auto  ">
                    <li class="nav-item">
                        <a style="cursor:pointer; " onclick="login()" class="nav-link" >Login</a>
                    </li>
                    <li class="nav-item">
                        <a style="cursor:pointer; " onclick="signin()" class="nav-link ">Sign Up</a>
                    </li>
                </ul>
                <?php
                    }else{
                ?>
                    <ul class="navbar-nav">
                        <li class="">
                            <div class="dropdown" style="margin: 0;">
                                    <button id="dropdown" style="color: #fcf876;font-weight: 600;font-size: x-large; ">Hi: <?php  echo $_SESSION['name'] ?><i id="arrowi" class="arrow down" ></i> </button>
                                    <div id="dropcont" class="dropdown-content">
                                        <a style="margin: 0; min-width: 70px;padding: 0 30px 0 0 ; font-size: 15px; margin-bottom:10px" href="myfiles.php">
                                            <i class="fa fa-file" aria-hidden="true"></i>&nbsp;&nbsp;Save&nbsp;Files
                                        </a>
                                        <hr style="border: 0; border-style: none; height: 2px; background-color: black; margin: 9px; width: 80%; " ;>
                                        <a href="logout.php" style="margin:0; min-width: 70px;padding: 5px 30px 0 0 ; font-size: 15px " id="study" >
                                            <i class="fas fa-sign-out-alt " style="font-size: 18px;padding-top: 5px;display:inline;"  aria-hidden="true"></i>
                                            &nbsp;Logout
                                        </a>
                                    </div>
                            </div>
                        </li>
                  </ul>
                    <script>
                        const dropdownbtn = document.getElementById('dropdown');
                        const dropcontant = document.getElementById('dropcont');

                            const afterbtnclse = () =>{
                                if(dropcontant.className == 'dropdown-content dropdown-visible'){
                                    dropcontant.className = 'dropdown-content';
                                }
                                if(document.getElementById('arrowi').className == 'arrow down up'){
                                    document.getElementById('arrowi').className = 'arrow down';
                                }
                            };


                        const Logoutbtn = () =>{
                            document.getElementById('arrowi').classList.toggle('up');
                            dropcontant.classList.toggle('dropdown-visible');
                        };

                        dropdownbtn.addEventListener('click',Logoutbtn);
                      

                    </script>

                <?php
                    }
                ?>

            </div>
        </div>
    </nav>
                    <!--    login    -->
    <div id="logintag"  class="logintag"  >
        <div class="container">
            <h4>Login</h4>
            <form action="verification.php" id="login" method="post">
                <input type="email" name="loginmail" placeholder="Enter Email-Id" required>
                <input type="password" name="loginpassword" placeholder="Enter Password" required>
                <input type="submit" value="Login">
            </form>
        </div>
    </div>
                    <!--    sign up      -->
    <div id="signintag" class="signintag">
        <div class="container">
            <h4>Registration</h4>
            <form action="register.php" id="signin" method="post">
               <input type="text" name="signname" placeholder="Enter Name" required>
                <input type="email" name="signmail" placeholder="Enter Email-Id" required>
                <input type="password" name="signpassword" placeholder="Enter Password" required>
                <input type="submit" value="Register">
            </form>
        </div>
    </div>
    <br>
    
            <!--        form         -->
        <div >
            <?php
                if(!isset($_SESSION['name'])){
            ?>
            <a  title="Info" style="margin: 10px;color:blue;cursor:pointer; " onclick="msg()" >
                <i class="fas fa-info-circle fa-2x"></i>
            </a>
            <script>
                function msg(){
                    swal('Knowledge','If You Want to save this file,\nThen Before Code Login at first.\nElse No Problem.','info')
                }
            </script>
            <?php
                }
            ?>
            <div class="container">
                <div class="form-group">
                <!-- <label for=""></label> -->
                <select onclick="sliderclose()" class="form-control" name="compiler" id="choosecompiler">
                    <option selected value="" disabled>Select Language</option>
                    <option value="c">C</option>
                    <option value="cpp">C++</option>
                    <option value="java">Java</option>
                    <option value="HTML">HTML</option>
                    </select>
                </div>
            </div>
        </div>

        <br>
        
        <!-- <button onclick="swal('Sorry','Duplicate Account Found\nAlready Have An Account with This mail id','warning')">
            click Me
        </button> -->
        
        <div id="default">
            <h3>Select A Language to Compile</h3>
        </div>

        

            <!--         html     -->
            <div id="html" class="notvisible" >
        <form  action="save.php"  method="post" id="form"  >
            <input type="text" hidden id="compilername" name="compilername">
            <input type="text" hidden name="onetime" value="one">
            <!-- <i class="fa fa-th" aria-hidden="true" style="position:relative; left: 92%; cursor:pointer; " onclick="htmltlayout()"></i> -->
            <div class="card-body" onclick="sliderclose()">
                <div class="flex" id="htmldisplay" >
                    <textarea class="flexhtml" id="htmlinput" name="code" onkeyup="compileHtml(this)" placeholder="Enter HTML Code Here" ></textarea require>
                    <textarea class="flexhtml"  name="csscode" id="cssinput" onkeyup="compileCss(this)" placeholder="Enter CSS Code Here" ></textarea>
                </div>
            </div>
            <div style="color:red;font-weight: 600;display: inline; margin-left: 20px; position: relative;" onclick="sliderclose()">Output:</div>
            <div style="display: inline;position:absolute; right:0;">
                <p id="size" >Size Resizer <i id="arrowi" class="arrowslide down" ></i> </p>
                <div id="slider"  class="slidecontainer">
                    <input id="slidevalue" type="range" min="1" max="100" value="10">
                </div>
                
            </div>
            <div id="htmlouput" onclick="sliderclose()"></div>

            <?php
                if(isset($_SESSION['name'])){
            ?>
                <div id="saveoption" class="notvisible">
                    <input class="savetext" type="text" name="filename" placeholder="Enter Filename" >
                    <input class="save" type="submit" name="action" value="Save">
                </div>
                <script>
                    document.getElementById('htmlinput').addEventListener('input',()=>{
                        if((document.getElementById('htmlinput').value).length != 0){
                            document.getElementById('saveoption').className = 'visible';
                        }else{
                            document.getElementById('saveoption').className = 'notvisible';
                        }
                    })
                </script>
            <?php
                }
            ?>
            </form>
        </div>

                <!--     cppjava     -->
        <div id="ccppjava" class="notvisible"  >
            
                <!-- <div  class="container" >
                    <div style="width: 3%;float:left;background:whitesmoke;">
                        1
                    </div>
                    
                    <div style="width: 93%;float:left; ">
                            <input id="input" type="text" style="width: 100%;outline:none; border: none;" value="&emsp;">
                    </div>
                    <div style="width: 3%;float:right" >
                            1
                    </div>
                    <br>
                    <br>
                    <div style="font-size: larger;color:brown">This Compiler is in undermaintance, Now Only you can use Html</div>
                    </div> -->

                    <div class="container">
                        <form action="compile.php"  method="POST" id="form1" name="f2" enctype="multipart/form-data" >
                            <input type="text" id="compilername2" name="language" hidden>
                            <!--        cpp Input    -->

                            <label for="ta">Write Your Code</label>
                            <textarea class="form-control" id="code" name="code" rows="10" cols="50"></textarea><br><br>
                            <label for="in">Enter Your Input</label>
                            <textarea class="form-control" name="input" id="input" rows="10" cols="50"></textarea><br><br>
                            <input type="submit" id="st" class="btn btn-success" value="Run Code"><br><br><br>

                        </form>
                
            
            <script type="text/javascript">
                
                $(document).ready(function(){

                    $("#st").click(function(){
                
                        $("#div").html("Loading ......");


                    });

                });


            </script>

            <script>

                //wait for page load to initialize script
                $(document).ready(function(){
                    //listen for form submission
                    $('#form1').on('submit', function(e){
                    //prevent form from submitting and leaving page
                    e.preventDefault();

                    // AJAX 
                    $.ajax({
                            type: "POST", //type of submit
                            cache: false, //important or else you might get wrong data returned to you
                            url: "compile.php", //destination
                            datatype: "html", //expected data format from process.php
                            data: $('form').serialize(), //target your form's data and serialize for a POST
                            success: function(result) { // data is the var which holds the output of your process.php

                                // locate the div with #result and fill it with returned data from process.php
                                $('#div').html(result);
                            }
                        });
                    });
                });
                
            </script>

                        <!--         Output    -->
                        <label for="out">Output</label>
                        <textarea id='div' class="form-control" name="output" rows="10" cols="50" readonly></textarea><br><br>


                    </div>


                    <?php
                    if(isset($_SESSION['name'])){
                ?>
                    <br>
                    <br>
                    <br>
                    <div class="container">
                        <input class="savetext" type="text" name="filename" placeholder="Enter Filename" >
                        <input class="save" type="submit" name="action" value="Save">
                    </div>
                    <?php
                        }
                    ?>
            
        </div>


        
       <script>

            // tab used as space
            let tab = "\t";
            function tabs(e) {
            if (e.key == 'Tab') {
                e.preventDefault();
                var start = this.selectionStart;
                var end = this.selectionEnd;

                // set textarea value to: text before caret + tab + text after caret
                this.value = this.value.substring(0, start) +
                tab + this.value.substring(end);

                // put caret at right position again
                this.selectionStart =
                this.selectionEnd = start + 1;
                }
            };

            document.getElementById('code').addEventListener('keydown', tabs);
            document.getElementById('input').addEventListener('keydown', tabs);
            document.getElementById('htmlinput').addEventListener('keydown',tabs);
            document.getElementById('cssinput').addEventListener('keydown',tabs);


            const size = document.getElementById('size');
            const slidetag = document.getElementById('slider') ;
            let slider = document.getElementById('slidevalue');
            
            function sliderupdown(){
                if(slidetag.style.display === 'none' || slidetag.style.display === ''){
                    slidetag.style.display = 'block';
                }else{
                    slidetag.style.display = 'none';
                }
            }
            function sliderclose(){
                if(slidetag.style.display === 'block')
                    slidetag.style.display = 'none';
            }
          //  size.onclick = sliderupdown();
            size.addEventListener('click', sliderupdown);

            slider.oninput = ()=>{
               document.getElementById('htmlouput').style.height = String(slider.value*15)+'px';
           }
       </script>
   

    <script src="js/compiler.js"></script>

    <?php
        if(isset($_SESSION['name'])){
            echo "
            <script>
                form.addEventListener('click',afterbtnclse);
            </script>
            ";

        }
    ?>

</body>
</html>
