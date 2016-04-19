<!-- Once the staff memeber is here they can 
search the database using one or more 
of the following terms-->
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<link rel="stylesheet" href="mystyle.css" type="text/css">


<title>School of Biological Science's Senior Thesis Database </title>
<?php
// making sure only the correct users can access this 
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
<div id="buttons2"><div class="right1"><input type ="submit" value ="Logout" ></div></form>

<br>
<br>
<h2>Search The database by<br>
one or more of <br>
the following terms:<br></h2>
<br>
<!-- searching form -->
<form action ="staff_view_with_search.php" method = "post">
<!-- search terms are entered here -->
<!-- last name -->
<div id="text">Last Name:</div><div id="textboxsection"><input type="text" name="last_name"></div><br><br>
<!-- mentors name -->
<div id="text">Mentor/s:</div><div id="textboxsection"><input type="text" name="mentors_name"></div><br><br>
<!-- semester info -->
<div id="text">Semester info:</div><div id="textboxsection"><input type="text" name ="semester_info"></div><br><br>
<!-- Thesis type -->
<div id="text">ELP vs. Thesis:</div><div id="textboxsection"><input type="text" name="thesis_type"></div><br><br>
<!-- keywords -->
<div id="text">Keywords:</div><div id="textboxsection"><input type="text" name="keywords"></div><br><br>
</div>
<!-- once this is hit the database will be customized to the student's 
searching terms -->
<div id="buttons"><input type ="submit" value ="Search" ></div>
<!-- if the user hits this they will be directed to the entire database-->
</form>
</div>

</div>
</body>
</html>

