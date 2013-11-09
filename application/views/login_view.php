<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="utf-8">
	<title>Login</title>

<body>

<?php echo validation_errors(); ?>
<?php echo form_open('uyekontrol');

?>
<label for="username">Username:</label>
<input type="text" size="20" id="username" name="username"/>
<br/>
<label for="password">Password:</label>
<input type="password" size="20" id="password" name="password"/>
<br/>
<input type="submit" value="Login"/>
</form>

</body>
</html>