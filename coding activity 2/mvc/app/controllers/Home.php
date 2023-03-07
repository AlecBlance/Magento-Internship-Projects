<?php

class Home extends Controller
{
    public function index()
    {
        $contact = $this->model('Contact');
        $this->view('index');
    }
}
