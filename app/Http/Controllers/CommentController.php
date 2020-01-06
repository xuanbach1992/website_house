<?php

namespace App\Http\Controllers;

use App\Comment;

use App\House;
use App\Notifications\ReplyComment;
use App\Star;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $comments = Comment::select(DB::raw('user_id'))
            ->where('star_id', '=', $star->id)
            ->groupBy('user_id')
            ->get();
        $comment = new Comment();
        $comment->body = $request->body;
        $comment->user_id = $user->id;
        $comment->house_id = $star->house_id;
        $comment->star_id = $star->id;
        $comment->save();
        if ($star->user_id != $comment->user_id) {
            Auth::user()->notify(new ReplyComment($star->house_id, $id, $star->user->email, $user->name));
        }
        foreach ($comments as $comment) {
            if ($user->id != $comment->user_id
                && $star->user_id != $comment->user_id
                && $star->user_id != $comment->user_id) {
                Auth::user()->notify(new ReplyComment($star->house_id, $id, $comment->user->email, $user->name));
            }
        }
        return redirect()->route('house.detail', $star->house_id);
    }
}
