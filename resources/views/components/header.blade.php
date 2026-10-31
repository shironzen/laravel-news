<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Научный прогресс</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

<header class="site-header">
    <div class="container">
        <h1 class="logo">Научный прогресс</h1>
        <nav class="main-nav">
            <a href="{{ url('/') }}">Главная</a>
            <a href="{{ route('categories') }}">Категории</a>
            <a href="{{ url('/journalist') }}">Журналист</a>
            <a href="{{ url('/admin') }}">Админ</a>
        </nav>
        
@if(Auth::check())
   
    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
        @csrf
        <button type="submit" style="background: none; border: none; color: white; cursor: pointer; margin-left: 15px;">
            Выйти ({{ Auth::user()->login }})
        </button>
    </form>
@else
    <a href="{{ route('login') }}" style="margin-left: 15px;">Вход</a>
    <a href="{{ route('register') }}" style="margin-left: 10px;">Регистрация</a>
@endif
    </div>
</header>

<main class="container">