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
    </div>
</header>

<main class="container">