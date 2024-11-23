<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TopListController extends Controller
{
    public function index()
    {
        $users = User::orderBy('balance', 'desc')->get();
        return view('toplist', compact('users'));
    }
    public function getData()
    {
        $users = User::orderBy('balance', 'desc')->get();

        return response()->json([
            'topusers' => $users, ]);
    }
}
