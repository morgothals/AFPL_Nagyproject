<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function updateBalance(Request $request)
    {
        $request->validate([
            'balance' => 'required|numeric',
        ]);

        $user = auth()->user();
        $user->balance = $request->input('balance');
        $user->save();

        return response()->json(['message' => 'Balance updated successfully']);
    }
}
