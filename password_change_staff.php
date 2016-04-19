<!-- script to run password change for staff-->
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<link rel="stylesheet" href="mystyle.css" type="text/css">


<title>School of Biological Science's Senior Thesis Database </title>
<?php
// making sure staff is the only logged in
$usernames = $_COOKIE['User_Name'];
if($usernames == "Student")
header('Location: http://tacosalad.lssu.edu/~drempala/project/student_search.php');
if($usernames == NULL)
header('Location: http://tacosalad.lssu.edu/~drempala/project/index.php');

?>
</head>

<body>

<?php
// grabbing the data 
$username = $_POST['username'];
//echo $username;
$oldpassword = $_POST['old_password'];
$newpassword = $_POST['new_password'];
$retypepassword = $_POST['retype_password'];

 
// making sure all data is correct and entered 
if($newpassword != $retypepassword)
{
  echo"Those passwords do not match";
  break;

}

if($newpassword ==  $oldpassword)
{

 echo" your new password matches your old password.";
 break;
}
// connection to the database
else
{
$con = mysql_connect("localhost","drempala","dcr1114");
if(!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("drempala",$con);
// making sure the user information is correct 
$query = "SELECT * FROM `User_List` WHERE `User_Name` LIKE '$username' AND " . " `Password` LIKE PASSWORD ('$oldpassword')";
//echo $query;

$result = mysql_query($query);
if(!$result)
{
die('Could not connect: ' . mysql_error());
}
if(mysql_num_rows($result) > 0)
{   $row = mysql_fetch_array($result);
    $number = $row['User_ID'];
	// updating the password
   $query = "UPDATE  `drempala`.`User_List` SET  `Password` = PASSWORD(  '$retypepassword' ) WHERE  `User_List`.`User_ID` = '$number';";
   $result = mysql_query($query);
   echo"password was changed";
}
else
{
echo"<h3> Wrong username / password.</h3>";
break;
}
}

?>
<form action ="staff_menu.php">
<div id="buttons"><input type ="submit" value ="Go Back" ></div></div>
</form>


</body>
</html>

