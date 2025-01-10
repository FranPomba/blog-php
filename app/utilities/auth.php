<?php

namespace app\utilities;

class Auth
{
    public function handle()
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }
    }
}
