<x-app-layout>
    <h1>Поздравляю! ты прошел тест {{ $test->name }}! его создал {{ $test->user->name }}</h1>
    <br>
    <div>
        ты набрал {{ $score }} очков.   
        
        @if($score <= $test->low_mark)
        тест не пройден, слишком мало баллов. нужно хотя бы {{ $test->low_mark }}.
        
        @elseif($score <= $test->midle_mark)
        тест пройдет. оценка "удовлетворительно".
        
        @elseif($score <= $test->high_mark)
        тест пройдет. оценка "хорошо".
        
        @else
        тест пройдет. оценка "отлично".
        @endif
    </div>    
    <br>
    <a href="/show/all">страница тестов</a>
    
</x-app-layout>