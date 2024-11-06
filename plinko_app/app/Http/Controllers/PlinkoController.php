<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlinkoController extends Controller
{
    public function index()
    {
        return view('plinko');
    }
}
