<?php

namespace App\Controllers\court;
use App\Controllers\BaseController;

class Court extends BaseController
{
    public function index()
    {
        return view('court/court');
    }
}
