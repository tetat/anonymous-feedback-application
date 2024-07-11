<?php

namespace App\Controllers;

use App\Constants\ViewPath;
use App\Constants\StoragePath;
use App\Controllers\UserController;

class FeedbackController
{
    private $userController;

    public function __construct()
    {
        $this->userController = new UserController();
    }

    public function index(): array
    {
        $feedbacks = json_decode(
            file_get_contents(StoragePath::FEEDBACKS, true)
        );

        return $feedbacks ?? [];
    }

    public function show(string $handle): array
    {
        $feedbacks = $this->index();
        if (!$feedbacks) return [];

        $my_feedbacks = [];
        foreach ($feedbacks as $feedback) {
            if ($feedback->handle === $handle) {
                $my_feedbacks[] = $feedback->feedback;
            }
        }

        return $my_feedbacks;
    }

    public function dashboard()
    {
        if (!isset($_SESSION['handle'])) {
            redirect(ViewPath::LOGIN);
        }
        
        $handle = $_SESSION["handle"] ?? null;

        $user = $this->userController->show($handle);

        view("dashboard", [
            "feedback_url" => $user->feedback_url,
            "my_feedbacks" => $this->show($handle)
        ]);
    }

    public function create(string $handle)
    {
        $user = $this->userController->show($handle);

        view("feedback", [
            "name" => $user->name,
            "handle" => $user->handle
        ]);
    }

    public function store(string $handle)
    {
        $request_feedback = $_POST;

        $feedbacks = $this->index();

        $request_feedback["handle"] = $handle;
        $request_feedback["feedback"] = senitize($request_feedback["feedback"]);

        if (!$this->validation($request_feedback)) {
            redirect("/feedback/$handle");
        }

        $feedbacks[] = $request_feedback;
        $jsonData = json_encode($feedbacks, JSON_PRETTY_PRINT);
        file_put_contents(StoragePath::FEEDBACKS, $jsonData);

        view("feedback-success");
    }

    private function validation(array $request_feedback): bool
    {
        $flag = true;
        if (strlen($request_feedback["feedback"]) < 10) {
            $_SESSION["feedback_error"] = "feedback must be at least 10 characters long!";
            $flag = false;
        }

        return $flag;
    }
}