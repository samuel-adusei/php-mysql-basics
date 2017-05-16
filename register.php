
<!doctype html>

<?php
$con = mysqli_connect("localhost","root","","dataform")
or die ("connection was not created"); //saved connection in variable


?>
<!DOCTYPE html>
<html>
<head>
<title> register </title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="register">
<a href="index.php"> Back to homepage </a>

<form action="register.php" class="signup" method="POST">
Enter Username:<input type="text" name="username" required="required"/></br>
Enter Password:<input type="password" name="password"  required="required"/></br>
Enter Email:<input type="email"	 name="email" required="required"/></br>
<input type="submit" name="register"	value="register" />
</form>
<?php
	if(isset($_POST['register'])){
//isset is a function if something has happened in the page and sub is a button
	 $username = $_POST['username']; //calls out the method from our phone and shows out
	 $password = $_POST['password'];
	 $email = $_POST['email'];
	 
	$insert= "insert into users(name,password,email) values ('$username','$password','$email')"; //add to table name not database name
	
	$run = mysqli_query($con,$insert); // this first ask for the server connection and then the query where trying to run
	
	if($run)	{
		echo "<h3> Registration successful, thanks </h3>";
	}
	 
	}
	?>
	</br>
	<!-- creating a table of our data -->
	<table width="500" bgcolor="orange" border="2">
		
		<tr>
		<th>S.N</th>
		<th>Name</th>
		<th>Password</th>
		<th>Email</th>
		<th>Edit</th>
		<th>Delete</th>	
			</tr>
			<?php
				
				$select = "select * from users";
				$run = mysqli_query($con,$select);//selects user table and then the database
				while($row=mysqli_fetch_array($run)) {
				//loop to run through the data	
					$user_id = $row['id'];
					$user_name = $row['name'];
					$user_pass = $row['password'];
					$user_email = $row['email'];
						//asking ting to make array for the value
						//this
				
				
			
			?>
		<tr>
			<td><?php echo $user_id; ?></td>
			<td><?php echo $user_name;?></td>
			<td><?php echo $user_pass;?></td>
			<td><?php echo $user_email;?></td>
			<td><a href="register.php?"delete=<?php echo $user_id; ?>Delete</td>
			<td><a href="register.php">Edit</td>
				</tr>
				<?php	}	?>	//have to close the value here so it loops over all data
			
	</table>
		
</body>
</html>
 

<!--$_SERVER["REQUESTED_METHOD"] == "POST" - Checks if the form 
has recieved a post method when the submit has been clicked

$_POST['] get name coming from post method gets input from our username and pasword 
$_POST['] gets name coming from Post method gets input from our username and password
mysql_real_escape_string(')- This ensures that your string dont escape from unnessary characters.-->


