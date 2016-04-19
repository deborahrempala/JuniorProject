<!-- if the faculty hit the search they will first 
be directed to the same search menu as the students.
Once they select their terms it can either be customized to 
their terms or they can see the entire database.
The staff database includes comments-->

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<link rel="stylesheet" href="mystyle.css" type="text/css">


<title>School of Biological Science's Senior Thesis Database </title>
<?php
// making sure only the correct people can access it 
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
<form action="staff_menu.php">
<div id="buttons2"><div class="right2"><input type ="submit" value ="Go Back" ></div>
</form>
<form action="logout.php">
<div id="buttons2"><div class="right1"><input type ="submit" value ="Logout" ></div>
</form>
<br>
<br>
<br>
<!-- start of the database results-->
<h2>Results:</h2>
<p>
<table>
<tr><th>Last Name</th>
<th>First Name</th>
<th>Title</th>
<th>Paper</th>
<th>Mentor</th>
<th>Semester Info</th>
<th>ELP vs. Thesis</th>


<th>Comments</th>
</tr>
<?php
$con = mysql_connect("localhost","drempala","dcr1114");
if(!$con)
{
	die('could not connect: '. mysql_error());
}
mysql_select_db("drempala", $con);

$result = mysql_query( "SELECT * FROM Thesis_Data");


while ($row = mysql_fetch_array($result))
{
	echo "<tr>";
	echo "<td>" . $row['Last_Name'] . "</td>";
	echo "<td>" . $row['First_Name'] . "</td>";
	echo "<td>" . $row['Title'] . "</td>";
        $link = $row['Paper'];
	echo"<td>". '<a href="'.$link.'">View Paper</a>'."</td>";  

	echo "<td>" . $row['Mentor'] . "</td>";
	echo "<td>" . $row['Semester'] . "</td>";
	echo "<td>" . $row['Thesis_Type'] . "</td>";
	
	echo "<td>" . $row['Comments'] . "</td>";
	echo"</tr>";
echo $lastname;
echo $firstname;
}

mysql_close($con);

?>

</table>
</p>
</body>
</html>
