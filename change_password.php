<!-- change password script-->
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<link rel="stylesheet" href="mystyle.css" type="text/css">


<title>School of Biological Science's Senior Thesis Database </title>
<?php
// making sure only staff can change the password
$usernames = $_COOKIE['User_Name'];
if($usernames == "Student")
header('Location: http://tacosalad.lssu.edu/~drempala/project/student_search.php');
if($usernames == NULL)
header('Location: http://tacosalad.lssu.edu/~drempala/project/index.php');

?>
</head>

<body>

<?php
// grabbing all the data
$username = $_POST['username'];
//echo $username;
$oldpassword = $_POST['old_password'];
$newpassword = $_POST['new_password'];
$retypepassword = $_POST['retype_password'];

 // making sure all information matches and is correct 

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
// if everything is okay connect to the database
else
{
$con = mysql_connect("localhost","drempala","dcr1114");
if(!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("drempala",$con);
// grabbing the right user 
$query = "SELECT * FROM `User_List` WHERE `User_Name` LIKE '$username' AND " . " `Password` LIKE PASSWORD ('$oldpassword')";
//echo $query;

$result = mysql_query($query);
if(!$result)
{
die('Could not connect: ' . mysql_error());
}// update the password.
if(mysql_num_rows($result) > 0)
{   $row = mysql_fetch_array($result);
    $number = $row['User_ID'];
   $query = "UPDATE  `drempala`.`User_List` SET  `Password` = PASSWORD(  '$retypepassword' ) WHERE  `User_List`.`User_ID` = '$number';";
   $result = mysql_query($query);
   // if everything is all set the user gets this message
   echo "The password has been changed";
}
else
{
echo"<h3> Wrong username / password.</h3>";
break;
}
}

?>
// ability to go back to the admin page. 
<form action ="admin.php">
<div id="buttons"><input type ="submit" value ="Go Back" ></div></div>
</form>


</body>
</html>
