<? 
// This simple PHP / Mysql membership script was created by www.funkyvision.co.uk
// You are free to use this script at your own risk
// Please visit our website for more updates..
session_start();
include_once"config.php";
if(!isset($_SESSION['username']) || !isset($_SESSION['password'])){
	header("Location: login.php");
}else{
$fetch_users_data = mysql_fetch_object(mysql_query("SELECT * FROM `members` WHERE username='".$_SESSION['username']."'"));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Funky Vision Membership Script</title>
</head>

<body>
Welcome to the Funky Vision membership script <? echo "".$fetch_users_data->username."";?>, if you login out you will be redirected to the login page.<br />
<br />
<a href="logout.php">Logout</a>
</body>
</html>
