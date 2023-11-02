<?php

namespace App\Controllers;

class pages extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
}
