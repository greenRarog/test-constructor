<x-app-layout>
    <h1>Профиль пользователя {{ $user->name }}</h1>
    <div class='card'>
    Имя: {{ $user->name }}<br>
    Почта: {{ $user->email }}<br>
    Зарегистрировался: {{ $user->created_at }}<br>
    </div>
    <table class="card">
        <tr class="">
            <th>Название теста</th>
            <th>Описание</th>
            <th>Дата создания</th>
        </tr>        
    @foreach($user->tests as $test)
        <tr class="">
            <td class='card_item'><a href='/show/{{ $test->id }}' class='card_link'>{{ $test->name }}</a></td>
            <td class='card_item'>{{ $test->text }}</td>
            <td class='card_item'>{{ $test->created_at }}</td>
        </tr>
    @endforeach
    </table>
</x-app-layout>