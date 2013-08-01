<?php
require_once("init.php");
require_once library("workout_save");

force_auth();
?>
<!DOCTYPE html>
<html>
<style>
    body, input, select, form, textarea {
        font-family: Courier New;
        font-size: 12px;
    }


</style>
<script type="text/javascript" src="http://kimbojs.com/dist/kimbo.min.js"></script>
<script>
    function display_new(sport_type) {
        //.show no funciona en kimbo :(
        //$("#new_selector").css("display","none");
        $(".new_form").css("display","none");
        $("#new_" + sport_type).css("display", "block");
    }
</script>
<body>
<h1>T3AIN</h1>

<h2>Welcome <? htmlo(getsession("user_full_name"))?></h2>


<h3 id="new_selector"><form>
    <select onChange="display_new(this.value)">
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

</body>
</html>