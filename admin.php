<!-- this is the admin page that is only accesbile to the admin-->
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<link rel="stylesheet" href="mystyle.css" type="text/css">


<title>Admin Page </title>


<?php
// making sure only the admin has access to this page
$usernames = $_COOKIE['User_Name'];
if($usernames !="ADMIN")
header('Location: http://tacosalad.lssu.edu/~drempala/project/index.php');
?>
</head>

<body>
<h1>Lake Superior State University School of Biological Science<br>
Senior Thesis Database-Admin Page</h1>
<form action="logout.php">
<div id="buttons2"><div class="right1"><input type ="submit" value ="Logout" ></div>
</form>
<br>
<br>
<!-- Form to add a new user to the database-->
<h2>Add A New User:</h2>
<br>
<form action = "add_user.php" method="post">
<!-- user fills this out -->
Username:<span style="margin-left:10px"><input type="text" name="username"></span><br><br>
Password:<span style="margin-left:10px"><input type="password" name="password"></span><br>
<input type="submit" value="Add User">
</form>
<br>
<br>
<!-- the ability to change the password for any user-->
<h2> Change Password for a User:</h2>
<br>
<form action = "change_password.php" method="post">
<!-- user fills this out -->
Username:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="margin-left:10px"><input type="text" name="username"></span><br><br>
Old Password: &nbsp; &nbsp; &nbsp;<span style="margin-left:10px"><input type="password" name="old_password"></span><br><br>
New Password:  &nbsp; &nbsp;<span style="margin-left:10px"><input type="password" name="new_password"></span><br><br>
Retype Password:<span style="margin-left:10px"><input type="password" name="retype_password"></span><br><br>
<br>
<input type="submit" value="Change Password">
</form>
<br>
<br>
<!-- button to take the admin to the staff menu-->
<form action ="admin_menu.php" method="post">
<div id="buttons"><input type ="submit" value ="Staff Menu" ></div></div>
</form>










</body>
</html>

