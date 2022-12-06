<x-app-layout>
    <div class='coolForm'>
        <div class='coolWindow'>
            <div class='coolTitle'>
                Удаление теста "{{ $test->name }}"
            </div>
            <div class='coolSubtitle'>
                Внимание! если хотите чтобы тест был удален - введите: "тест: {{ $test->name }} - хочу удалить!"
            </div>
            <form action="" method="post">
                @csrf   
                <input name="delete" class='coolInput'>
                <input hidden name="confirm" value="тест: {{ $test->name }} - хочу удалить!">
                <input hidden name="test_id" value="{{ $test->id }}">
                <input type="submit" value="УДАЛИТЬ ТЕСТ БЕЗВОЗВРАТНО" class='coolSubmit'>                
                <div class='coolSubmit'>
                    <a href='/change/{{ $test->id }}'>вернуться к тесту</a>
                </div>    
        </div>
        </div
    </form>
</x-app-layout>