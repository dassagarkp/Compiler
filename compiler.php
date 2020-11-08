<?php
    session_start();
    if(!isset($_SESSION['code']) && strlen($_SESSION['code'])!=0 ){

        
        if($_POST['action'] == 'Save'){
            echo "Save";
        }else if($_POST['action'] == 'Compile'){
            echo "Compile";
            $current = "";
            $answer = "";
            $current = $_POST['cppcode'];
            $_SESSION['code'] = $current;

        
        //echo $_POST['cppcode'];

        // echo strlen($_SESSION['compileit']);
        
        // //echo $_SESSION['code'] .'</br>'. $_SESSION['compiler'] ;

        // if(isset($_POST['action']) || strlen($_SESSION['compileit']) != 0){

        //     if(strlen($_SESSION['compileit']) == 0){
        //         $current = $_POST['code'];
        //     }else{
        //         $current = $_SESSION['code'];
        //     }
        //     if($_SESSION['compiler'] == 'cpp'){
                
        //         $file = "compile/hello.cpp";
        //         file_put_contents($file,$current);

        //     }
        //     $_SESSION['compileit'] = '';
        // }
        // echo $current;
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8" http-equiv="refresh" content="50">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title> Code Compiling</title>
    </head>
    <body>
        <div class="card-body">
            <form  action="compiler.php">
                <textarea name="code"  cols="30" rows="10">
                    <?php
                        echo $current;
                    ?>
                </textarea>
                <input type="submit" name="action" value="Compiler">
                <textarea name="output" cols="30" rows="10" placeholder="Output" onclick="return false;" readonly >

                </textarea>
            </form>
        </div>
    </body>
    </html>
    <?php

        }else{
            echo "
            <script>
                window.location.assign('index.php');
            </script>
            ";

        }
    }else if(isset($_SESSION['code']) || $_POST['action'] == 'Compiler'){

        echo "Done";
    ?>
    <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta charset="UTF-8" http-equiv="refresh" content="50">
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <title> Code Compiling</title>
        </head>
        <body>
            <div class="card-body">
                <form  action="compiler.php">
                    <textarea name="code"  cols="30" rows="10" value="<?php echo $_SESSION['code']; ?>">
                        <?php
                            echo $_POST['code'];
                        ?>
                    </textarea>
                    <input type="submit" name="action" value="Compiler">
                    <textarea name="output" cols="30" rows="10" placeholder="Output" onclick="return false;" readonly >

                    </textarea>
                </form>
            </div>
        </body>
        </html>

    <?php
    }else{
        echo "Sorry";
    }
    ?>
