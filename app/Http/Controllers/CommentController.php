<?php

namespace App\Http\Controllers;

use App\Comment;

use App\House;
use App\Star;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    protected $house;

    public function __construct(House $house)
    {
        $this->house = $house;
    }

    public function replyStar(Request $request, $id)
    {

        $user = Auth::user();
        $star = Star::find($id);
        $comment = new Comment();
        $comment->body = $request->body;
        $comment->user_id = $user->id;
        $comment->house_id = $star->house_id;
        $comment->star_id = $star->id;
        $comment->save();

        return redirect()->route('house.detail', $star->house_id);

    }
}
