<x-app-layout>
    <h1>Удаление теста {{ $test->name }}</h1>
    Внимание! если хотите чтобы тест был удален - введите: "тест: {{ $test->name }} - хочу удалить!"<br>
    <form action="" method="post">
        @csrf   
        <input name="delete">
        <input hidden name="confirm" value="тест: {{ $test->name }} - хочу удалить!">
        <input hidden name="test_id" value="{{ $test->id }}">
        <br><input type="submit" value="УДАЛИТЬ ТЕСТ БЕЗВОЗВРАТНО">        
    </form>
</x-app-layout>