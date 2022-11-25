<x-app-layout>
    <h1>Удаление вопроса {{ $question->question }}</h1>
    
    Если желаете удалить вопрос(все ответы к нему тоже удалятся) напишите: "{{ $question->question }} - хочу удалить!"<br>
    <form action="" method="POST">
        @csrf
        <input name='delete'><br>
        <input hidden name='confirm' value='{{ $question->question }} - хочу удалить!'>
        <input hidden name='question_id' value='{{ $question->id }}'>
        <input type='submit' value='УДАЛИТЬ ВОПРОС БЕЗВОЗВРАТНО'><br>
    </form>
</x-app-layout>