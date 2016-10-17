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

        if ($request->file("backgroundImage")) {
            $bckgrimg = $request->file("backgroundImage"); //get the raw jpeg file from ajax call
        }
        else{
            $bckgrimg = $request->backgroundImage;
        }

        $imgWithQuote = $request->imgWithQuote;     //get the quote + background base64 png img with quote (baked quote into img)

        $newName      = '';                                          //name with hash img
        $currentUser  = Auth::user()->id;                            //current user logged in
        $pathWith     = 'pictures/uploadedbackground/withquote/';    //save path to img
        $pathWithout  = 'pictures/uploadedbackground/withoutquote/'; //save path to img
        $uniqueImgID  = uniqid() . time();                           //hash for img name


        //base64 converting
        $img          = str_replace('data:image/png;base64,', '', $imgWithQuote); //data:image/png;base64 replace with nothing
        $img          = str_replace(' ', '+', $img);                              //all spaces replace with +
        $fileData     = base64_decode($img); //decode base64 img

        //save png with quote baked in to destination path
        file_put_contents($pathWith . $uniqueImgID . '.png', $fileData);  //save decoded png

        //Image::make($imgWithQuote)->save('pictures/uploadedbackground/user_id_1/withquovfftes/test.png');

        if(!is_string($bckgrimg)){
            //get extension
            $ext = $bckgrimg->getClientOriginalExtension();

            //rename file and save
            $newName = $uniqueImgID . "." . $ext;

            //$image = $bckgrimg->move('pictures/uploadedbackground/', $newName);
            //$path = $image->getPath() . "/" . $image->getFileName();

            Image::make($bckgrimg->getRealPath())->resize(500,500)->save($pathWithout . $newName);
        }
        else {
            $newName = $bckgrimg;
        }

        $newQuote = Quote::create([
            'quote' => $quote,
            'child_id' => $child_id,
            'backgr_img' => $newName
        ]);

        //aanpassen!!!!!!!!!!!!!!!!!!!!!!!!!!!!


        return $newQuote;
    }
}
