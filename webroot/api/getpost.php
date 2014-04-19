<?php
date_default_timezone_set("Europe/Madrid");

/*
var posts = [
    {
        id:'1',
        title:"Abbb",
        author:{name:"aab"},
        date:new Date("12-27-2012"),
        excerpt:"Aas asd asñlkajsdf asdf asdfasdf asdfasdfpoiuasd f",
        body:"añlkasd flñasdflasdf lkjasdfasdf ojasd ñlkasd flñkasdf lñkasdf ljasdfl asdf,n.masdf,.mnasdf,mn.a sdf"
    },
    {
        id:'2',
        title:"ZZzab",
        author:{name:"wwewb"},
        date:new Date("11-20-2012"),
        excerpt:"Afsdoiweriuoewrio f",
        body:"aasdfjkl hkjlasdhjklasd iuyasdf iuasdf lhjasd flhkjasdf ihasdf hjkl"
    }
];
*/

$posts = array(
  array(
      "id" => 1,
      "title" => "Hi Title",
      "author" => array("name"=> "baba"),
      "date" => "2012-12-27 18:25:30",
      "excerpt" => "Ñaa asp oas ñasdf ads qwer da aá",
      "content" => "asas fas asdf ñlasd fasdf asdf oias asd fljkasdf jklasdf jklasdf jklsadf"
  ),

  array(
      "id" => 1,
      "title" => "Hwoiw",
      "author" => array("name"=> "eooi"),
      "date" => "2012-10-27 14:13:00",
      "excerpt" => "Ñaafjoi jkasd 09fe qwer da aá",
      "content" => "asa12390i 90312 90'123 90'123 90'sadf"
  )
);

header("Content-Type:application/javascript; charset=UTF-8");
if (isset($_REQUEST['id']) && $_REQUEST['id']>=0) {

    $container = array("status"=>"ok","count"=>1,"count_total"=>1,"pages"=>1, "posts"=>$posts[$_REQUEST['id']]);
}
else {
    $container = array("status"=>"ok","count"=>count($posts),"count_total"=>count($posts),"pages"=>1, "posts"=>$posts);
}
printf( "%s(%s)", $_REQUEST['callback'], json_encode($container) );