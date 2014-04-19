<?php
require_once("init.php");

$error = "";
if (getvar("username") && getvar("password")) {
    $error = process_login(getvar("username"), getvar("password"));
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>T3AIN</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="t3ain.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>


  <div id="wrap">
    <div class="container">
          <div class="center-block" id="welcome-logo">LOGO GOES HERE</div>
                <br/>

		<?php
		if ($error!="") {
			?>
				<div class="alert alert-danger"><?php htmlo($error)?></div>
				<?php
		}
		?>
      <form class="form-signin" method="post">
          <div class="thumbnail">
        <input type="text" class="form-control" placeholder="E-mail" required autofocus name="username" id="username">
                <br/>
        <input type="password" class="form-control" placeholder="Password" required name="password" id="password">
        <button id="login" class="btn btn-default" type="submit">Log-in</button>
          </div>
      </form>

    </div>
        <div id="push"></div>
  </div>

    <div id="footer">
                <div class="pull-left" id="copyright"><h4><small>T3AIN App System</small></h4></div>
                <div class="pull-right">
                Footer Logos
                </div>
          </div>
      </div>
    </div>

</body>
</html>
