<?php

namespace App\Http\Controllers;

use App\House;
use App\Star;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\DocBlock\Description;

class RatingController extends Controller
{
    public function saveRating(Request $request, $id)
    {
        $user = Auth::user();
        $house = House::find($id);
        $star = new Star();
        $star->house_id = $house->id;
        $star->number = $request->rating;
        $star->content = $request->contents;
        $star->user_id = $user->id;
        $star->save();
        return redirect()->route('house.detail', $house->id);
    }
}
