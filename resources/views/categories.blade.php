<x-header />

<h1>Все категории</h1>

<div class="news-list">
    @foreach ($categories as $cat)
        <article class="news-card">
            <h2>{{ $cat->name }}</h2>
            <a href="{{ route('category.show', $cat->id) }}" style="display: inline-block; margin-top: 10px; padding: 8px 15px; background: #3498db; color: white; text-decoration: none; border-radius: 4px;">
                Перейти к статьям
            </a>
        </article>
    @endforeach
</div>

<x-footer />