<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CardController extends Controller
{
    /**
     * Display the view.
     */
    public function index()
    {
        
    $json = file_get_contents('https://higherorlower-api.netlify.app/json');

    $cards = json_decode($json);

    $shuffled = shuffle($cards);

    echo '<pre>';
    print_r($cards);
    echo '</pre>';

    $firstCard = $cards[0];

    echo '<pre>';
    print_r($firstCard);
    echo '</pre>';
    

    exit;

        return view('cards')->with('users', $users);
    }
}
