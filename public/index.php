<?php

session_start();

require_once __DIR__ . "/../vendor/autoload.php";
require_once "../routes/Router.php";

$request = explode("?", $_SERVER['REQUEST_URI'])[0];

if ($_SERVER["REQUEST_METHOD"] === "GET")
{
    Router::get($request);
}

if ($_SERVER["REQUEST_METHOD"] === "POST")
{
    if (isset($_POST["_method"]) and $_POST["_method"] === "DELETE") {
        Router::delete($request);
    } else {
        Router::post($request);
    }
}

?>