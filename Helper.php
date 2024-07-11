<?php

function senitize(string $data): string
{
    return htmlspecialchars(stripslashes(trim($data)));
}

function view(string $view, array $data = [])
{
    if ($data) extract($data);

    require_once __DIR__ . "/views/{$view}.php";
}

function redirect($location)
{
    header("Location: {$location}");
    exit;
}

function dd($data)
{
    echo "<pre>";
        print_r($data);
    echo "</pre>";
    die();
}