<?php

namespace App\Http\Controllers;

use App\Models\Text;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    //берет стаьти и сортирует по дате + по 5 на странице
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
        //проверка что все заполнено + создание записи "текст"
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
//редирект на главну
        return redirect('/')->with('success', 'Статья успешно опубликована!');
    }

    public function categoriesList()
    {
        $categories = Category::all();
        return view('categories', compact('categories'));
    }

    //ищет по айди если нет 404 (дДЛЯ КАТЕГОРИИ)
    public function categoryShow($id)
    {
        $category = Category::findOrFail($id);
        //берет статьи тока с переданным айди (чтобы выводить нужную категорию)
        $texts = Text::where('category_id', $id)->orderBy('created_at', 'desc')->paginate(5);
        
        return view('category', compact('texts', 'category'));
    }
}