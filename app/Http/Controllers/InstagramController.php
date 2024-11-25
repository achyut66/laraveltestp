<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instagram;

class InstagramController extends Controller
{
    //
    public function index()
    {
        $data = Instagram::get();
        return view('instagram.instagram', compact('data'));
    }
    public function save(Request $request)
    {
        $validate = $request->validate([
            'i_name' => 'required|string|max:255',
            'i_p_link' => 'required|string|max:255',
            'i_friends' => 'required|string|max:255',
        ]);
        Instagram::createInsta($validate);
        return redirect()->route('instagram')->with('success', "Saved Successfully !!!");
    }
}
