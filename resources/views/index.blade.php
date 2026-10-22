<x-header />

<h1>Все новости</h1>

@if (session('success'))
    <div style="background: #27ae60; color: white; padding: 10px; margin-bottom: 20px;">
        {{ session('success') }}
    </div>
@endif

<div class="news-list">
    @forelse ($texts as $text)
        <article class="news-card">
            <h2>{{ $text->heading }}</h2>
            <p class="news-meta">
                {{ $text->category->name }} — 
                {{ $text->created_at->format('d.m.Y') }} — 
                Автор: {{ $text->user->login }}
            </p>
            <p>{{ $text->text }}</p>
        </article>
    @empty
        <p>Пока нет ни одной статьи. Зайдите как журналист и создайте первую!</p>
    @endforelse
</div>

<div style="margin-top: 20px;">
    {{ $texts->links() }}
</div>

<x-footer />