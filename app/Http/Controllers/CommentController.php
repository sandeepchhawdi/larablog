<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Save a comment on a post.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        $validatedData = $request->all();
        $comment = new Comment();
        $comment->fill($validatedData);
        $comment->save();
        return back()->withSuccess(trans('forms.comment.messages.saved'));
    }
}
