<?php

 $link = mysqli_connect("localhost", "userTw", "user1998Tw", "tw");
// Check connection
if($link === false){
   die("ERROR: Could not connect. " . mysqli_connect_error());
}
// Escape user inputs for security
$numeMedic = mysqli_real_escape_string($link, $_POST['numeMedic']);
$numePacient = mysqli_real_escape_string($link, $_POST['numePacient']);
$concluzii = mysqli_real_escape_string($link, $_POST['concluzii']);
$plata = mysqli_real_escape_string($link, $_POST['plata']);
// attempt insert query execution
$sql = "INSERT INTO consult (numeMedic, dataExaminarii, concluzii, numePacient, plata) VALUES ('$numeMedic', now(),
 '$concluzii','$numePacient','$plata')";
if(mysqli_query($link, $sql)){
  // echo "Data successfully Saved.".$link->insert_id;
   echo "<script type='text/javascript'> alert('Data dumneavoastră au fost introduse cu succes! ');</script>";

} else{
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
  echo'<th>';echo"Scrisoare medicală" ;
echo"</p>";
echo"</tr>";
echo"<tr>" ;	
  echo"<p>";
  echo'<td class="input-group">';echo"Numele medicului este: " ;echo $numeMedic ;
echo"</p>";
echo"</tr>";
echo"<tr>" ;	
  echo"<p>";
 echo'<td class="input-group">';echo"Numele pacientului este: " ; echo $numePacient;
 echo"</p>";
echo"</tr>";
echo"<tr>" ;	
  echo"<p>";
 echo'<td class="input-group">';echo"Plata pentru consult: " ; echo $plata; echo"RON";
 echo"</p>";
echo"</tr>";
echo"<tr>" ;	
  echo"<p>";
 echo'<td class="input-group">';echo"Diagnostic: " ; echo $concluzii;
 echo"</p>";
echo"</tr>";
 echo"<tr>" ;	
  echo"<p>";
 echo'<td class="input-group">';echo "Semnatura : <br>";echo"..........";
 echo"</p>";
echo"</tr>";
echo "</table>";


?>
<div class="text-right">
 <button class="btn btn-primary"> <a href="login.php" style="color:red;">Pagina de logare</a></button>
  <button class="btn btn-primary"> <a href="home.html" style="color:red;">Pagina principală</a></button>
</div>
</html>





