<x-app-layout>
    <div class="coolForm">
        <div class="coolWindow">    
            <div class="coolTitle">
                Получен результат теста: "{{ $test->name }}"
            </div>            
            <div class="coolSubtitle">
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
            <div class="coolSubmit">
            <a href="/show/all">страница тестов</a>
            </div>
        </div>    
    </div>
    
    
</x-app-layout>