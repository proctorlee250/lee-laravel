<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Display the view.
     */
    public function index()
    {
        return view('cards')->with('users', $users);
    }
}
