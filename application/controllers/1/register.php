<? 
// This simple PHP / Mysql membership script was created by www.funkyvision.co.uk
// You are free to use this script at your own risk
// Please visit our website for more updates..
include_once"config.php";
if(isset($_POST['register'])){
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$memip = $_SERVER['REMOTE_ADDR'];
$date = date("d-m-Y");
if($username == NULL OR $password == NULL OR $email == NULL){
$final_report.= "Please complete the form below..";
}else{
if(strlen($username) <= 3 || strlen($username) >= 30){
$final_report.="Your username must be between 3 and 30 characters..";
}else{
$check_members = mysql_query("SELECT * FROM `members` WHERE `username` = '$username'");   
if(mysql_num_rows($check_members) != 0){
$final_report.="The username is already in use!";  
}else{ 
if(strlen($password) <= 6 || strlen($password) >= 12){
$final_report.="Your password must be between 6 and 12 digits and characters..";
}else{
if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)){ 
$final_report.="Your email address was not valid..";
}else{
$create_member = mysql_query("INSERT INTO `members` (`id`,`username`, `password`, `email`, `ip`, `date`) 
VALUES('','$username','$password','$email','$memip','$date')"); 
$final_report.="Thank you for registering, you may login."; 
}}}}}}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Funky Vision Membership Script</title>
</head>

<body><form method="post">
<table width="384" border="1" align="center">
<? echo '<tr><td colspan="2">'.$final_report.'</td></tr>';?>
  <tr>
    <td width="50%">Username:</td>
    <td width="50%"><label>
      <input name="username" type="text" id="username" size="30" />
    </label></td>
  </tr>
  <tr>
    <td>Password:</td>
    <td><input name="password" type="password" id="password" value="" size="30" /></td>
  </tr>
  <tr>
    <td>Email:</td>
    <td><input name="email" type="text" id="email" size="30" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><label>
      <input name="register" type="submit" id="register" value="Register" />
    </label></td>
  </tr>
</table>
</form>
</body>
</html>
