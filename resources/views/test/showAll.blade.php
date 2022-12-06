<x-app-layout>
    <h1>Список доступных тестов:</h1>
    @if(!$authorized)
    <div class='card'>
    больше тестов доступно после <a href="localhost/register" class='card_link'>регистрации</a><br>
    <a href="localhost/login" class='card_link'>войдите</a>, если уже зарегистрированы
    </div>
    @endif
    
    <table class='card'>
        <tr>
            <th>Название теста</th>
            <th>Описание теста</th>
            <th>Создатель теста</th>
        </tr>    
    @foreach($tests as $test)
      <tr>
          <td class='card_item'><a href='/show/{{ $test->id }}' class='card_link'>{{ $test->name }}</a></td>
          <td class='card_item'>{{ $test->text }}</td>
          <td class='card_item'><a href='/profile/{{ $test->user->id }}' class='card_link'>{{ $test->user->name }}</a></td>
      </tr>
    @endforeach
    </table>
</x-app-layout>