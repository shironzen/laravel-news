@include('components.header')

<h1>Категория: {{ $category->name }}</h1>

<div class="news-list">
    @forelse ($texts as $text)
        <article class="news-card">
            <h2>{{ $text->heading }}</h2>
            <p class="news-meta">
                {{ $text->created_at->format('d.m.Y') }} — 
                Автор: {{ $text->user->login }}
            </p>
            <p>{{ $text->text }}</p>
        </article>
    @empty
        <p>В этой категории пока нет статей.</p>
    @endforelse
</div>

<div style="margin-top: 20px;">
    {{ $texts->links() }}
</div>

<a href="{{ route('categories') }}" style="display: inline-block; margin-bottom: 20px; color: #3498db; text-decoration: none;">&larr; Назад ко всем категориям</a>

@include('components.footer')