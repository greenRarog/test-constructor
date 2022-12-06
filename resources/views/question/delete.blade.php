<x-app-layout>
    
    <div class="coolForm">
        <div class="coolWindow">
            <div class="coolTitle">
                Удаление вопроса "{{ $question->question }}"
            </div>
            
            <div class="coolSubtitle">
                Если желаете удалить вопрос(все ответы к нему тоже удалятся) напишите: "{{ $question->question }} - хочу удалить!"
            </div>
            
            <form action="" method="POST">
                @csrf
                <input name='delete' class="coolInput"> 
                <input hidden name='confirm' value='{{ $question->question }} - хочу удалить!'>
                <input hidden name='question_id' value='{{ $question->id }}'>
                <input type='submit' value='УДАЛИТЬ ВОПРОС БЕЗВОЗВРАТНО' class="coolSubmit">
                
                <div class="coolSubmit">
                    <a href="/change/{{ $question->test->id }}">вернуться к тесту</a>
            </form>    
        </div>
    </div>
</x-app-layout>