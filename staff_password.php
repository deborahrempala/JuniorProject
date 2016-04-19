<!-- form for Staff password change -->
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<link rel="stylesheet" href="mystyle.css" type="text/css">
<?php
// set cookies 
$usernames = $_COOKIE['User_Name'];
if($usernames == "Student")
header('Location: http://tacosalad.lssu.edu/~drempala/project/student_search.php');
if($usernames == NULL)
header('Location: http://tacosalad.lssu.edu/~drempala/project/index.php');



?>

<title>School of Biological Science's Senior Thesis Database </title>
</head>

<body>
<h1>Lake Superior State University School of Biological Science<br>
Senior Thesis Database</h1>
<form action="logout.php">
<div id="buttons2"><div class="right1"><input type ="submit" value ="Logout" ></div></form>
<br>
<br>
<<h2> Change Password:</h2>
<br>
<form action = "password_change_staff.php" method="post">
<!-- user fills this out -->
<div id="text">Username:</div><div id="textboxsection3"><input type="text" name="username"></div><br>
<div id="text">Old Password:</div><div id="textboxsection3"><input type="password" name="old_password"></div><br>
<div id="text">New Password:</div><div id="textboxsection3"><input type="password" name="new_password"></div><br>
<div id="text">Retype Password:</div><div id="textboxsection3"><input type="password" name="retype_password"></div><br>
<br>
<input type="submit" value="Change Password">
</form>

<br>

</form>












</body>
</html>

