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
    $name = $_POST['signname'];
    $mail = $_POST['signmail'];
    $password =  $_POST['signpassword'];
    if( empty($name)  || empty($mail) || empty($password) ){
       
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

            echo "
           <script>
           swal('Sorry','Duplicate Account Found\\nAlready Have An Account with This mail id.','warning').then((value)=>{
            window.history.go(-1);
        })
            </script>
            ";
        }
        else{

            $ciphering = "AES-256-CTR";

            $iv_length = openssl_cipher_iv_length($ciphering);
            
            $enkey = "Sagar";
    
            $option = 0;
    
            $encription_iv = "4567897445465646";
    
            $encription = openssl_encrypt($password,$ciphering,$enkey,$option,$encription_iv);

            $password = $encription;

            $sql = "INSERT into compile  (name,email_id,password) values ('$name','$mail','$password')";

            mysqli_query($conn,$sql) or die("Sorry");
            
           

            echo "
               <script>
                    swal('Good Job','Yahh!!  Your Account Created Successfully.\\nNow You Can Login.','success').then((value)=>{
                        window.location.assign('index.php');
                    });

                </script>
                ";

        }
        mysqli_close($conn);
    }
?>

