<?php

namespace App\Controllers;

use App\Constants\ViewPath;
use App\Constants\StoragePath;
use App\Controllers\UserController;

class RegisterController
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

        view("register");
    }

    public function store()
    {
        if (isset($_SESSION['handle'])) {
            redirect(ViewPath::DASHBOARD);
        }

        $request_user = $_POST;
        $users = $this->userController->index();

        $request_user["name"] = senitize($request_user["name"]);
        $request_user["email"] = senitize($request_user["email"]);
        $request_user["password"] = senitize($request_user["password"]);
        $request_user["confirm_password"] = senitize($request_user["confirm_password"]);

        $handle = explode('@', $request_user["email"])[0];
        $request_user["handle"] = $handle;

        if ($this->userExist($handle, $users)) {
            redirect(ViewPath::REGISTER);
        }

        if (!$this->validation($request_user)) {
            redirect(ViewPath::REGISTER);
        }

        $request_user["feedback_url"] = "http://localhost:9000/feedback/$handle";
        $request_user["password"] = password_hash($request_user["password"], PASSWORD_DEFAULT);
        unset($request_user["confirm_password"]);

        $users[] = $request_user;
        $jsonData = json_encode($users, JSON_PRETTY_PRINT);
        file_put_contents(StoragePath::USERS, $jsonData);

        $_SESSION["success"] = "Your account has been created. Please login!";
        redirect(ViewPath::LOGIN);
    }

    private function userExist(string $handle, array $users): bool
    {
        foreach ($users as $user) {
            if ($user->handle === $handle) {
                $_SESSION["auth_error"] = "User already exist!";

                return true;
            }
        }

        return false;
    }

    private function validation(array $request_user): bool
    {
        $flag = true;
        if (strlen($request_user["name"]) < 3) {
            $_SESSION["name_error"] = "Name murst be at least 3 characters long!";
            $flag = false;
        }

        if (!filter_var($request_user["email"], FILTER_VALIDATE_EMAIL)) {
            $_SESSION["email_error"] = "Invalid email address!";
            $flag = false;
        }

        if (strlen($request_user["password"]) < 8) {
            $_SESSION["password_error"] = "Password must be at least 8 characters long!";
            $flag = false;
        }
        if ($request_user["password"] !== $request_user["confirm_password"]) {
            $_SESSION["password_error"] = "Password did not match!";
            $flag = false;
        }

        return $flag;
    }
}