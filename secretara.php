

<?php

 $link = mysqli_connect("localhost", "userTw", "user1998Tw", "tw");
// Check connection
if($link === false){
   die("ERROR: Could not connect. " . mysqli_connect_error());
}
// Escape user inputs for security
$specialitateMedicala = mysqli_real_escape_string($link, $_POST['specialitateMedicala']);

// attempt insert query execution
?>
<html>
<head>  <link rel="stylesheet" href="./css/formula.css">
 <link rel="stylesheet" href="css/formula.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<?php
echo 'Căutam medici cu specializare: ';echo $specialitateMedicala;
$sql = "SELECT nume,disponibilitate FROM medic
WHERE medic.specialitateMedicala='$specialitateMedicala'
ORDER BY nume";


$result = mysqli_query($link, $sql);
echo '<select name="gk">';

if (mysqli_num_rows($result) > 0) {
    // output data of each row
  
    while($row = mysqli_fetch_assoc($result)) {
      if( $row[disponibilitate] == 'disponibil'){
            echo "<option value=$row[nume]>$row[nume]</option>"; 
      }
    }
} else {
    echo "0 results";
}
echo "</select>";
mysqli_close($link);
?>
<form action="medic-pacient.php" method="post">
<input style="width:250px;" type="text" name="numeM" placeholder="Introduce numele medicului ales" required>
<input style="width:250px;" type="text" name="numeP" placeholder="Introduce numele pacientului" required>
<button type="submit" name="submit">Submit</button>
</form>





<div class="text-right">
 <button class="btn btn-primary"> <a href="login.php" style="color:blue;text-decoration: none;">Pagina de logare</a></button>
  <button class="btn btn-primary"> <a href="home.html" style="color:blue;text-decoration: none;">Pagina principală</a></button>
  <button class="btn btn-primary"> <a href="secretaraPage.html" style="color:blue;text-decoration: none;">Pagina secretara</a></button>
</div>
</html>





