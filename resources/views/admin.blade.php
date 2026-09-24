<x-header />

<h1>Панель администратора</h1>

<section class="admin-section">
    <h2>Статьи</h2>

    <table class="admin-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Заголовок</th>
                <th>Автор</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Прорыв в квантовых вычислениях</td>
                <td>Иванов</td>
                <td>
                    <button class="btn btn-edit">Ред.</button>
                    <button class="btn btn-block">Блок</button>
                    <button class="btn btn-delete">Удалить</button>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Новый метод лечения рака</td>
                <td>Петрова</td>
                <td>
                    <button class="btn btn-edit">Ред.</button>
                    <button class="btn btn-block">Блок</button>
                    <button class="btn btn-delete">Удалить</button>
                </td>
            </tr>
        </tbody>
    </table>
</section>

<section class="admin-section">
    <h2>Роли пользователей</h2>

    <form class="role-form">
        <div class="form-group">
            <label for="user">Пользователь</label>
            <select id="user">
                <option>Иванов</option>
                <option>Петрова</option>
                <option>Сидоров</option>
            </select>
        </div>

        <div class="form-group">
            <label for="role">Роль</label>
            <select id="role">
                <option>Читатель</option>
                <option>Журналист</option>
                <option>Администратор</option>
            </select>
        </div>

        <button type="submit" class="btn">Сохранить</button>
    </form>
</section>

<x-footer />