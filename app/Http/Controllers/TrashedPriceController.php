<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrashedPriceController extends Controller
{
    public function index(){
        $prices = Price::whereBelongsTo(Auth::user())->onlyTrashed()->latest('updated_at')->paginate(5);
        return view('prices.index')->with('prices', $prices);
    }

    public function show(Price $price){
        if($price->user_id !=Auth::id()){
            return abort(403);
        }

        return view('prices.show')->with('price', $price);
    }

    
    public function update(Price $price){
        if($price->user_id !=Auth::id()){
            return abort(403);
        }
        
        $price->restore();

        return to_route('prices.show', $price)->with('success', 'Item is restored.');
    }

    public function destroy(Price $price){
        if($price->user_id !=Auth::id()){
            return abort(403);
        }
        
        $price->forceDelete();

        return to_route('trashed.index')->with('success', 'Item is deleted.');
    }
}
