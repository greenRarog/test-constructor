<x-app-layout>
    <h1>Список доступных тестов:</h1>
    @if(!$authorized)
    больше тестов доступно после <a href="localhost/register">регистрации</a><br>
    <a href="localhost/login">войдите</a>, если уже зарегистрированы
    @endif
    <a href="/create-new-test">Создай свой тест</a><br>
    <br>
    <table>
        <tr>
            <th>Название теста</th>
            <th>Описание теста</th>
            <th>Создатель теста</th>
        </tr>    
    @foreach($tests as $test)
      <tr>
          <td><a href='/show/{{ $test->id }}'>{{ $test->name }}</a></td>
          <td>{{ $test->text }}</td>
          <td><a href='/profile/{{ $test->user->id }}'>{{ $test->user->name }}</a></td>
      </tr>
    @endforeach
    </table>
</x-app-layout>