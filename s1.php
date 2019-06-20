<?php 
$dbhost = "localhost";
$dbname = "student";
$dbuser = "root";
$dbpass = "";
$con = mysqli_connect($dbhost,$dbuser,$dbpass);
mysqli_select_db($con,$dbname);

if(!$con)
{
	die("Error in  Connection".mysqli_error());
}     
//-------------------------------------------------------student button
if(isset($_POST['btn1']))
{
	$uname = $_POST['regno'];
	$pass = $_POST['password'];
	
	 $sqlchk1= "select * from studtable where REGNO='".$uname."' and PASSWORD='".$pass."' ";
			$reschk1  = mysqli_query($con,$sqlchk1);
			$cntchk1  = mysqli_num_rows($reschk1);
			
			if($cntchk1 != 0)
			{
					   $rowchk1 = mysqli_fetch_array($reschk1);

					   header("Location:HOME.php");
			}
		   else
			    { 
					  header("Location:s1.php");  
				}
}	
//---------------------------------------------------------------------------admin button


$dbhost = "localhost";
$dbname = "admin";
$dbuser = "root";
$dbpass = "";
$con = mysqli_connect($dbhost,$dbuser,$dbpass);
mysqli_select_db($con,$dbname);

if(!$con)
{
	die("Error in  Connection".mysqli_error());
}     

if(isset($_POST['btn2']))
{
	$uname = $_POST['loginid'];
	$pass = $_POST['password1'];
	
	 $sqlchk1= "select * from admintab where loginid='".$uname."' and password='".$pass."' ";
			$reschk1  = mysqli_query($con,$sqlchk1);
			$cntchk1  = mysqli_num_rows($reschk1);
			
			if($cntchk1 != 0)
			{
					   $rowchk1 = mysqli_fetch_array($reschk1);

					   header("Location:admin.php");
			}
		   else
			    { 
					  header("Location:s1.php");  
				}
//------------------------------------------------------------------------------------------------marquee
		
}
?>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>LOGIN PAGE</title>
 <link href="PROJECT.css" type="text/css" rel="stylesheet"/>
  </head>
  <body style="background-image:url(images/77_full.jpg);background-size:cover;">

  <ul>
  <li><a href="s1.php" class="active">HOME</a></li>
  <li><a href="ABOUTUS.html">ABOUT US</a></li>
  <li><a href="HOSTELFEES.html">HOSTEL FEES</a></li>
  <li><a href="GALLERY.html">GALLERY</a></li>
  <li><a href="CONTACTUS.html">CONTACT US</a></li>
  </ul>
  <br /><br /><br /><br />
  
  
  <div id="form1">
  <fieldset>
      <legend>STUDENT LOGIN</legend><br />
     <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
   <label>REG NO</label>
      <input type="number" name="regno"  required /><br /><br />
      
      <label>PASSWORD</label>
      <input type="text" name="password"  required /><br /><br />
      
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
      <button type="submit" name="btn1">SUBMIT</button>
    </form>
  </fieldset>
  </div>
  
  <div id="form2">
  <fieldset>
    <legend >ADMIN LOGIN</legend><br /><br /> 
         <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            LOGIN ID<input type="text" name="loginid" required /><br /><br />
            PASSWORD<input type="text" name="password1" required/><br /><br />
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="submit" name="btn2" value="LOGIN" ></input><br /><br /> 
        </form>
  </fieldset> 
  </div>
  
  </body>
  </html>
