<x-app-layout>
    <h1>Удаление ответа</h1>
    Если желаете удалить этот ответ введите: "{{ $answer->content }} - хочу удалить!"<br>
    <form action="" method="POST">
        @csrf
        <input name="delete"><br>
        <input hidden name="confirm" value="{{ $answer->content }} - хочу удалить!">
        <input hidden name="answer_id" value="{{ $answer->id }}">
        <input type='submit' value='УДАЛИТЬ ОТВЕТ БЕЗВОЗВРАТНО'><br>
    </form>    
</x-app-layout>