<x-app-layout>
    <h1>Изменение картинки для вопроса {{ $question->question }}</h1>
    <form action='' method='POST' enctype="multipart/form-data">
        @csrf
        хотите удалить картинку? <a href='/pic-delete/ {{ $question->id }}'>ТЫК</a><br>
        <br>
        заменить картинку другой? 
        <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
        <input type='file' name='pic'><br>        
        <input hidden name="question_id" value='{{ $question->id }}'>
        <input type="submit" value="обновить картинку"><br>        
    </form>    
    <a href='/show/all'>уйти отсюда</a>
</x-app-layout>