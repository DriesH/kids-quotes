<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Child;
use App\User;
use App\Quote;
use File;

use Auth;

class QuoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function getOldQuotes($childId)
    {
        $oldQuotes = Child::find($childId)->quotes()->get();
        return json_encode($oldQuotes);
    }

    public function newQuote (Request $request) {
        $quote        = $request->json('quote');
        $child_id     = $request->json('child_id');

        if($request->json('backgr_img')){
            dd("img was found");
        }
    //     if(Input::hasFile('foto')){
    //         /**
    //         *afbeelding is rauwe input data van de aflbeeding
    //         *
    //         *@var file
    //         */
    //         $maxWidth = 1000;
    //         $maxHeight = 1000;
    //         $afbeelding = Input::file('foto');
    //         $imageDimensions = getimagesize($afbeelding);
    //         if ($imageDimensions['0'] <= $maxWidth && $imageDimensions['1'] <= $maxHeight ) {
    //           /**
    //           *de extensie van afbeelding
    //           *
    //           *@var string
    //           */
    //           $extensie = $afbeelding->getClientOriginalExtension();
    //           /**
    //           *nieuwe unieke naam van de afbeelding
    //           *
    //           *@var string
    //           */
    //           $nieuwe_naam = uniqid() . "." . $extensie;
    //           $afbeelding->move('pictures/uploads', $nieuwe_naam);
    //           /**
    //           *nieuw pad naar afbeelding
    //           *
    //           *@var string
    //           */
    //           $foto_path = '/pictures/uploads/' . $nieuwe_naam;
    //           //dd($foto_path);
    //       }
    //   }

        $newQuote = Quote::create([
            'quote' => $quote,
            'child_id' => $child_id,
            'backgr_img' => 'test',
        ]);


        return $newQuote;
    }
}
