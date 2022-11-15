<x-app-layout>
    <form action="" method="POST">
        @csrf
        <h1>Создание нового теста</h1>
        <br>
        <p>Добавляем ответы к вопросу! У ответа есть значение - оно может быть как "правильным" - положительная цифра, так и "не правильным" - отрицательная цифра соотвественно!</p> 
        @php
        for ($i = 1; $i <= $countAnswer; $i++ ) {
        @endphp        
        Введите ответ на вопрос:<br>
        <input name="content#{{ $i }}"><br>
        Добавьте значение этого ответа:<br>
        <input name="value#{{ $i }}"><br><hr>
        @php
        }
        @endphp
        <input hidden name="countAnser" value="{{ $countAnswer }}">
        <input hidden name="question_id" value="{{ $question_id }}">
        <input hidden name="test_id" value="{{ $test_id }}">
        
        <input type="submit" value="еще один вопрос"><br><br><br>
        
        <a href="/show/{{ $test_id }}">закончить тест</a>
    </form>        
</x-app-layout>