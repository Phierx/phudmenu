<?php include 'connex/connex.php';?><?php
if(isset($_POST['submit'])){
    $_FILES['file'];
    $conn = new mysqli($servername, $username, $password, $dbname);
    $fileName = str_replace(' ', '_',$_FILES['file']['name']);
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.',$fileName);
    $fileActualExt =strtolower(end($fileExt));

    $allowed = array('jpg','jpeg','png','pdf');

    $id = filter_input(INPUT_POST, 'id');
    $name = filter_input(INPUT_POST, 'Lastname');
    $title = filter_input(INPUT_POST, 'title');
    $comment = filter_input(INPUT_POST, 'comment');
    $price = filter_input(INPUT_POST, 'price');
    if (in_array($fileActualExt,$allowed)){
        if($fileError === 0){
           // make sure you check on the file size PLEASE
            if ($fileSize < 15000000){
                
               
                $sql = "INSERT INTO phudinfo (foodgroup, name , description,price,picture, publish) values ('$id','$title','$comment','$price','$fileName','$fileTmpName')
                 
                
                ";
                mysqli_query($conn,$sql);
                //echo $sql;
               
                $fileNameNew = uniqid('',true).".".$fileActualExt;
                $fileDestination = 'uploads/'.$fileName ;
                move_uploaded_file($fileTmpName, $fileDestination);
                header("Location:dashboard.php?uploadsuccess");
            }
            else{
                echo "Your file is too big!";
            }
        }
        else {
            echo "There was an error uploading your file!";
        }
    }
    else {
        echo "You cannot upload files of this type!";
    }

}
?>
