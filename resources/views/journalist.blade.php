@include('components.header')

<h1>Панель журналиста</h1>

@if ($errors->any())
    <div style="background: red; color: white; padding: 10px; margin-bottom: 20px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form class="article-form" method="POST" action="{{ route('journalist.store') }}">
    @csrf

    <div class="form-group">
        <label for="heading">Заголовок</label>
        <input type="text" id="heading" name="heading" placeholder="Введите заголовок" value="{{ old('heading') }}">
    </div>

    <div class="form-group">
        <label for="category_id">Категория</label>
        <select id="category_id" name="category_id">
            <option value="">Выберите категорию</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="text">Текст статьи</label>
        <textarea id="text" name="text" rows="10">{{ old('text') }}</textarea>
    </div>

    <button type="submit" class="btn">Опубликовать</button>

</form>

@include('components.footer')