<?php
    session_start();
    if(!isset($_SESSION['name'])){
        header("Location: index.php");
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>File Saving</title>
</head>
</html>

<?php
    // if(strlen($_SESSION['saveit'])!=0 ){
    if(strlen($_POST['onetime'])){

        $_POST['onetime'] = '';
        date_default_timezone_set('Asia/Kolkata');
        
       // $_SESSION['saveit'] = '';
        $copilerLanguage = $_POST['compilername'];
        $date = date("d/m/y");
        if( $copilerLanguage  == 'HTML' ){

            $htmlcode = trim($_POST['code']);
            $csscode = '';
            if(isset($_POST['csscode']))
                $csscode = trim($_POST['csscode']);

            if($htmlcode == ''){
                echo "
                <script>
                    swal('Sorry!','You not write Anything,\\nSo You cannot Save.','warning').then((value)=>{
                        window.location.assign('index.php');
                    });
                </script>
                ";

            }else{
                
                $filename = $_POST['filename'];

                $str = time();

                //echo substr($str,5,strlen($str)) . '_' . date("d_m_y") ;

                //file create and write

                $file = $filename .'_'. substr($str,5,strlen($str)) . '_' . date("d_m_y") . '.html';
                $myhtmlfile = fopen("file/$file", "w") or die("Unable to open file!");
                fwrite($myhtmlfile,$htmlcode);
                fclose($myhtmlfile);
                
                $mycssfile = '';
                $mycssfilename = '';
                
                //echo  strlen($csscode)  . $file;
            
                if(strlen($csscode) != 0 ){
                    $cssfile = $filename .'_'. substr($str,5,strlen($str)) . '_' . date("d_m_y") . '.css';
                    $mycssfile = fopen("file/$cssfile", "w") or die("Unable to open file!");
                    fwrite($mycssfile,$csscode);
                    fclose($mycssfile);
                    $mycssfilename = $cssfile;
                }

                include 'server.php';

                $id = $_SESSION['id'];


                $sql = "INSERT INTO compilefiles (cid,file,cssfile,date) values ('$id','$file','$mycssfilename','$date' )";

                mysqli_query($conn,$sql) or die('Unsucess');

                mysqli_close($conn);

                echo "
                <script>
                    swal('Great','Your File Saved Successful','success').then((value)=>{
                        window.history.go(-1);
                    });
                </script>
                ";

                // $sql =  ;
            // echo $file;
            }
        }else{
            echo "
            <script>
               window.history.go(-1);
            </script>
            ";

        }
    }else{
        echo "
            <script>
                window.history.go(-1);
            </script>
            ";
    }

    // }else{
    //     echo "
    //     <script>
    //         window.history.go(-1);
    //     </script>
    //     ";
    // }
?>