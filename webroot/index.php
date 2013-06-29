<?php
require_once("init.php");

force_auth();
?>
<html>
<body>
<h1>T3AIN</h1>

<h2>Welcome <? htmlo(getsession("user_full_name"))?></h2>

</body>
</html>