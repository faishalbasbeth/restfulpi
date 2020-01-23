<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowApiController extends Controller
{
    public function showApi()
    {
        return view('showApi');
    }
}
