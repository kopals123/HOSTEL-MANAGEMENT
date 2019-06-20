<?php
$db=mysql_connect("localhost","root","");
$er=mysql_select_db("hostel");
$result=mysql_query("SELECT * FROM hosteltab");
while($_POST["$n1"]=mysql_fetch_row($result))
{
	print "<tr> <td>";
	echo $_POST["$n1"][0];
	print"</td><td>";
	echo $_POST["$n1"][1];
	print "</td> <td>";
	echo $_POST["$n1"][2];
	print"</td><td>";
    echo $_POST["$n1"][3];
	print"</td></tr>";
    
}
?>
<table border="2">
<tr>
<th>name</th>
<th>motname</th>
<th>fatname</th>
</tr>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>