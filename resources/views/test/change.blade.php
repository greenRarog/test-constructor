<x-app-layout>
    <form action="" method="POST">
        @csrf
        <h1>Изменение теста {{ $test->name }}</h1>
        Название: <input name="name" value="{{ $test->name }}"><br>
        Описание теста: <textarea name="text">{{ $test->text }}</textarea><br>
        <input hidden name='test_id' value='{{ $test->id }}'>
        
          @if($test->private == 0)
            Сделать приватным <input name="private" type="checkbox" value="1"><br>
          @else
            Сделать публичным <input name="private" type="checkbox" value="0"><br>
          @endif

        Количество баллов для "удовлетворительно" <input name="low_mark" value="{{ $test->low_mark }}"><br>
        Количество баллов для "хорошо" <input name="midle_mark" value="{{ $test->midle_mark }}"><br>
        Количество баллов для "отлично"(или для ЗАЧЕТ) <input name="high_mark" value="{{ $test->high_mark }}"><br>
<hr>
        Вопросы:<br>
          @foreach($test->questions as $question)
          Вопрос: <input name="question:{{ $question->id }}" value="{{ $question->question }}"><br>
          <a href='/question-delete/{{ $question->id }}'>удалить вопрос!</a><br>
            @if($question->pic != '')
              <img src="{{ Storage::url('image/'.$question->pic) }}" alt="question_image">
              <a href='/change-pic/{{ $question->id }}'>изменить картинку</a>
              <br>
            @endif
            
            @foreach($question->answers as $answer)
              <br>Ответ: <input name='answer-content:{{ $answer->id }}' value='{{ $answer->content }}'><br>
              Оценка ответа: <input name='answer-value:{{ $answer->id }}' value='{{ $answer->value}}'><br>                            
              <input hidden name='answer-id' value='{{ $answer->id }}'>
              <a href='/answer-delete/{{ $answer->id }}'>удалить ответ</a><br>
            @endforeach
            <hr><br><br>
          @endforeach
        
        

        <input type="submit" value="изменить">
    </form>
    <a href='/show/all'>выйти не меняя ничего</a>
</x-app-layout>