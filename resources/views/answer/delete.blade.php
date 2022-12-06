<x-app-layout>
<div class="coolForm">
    <div class="coolWindow">
        <div class="coolTitle">
            Удаление ответа
        </div>
        <div class="coolSubtitle">
            Если желаете удалить этот ответ введите: "{{ $answer->content }} - хочу удалить!"
        </div>    
        <form action="" method="POST">
            @csrf
            <input name="delete" class="coolInput">
            <input hidden name="confirm" value="{{ $answer->content }} - хочу удалить!">
            <input hidden name="answer_id" value="{{ $answer->id }}">
            <input type='submit' value='УДАЛИТЬ ОТВЕТ БЕЗВОЗВРАТНО' class="coolSubmit">
            <div class="coolSubmit">
                <a htef="change/{{ $answer->question->test_id }}">вернуться к тесту</a>
            </div>
        </form>    
    </div>
</div>
</x-app-layout>