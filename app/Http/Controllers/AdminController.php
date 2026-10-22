<?php

namespace App\Http\Controllers;

use App\Models\Text;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Показать страницу админа
    public function index()
    {
        // Берем все статьи (от новых к старым)
        $texts = Text::orderBy('created_at', 'desc')->get();
        // Берем всех пользователей и все роли (для формы смены ролей)
        $users = User::all();
        $roles = Role::all();

        return view('admin', compact('texts', 'users', 'roles'));
    }

    // Удалить статью
    public function destroy(Text $text)
    {
        $text->delete();
        return redirect('/admin')->with('success', 'Статья удалена!');
    }
}