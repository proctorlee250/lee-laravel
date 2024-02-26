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

    $firstCard = $cards[0]->value;
    $secondCard = $cards[1]->value;

    $gameCards = array();
    $gameCards['1st'] = $firstCard;
    $gameCards['2nd'] = $secondCard;

    echo '<pre>';
    print_r($gameCards);
    echo '</pre>';
    

    //exit;

        return view('card')->with('gameCards', $gameCards);
    }

    public function submit(Request $request)
    {
        $formValues = $request->all();
        
        echo 'here';
        print_r($formValues);
        exit;
        return redirect()->back()->with('message', 'Form submitted successfully!');
    }
}
