<?php include 'connex/connex.php';?>

<?php
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  $sql = "SELECT * FROM `phudinfo` WHERE 1";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      

      echo'<div class="tableround">';
      
        echo'<div class="inner"> <img class="imgtable" src="uploads/'. $row["picture"].'" alt="Cinque Terre" width="600" height="400"></a></div>';
        echo'<form action="update.php" method="post">';
      
        echo'  <input type="text" name="name" value='. $row["name"].'>';
        
        
        echo'<input class="inner" type="text" name="description" value='. $row["description"].'>';
        echo'<input class="inner" type="text" name="price" value='. $row["price"].'>';
        
        echo'<input class="inner" name="submit" type="submit" value="update">';
        echo '<input type="text" style="display:none;" name="picture" value='. $row["picture"].' >	';
        echo'</form>';
       
        echo'<div class="inner"> <h2> Publish </h2></div>';
      
        
        echo '  
				<form method="post" action="delete.php">
				<div style="display: none;">
				<input type="text"  name="image" value='. $row["picture"].' >		
        
				</div>
        <button class="inner" name="delete" >
        <h2> Delete <i class="fa  fa-trash-o"></i></h2> 
        </button>
				</form>	';
        echo'</div>';

    }
  } else {
    echo "0 results";
  }
  $conn->close();
  ?>