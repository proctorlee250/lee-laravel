<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

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
    
    // need to do something with the picture cards too!
    //exit;

        return view('card')->with('gameCards', $gameCards);
    }

    public function submit(Request $request)
    {
        $formValues = $request->all();

        $correct = Session::get('correct');

        //firstCard, secondCard, guess
        if (  ($formValues['firstCard'] < $formValues['secondCard']) AND ($formValues['guess'] == 'higher') ) {
            //correct higher
            $correct = $correct + 1;
            Session::put('correct', $correct);
            return redirect()->back()->with('message', 'Correct!');

        }
        elseif (  ($formValues['firstCard'] > $formValues['secondCard']) AND ($formValues['guess'] == 'lower') ) {
            //correct lower
            $correct = $correct + 1;
            Session::put('correct', $correct);
            return redirect()->back()->with('message', 'Correct!');

        } else {
            //incorrect
            Session::put('correct', 0);
            return redirect()->back()->with('message', 'Wrong!');
        }
        
    }
}
