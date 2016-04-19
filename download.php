
<html>

<?php
$con = mysql_connect("localhost","test");
if(!$con)
{
	die('could not connect: '. mysql_error());
}
mysql_select_db("test", $con);

header('Content-type: application/msword');
header("Content-type: application/pdf");
header('Pragma: public');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Content-Type: application/pdf');
header('Content-Transfer-Encoding: binary');
header('Content-Length: '.filesize($file));
@read($file);
mysql_close($con);
?>
</html>