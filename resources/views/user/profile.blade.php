<x-app-layout>
    <h1>Профиль пользователя {{ $user->name }}</h1>
    <div>
    Имя: {{ $user->name }}<br>
    Почта: {{ $user->email }}<br>
    Зарегистрировался: {{ $user->created_at }}<br>
    </div><hr>    
    <a href="#">Страница тестов</a>
    
</x-app-layout>