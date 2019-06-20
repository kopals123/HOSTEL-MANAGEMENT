<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
<?php
$allowedext=array("jpg","jpeg","png","gif"); //specifies all valid extensions allowable to be input.
$temp=explode(".",$_FILES["img"]["name"]);  //add an . for extention to the file name
$extension=end($temp);                      //add the extensions at the end of the given file name.

//here images is the name of folder in which images are already stored
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
	?>

        <form action="img2.php" method="post">
        <img src="<?php echo $img?>" style="width:100px; height:100px;"/>
        </form>
    