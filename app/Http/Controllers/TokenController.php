<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Token;

class TokenController extends Controller
{
   
    public function adminDashboard()
    {
        $tokens = Token::orderBy('created_at')->get();
        $current = Token::where('status', 'serving')->first();
        return view('admin.dashboard', compact('tokens', 'current'));
    }

   
    public function generateToken()
    {
        $lastToken = Token::whereDate('created_at', today())->max('token_number') ?? 0;

        $token = Token::create([
            'token_number' => $lastToken + 1,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Token issued: ' . $token->token_number);
    }

   
    public function callNext()
    {
      
        $current = Token::where('status', 'serving')->first();
        if ($current) {
            $current->status = 'done';
            $current->save();
        }

        
        $next = Token::where('status', 'pending')->orderBy('token_number')->first();
        if ($next) {
            $next->status = 'serving';
            $next->save();
        }

        return redirect()->back();
    }
}
