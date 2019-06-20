<?php 
    $servername="localhost";
	$username="root";
	$password="";
	$dbname="hostel";
	
	$conn = mysqli_connect($servername, $username, $password,  $dbname);
	if(!$conn)
	{
		die("connection failed".mysqli_connect_error()); echo"<br>";
	}
	
?>

<?php
$name="";
$mob="";
$email="";
$dob="";
$gender="";
$branch="";
$postal="";
$father="";
$mother="";
$course="";
$regno="";
$fatmob="";
$img="";
  //------------------------------
  
$name1="";
$mob1="";
$email1="";
$dob1="";
$gender1="";
$branch1="";
$postal1="";
$father1="";
$mother1="";
$course1="";
$regno1="";
$fatmob1="";
$img1="";


	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
	//-----------------------------------------insert 
	if(isset($_POST["insert"]))
	{		
$name=$_POST["fulname"];
$mob=$_POST["mob"];
$email=$_POST["email"];
$dob=$_POST["dob"];
$gender=$_POST["gender"];
$branch=$_POST["branch"];
$postal=$_POST["postal"];
$father=$_POST["father"];
$mother=$_POST["mother"];
$course=$_POST["course"];
$regno=$_POST["regno"];
$fatmob=$_POST["fatmob"];
$img=$_POST["img"];
  
		
		
		$n1="INSERT INTO `hosteltab`(`name`, `fathername`, `mothername`, `regno`, `mobileno`, `fatherno`, `email`, `dob`, `gender`, `course`, `branch`, `photo`, `postaladdress`) VALUES ('$name','$father','$mother','$regno','$mob','$fatmob','$email','$dob','$gender','$course','$branch','$img','$postal') ";	
																																																																																	  if(mysqli_query($conn, $n1))
		{
			$n="SELECT * FROM hosteltab";
	$result=mysqli_query($conn,$n);
	if(mysqli_num_rows($result)>0)
	{
		?>
        
		<td>DATABASE</td>
		<table border="1">
        <tr>
        <th>NAME</th>
        <th>FATHERNAME</th>
        <th>MOTHERNAME</th>
		<th>REGNO</th>
		<th>MOBILENO</th>
		<th>FATHERNO</th>
		<th>EMAIL</th>
		<th>DOB</th>
		<th>GENDER</th>
		<th>COURSE</th>
		<th>BRANCH</th>
		<th>PHOTO</th>
		<th>POSTAL ADDRESS</th>
		</tr>
		<?php
		while($row=mysqli_fetch_assoc($result))
		{
			?>
            <tr>
			<td><?php echo $row['name'];?></td>
              <td><?php echo $row['fathername'];?></td>
                 <td><?php echo $row['mothername'];?></td>
                  <td><?php echo $row['regno'];?></td>
             <td><?php echo $row['mobileno'];?></td>
             <td><?php echo $row['fatherno'];?></td>
             <td><?php echo $row['email'];?></td>
             <td><?php echo $row['dob'];?></td>
             <td><?php echo $row['gender'];?></td>
             <td><?php echo $row['course'];?></td>
             <td><?php echo $row['branch'];?></td>
             <td><?php echo $row['photo'];?></td>
             <td><?php echo $row['postaladdress'];?></td>
            </tr>
<?php }}}
else
			echo "error".mysqli_error($conn);
	
	}
	//-----------------------------------------search
	if(isset($_POST["search"]))
	{
	
$name=$_POST["fulname"];
$mob=$_POST["mob"];
$email=$_POST["email"];
$dob=$_POST["dob"];
$gender=$_POST["gender"];
$branch=$_POST["branch"];
$postal=$_POST["postal"];
$father=$_POST["father"];
$mother=$_POST["mother"];
$course=$_POST["course"];
$regno=$_POST["regno"];
$fatmob=$_POST["fatmob"];
$img=$_POST["img"];
  
	
	$n2="SELECT * FROM hosteltab where regno='$regno'";
    if(mysqli_query($conn,$n2))
	{
	$result=mysqli_query($conn,$n2);
	if(mysqli_num_rows($result)>0)
	{
		?>
		<table border="1">
        <tr>
        <th>NAME</th>
        <th>FATHERNAME</th>
        <th>MOTHERNAME</th>
		<th>REGNO</th>
		<th>MOBILENO</th>
		<th>FATHERNO</th>
		<th>EMAIL</th>
		<th>DOB</th>
		<th>GENDER</th>
		<th>COURSE</th>
		<th>BRANCH</th>
		<th>PHOTO</th>
		<th>POSTAL ADDRESS</th>
		</tr>
		<?php
		while($row=mysqli_fetch_assoc($result))
		{
			?>
            <tr>
			<td><?php $name1= $row['name'];?></td>
              <td><?php $father1=$row['fathername'];?></td>
                 <td><?php $mother1= $row['mothername'];?></td>
                  <td><?php  $regno1= $row['regno'];?></td>
             <td><?php $mob1 =$row['mobileno'];?></td>	
             <td><?php  $fatmob1=$row['fatherno'];?></td>
             <td><?php $email1= $row['email'];?></td>
             <td><?php $dob1= $row['dob'];?></td>
             <td><?php $gender1= $row['gender'];?></td>
             <td><?php $course1=$row['course'];?></td>
             <td><?php $branch1= $row['branch'];?></td>
             <td><?php $img1= $row['photo'];?></td>
             <td><?php $postal1= $row['postaladdress'];?></td>
             </tr>
  
<?php 
}}}
else
		echo "record not found";
	}
	//------------------------------------------delete
	if(isset($_POST["delete"]))
	{
$name=$_POST["fulname"];
$mob=$_POST["mob"];
$email=$_POST["email"];
$dob=$_POST["dob"];
$gender=$_POST["gender"];
$branch=$_POST["branch"];
$postal=$_POST["postal"];
$father=$_POST["father"];
$mother=$_POST["mother"];
$course=$_POST["course"];
$regno=$_POST["regno"];
$fatmob=$_POST["fatmob"];
$img=$_POST["img"];
		
	$n3="DELETE FROM hosteltab where regno='$regno'" ;
	  if(mysqli_query($conn, $n3))
		{
			$n="SELECT * FROM hosteltab";
		$result=mysqli_query($conn,$n);
	if(mysqli_num_rows($result)>0)
	{
		?>
		<table border="1">
        <tr>
        <th>NAME</th>
        <th>FATHERNAME</th>
        <th>MOTHERNAME</th>
		<th>REGNO</th>
		<th>MOBILENO</th>
		<th>FATHERNO</th>
		<th>EMAIL</th>
		<th>DOB</th>
		<th>GENDER</th>
		<th>COURSE</th>
		<th>BRANCH</th>
		<th>PHOTO</th>
		<th>POSTAL ADDRESS</th>
		</tr>
		<?php
		while($row=mysqli_fetch_assoc($result))
		{
			?>
            <tr>
			<td><?php echo $row['name'];?></td>
              <td><?php echo $row['fathername'];?></td>
                 <td><?php echo $row['mothername'];?></td>
                  <td><?php echo $row['regno'];?></td>
             <td><?php echo $row['mobileno'];?></td>
             <td><?php echo $row['fatherno'];?></td>
             <td><?php echo $row['email'];?></td>
             <td><?php echo $row['dob'];?></td>
             <td><?php echo $row['gender'];?></td>
             <td><?php echo $row['course'];?></td>
             <td><?php echo $row['branch'];?></td>
             <td><?php echo $row['photo'];?></td>
             <td><?php echo $row['postaladdress'];?></td>
             </tr>
     
<?php }}}
else
			echo "record not found".mysqli_error($conn);
	}
	//--------------------------------------------------update
	if(isset($_POST["update"]))
	{
$name1=$_POST["fulname"];
$mob1=$_POST["mob"];
$email1=$_POST["email"];
$dob1=$_POST["dob"];
$gender1=$_POST["gender"];
$branch1=$_POST["branch"];
$postal1=$_POST["postal"];
$father1=$_POST["father"];
$mother1=$_POST["mother"];
$course1=$_POST["course"];
$regno1=$_POST["regno"];
$fatmob1=$_POST["fatmob"];
$img1=$_POST["img"];
		
		
	$n4="update hosteltab set `name`='$name1', `fathername`='$father1', `mothername`='$mother1', `regno`='$regno1', `mobileno`='$mob1', `fatherno`='$fatmob1', `email`='$email1', `dob`='$dob1', `gender`='$gender1', `course`='$course1', `branch`='$branch1' , `photo`='$img1', `postaladdress`='$postal1' where regno='$regno'";
	
	
	
	if(mysqli_query($conn,$n4))
	{
		
			$n="SELECT * FROM hosteltab";
		$result=mysqli_query($conn,$n);
	if(mysqli_num_rows($result)>0)
	{
		?>
		<table border="1">
        <tr>
        <th>NAME</th>
        <th>FATHERNAME</th>
        <th>MOTHERNAME</th>
		<th>REGNO</th>
		<th>MOBILENO</th>
		<th>FATHERNO</th>
		<th>EMAIL</th>
		<th>DOB</th>
		<th>GENDER</th>
		<th>COURSE</th>
		<th>BRANCH</th>
		<th>PHOTO</th>
		<th>POSTAL ADDRESS</th>
		</tr>
		<?php
		while($row=mysqli_fetch_assoc($result))
		{
			?>
            <tr>
			<td><?php echo $row['name'];?></td>
              <td><?php echo $row['fathername'];?></td>
                 <td><?php echo $row['mothername'];?></td>
                  <td><?php echo $row['regno'];?></td>
             <td><?php echo $row['mobileno'];?></td>
             <td><?php echo $row['fatherno'];?></td>
             <td><?php echo $row['email'];?></td>
             <td><?php echo $row['dob'];?></td>
             <td><?php echo $row['gender'];?></td>
             <td><?php echo $row['course'];?></td>
             <td><?php echo $row['branch'];?></td>
             <td><?php echo $row['photo'];?></td>
             <td><?php echo $row['postaladdress'];?></td>
             </tr>
<?php }}}
else
		echo "data not found";
	}
		mysqli_close($conn);
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ADMINISTRATION</title>
</head>

<body style="background-image:url(images/25_04_16_014052_Digital_lab.png);background-size:cover" >
<form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
  <center>
  <fieldset>
  <legend><h1>Registration Form</h1></legend><br />
  
  <!---------------------------------form1---------------------------------->
  <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" enctype="multipart/form-data">
 
 
  <label for="reg">REG NO*:</label>
  <input type="number" style="width:25%" name="regno"  placeholder="enter your register number" value="<?php echo $regno1; ?>"></input><br /><br />
 
  <label for="name">NAME:</label>
  <input type="text" name="fulname"  placeholder="enter your full name" value="<?php  echo $name1;?>"></input><br /><br />
 
  <label for="parent1">FATHER NAME:</label>
  <input type="text" name="father"  placeholder="enter fathers name" value="<?php echo $father1; ?>"></input><br /><br />
 
  
  <label for="parent2">MOTHER NAME:</label>
  <input type="text" name="mother"  placeholder="enter mothers name" value="<?php echo $mother1; ?>"></input><br /><br />
   
  <label for="mob">MOB NO.:</label>
  <input type="number" style="width:25%" name="mob"  placeholder="enter your mobile number"value="<?php echo $mob1; ?>"></input><br /><br />
  
  
  <label for="fatmob"> FATHER'S MOB NO.:</label>
  <input type="number" style="width:30%" name="fatmob"  placeholder="enter your father's mobile number"value="<?php echo $fatmob1; ?>"></input><br /><br />
  
  <label for="mail">E-MAIL:</label>
  <input type="text" placeholder="abc@gmail.com" name="email" value="<?php echo $email1; ?>"></input><br /><br />
  
  <label for="date">DOB:</label>
  <input type="date" name="dob" placeholder="format (dd-mm-yyyy)" value="<?php if($dob1) echo $dob1 ; ?>"></input><br /><br />
  
  <label for="radio">GENDER:</label>
  <input type="radio" name="gender" value="male" checked <?php if($gender1== "male"){echo "checked";} ?>>MALE</input>
  <input type="radio" name="gender" value="female"<?php  if($gender1== "female"){echo "checked";} ?>>FEMALE</input><br /><br />
  
  
  <label for="course"><strong>COURSE</strong>:</label>
  <select name="course">
   <option type="dropdown" value="0" selected="selected" <?php if($course1== '0') {echo "selected";}?>>--select one--</option>
   <option type="dropdown" value="BTECH" <?php if($course1== 'BTECH') {echo "selected";}?>>BTECH</option>
   <option type="dropdown" value="BE" <?php if($course1== 'BE') {echo "selected";}?>>BE</option>
   <option type="dropdown" value="MBA" <?php if($course1== 'MBA') {echo "selected";}?>>MBA</option>
   <option type="dropdown" value="B.SC" <?php if($course1== 'B.SC'){ echo "selected";}?>>B.SC</option>
   <option type="dropdown" value="BA" <?php if($course1== 'BA') {echo "selected";}?>>BA</option>
   <option type="dropdown" value="BDS" <?php if($course1== 'BDS'){ echo "selected";}?>>BDS</option>
   <option type="dropdown" value="M.TECH" <?php if($course1== 'M.TECH') {echo "selected";}?>>M.TECH</option>
   <option type="dropdown" value="B.COM" <?php if($course1== 'B.COM') {echo "selected";}?>>B.COM</option>
   <option type="dropdown" value="B.ARCH" <?php if($course1== 'B.ARCH'){ echo "selected";}?>>B.ARCH</option>     
   <option type="dropdown" value="BBA" <?php if($course1== 'BBA') {echo "selected";}?>>BBA</option>
    <option type="dropdown" value="M.E" <?php if($course1== 'M.E') {echo "selected";}?>>M.E</option>
    <option type="dropdown" value="M.SC" <?php if($course1== 'M.SC') {echo "selected";}?>>M.SC</option>
    <option type="dropdown" value="PH.D" <?php if($course1== 'PH.D') {echo "selected";}?>>PH.D</option>
    <option type="dropdown" value="M.phil" <?php if($course1== 'M.phil'){ echo "selected";}?>>M.phil</option>
    <option type="dropdown" value="M.A" <?php if($course1== 'M.A') {echo "selected";}?>>M.A</option>
    </select><br /><br />
  
   
  <label for="branch"><strong>BRANCH</strong>:</label>
  <select name="branch">
   <option type="dropdown" value="0"<?php if($branch1=="0") echo "selected"?>>--select one--</option>
   <option type="dropdown" value="it"<?php if($branch1=="it") echo "selected"?>>IT</option>
   <option type="dropdown" value="cse"<?php if($branch1=="cse") echo "selected"?>>CSE</option>
   <option type="dropdown" value="arounotical"<?php if($branch1=="arounotical") echo "selected"?>>AROUNOTICAL</option>
   <option type="dropdown" value="civil"<?php if($branch1=="civil") echo "selected"?>>CIVIL</option>
   <option type="dropdown" value="biotechnology"<?php if($branch1=="biotechnology") echo "selected"?>>BIOTECHNOLOGY</option>
   <option type="dropdown" value="mechanical"<?php if($branch1=="mechanical") echo "selected"?>>MECHANICAL</option>
   <option type="dropdown" value="arts"<?php if($branch1=="arts") echo "selected"?>>ARTS</option>
   <option type="dropdown" value="ece"<?php if($branch1=="ece") echo "selected"?>>ECE</option>
   <option type="dropdown" value="ee"<?php if($branch1=="ee") echo "selected"?>>EE</option>     
   <option type="dropdown" value="eee"<?php if($branch1=="eee") echo "selected"?>>EEE</option>
    </select><br /><br />
 
<label>SUBMIT YOUR  PHOTO</label>  
<input type="file" name="img"/>
 <img src="<?php  echo $img1; ?>" style="width:100px; height:100px;"/>
 <br /><br />
  
<label for="Postal address">POSTAL ADDRESS</label>
<input type="text" style="width:70%;text-transform:uppercase" name="postal" placeholder="ENTER UR HOME ADDRESS" value="<?php echo $postal1?>"/><br /><br />

<button type="submit" name="insert" >INSERT</button>
<button type="submit" name="update">UPDATE</button>
<button type="submit" name="delete">DELETE</button>
<button type="submit" name="search">SEARCH</button><br /><br /><br />

</fieldset>
</center>
<center><h1><u>STUDENT DETAILS</h1></u>></center>
</form>

</body>
</html>