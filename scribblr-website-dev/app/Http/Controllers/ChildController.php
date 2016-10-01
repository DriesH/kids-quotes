<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Child;

use App\User;

use Auth;

class ChildController extends Controller
{
    public function newChild (Request $request) {
        $childName    = $request->json('childName');
        $gender       = $request->json('optionsRadios');
        $_dateOfBirth = $request->json('dateOfBirth');
        $dateOfBirth  = date_create_from_format('d/M/Y', $_dateOfBirth);
        $userId       = Auth::user()->id;

        $newChild = Child::create([
            'name' => $childName,
            'dateOfBirth' => $dateOfBirth,
            'gender' => $gender,
            'user_id' => $userId
        ]);

        return $newChild;
    }

    public function getChildren () {

    }
}
