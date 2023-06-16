<?php
session_start();
class LogoutController
{
    public function logout()
    {
        session_destroy();
        header('Location: index.php?controller=login&action=login');
    }
}