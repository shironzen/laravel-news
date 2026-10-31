@include('components.header')

<div class="container" style="max-width: 500px; margin-top: 50px;">
    <h1 style="text-align: center; margin-bottom: 20px;">Вход</h1>

    @if ($errors->any())
        <div style="background: #e74c3c; color: white; padding: 10px; margin-bottom: 20px; border-radius: 4px;">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form method="POST" action="/login" style="background: white; padding: 20px; border-radius: 6px;">
        @csrf
        
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="login">Логин</label>
            <input type="text" id="login" name="login" value="{{ old('login') }}" required style="width: 100%; padding: 8px;">
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="password">Пароль</label>
            <input type="password" id="password" name="password" required style="width: 100%; padding: 8px;">
        </div>

        <button type="submit" class="btn" style="width: 100%;">Войти</button>
        
        <p style="text-align: center; margin-top: 15px;">
            Нет аккаунта? <a href="{{ route('register') }}" style="color: #3498db;">Зарегистрироваться</a>
        </p>
    </form>
</div>

@include('components.footer')