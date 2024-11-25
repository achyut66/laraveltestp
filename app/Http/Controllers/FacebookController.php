<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facebook;

class FacebookController extends Controller
{
    //
    public function index()
    {
        $data = Facebook::get();
        return view('facebook.facebook', compact('data'));
    }
    public function save(Request $request)
    {
        // Validate that f_name, f_p_link, and f_friends are arrays, and each element is valid
        $validatedData = $request->validate([
            'f_name' => 'required|array', // f_name should be an array
            'f_name.*' => 'required|string|max:255', // Each item in the f_name array should be a string
            'f_p_link' => 'required|array', // f_p_link should be an array
            'f_p_link.*' => 'required|string|max:255', // Each item in the f_p_link array should be a string
            'f_friends' => 'required|array', // f_friends should be an array
            'f_friends.*' => 'required|integer|min:0', // Each item in the f_friends array should be an integer
        ]);

        // Prepare the data for insertion
        $validatedData = [];
        $count = count($request->f_name);  // Assuming all arrays have the same number of elements

        for ($i = 0; $i < $count; $i++) {
            $validatedData[] = [
                'f_name' => $request->f_name[$i],
                'f_p_link' => $request->f_p_link[$i],
                'f_friends' => $request->f_friends[$i],
            ];
        }

        // Save the data using the model's method
        Facebook::createFace($validatedData);

        // Redirect with success message
        return redirect('facebook')->with('success', "Data saved successfully!");
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'f_name' => 'required|string|max:255',
            'f_p_link' => 'required|url',
            'f_friends' => 'required|integer|min:0',
        ]);
        $facebookData = Facebook::findOrFail($id);
        $facebookData->f_name = $request->f_name;
        $facebookData->f_p_link = $request->f_p_link;
        $facebookData->f_friends = $request->f_friends;
        $facebookData->save();

        return redirect()->route('facebook.index')->with('success', 'Data updated successfully!');
    }
    public function search(Request $request)
    {
        $searchTerm = $request->input('name');

        // Check if search term is empty
        if (!$searchTerm) {
            return redirect()->route('facebook.index')->with('error', 'Search term is required');
        }

        // Call the model's search function
        $users = Facebook::SearchFName($searchTerm);

        // You can debug here using dd() before the return statement.
        // dd($users); // Move this after return, or remove it for now.

        return view('facebook', compact('users'));  // This is now reachable
    }






}
