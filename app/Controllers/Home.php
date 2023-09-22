<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function test()
    {
        echo '-dsjfndsj';
    }
    public function index(): string
    {
        return view('welcome_message');
    }
}

