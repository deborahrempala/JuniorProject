
<?php
// logout script
// deletes cookies
session_start();
setcookie('User_Name',$usernames, time() - 5000,'','',0);

header('Location: http://tacosalad.lssu.edu/~drempala/project/index.php');
?>


