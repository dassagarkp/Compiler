<?php
    session_start();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Compiler</title>
</head>
</html>


<?php

    //echo $_POST['signname'] . $_POST['signmail'] . $_POST['signpassword'];
    $mail = $_POST['loginmail'];
    $password =  $_POST['loginpassword'];
    if(  empty($mail) || empty($password) ){
       
        echo "
        <script>
            alert('Fill All details Properly');
            window.history.go(-1);
        </script>
        ";
    }else{

        include 'server.php';

        $sql = "SELECT * from compile where email_id = '$mail' ";

        $result = mysqli_query($conn,$sql) or die("Fault");
        
        if(mysqli_num_rows($result) > 0){

            $row = mysqli_fetch_assoc($result);

            $ciphering = "AES-256-CTR";

            $iv_length = openssl_cipher_iv_length($ciphering);
            
            $enkey = "Sagar";

            $option = 0;

            $encription_iv = "4567897445465646";

            $decription = openssl_decrypt($row['password'],$ciphering,$enkey,$option,$encription_iv);

            // $sql = "SELECT * from compile where email_id = '$mail' && password = '$password'  ";

            // $result = mysqli_query($conn,$sql) or die("Sorry");

            if( $decription != $password ){

                echo "
                    <script>
                    swal('Sorry','Password does not match please try again','warning').then((value)=>{
                    window.history.go(-1);
                    })
                    </script>
                ";

            }else{

                $name = $row['name'];

                $str = $name;

                $st = strrpos($str, ' ');

                if( $st!= null ){

                $name = substr($str, 0, $st);
                
                }
                 
                $_SESSION['name'] = $name;

                $_SESSION['mail'] = $mail;                

                $_SESSION['id'] = $row['id'];
                //echo $name;

                echo "
                   <script>
                        swal('Great','Welcome Back $name','success').then((value)=>{
                            window.history.go(-1);
                        });
                    </script>
                    ";
            }
        }else{

            echo "
                <script>
                swal('Sorry','No Account Found with This mail id.','warning').then((value)=>{
                window.history.go(-1);
                });
                </script>
            ";

        }
        mysqli_close($conn);

    }
?>