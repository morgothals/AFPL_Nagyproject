<?php

namespace App\Http\Controllers;

use App\Models\User;

class TopListController extends Controller
{
    public function getData()
    {
        $users = User::orderBy('balance', 'desc')->get();

        return response()->json([
            'topusers' => $users, ]);
    }
}
