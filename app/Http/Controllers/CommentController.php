<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Recipe;
use Inertia\Inertia;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'commentStory' => 'required|max:255',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $comment = new Comment();
            $comment->user_id = Auth::user()->id;
            $comment->name = Auth::user()->name;
            $comment->commentStory = $request->commentStory;
            $comment->save();

            return redirect()->back();
        }
    }

    public function show($id)
    {
        $comments = Comment::findOrFail($id);
        return Inertia::render('RecipeDetail', [
            'comments' => $comments,
        ]);
    }
}
