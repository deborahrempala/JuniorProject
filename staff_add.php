<!--Adding to the database for staff 
Once the correct person logs in 
They will be able to fill out the form and add to the database-->

<!DOCTYPE html>
<html lang="en">

<head>
 <meta http-equiv="content-type"  charset="UTF-8">
<link rel="stylesheet" href="mystyle.css" type="text/css">

<title>School of Biological Science's Senior Thesis Database </title>
<?php
$usernames = $_COOKIE['User_Name'];
if($usernames == "Student")
header('Location: http://tacosalad.lssu.edu/~drempala/project/student_search.php');
if($usernames == NULL)
header('Location: http://tacosalad.lssu.edu/~drempala/project/index.php');
?>









</head>

<body>

<h1>Lake Superior State University School of Biological Science<br>
Senior Thesis Database</h1>
<form action="logout.php">
<div id="buttons2"><div class="right1"><input type ="submit" value ="Logout" ></div>
</form>

<br>
<br>
<h2>Create A New<br>
Entry For The<br>
Database: </h2>
<!-- begin form code -->
<br>
<!-- adds to mysql and resets the form once upload is clicked-->
<form action = "paper_save.php" method="post" enctype="multipart/form-data">
<!-- user fills this out -->
<! -- first name and Semester info -->
<p1>First Name: <input type="text" name= "first_name"> <span style="margin-left:10px">Semester Info: <input type="text" name="semester_info"></span></p>
<!-- Last name and Thesis type -->
<p1>Last  Name: <input type="text" name= "last_name"> <span style="margin-left:10px">ELP vs. Thesis:<input type="radio" name="Thesis_Type"value="ELP">ELP
<input type="radio" name="Thesis_Type"value="Thesis">Thesis
</span></p>
<!-- Mentor -->
<p1><span  stlye ="margin-left:20px"> Mentor: &nbsp; &nbsp; &nbsp; <input type="text" name ="mentor_name"></span></p>
<!-- Title -->
<p1><span style ="margin-left:20px"> Title: &nbsp; &nbsp; &nbsp; <input type="text" name ="title" style ="width:300px"></span></p>

<!-- upload actual paper -->
<p1>Paper: <span style="margin-left:35px"><input type="file" name="paper_pdf"></span> 
 
<br><br>
<!-- comments -->
Comments: <br>
<textarea name="comments" style="width:300px; height:100px;"></textarea>
<br>
<!-- once this button is hit the information and paper is added to the mysql database-->
<input type ="submit" value ="Upload File">
</form>
<br><br>
<!-- if this button is hit they will be taken to the menu -->
<form action="staff_menu.php">
<input type ="submit" value ="Go Back" >
</form>


<br>
</body>
</html>

