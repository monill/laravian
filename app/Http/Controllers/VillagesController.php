<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VillagesController extends Controller
{
    public function index()
    {
        return view('villages');
    }
}
