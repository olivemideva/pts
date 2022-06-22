<?php

namespace App\Controllers\prison;
use App\Controllers\BaseController;

class Prison extends BaseController
{
    public function index()
    {
        return view('prison/prison');
    }
}
