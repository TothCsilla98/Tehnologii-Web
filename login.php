<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-widdth, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Regional Hospital</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="pimg">
    <nav>
      <ul>
        <li><a  href="home.html">Home</a></li>
      </ul>
    </nav>
    <div class="ptext1">
      <span class="border1">
        Regional Hospital
      </span>
    </div>
  </div>
	<div align="center">
	<form  method="POST"  style="background-color: lightblue;padding:100px !important;">
		<table >
			<tr>
				<td><User type></td>
				<td><select name="type">
				<option value="-1">select user type</option>
				<option value="Administrator">Aministrator</option>
				<option value="Medic">Medic</option>
				<option value="Secretara">Secretara</option>
				</select>
				</tr>	
				<tr>
					<td>Username</td>
					<td><input type="text" name="username" placeholder="username"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="pwd" placeholder="password"></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><input type="submit" name="submit" value="Login"></td>
				</tr>			
		</table>
</form>
</div>
</body>
</html>

<?php

$con=mysqli_connect("localhost","userTw","user1998Tw");
 // Check connection
  if (!$con)
  {
  die("Connection error: " . mysqli_connect_error());
  }
	$db=mysqli_select_db($con, "tw");
	if(!$db)
	{
		echo"Not found".mysql_error();
	}
if(isset($_POST['submit']))
{
	$type=$_POST['type'];
	$username=$_POST['username'];
	$password=$_POST['pwd'];
	/*
	$query="select *from login where username='$username'
	and password='$password' and type='$type'";
	$result=mysqli_query($query,MYSQLI_STORE_RESULT);*/

	$result=mysqli_query($con,"select *from login where username='$username'
	and password='$password' and type='$type'");


	while ($row=mysqli_fetch_array($result)) {
		if ($row['username'] ==$username && $row['password']==$password && $row['type']=='Administrator') {
			header("Location: administrator.html");}
		if ($row['username'] ==$username && $row['password']==$password && $row['type']=='Secretara') {
			header("Location: secretaraPage.html");}
		if ($row['username'] ==$username && $row['password']==$password && $row['type']=='Medic') {
			header("Location: medic.html");}
		
	
	}
		
	
}
?>