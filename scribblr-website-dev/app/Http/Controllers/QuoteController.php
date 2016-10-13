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
        $quote        = $request->quote;
        $child_id     = $request->child_id;
        $bckgrimg     = $request->file("userfile");
        $newName      = '';
        $currentUser  = Auth::user()->id;
        $path         = '';


        if($bckgrimg){
            //get extension
            $ext = $bckgrimg->getClientOriginalExtension();

            //rename file and save
            $newName = uniqid() . "." . $ext;
            $path = $bckgrimg->move('pictures/uploadedbackground/user_id_' . $currentUser . '/', $newName);
        }

        $newQuote = Quote::create([
            'quote' => $quote,
            'child_id' => $child_id,
            'backgr_img' => $path->getPathName(),
        ]);

        //aanpassen!!!!!!!!!!!!!!!!!!!!!!!!!!!!


        return $newQuote;
    }
}
