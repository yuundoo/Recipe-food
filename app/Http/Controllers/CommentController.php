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
            'rating' => 'required|numeric|min:1|max:5',
        ]);
        if ($validator->fails()) {
            return redirect()->back();
        } else if (Auth::check()) {

            Comment::create([
                'user_id' => request()->user_id,
                'name' => Auth::user()->name,
                'rating' => request()->rating,
                'commentStory' => request()->commentStory
            ]);
            // 평균 평점 업데이트 로직 추가
            $averageRating = Comment::where('recipe_id', request()->recipe_id)->avg('rating');
            // 평균 평점을 recipes 테이블에 저장
            Recipe::where('id', request()->recipe_id)->update(['average_rating' => $averageRating]);

            return redirect()->back();
        } else {
            return redirect()->back()->with('error', '로그인이 필요합니다.');
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
