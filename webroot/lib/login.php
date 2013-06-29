<?php

function check_logged_user() {
    return getsession("user_ok");
}

function process_login($username, $pass) {

    $username = trim($username);
    $pass = trim($pass);
    if ($username=="" || $password="" ) {
        return "Please enter a valid username and password";
    }

    $db = new db();
    $row = $db->quickOne("select * from users where email=? and password=md5(?)", $username, $pass);

    plog_debug($row);
    if ($row) {
        plog_debug("Setting logged user: ", $row);
        putsession("user_ok",$row['id']);
        putsession("user_full_name", $row['full_name']);

        header("location:" . HTROOT . "/index.php");
    }
    else {
        return "Please enter a valid username and password";
    }
    //plog_debug($_SESSION);
}

function force_auth() {
    plog_debug("Forcing auth:", $_SESSION);
    if (!check_logged_user()) {
        header("location:" . HTROOT . "/login.php");
        exit;
    }

    if (getvar('logout')==1) {
        plog_debug("Loging out!!");
        delsession("user_ok");
        delsession("user_full_name");
        header("location:" . HTROOT . "/login.php");
        exit;
    }
}

