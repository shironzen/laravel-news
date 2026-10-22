<x-header />

<h1>Панель администратора</h1>

@if (session('success'))
    <div style="background: #27ae60; color: white; padding: 10px; margin-bottom: 20px;">
        {{ session('success') }}
    </div>
@endif

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
            @forelse ($texts as $text)
                <tr>
                    <td>{{ $text->id }}</td>
                    <td>{{ $text->heading }}</td>
                    <td>{{ $text->user->login }}</td>
                    <td>
                        <button class="btn btn-edit">Ред.</button>
                        <button class="btn btn-block">Блок</button>
                        
                        {{-- Кнопка удаления (работает через форму, так как это DELETE-запрос) --}}
                        <form action="{{ route('admin.destroy', $text->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete" onclick="return confirm('Удалить статью?')">Удалить</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Статей пока нет.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</section>

{{-- Блок с ролями мы пока оставим простым, чтобы не перегружать --}}
<section class="admin-section">
    <h2>Пользователи и роли</h2>
    <table class="admin-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Логин</th>
                <th>Роль</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->login }}</td>
                    <td>{{ $user->role->name ?? 'Нет роли' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</section>

<x-footer />