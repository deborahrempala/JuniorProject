<!-- Admin menu -->
 <!DOCTYPE html>
 <html lang="en"> 
<head> 
<meta charset="utf-8">
 <link rel="stylesheet" href="mystyle.css" type="text/css"> 
<title>School of Biological Science's Senior Thesis Database </title> 
<?php $usernames = $_COOKIE['User_Name']; 
// making sure only the admin can access it 
if($usernames != "ADMIN") header('Location: http://tacosalad.lssu.edu/~drempala/project/index.php'); 
?> 
</head> 
<body> 
<h1>Lake Superior State University School of Biological Science
<br> 
Senior Thesis Database</h1>
 <form action="logout.php"> <div id="buttons2"><div class="right1"><input type ="submit" value ="Logout" >
</div>
</form> 
<br> 
<br>
 <br> 
<h2> Please choose one<br> of the following<br> options: </h2> 
<form action="staff_add.php" method="post"> 
<!-- add to the database-->
<input type="submit" value="Add to Database">
 </form><br>
 <!-- view the database-->
 <form action="staff_view.php" method="post">
 <input type ="submit" value="View Database"> </form><br>
 <!-- search the database-->
 <form action="staff_search.php" method="post">
 <input type ="submit" value="Search Database"> </form> <br>
 <!-- change password-->
<form action="staff_password.php" method="post"> <input type ="submit" value="Change Password">
</form> </body> </html>
