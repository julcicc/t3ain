<?php
require_once("init.php");
require_once library("workout_save");

force_auth();
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
<script>
    $(function() {
        if ("<?php echo $_REQUEST["sport"]?>" > 0 ) {
            $("#sport_sel").val("<?php echo $_REQUEST["sport"]?>");
            display_new($("#sport_sel").val());
        }
    })
</script>
<script>
    function display_new(sport_type) {
        //.show no funciona en kimbo :(
        //$("#new_selector").css("display","none");
        $(".new_form").css("display","none");
        $("#new_" + sport_type).css("display", "block");
    }
</script>
<h1>T3AIN</h1>

<h2>Welcome <? htmlo(getsession("user_full_name"))?></h2>


<h3 id="new_selector"><form>
    <select id="sport_sel" onChange="display_new(this.value)">
        <option>New Workout</option>
        <option value="1">Swim</option>
        <option value="2">Bike</option>
        <option value="3">Run</option>
        <option value="4">Other</option>
    </select>
</form></h3>


<!-- SWIM FORM -->
<div id="new_1" style="display:none" class="new_form">
<h4>Swim New</h4>
    <form>
        <input type="hidden" name="sport" value="1">
        Title <input type="text" name="title" size="40"><br>
        Duration <input type="text" name="duration" placeholder="h:m:s"> h:m:s<br>
        Distance <input type="number" name="distance"> m<br>
        Pace <input type="text" name="pace" placeholder="m:s"> sec/100m<br>
        Calories <input type="number name="kcal"> kcal<br>
        TSS <input type="number" name="tss"><br>
        IF <input type="number" name="if"><br>
        HR (min/avg/max) <input type="number" name="hr_min"> / <input type="number" name="hr_avg"> / <input type="number" name="hr_max"><br>
        Description <textarea rows="6" cols="60" name="description"></textarea><br>

        <input type="submit" name="swim_save" value="Save">
    </form>
</div>

<!-- BIKE FORM -->
<div id="new_2" style="display:none" class="new_form">
Bike New
</div>

<!-- RUN FORM -->
<div id="new_3" style="display:none" class="new_form">
Run New
</div>

<!-- OTHER FORM -->
<div id="new_4" style="display:none" class="new_form">
Other New
</div>

    <div id="footer">
                <div class="pull-left" id="copyright"><h4><small>Copyright (C) 2000-2013 Imaweb 2000 S.L.</small></h4></div>
                <div class="pull-right">
                <img src='https://crmauto.imaweb.net/img/info_imaweb.jpg'/><img src='https://crmauto.imaweb.net/img/info_iso9001.jpg'/>
                </div>
          </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

</body>
</html>
