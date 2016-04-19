
<!-- This is the script to add a user to the database-->
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<link rel="stylesheet" href="mystyle.css" type="text/css">


<title>Admin Page-Add User </title>


</head>

<body>
<h1>Lake Superior State University School of Biological Science<br>
Senior Thesis Database-Add User</h1>
<form action="logout.php">
<div id="buttons2"><div class="right1"><input type ="submit" value ="Logout" ></div>
</form>
<br>
<br>
<?php

// Grabbing information from the forms 
$usernames =$_POST['username'];
$passwords = $_POST['password'];
// checking for good data
$gooddata = TRUE;
if(!$usernames)
{
	$gooddata = FALSE;
	$missingfields .= "username ";
}

if(!$passwords)
{
	$gooddata = FALSE;
	$missingfields .= "password ";
}


// if anything is missing it will print out an error message 
if(!$gooddata)
{
	echo"<p> These fields are required: $missingfields<br>";
	echo" hit back and try again </p>";
        break;
}
// if everything is good it will connect to the database
else
{
 


	$con = mysql_connect("localhost","drempala","dcr1114");
	if(!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
// double checking to make sure that user doesn't exist 
	mysql_select_db("drempala",$con);

	$query = "SELECT * FROM User_List  WHERE User_Name  LIKE '". $usernames . "'";
	$result = mysql_query($query);

	if(mysql_num_rows($result) > 0)
	{
		echo "That User already exists.<br />";
		break;
	}
	else
	{
		// adds to the database
		$query =  "INSERT INTO `drempala`.`User_List` ( `User_Name`, `Password`) VALUES('$usernames',PASSWORD('$passwords'))";
		//xecho $query;
		$results = mysql_query($query);
		if(!$result)
		{
			die('Invalid query: ' . mysql_error());
		}




	}	
 

     //mysql_connect.close();
}
// if everything is all set this message will appear letting the user know they have been added to the database
echo "$usernames,has been added to the user list "; 
?>
<form action="admin.php">
<div id="buttons"><input type ="submit" value ="Go Back" ></div></div>
</form>

</body>
</html>
