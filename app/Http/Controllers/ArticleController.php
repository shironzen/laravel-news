<?php

namespace App\Http\Controllers;

use App\Models\Text;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
    {
        $texts = Text::orderBy('created_at', 'desc')->paginate(5);
        return view('index', compact('texts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('journalist', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
            'text' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        Text::create([
            'heading' => $request->heading,
            'text' => $request->text,
            'category_id' => $request->category_id,
            'user_id' => Auth::id(),
        ]);

        return redirect('/')->with('success', 'Статья успешно опубликована!');
    }
}