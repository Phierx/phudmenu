<?php

$image = $_POST['picture'];
$name = $_POST['name'];
$desc = $_POST['description'];
$price = $_POST['price'];
?>

<?php include 'connex/connex.php';?>

<?php 
// Create connection
$conn = new mysqli ($servername, $username, $password, $dbname);

if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}

else{	
	
	$sql = "	
	UPDATE phudinfo
    SET name='$name', price='$price' , description='$desc'
	WHERE picture = '$image'
	"; 
	echo $sql;
	
if ($conn->query($sql))
{
echo "delete sucessfully";
header("location: dashboard.php") ;
}
else
{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();

}

?>