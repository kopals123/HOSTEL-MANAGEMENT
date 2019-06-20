# **HOSTEL-MANAGEMENT**

## ABOUT ##
The HOSTEL MANAGEMENT is an application for warden and students to collect information of people who are willing to get admission in college hostel. 
Warden of the college will have the priority of entering the student details in the database, Deleting the data of student, modifying the details of the students and viewing the data of the student. 
Student will have the option to enter his/her data in the form. 
The warden will then check the data of the student and will decide whether to keep the student or not in the hostel. 
Both will have their separate login id and password to login to the form.

## LANGUAGES USED
* HTML
* PHP
* CSS

## SAMPLE CODE
``` 
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
```
