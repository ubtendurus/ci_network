<? 
// This simple PHP / Mysql membership script was created by www.funkyvision.co.uk
// You are free to use this script at your own risk
// Please visit our website for more updates..
ob_start();session_start();
$hostname = "localhost";
$data_username = "root"; //database username
$data_password = " "; //database password
$data_basename = "gardrobe"; //database name
$conn = mysql_connect("".$hostname."","".$data_username."","".$data_password."");  
mysql_select_db("".$data_basename."") or die(mysql_error());  
?>