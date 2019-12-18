<?php

 $link = mysqli_connect("localhost", "userTw", "user1998Tw", "tw");
// Check connection
if($link === false){
   die("ERROR: Could not connect. " . mysqli_connect_error());
}
// Escape user inputs for security
$username = mysqli_real_escape_string($link, $_POST['username']);
$password = mysqli_real_escape_string($link, $_POST['password']);
$type = mysqli_real_escape_string($link, $_POST['type']);

// attempt insert query execution
if ($type == 'Secretara' || $type =='Medic') {
$sql = "INSERT INTO login(username, password, type) VALUES ('$username', '$password','$type')";
if(mysqli_query($link, $sql)){
  // echo "Data successfully Saved.".$link->insert_id;
   echo "<script type='text/javascript'> alert('Data dumneavoastră au fost introduse cu succes! ');</script>";
   header('location: administrator.html');
} else{
   echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}else   { echo"<script type='text/javascript'> alert('Introduceți toate datele și nu uitați: tip SECRATARA sau MEDIC! ');</script>";
echo'<button><a href="administrator.html">Încercați din nou!</a></button>';

}
// close connection
mysqli_close($link);

?>