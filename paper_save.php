

<!DOCTYPE html>
<!-- this is the script to send the paper information to the database-->
<html lang="en">

<head>
<meta charset="utf-8">
<link rel="stylesheet" href="mystyle.css" type="text/css">


<title>School of Biological Science's Senior Thesis Database </title>
<?php
// making sure only the staff and admin can add papers
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

<?php
  // grabbing the data
$last = $_POST['last_name'];
$first = $_POST['first_name'];
$semester = $_POST['semester_info'];
$ELP = $_POST['elp'];
$Thesis = $_POST['Thesis_Type'];
$mentor = $_POST['mentor_name'];
$keywords = $_POST['keywords'];
$title = $_POST['title'];
$comments = $_POST['comments'];
// sets the right directory to save the papers
$target_dir = "papers/";

// making sure the file saves to the right place 
$target_file = $target_dir . basename($_FILES["paper_pdf"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["paper_pdf"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// check to make sure file is not an exe
if($imageFileType != "pdf"  && $imageFileType != "jpeg" ) {
    echo "Sorry, only pdf and jpeg are allowed to be uploaded.";
    $uploadOk = 0;
}


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["paper_pdf"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["paper_pdf"]["name"]). " has been uploaded.";
    break; 
 } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
        
// checking to make sure all required fields are entered
$path=  $target_file;
$gooddata = TRUE;
// making sure all the other data is correct
if(!$first)
{
	$gooddata = FALSE;
	$missingfields .= " First Name, ";
}

if(!$last)
{
	$gooddata = FALSE;
	$missingfields .= " Last Name, ";
}

if(!$semester)
{
	$gooddata = FALSE;
	$missingfields .= "Semester Info, ";
}

if(!$mentor)
{
	$gooddata = FALSE;
	$missingfields .= " Mentor, ";
}
// if not the user will get this error message 
if(!$gooddata)
{
	echo"These Fields are required for an upload: $missingfields  <br />";
	echo"Please hit the back button";
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
// making sure the paper doesn't already ecist
mysql_select_db("drempala",$con);

$query = "SELECT * FROM Thesis_Data  WHERE Title  LIKE '". $title . "'";
$result = mysql_query($query);

if(mysql_num_rows($result) > 0)
{
echo "That Paper has already been uploaded to the database.<br />";
break;
}
// puts everything into the database
else
{
$query =  "INSERT INTO `drempala`.`Thesis_Data` ( `First_Name`, `Last_Name`, `Mentor`, `Title`,`Paper`, `Comments`, `Semester`,`Thesis_Type` ,`Keywords`) VALUES('$first','$last','$mentor','$title','$path','$comments','$semester','$Thesis','$keywords')";
//xecho $query;
$results = mysql_query($query);
if(!$result)
{
die('Invalid query: ' . mysql_error());
}




}
}
?>
<form>
<!-- button to go back--> 
<form action="staff_add.php">
<input type ="submit" value ="Go Back" ></div>
</form>

<form>
<form action="logout.php">
<div id="buttons2"><div class="right1"><input type ="submit" value ="Logout" ></div>
</form>


</body>
</html>
