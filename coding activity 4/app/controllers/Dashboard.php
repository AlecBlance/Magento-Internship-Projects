<?php

class Dashboard extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['loggedIn'])) {
            header("Location: " . BASE);
        }
        $this->view("dashboard");
    }
}

// http://localhost/coding%20activity%204/public/register/
// http://localhost/coding%20activity%204/public/register
