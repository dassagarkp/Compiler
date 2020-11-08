<?php
    session_start();
    if(!isset($_SESSION['name'])){
        session_destroy();
        header("Location: index.php");
    }
    $id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta charset="UTF-8" http-equiv="refresh" content="5"> -->
    <link rel="stylesheet" href="myfiles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title><?php echo $_SESSION['name']?>'s File Maneger</title>
</head>
<body>
    <div>
        <a onclick="javascript:window.history.go(-1);" style="cursor: pointer;">
            <i style="font-size: 27px;" class="fa fa-backward" aria-hidden="true"></i>
        </a>
    </div>
    <?php
        include 'server.php';
        $sql = "SELECT * FROM compilefiles WHERE cid ='$id' ";
        $result = mysqli_query($conn,$sql) or die("Sorry");
        if(mysqli_num_rows($result) > 0){
            //echo mysqli_num_rows($result);
           // unlink("file/sa.txt");
        ?>
        <table>
            <thead>
                <tr>
                    <th></th>
                    <th>File Name</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Date Of Create</th>
                    <th>Download</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td></td>
                    <td>
                        <?php 
                            echo $row['file'];
                            if( strlen($row['cssfile']) != 0){
                                echo "
                                <br>
                                ";
                                echo $row['cssfile'];
                            }
                        
                        ?>
                   </td>
                    <td>
                        <i class="fas fa-box-open  fa-2x  "></i>
                    </td>
                    <td> 
                        <i class="fas fa-edit fa-2x "></i>
                    </td>
                    <td><?php echo $row['date']; ?></td>
                    <td>
                        <a style="" href="file/<?php echo $row['file']; ?>" download="<?php echo $row['file']; ?>"> 
                            <button style="background-color: grey;cursor: pointer;font-size: medium ;font-weight:600; padding: 3px;outline: 0;margin-bottom: 3px; " type="button">Download</button> 
                        </a>
                        <?php
                            if(strlen($row['cssfile']) !=0 ){
                                echo "<br>";
                            
                        ?>
                            <a href="file/<?php echo $row['cssfile']; ?>" download="<?php echo $row['cssfile']; ?>"> 
                                <button style="background-color: grey;cursor: pointer;font-size: medium ;font-weight:600; padding: 3px;outline: 0; " type="button">Download</button> 
                            </a>
                        <?php 
                        }
                        ?>
                    </td>
                    <td> 
                        <a style="cursor: pointer;" onclick="javascript:confirmdelete($(this));return false;" href="deletefile.php?id=<?php echo $row['id']; ?>">
                            <i class="fas fa-trash-alt  fa-2x"></i> 
                        </a>
                    </td>
                    <script>
                        function confirmdelete(anchor){
                            swal({
                                title: "Are you sure?",
                                text: "Once deleted, you will not be able to recover this file!",
                                icon: "warning",
                                buttons: true,
                                dangerMode: true,
                                })
                                .then((willDelete) => {
                                if (willDelete) {
                                    window.location = anchor.attr("href");
                                }
                            });
                        }
                    </script>
                </tr>

                <?php
                    }
                ?>
            </tbody>
        </table>

        <?php
            }else{
                echo "<h1>Sorry You Don't Have Any File to Show</h1>";
            }
        ?>
</body>
</html>