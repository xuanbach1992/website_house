<?php

namespace App\Http\Controllers;

use App\Comments;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;

        Comments::create($input);

        return back();
    }
}
