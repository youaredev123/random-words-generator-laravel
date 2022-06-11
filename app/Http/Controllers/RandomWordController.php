<?php

namespace App\Http\Controllers;

use App\Models\RandomWord;
use Illuminate\Http\Request;

class RandomWordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $randomWords = RandomWord::all();
        return view('index', compact('randomWords'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Form data validation
        $formData = $request->validate([
            'name' => 'required|max:255',
            'option' => 'required',
            'quantity' => 'required',
        ]);

        $name = $formData["name"]; // User's name
        $option = $formData["option"]; // Option to select the alphabet, Numerical, or both. Should be ['A'], ['N'], ['A', 'N']
        $quantity = intval($formData["quantity"]); // Quantity of random words to generate Should be 10, 100, 1000, 10000
        
        $words = array(); // Array of words to store multi record to database at once

        for($i = 0; $i < $quantity; $i++){
            
            /**  
             *Generate random word with generateRandomWord 
             *generateRandomWord is a custom helper functon by added Denis
             *Located  App/Helpers/helper.php 
             */
            $word = generateRandomWord($option); 
            $words[] = ["word" => $name . $word]; // User name + Random word            
        }

        // Store multi record to database at once
        RandomWord::insert($words);
        return redirect('/randomwords')->with('completed', 'A random words has been generated and saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $randomWord = RandomWord::findOrFail($id);
        return view('edit', compact('randomWord'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateData = $request->validate([
            'word' => 'required|max:255'
        ]);
        RandomWord::whereId($id)->update($updateData);
        return redirect('/randomwords')->with('completed', 'A word has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $word = RandomWord::findOrFail($id);
        $word->delete();
        return redirect('/randomwords')->with('completed', 'A word has been deleted');
    }
}
