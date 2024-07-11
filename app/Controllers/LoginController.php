<?php

namespace App\Controllers;

use App\Constants\ViewPath;
use App\Controllers\UserController;

class LoginController
{
    private $userController;

    public function __construct()
    {
        $this->userController = new UserController();
    }

    public function create()
    {
        if (isset($_SESSION['handle'])) {
            redirect(ViewPath::DASHBOARD);
        }

        view("login");
    }

    public function store()
    {
        if (isset($_SESSION['handle'])) {
            redirect(ViewPath::DASHBOARD);
        }

        $request_user = $_POST;
        $users = $this->userController->index();


        $request_user["email"] = senitize($request_user["email"]);
        $request_user["password"] = senitize($request_user["password"]);

        $request_user["handle"] = explode('@', $request_user["email"])[0];

        $user = [];
        
        foreach ($users as $u) {
            if ($u->handle === $request_user["handle"]) {
                if (password_verify($request_user["password"], $u->password)) {
                    $user = $u;
                }
            }
        }

        if ($user) {
            $_SESSION["handle"] = $user->handle;
            redirect(ViewPath::DASHBOARD);
        } else {
            $_SESSION["auth_error"] = "Email or Password did not match!";
            redirect(ViewPath::LOGIN);
        }
    }

    public function destroy()
    {
        if (!isset($_SESSION['handle'])) {
            redirect(ViewPath::HOME);
        }
        
        session_destroy();
        session_regenerate_id();
        
        redirect(ViewPath::HOME);
    }
}