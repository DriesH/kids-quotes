<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ShareController extends Controller
{
    public function getImage( $imgName)
    {
        if(file_exists('pictures/uploadedbackground/withquote/' . $imgName)){
            return view('shareTest', ['img' => $imgName]);

        }
        else {
            return redirect('/');
        }

    }
}
