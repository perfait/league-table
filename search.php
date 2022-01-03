<?php 


//on local host
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "league";





//create connection

$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if($conn->connect_error){
    die("connection failed: " . $conn->connect_error);
}

else{
    // echo 'Connected....';
}


?>

<?php
$searchTerm=$_GET['term'];

$query=mysqli_query($conn, "select * from players where player_name LIKE '%".$searchTerm."%' ORDER BY player_name ASC");


while($row=mysqli_fetch_array($query)){
    $data[]=$row['player_name'];
}

echo json_encode($data);

?>