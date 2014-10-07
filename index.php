<?php

if ($_SERVER[REQUEST_URI] == "/favicon.ico") {
    $img = file('./favicon.ico');
    header("Content-Type: image/x-icon");
    die;
}

echo "<style>
    body {
        background-color: #ECECEC;
        padding: 15px;
    }
    h1 {
        font-family: 'Lato', sans-serif;
        font-size: 2em;
    }
</style>";
echo "<h1>Server</h1>";
var_dump($_SERVER);
echo "<h1>GET</h1>";
var_dump($_GET);
echo "<h1>POST</h1>";
var_dump($_POST);
echo "<h1>REQUEST</h1>";
var_dump($_REQUEST);

require 'lib/bootstrap.php';