<?php

namespace App\Http\Controllers;

use App\Models\Text;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // показать админку
    public function index()
    {
        // все сттатьи
        $texts = Text::orderBy('created_at', 'desc')->get();
        // берем всех пользователей и все роли
        $users = User::all();
        $roles = Role::all();

        return view('admin', compact('texts', 'users', 'roles'));
    }

    // удалить статью
    public function destroy(Text $text)
    {
        $text->delete();
        return redirect('/admin')->with('success', 'Статья удалена!');
    }
}