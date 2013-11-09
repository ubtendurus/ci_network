<? 
// This simple PHP / Mysql membership script was created by www.funkyvision.co.uk
// You are free to use this script at your own risk
// Please visit our website for more updates..
session_start();
include_once"config.php";
if(isset($_POST['login'])){
$username= trim($_POST['username']);
$password = trim($_POST['password']);
if($username == NULL OR $password == NULL){
$final_report.="Please complete all the fields below..";
}else{
$check_user_data = mysql_query("SELECT * FROM `members` WHERE `username` = '$username'") or die(mysql_error());
if(mysql_num_rows($check_user_data) == 0){
$final_report.="This username does not exist..";
}else{
$get_user_data = mysql_fetch_array($check_user_data);
if($get_user_data['password'] == $password){
$start_idsess = $_SESSION['username'] = "".$get_user_data['username']."";
$start_passsess = $_SESSION['password'] = "".$get_user_data['password']."";
$final_report.="You are about to be logged in, please wait a few moments.. <meta http-equiv='Refresh' content='2; URL=members.php'/>";
}}}}
?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Funky Vision Membership Script</title>
</head>

<body><form action="" method="post"> 
<table width="312" align="center"> 
<? echo "<tr><td colspan='2'>".$final_report."</td></tr><tr>";?>
  <tr> 
    <td width="120">Username:</td> 
    <td width="180"><input type="text" name="username" size="30" maxlength="25"></td> 
  </tr> 
  <tr> 
    <td>Password:</td> 
    <td><input type="password" name="password" size="30" maxlength="25"></td> 
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="login" value="Login" /></td>
  </tr> 
</table> 

</form>
</body>
</html>
