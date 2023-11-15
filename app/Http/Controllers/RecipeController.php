<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;

class RecipeController extends Controller
{
    private $recipe;

    public function __construct(Recipe $recipe)
    {
        $this->recipe = $recipe;
    }

    public function index()
    {
        $recipes = Recipe::orderBy('id', 'desc')->paginate(9);
        return Inertia::render('Welcome', [
            'recipes' => $recipes,
        ]);
    }

    public function show($id)
    {
        $recipe = Recipe::findOrFail($id);

        return Inertia::render('RecipeDetail', [
            'recipe' => $recipe,
        ]);
    }

    public function store(Request $request)
    {
        // 이미지 파일 유효성 검사
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // 최대 크기 2MB로 설정
        ]);

        // 이미지 업로드 및 저장
        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = Storage::putFileAs('images', $image, $imageName);
            // URL 생성
            $imageUrl = Storage::url($imagePath);


            $recipe = new Recipe();
            $recipe->name = $request->input('name'); // 'name' 컬럼으로 수정
            $recipe->ingredients = $request->input('ingredients');
            $recipe->description = $request->input('description');
            $recipe->image_name = $imageName;
            $recipe->image_path = $imageUrl;
            $recipe->user_id = auth()->id();
            $recipe->save();

            return redirect()->route('recipes.index')->with('success', '作成が完了されました');
        }
        return redirect()->route('recipes.index')->with('error', '作成が失敗されました');
    }

    public function destroy($id)
    {
        $recipe = Recipe::find($id);
        if (!is_null($recipe->file) && file_exists(public_path() . $recipe->file)) {
            unlink(public_path() . $recipe->file);
        }

        $recipe->delete();

        return redirect()->route('recipes.index');
    }
}
