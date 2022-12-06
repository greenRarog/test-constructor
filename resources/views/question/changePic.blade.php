<x-app-layout>
<div class="coolForm">
    <div class="coolWindow">
        <div class="coolTitle">
            Изменение картинки
        </div>
        <div class="coolSubtitle">
             удалить картинку вопроса "{{ $question->question }}"
        </div>
        <img src="{{ Storage::url('image/'.$question->pic) }}" alt="question_image" class='coolImg'>
    <form action='' method='POST' enctype="multipart/form-data">
        @csrf
        <div class="coolSubtitle">
            хотите удалить картинку? <a href='/pic-delete/ {{ $question->id }}'>ТЫК</a>
        </div>
        
        <div class="coolSubtitle">
            заменить картинку другой? 
            <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
            <input type='file' name='pic'>
        </div>
        <input hidden name="question_id" value='{{ $question->id }}'>
        <input type="submit" value="обновить картинку" class="coolSubmit">
    </form> 
        <div class="coolSubmit">
            <a href='/change/{{ $question->test->id }}'>вернуться к тесту</a>
        </div>
    </div>
</div>    
</x-app-layout>