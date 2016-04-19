<!-- this is the script that will process the login information-->


<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<link rel="stylesheet" href="mystyle.css" type="text/css">


<title>School of Biological Science's Senior Thesis Database </title>
<?php
//if the user is an admin it will re direct them to the admin page-->
$usernames = $_COOKIE['User_Name'];

if($usernames=="ADMIN")
header('Location: http://tacosalad.lssu.edu/~drempala/project/admin.php');

?>



</head>

<body>

<h1>Lake Superior State University School of Biological Science<br>
Senior Thesis Database</h1>
<br>
<br>
<br>
<br>
<br>
<?php
// grabbing the data
$usernames = $_POST['username'];
$passwords = $_POST['password'];
$gooddata = TRUE;
if(!$usernames)
{
$gooddata = FALSE;
$missingfields .= "Username ";
}

if(!$passwords)
{
$gooddata = FALSE;
$missingfields .= "Password ";
}
// if any field is missing the user will get this message
if(!$gooddata)
{
echo  "<h2>These fields are required: $missingfields</h2>".
"<h2> Hit the back button and try again</h2>";
break;
}
// if everything is ok, the connection is started
else
{
$con = mysql_connect("localhost","drempala","dcr1114");
if(!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("drempala",$con);
// making sure that the user and password match up
$query = "SELECT * FROM `User_List` WHERE `User_Name` LIKE '$usernames' AND " . " `Password` LIKE PASSWORD ('$passwords')";
//echo $query;
$result = mysql_query($query);
if(!$result)
{
die('Could not connect: ' . mysql_error());
}
if(mysql_num_rows($result) > 0)
{
	// setting the cookies
$row = mysql_fetch_array($result);
$usernames = $row['User_Name'];
setcookie('User_Name',$usernames,time() + 3600,'','',0);
$message = "<h2>You are logged in, " . $usernames . "</h2>";
}
else
{
	// if the user doesn't exist they will get this message
echo"<h3> Wrong username or  Password.</h3>";
echo "<h3> Please hit the back arrow and <br>
try again.</h3>";
break;
}
}

echo $message;
// if everything is ok they can proceed to the database
echo "<input type=\"button\" value = \"Proceed To Database\"" .
"onClick = \"window.location='staff_menu.php?'\"";


?>

</form>
<br>
<br>
</body>
</html>
