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
    if(isset($_SESSION['name'])){
        $id = $_GET['id'];
    
        include 'server.php';
        
        $sql = "SELECT * from compilefiles where id ='$id' ";
        $result = mysqli_query($conn,$sql) or die("Fault present") ;
        $row = mysqli_fetch_assoc($result);
    
        if(strlen($row['cssfile']) != 0){
            $css = $row['cssfile'];
            unlink("file/$css");
        }
        $file = $row['file'];
    
        unlink("file/$file");
        
        
        $sql = "DELETE FROM compilefiles where id = '$id' ";
        mysqli_query($conn,$sql) or die("Sorry");
        echo "
        <script>
            swal('Yeah','File Delete Successful','success').then((value)=>{
                window.history.go(-1);
            });
        </script>
        ";
    }else{
        session_destroy();
        header("Location: index.php");
    }
?>


