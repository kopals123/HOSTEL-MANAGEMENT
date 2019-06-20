  
    <?php
  $nameerr=$moberr=$emailerr=$doberr=$gendererr=$brancherr=$postalerr=$fathererr=$mothererr=$courseerr=$regerr=$fatmoberr="";
  $name=$mob=$email=$dob=$gender=$branch=$postal=$father=$mother=$course=$regno=$fatmob=$img="";
  
  if($_SERVER["REQUEST_METHOD"]=="POST")
  if(isset($_POST["submit"]))
  {
  //________________________________________NAME
  if(empty($_POST["fulname"]))
  {
  $nameerr="please specify your name";
  }
  else if(!preg_match("/^[a-zA-Z ]*$/",$_POST["fulname"]))
  {
    $nameerr="enter only alphabets";
  }
  $name=$_POST["fulname"];
  //----------------------------------------father name
  
  if(empty($_POST["father"]))
  {
  $fathererr="please specify father name";
  }
  else if(!preg_match("/^[a-zA-Z ]*$/",$_POST["father"]))
  {
    $fathererr="enter only alphabets";
  }
  $father=$_POST["father"];
  //-----------------------------------------mothersname
 
 
  if(empty($_POST["mother"]))
  {
  $mothererr="please specify mother name";
  }
  else if(!preg_match("/^[a-zA-Z ]*$/",$_POST["mother"]))
  {
    $mothererr="enter only alphabets";
  }
  $mother=$_POST["mother"];
 //----------------------------------------regno 
 if(empty($_POST["regno"]))
  {
  $regerr="please enter your register number";
  }
  $regno=$_POST["regno"];
 //__________________________________________MOBILE NUMBER
  if(empty($_POST["mob"]))
  {
  $moberr="please enter your mobile number";
  }
  else if(!is_numeric($_POST["mob"]))
  {
    $moberr="please enter numbers";
  }
  else if(strlen($_POST["mob"])!=10)
  {
  $moberr="mobile should be of 10 digits";
  }
  $mob=$_POST["mob"];
  //------------------------------------------------------fathers number
  if(empty($_POST["fatmob"]))
  {
  $fatmoberr="please enter father mobile number";
  }
  else if(!is_numeric($_POST["fatmob"]))
  {
    $fatmoberr="please enter numbers";
  }
  else if(strlen($_POST["fatmob"])!=10)
  {
  $fatmoberr="mobile should be of 10 digits";
  }
  $fatmob=$_POST["fatmob"];
  //_________________________________________________________EMAIL
  if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
  {
  $emailerr = "email is not correct";
  }
  $email= $_POST["email"];
  //_____________________________________________________________DATE
  if(empty($_POST["dob"]))
  {
  $doberr="please enter DOB";
  }
  $dob=$_POST["dob"];
  //________________________________________________________________GENDER
  if(empty($_POST["gender"]))
  {
  $gendererr="please specify the gender";
  }
  else
  {
  $gender=$_POST["gender"];
  }
  //_______________________________________________________________branch
  if($_POST["branch"]=="0")
  {
  $brancherr="choose a branch";
  }
  $branch=$_POST["branch"];
  //-------------------------------------------------------------course
  if($_POST["course"]=="0")
  {
  $courseerr="choose a course";
  }
  $course=$_POST["course"];
  //----------------------------------------------------------image validation
  $allowedext=array("jpg","jpeg","png","gif"); 
$temp=explode(".",$_FILES["img"]["name"]);  
$extension=end($temp);
if((($_FILES["img"]["type"]=="images/jpg") ||
	     ($_FILES["img"]["type"]=="images/jpeg") ||
		 ($_FILES["img"]["type"]=="images/png") ||
		 ($_FILES["img"]["type"]=="images/jgif") ||
		 ($_FILES["img"]["type"]=="images/pjpeg") ||
         ($_FILES["img"]["type"]=="images/x-png") && ($_FILES['img']['size']<200000) && in_array($extension,$allowedext)))
	{
	   if($_FILES["img"]["error"]>0)
	   {
		  echo "Error ".$_FILES["img"]["error"];
	   }
	}
	if(file_exists("temp_images/".$_FILES["img"]["name"]))
	{
	  echo $_FILES["img"]["name"]. "&nbsp; already exists";	
	}
	else
	{
	 move_uploaded_file($_FILES["img"]["tmp_name"],"temp_images/".$_FILES["img"]["name"]); 
	 $img="temp_images/".$_FILES["img"]["name"];
	 echo "File uploaded";
	}
  //------------------------------------------------------------POSTAL ADDRESS
  if(empty($_POST["postal"]))
  {
	  $postalerr="enter your address";
  }
  $postal=$_POST["postal"];
 
if(isset($_POST["btn3"]))
{
	header("location:s1.php");
}
  
//-------------------------------------end
//-------------------------------------------------------------------------database
$dbhost = "localhost";
$dbname = "hostel";
$dbuser = "root";
$dbpass = "";
$con = mysqli_connect($dbhost,$dbuser,$dbpass);
mysqli_select_db($con,$dbname);
if(!$con)
{
	die("Error in  Connection".mysqli_error());
} 


			$hos="INSERT INTO `hosteltab`(`name`, `fathername`, `mothername`, `regno`, `mobileno`, `fatherno`, `email`, `dob`, `gender`, `course`, `branch`, `photo`, `postaladdress`) VALUES('$name','$father','$mother','$regno','$mob','$fatmob','$email','$dob','$gender','$course','$branch','$img','$postal')";	
							
  }
?>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>HOSTEL MANAGEMENT</title>
  <link href="PROJECT.css" type="text/css" rel="stylesheet"/>
 
  </head> 
  <body style="background-image:url(images/25_04_16_014052_Digital_lab.png);background-size:cover";>
   <ul>
  <li><a href="s1.php">HOME</a></li>
  <li><a href="ABOUTUS.html">ABOUT US</a></li>
  <li><a href="HOSTELFEES.html">HOSTEL FEES</a></li>
  <li><a href="GALLERY.html">GALLERY</a></li>
  <li><a href="CONTACTUS.html">CONTACT US</a></li>
  </ul>
  <br /><br />
  <div id="htmlregform">
  <center><br />
  <fieldset>
  <legend>Registration Form</legend><br />
  <!---------------------------------form1---------------------------------->
  <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" enctype="multipart/form-data">
 
  <label for="name">NAME:</label>
  <input type="text" name="fulname" value="<?php echo $name; ?>" placeholder="enter your full name"></input>
  <span><?php echo $nameerr;?></span><br><br>
 
  <label for="parent1">FATHER NAME:</label>
  <input type="text" name="father" value="<?php echo $father; ?>" placeholder="enter fathers name"></input>
  <span><?php echo $fathererr;?></span><br><br>
 
  
  <label for="parent2">MOTHER NAME:</label>
  <input type="text" name="mother" value="<?php echo $mother; ?>" placeholder="enter mothers name"></input>
  <span><?php echo $mothererr;?></span><br><br> 
 
  <label for="reg">REG NO:</label>
  <input type="number" style="width:25%" name="regno" value="<?php echo $regno; ?>" placeholder="enter your register number"></input>
  <span><?php echo $regerr;?></span><br><br>
  
  
  <label for="mob">MOB NO.:</label>
  <input type="number" style="width:25%" name="mob" value="<?php echo $mob; ?>" placeholder="enter your mobile number"></input>
  <span><?php echo $moberr;?></span><br><br>
  
  
  <label for="fatmob"> FATHER'S MOB NO.:</label>
  <input type="number" style="width:30%" name="fatmob" value="<?php echo $fatmob; ?>" placeholder="enter your father's mobile number"></input>
  <span><?php echo $fatmoberr;?></span><br><br>
  
  <label for="mail">E-MAIL:</label>
  <input type="text" placeholder="abc@gmail.com" name="email" value="<?php echo $email; ?>"></input>
  <span><?php echo $emailerr; ?></span><br><br>
  
  <label for="date">DOB:</label>
  <input type="date" name="dob" placeholder="enter dob"value="<?php echo $dob; ?>"></input>
  <span><?php echo $doberr; ?></span><br><br>
  
  <label for="radio">GENDER:</label>
  <input type="radio" name="gender" value="male"<?php if($gender=="male")echo "checked"?>>MALE</input>
  <input type="radio" name="gender" value="female"<?php if($gender=="female") echo "checked"?>>FEMALE</input>
  <span><?php echo $gendererr; ?></span><br><br>
  
  
  <label for="course"><strong>COURSE</strong>:</label>
  <select name="course">
   <option type="dropdown" value="0"<?php if($course=="0") echo "selected"?>>--select one--</option>
   <option type="dropdown" value="BTECH"<?php if($course=="BTECH") echo "selected"?>>BTECH</option>
   <option type="dropdown" value="BE"<?php if($course=="BE") echo "selected"?>>BE</option>
   <option type="dropdown" value="MBA"<?php if($course=="MBA") echo "selected"?>>MBA</option>
   <option type="dropdown" value="B.SC"<?php if($course=="B.SC") echo "selected"?>>B.SC</option>
   <option type="dropdown" value="BA"<?php if($course=="BA") echo "selected"?>>BA</option>
   <option type="dropdown" value="BDS"<?php if($course=="BDS") echo "selected"?>>BDS</option>
   <option type="dropdown" value="M.TECH"<?php if($course=="M.TECH") echo "selected"?>>M.TECH</option>
   <option type="dropdown" value="B.COM"<?php if($course=="B.COM") echo "selected"?>>B.COM</option>
   <option type="dropdown" value="B.ARCH"<?php if($course=="B.ARCH") echo "selected"?>>B.ARCH</option>     
   <option type="dropdown" value="BBA"<?php if($course=="BBA") echo "selected"?>>BBA</option>
    <option type="dropdown" value="M.E"<?php if($course=="M.E") echo "selected"?>>M.E</option>
    <option type="dropdown" value="M.SC"<?php if($course=="M.SC") echo "selected"?>>M.SC</option>
    <option type="dropdown" value="PH.D"<?php if($course=="PH.D") echo "selected"?>>PH.D</option>
    <option type="dropdown" value="M.phil"<?php if($course=="M.phil") echo "selected"?>>M.phil</option>
    <option type="dropdown" value="M.A"<?php if($course=="M.A") echo "selected"?>>M.A</option>
    </select>
  <span><?php echo $courseerr; ?></span>
  
   
  <label for="branch"><strong>BRANCH</strong>:</label>
  <select name="branch">
   <option type="dropdown" value="0"<?php if($branch=="0") echo "selected"?>>--select one--</option>
   <option type="dropdown" value="it"<?php if($branch=="it") echo "selected"?>>IT</option>
   <option type="dropdown" value="cse"<?php if($branch=="cse") echo "selected"?>>CSE</option>
   <option type="dropdown" value="arounotical"<?php if($branch=="arounotical") echo "selected"?>>AROUNOTICAL</option>
   <option type="dropdown" value="civil"<?php if($branch=="civil") echo "selected"?>>CIVIL</option>
   <option type="dropdown" value="biotechnology"<?php if($branch=="biotechnology") echo "selected"?>>BIOTECHNOLOGY</option>
   <option type="dropdown" value="mechanical"<?php if($branch=="mechanical") echo "selected"?>>MECHANICAL</option>
   <option type="dropdown" value="arts"<?php if($branch=="arts") echo "selected"?>>ARTS</option>
   <option type="dropdown" value="ece"<?php if($branch=="ece") echo "selected"?>>ECE</option>
   <option type="dropdown" value="ee"<?php if($branch=="ee") echo "selected"?>>EE</option>     
   <option type="dropdown" value="eee"<?php if($branch=="eee") echo "selected"?>>EEE</option>
    </select>
  <span><?php echo $brancherr; ?></span><br /><br />
 
<label>SUBMIT YOUR  PHOTO</label>  
<input type="file" name="img"  />
<img src="<?php echo $img?>" style="width:100px; height:100px;"/>
 <br /><br />
  
  <label for="Postal address">POSTAL ADDRESS</label>
  <input type="text" style="width:70%;text-transform:uppercase" name="postal" placeholder="ENTER UR HOME ADDRESS" value="<?php echo "$postal"?>"/>
  <span><?php echo $postalerr; ?></span><br /><br />
 
  <button type="submit" name="submit">SUBMIT</button>&nbsp;
  <button type="reset" name="reset">RESET</button><br /><br />
</form>

  <?php 
  if(isset($_POST["submit"]))
  {
	  echo "<h1><center>data entered successfully</center></h1>";
  }
  ?>
<!-----------------------------------form2-------------------------->  
<form action="s1.php" method="post">
<input type="submit" name="btn3" value="LOGOUT" />
</form>
  </fieldset>
  </center>
  </div>
  </body>
  </html>