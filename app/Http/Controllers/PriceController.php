<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user()->id;
        // $prices = Price::where('user_id', $user)->latest('updated_at')->paginate(5);
        $prices = Price::whereBelongsTo(Auth::user())->latest('updated_at')->paginate(5);
        return view('prices.index')->with('prices', $prices);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('prices.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:120',
            'cost' => 'required',
            'description' => 'required'
        ]);

        Price::create([
            'uuid' => Str::uuid(),
            'user_id' => Auth::id(),
            'title' => $request->title,
            'cost' => $request->cost,
            'description' => $request->description
        ]);
        return to_route('prices.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Price $price)
    {
        // $price = Price::where('uuid',$uuid)->where('user_id',Auth::id())->firstOrFail();
        
        if($price->user_id !=Auth::id()){
            return abort(403);
        }

        return view('prices.show')->with('price', $price);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Price $price)
    {
        if($price->user_id !=Auth::id()){
            return abort(403);
        }

        return view('prices.edit')->with('price', $price);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Price $price)
    {
        if($price->user_id !=Auth::id()){
            return abort(403);
        }

        $request->validate([
            'title' => 'required|max:120',
            'cost' => 'required',
            'description' => 'required'
        ]);

        $price->update([
            'title' => $request->title,
            'cost' => $request->cost,
           'description' =>$request->description
        ]);
        
        return to_route('prices.show', $price)->with('success', 'Item is sent to trash bin.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Price $price)
    {
        if($price->user_id != Auth::id()) {
            return abort(403);
        }

        $price->delete();

        return to_route('prices.index')->with('success', 'Item is deleted.');
    }

}
