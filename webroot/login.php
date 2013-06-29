<?php
require_once("init.php");

$error = "";
if (getvar("username") && getvar("password")) {
    $error = process_login(getvar("username"), getvar("password"));
}
?>
<html>
<body>
<h1>T3AIN</h1>

<h2>Please log in</h2>
<?php
if ($error!="") {
?>
<h3><?php htmlo($error)?></h3>
<?php
}
?>
<form method="post">
<label for="username">E-mail</label> <input type="text" name="username" id="username"/>
<br/>
<label for="password">Password:</label> <input type="password" name="password" id="password"/>
<br/>
<input type="submit" id="login" value="Login"/>
</form>
</body>
</html>