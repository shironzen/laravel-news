<x-header />

<h1>Панель журналиста</h1>

<form class="article-form">

    <div class="form-group">
        <label for="title">Заголовок</label>
        <input type="text" id="title" name="title" placeholder="Введите заголовок">
    </div>

    <div class="form-group">
        <label for="category">Категория</label>
        <select id="category" name="category">
            <option>IT</option>
            <option>Медицина</option>
            <option>Космос</option>
        </select>
    </div>

    <div class="form-group">
        <label for="content">Текст статьи</label>
        <textarea id="content" name="content" rows="10"></textarea>
    </div>

    <button type="submit" class="btn">Опубликовать</button>

</form>

<x-footer />