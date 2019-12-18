<?php

 $link = mysqli_connect("localhost", "userTw", "user1998Tw", "tw");
// Check connection
if($link === false){
   die("ERROR: Could not connect. " . mysqli_connect_error());
}
// Escape user inputs for security
$modific = mysqli_real_escape_string($link, $_POST['modific']);
$dataNoua = mysqli_real_escape_string($link, $_POST['dataNoua']);

// attempt insert query execution
?>
<html>
<head>  <link rel="stylesheet" href="./css/formula.css">
 <link rel="stylesheet" href="css/formula.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<?php
$sql = "SELECT dataIntreventie FROM pacient";


$result = mysqli_query($link, $sql);

$l="UPDATE pacient 
SET 
    pacient.dataIntreventie = '$dataNoua'
WHERE
    pacient.nume='$modific' ";
if(mysqli_query($link, $l)){
    echo "--- .Programarea pacientului *  "; echo $modific ; echo" *  a fost modificat pe data de  * "; echo $dataNoua; echo" * ---.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
mysqli_close($link);
?>
<div class="text-right">
 <button class="btn btn-primary"> <a href="secretaraPage.html" style="color:red;">Du-te înapoi la programări</a></button>
  <button class="btn btn-primary"> <a href="home.html" style="color:red;">Pagina principală</a></button>
</div>