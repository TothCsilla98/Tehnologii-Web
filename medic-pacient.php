<?php

 $link = mysqli_connect("localhost", "userTw", "user1998Tw", "tw");
// Check connection
if($link === false){
   die("ERROR: Could not connect. " . mysqli_connect_error());
}
// Escape user inputs for security
$numeM = mysqli_real_escape_string($link, $_POST['numeM']);
$numeP = mysqli_real_escape_string($link, $_POST['numeP']);
$sql = "INSERT INTO pacientmedic (idMedic,numeP) values ('$numeM','$numeP')";

if(mysqli_query($link, $sql)){
  // echo "Data successfully Saved.".$link->insert_id;
   echo "<script type='text/javascript'> alert('Data dumneavoastră au fost introduse cu succes! ');</script>";

} else{
   echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
// attempt insert query execution
$l="UPDATE medic 
SET 
    medic.disponibilitate = 'indisponibil'
WHERE
    medic.nume='$numeM' ";
if(mysqli_query($link, $l)){
    echo "--- .Disponibilitatea medicului a fost actualizat!. ---.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>

<html>
<head>  <link rel="stylesheet" href="./css/formula.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<?php
mysqli_close($link);
echo "<table >";
echo"<tr>" ;	
  echo"<p>";
  echo'<th>';echo"Pacient - Medic" ;
echo"</p>";
echo"</tr>";
echo"<tr>" ;	
  echo"<p>";
  echo'<td class="input-group">';echo"Numele medicului este: " ;echo $numeM;
echo"</p>";
echo"</tr>";
echo"<tr>" ;	
  echo"<p>";
  echo'<td class="input-group">';echo"Numele pacientului este: " ;echo $numeP ;
echo"</p>";
echo"</tr>";
echo "</table>";


?>

<div class="text-right">
 <button class="btn btn-primary"> <a href="login.php" style="color:red;">Pagina de logare</a></button>
  <button class="btn btn-primary"> <a href="home.html" style="color:red;">Pagina principală</a></button>
    <button class="btn btn-primary"> <a href="secretaraPage.html" style="color:red;">Pagina programări</a></button>
</div>
</html>
