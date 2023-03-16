<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>from page </title>
	
	<style type="text/css">
		body{border: 10px solid transparent;
             background-color: hsl(0, 100%, 90%);
		}
		span{color: red;}
		input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: center;
	input[type=submit]:hover 
  background-color: #45a049;}
  
	</style>




<body>

<?php
//create a connection in database,
$servername ="localhost";
$username ="root";
$password ="";
$dbname="sam";
$connection=mysqli_connect($servername,$username,$password,$dbname,);

if($connection){
	//echo "connection successfuly";

}else{
	echo "connection fialed .mysqli_connect_error";
}
echo '<br>';


$nameErr = $emailErr = $passwordErr = $rememberErr ="";
$name = $email = $password= $rememberme = "";

if (isset($_POST["submit"])) {
	if (empty($_POST["name"])) {
		$nameErr = "<br>name is required";
	}else {
		$name = test_input($_POST["name"]);
	}
		
if (empty($_POST["email"])) {
		$emailErr = "<br>email is required";
	}else {
    $email = test_input($_POST["email"]);
  }
	
if (empty($_POST["password"])) {
		$passwordErr = "<br>  password is required";
	}else {
		$password = test_input($_POST["password"]);
	}
	if (empty($_POST["remember"])) {
		$rememberErr="<br> checkbox";

	}else {
		$remember = test_input($_POST["remember"]);
	}
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//create a database in mysql,

$sql ="INSERT INTO `sams` (`Name`, `Email`, `password`, `dt`) VALUES ('$name', '$email', '$password', CURRENT_DATE())";
$result =mysqli_query($connection,$sql);

if ($result) {
	echo '<div class="alert alert-success">
    <strong>Success!</strong> your form sabmitit successfuly.
  </div>';
}else{
echo  "database connection was fialed plasce try agein".mysqli_error($connection);
} 


//create a database in mysql,

/*$sql =
$result =mysqli_qurey($connection,$sql);

if ($result) {
	echo "database connection successfuly";
}else{
	echo "database connection is fialed becuse this". mysqli_error($connection);*/


?>




<center><h1>contect us </h1>
 <div class="cantainer">
 	<form class="" method="post"> 
 		<label><b>Name</label>
 		<input type="text" name="name" placeholder="entry your name"><span class="erro"><?php echo "$nameErr";?></span><br>
 		<br>
 		<label><b>E-mail</label>
 		<input type="Email" name="email" placeholder="entry your email"><span class="error"><?php echo "$emailErr";?></span><br>
 		<br>
 		<label><b>password</label>
 		<input type="password" name="password" placeholder="entry your password"><span class="error"><?php echo "$passwordErr";?></span><br>
 		<br>

 		<label class="form-check-label">
 			<input class="form-check-input" type="checkbox" name="remember" >Remember me
 		</label><span class="error"> <?php echo "$rememberErr";?></span><br>
 		<br>
 		<input type="submit" name="submit" value="Submit"><br> 
 		

 	</form>
 	
 </div>
 </center>
</body>
</html>


