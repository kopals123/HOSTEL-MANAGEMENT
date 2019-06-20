<?php 
    $servername="localhost";
	$username="root";
	$password="";
	$dbname="db";
	
	$conn = mysqli_connect($servername, $username, $password,  $dbname);
	if(!$conn)
	{
		die("connection failed".mysqli_connect_error()); echo"<br>";
	}
	else
	{
		echo"connected to database";
		echo"<br>";
	}
		
?>

<?php
$name="";
$age="";
$address="";
$branch="";


	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
	//-----------------------------------------insert 
	if(isset($_POST["insert"]))
	{		
$name=$_POST["name"];
$age=$_POST["age"];
$address=$_POST["address"];
$branch=$_POST["branch"];

		
		
		$n1="INSERT INTO dbtable VALUES('$name','$age','$address','$branch')";
		if(mysqli_query($conn, $n1))
		{
		echo "record entered into the database";	
		}
		else
		{
			echo "error".mysqli_error($conn);
		}
	}
	//-----------------------------------------search
	if(isset($_POST["search"]))
	{
		$name=$_POST["name"];
$age=$_POST["age"];
$address=$_POST["address"];
$branch=$_POST["branch"];

	
	$n2="SELECT * FROM dbtable where name='$name'";
	$result=mysqli_query($conn,$n2);
	if(mysqli_num_rows($result)>0)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			echo $row['name'];
			echo $row['age'];
			echo $row['address'];
			echo $row['branch'];
			
		}}}
	//------------------------------------------delete
	if(isset($_POST["delete"]))
	{
	$name=$_POST["name"];
$age=$_POST["age"];
$address=$_POST["address"];
$branch=$_POST["branch"];

		
	$n3="DELETE FROM dbtable where name='$name' or age= '$age' or address='$address' or branch='$branch'";
		if(mysqli_query($conn, $n3))
		{
		echo "record deleted from database";	
		}
		else
		{
			echo "error".mysqli_error($conn);
		}
	}
	//--------------------------------------------------update
	if(isset($_POST["update"]))
	{
	$name=$_POST["name"];
$age=$_POST["age"];
$address=$_POST["address"];
$branch=$_POST["branch"];

		
	$n4="update dbtable set `age`='$age',`name`='$name',`branch`='$branch',`address`='$address' where name= '$name' or age= '$age' or address= '$address' or branch='$branch'";
	if(mysqli_query($conn,$n4))
	{
		echo "data updated";
	}
	else
	{
		echo "error";
	}}
	mysqli_close($conn);
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
NAME<input type="text" name="name" /><br /><br />
AGE<input type="number" name="age"   /><br /><br />
ADDRESS<input type="text" name="address"   /><br /><br />
BRANCH<input type="text" name="branch"   /><br /><br >

<button type="submit" name="insert" >INSERT</button>
<button type="submit" name="update">UPDATE</button>
<button type="submit" name="delete">DELETE</button>
<button type="submit" name="search">SEARCH</button>
</form>
</body>
</html>


