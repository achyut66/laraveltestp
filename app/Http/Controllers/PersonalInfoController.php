<?php

namespace App\Http\Controllers;
use App\Models\PersonalInfo;

use Illuminate\Http\Request;

class PersonalInfoController extends Controller
{
    public function save(Request $request)
    {
        $validate = $request->validate([
            'p_name' => 'required|string|max:255',
            'p_address' => 'required|string|max:255',
            'p_contact' => 'required|string|max:255',
            'p_profession' => 'required|string|max:255',
        ]);
        PersonalInfo::createInfo($validate);
        return redirect()->route('dashboard')->with('success', 'Data Saved successfully !!!!');
    }
    public function getAllData()
    {
        $data = PersonalInfo::get();
        return view('personaldata.view', compact('data'));
    }
}
