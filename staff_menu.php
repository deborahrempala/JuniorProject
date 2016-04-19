.<!-- Staff menu 
from here the staff members will be able 
to add to the database or search the database
-->
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<link rel="stylesheet" href="mystyle.css" type="text/css">


<title>School of Biological Science's Senior Thesis Database </title>
<?php
// checking to make sure only the correct people are logged in
$usernames = $_COOKIE['User_Name'];
if($usernames == "Student")
header('Location: http://tacosalad.lssu.edu/~drempala/project/student_search.php');
if($usernames == NULL)
header('Location: http://tacosalad.lssu.edu/~drempala/project/index.php');
if($usernames=="ADMIN")
header('Location: http://tacosalad.lssu.edu/~drempala/project/admin.php');

?>
</head>

<body>

<h1>Lake Superior State University School of Biological Science<br>
Senior Thesis Database</h1>
<form action="logout.php">
<div id="buttons2"><div class="right1"><input type ="submit" value ="Logout" ></div></form>

<br>
<br>

<br>
<h2> Please choose one<br>
of the following<br>
options: </h2>
<form action="staff_add.php" method="post">
<input type="submit" value="Add to Database">
</form>
<form action="staff_view.php" method="post">
<input type ="submit" value="View Database">
</form>

<form action="staff_search.php" method="post">
<input type ="submit" value="Search Database">
</form>

<form action="staff_password.php" method="post">
<input type ="submit" value="Change Password">
</form>

</form>
</body>
</html>
