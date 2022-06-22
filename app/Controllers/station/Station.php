<?php

namespace App\Controllers\station;
use App\Controllers\BaseController;

class Station extends BaseController
{
    public function index()
    {
        return view('station/station');
    }
}
