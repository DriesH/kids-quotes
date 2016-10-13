<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Child;
use App\User;
use App\Quote;
use File;
use Intervention\Image\ImageManagerStatic as Image;

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
        $quote        = $request->quote;            //get quote from ajax call
        $child_id     = $request->child_id;         //get child_id from ajax call
        $bckgrimg     = $request->file("userfile"); //get file from ajax call
        $imgWithQuote = $request->imgWithQuote;     //get base64 png img wirh quote


        $newName      = '';                         //name with hash img
        $currentUser  = Auth::user()->id;           //current user logged in
        $path         = '';                         //save path to img
        $uniqueImgID = uniqid();                    //hash for img name



        $img = str_replace('data:image/png;base64,', '', $imgWithQuote); //data:image/png;base64 replace with nothing
        $img = str_replace(' ', '+', $img);                              //all spaces replace with +

        //$fileData = base64_decode($img);
        //file_put_contents('pictures/uploadedbackground/user_id_1/withquotes/test.png', $fileData);

        //Image::make($imgWithQuote)->save('pictures/uploadedbackground/user_id_1/withquovfftes/test.png');




        if($bckgrimg != null){
            //get extension
            $ext = $bckgrimg->getClientOriginalExtension();

            //$manager = new ImageManager(array('driver' => 'imgick'));

            //rename file and save
            $newName = $uniqueImgID . "." . $ext;
            $path    = 'pictures/uploadedbackground/withoutquotes';

            //$image = $bckgrimg->move('pictures/uploadedbackground/user_id_' . $currentUser . '/', $newName);
            //$path = $image->getPath() . "/" . $image->getFileName();

            Image::make($bckgrimg->getRealPath())->resize(500,500)->save($path);
        }
        else {
            $path = 'pictures/' . $uniqueImgID . '.jpg';
        }

        $newQuote = Quote::create([
            'quote' => $quote,
            'child_id' => $child_id,
            'backgr_img' => $path,
        ]);

        //aanpassen!!!!!!!!!!!!!!!!!!!!!!!!!!!!


        return $newQuote;
    }
}
