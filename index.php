<?php

if ($_SERVER['REQUEST_URI'] == "/favicon.ico") {
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
        font-size: 1.7em;
        color:#344E2C;
    }
</style>";
echo "<h1>Server</h1>";
var_dump($_SERVER);
echo "<h1>Get</h1>";
var_dump($_GET);
echo "<h1>Post</h1>";
var_dump($_POST);
echo "<h1>Request</h1>";
var_dump($_REQUEST);
echo "<h1>Artists Rendering</h1><hr/>";

require 'lib/bootstrap.php';