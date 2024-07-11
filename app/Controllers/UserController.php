<?php

namespace App\Controllers;

use App\Constants\StoragePath;

class UserController
{
    public function index(): array
    {
        $users = json_decode(
            file_get_contents(StoragePath::USERS, true)
        );

        return $users ?? [];
    }

    public function show(string $handle)
    {
        $users = $this->index();
        
        $user = [];

        foreach ($users as $u) {
            if ($u->handle === $handle) {
                $user = $u;
            }
        }

        return $user;
    }

    public function getAllHandle(): array
    {
        $users = $this->index();
        $handles = [];
        
        foreach ($users as $u) {
            $handles[] = $u->handle;
        }

        return $handles ?? [];
    }
}

