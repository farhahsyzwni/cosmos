<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;

class SessionController extends Controller
{
    public function index(){
        return view('sessions');
    }

    public function create(Request $request){

        $validated = $request->validate([
            'session_title' => ['required', 'string', 'max:100'],
            'focus_duration' => ['required', 'integer', 'min:1'],
            'short_break' => ['required', 'integer', 'min:1'],
            'long_break' => ['required', 'integer', 'min:1'],
            ]);

        $session = Session::create([
            'host_id' => auth()->id(),
            'session_title' => $validated['session_title'],
            'session_token' => \Illuminate\Support\Str::random(50),
            'session_type' => 'Private',
            'focus_duration' => $validated['focus_duration'],
            'short_break' => $validated['short_break'],
            'long_break' => $validated['long_break'],
            'session_status' => 'Active',
        ]);

        return redirect('/sessions/' . $session->session_token);
    }

    public function show($session_token){
        $session = Session::where('session_token', $session_token)->firstOrFail();
        return view('sessions', compact('session'));
    }
}
