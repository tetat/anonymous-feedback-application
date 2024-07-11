<?php

use App\Controllers\HomeController;
use App\Controllers\UserController;
use App\Controllers\LoginController;
use App\Controllers\FeedbackController;
use App\Controllers\RegisterController;

class Router
{
    public static function get(string $path)
    {
        $handles = (new UserController)->getAllHandle();

        $router = [
            "/" => [HomeController::class, "home"],
            "/dashboard" => [FeedbackController::class, "dashboard"],
            "/login/create" => [LoginController::class, "create"],
            "/register/create" => [RegisterController::class, "create"]

        ];

        foreach ($handles as $handle) {
            $router["/feedback/$handle"] = [FeedbackController::class, "create"];
        }

        // dd($path);
        
        if (isset($router[$path])) {
            [$controller, $action] = $router[$path];
            
            $breakPath = explode("/", $path);
            
            if (in_array("feedback", $breakPath)) {
                (new $controller())->$action($breakPath[2]);
            } else {
                (new $controller())->$action();
            }
        } else {
            // dd($path);
            view("not-found");
        }
    }

    public static function post(string $path)
    {
        $handles = (new UserController)->getAllHandle();

        $router = [
            "/login/store" => [LoginController::class, "store"],
            "/register/store" => [RegisterController::class, "store"]
        ];

        foreach ($handles as $handle) {
            $router["/feedback/$handle"] = [FeedbackController::class, "store"];
        }

        if (isset($router[$path])) {
            [$controller, $action] = $router[$path];
            
            $breakPath = explode("/", $path);
            
            if (in_array("feedback", $breakPath)) {
                (new $controller())->$action($breakPath[2]);
            } else {
                (new $controller())->$action();
            }
        } else {
            view("not-found");
        }
    }

    public static function delete(string $path)
    {
        $router = [
            "/login/delete" => [LoginController::class, "destroy"]
        ];

        if (isset($router[$path])) {
            [$controller, $action] = $router[$path];
            
            (new $controller())->$action();
        } else {
            view("not-found");
        }
    }
}