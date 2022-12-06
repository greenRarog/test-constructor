<x-app-layout>
    <form action="" method="POST" class="coolFormTest">
        @csrf
        <div class="coolForm">
        <div class="coolWindow">
            <div class="coolTitle">
            Изменение теста "{{ $test->name }}"
            </div>
            <div class="coolSubtitle">
                Название: 
            </div>
            <input name="name" value="{{ $test->name }}" class="coolInput">
            <duv class="coolSubtitle">
                Описание теста: 
            </duv>                
            <textarea name="text" class="coolInput font-family">
                {{ $test->text }}
            </textarea><br>
            
            <input hidden name='test_id' value='{{ $test->id }}'>
        
            @if($test->private == 0)
            <div class="coolSubtitle">
                Сделать приватным 
            </div>        
            <input name="private" type="checkbox" value="1">
            
            @else
            <div class="coolSubtitle">
                Сделать публичным 
            </div>    
            <input name="private" type="checkbox" value="0">
            @endif

            <div class="coolSubtitle">
                Количество баллов для "удовлетворительно" 
            </div>
            <input name="low_mark" value="{{ $test->low_mark }}" class="coolInput">
            
            <div class="coolSubtitle">
                Количество баллов для "хорошо" 
            </div>
            <input name="midle_mark" value="{{ $test->midle_mark }}" class="coolInput">
            
            <div class="coolSubtitle">
                Количество баллов для "отлично"(или для ЗАЧЕТ) 
            </div>
            <input name="high_mark" value="{{ $test->high_mark }}" class="coolInput">
        </div>        
        </div>    
          @foreach($test->questions as $question)
          <div class="coolForm">
          <div class="coolWindow">
            <div class="coolSubtitle">
                Вопрос: 
            </div>    
            <input name="question:{{ $question->id }}" value="{{ $question->question }}" class="coolInput">              
            <a href='/question-delete/{{ $question->id }}'>удалить вопрос!</a>
              
            @if($question->pic != '')
            <div>
              <img src="{{ Storage::url('image/'.$question->pic) }}" alt="question_image" class="coolImg">
              <a href='/change-pic/{{ $question->id }}'>изменить картинку</a>
            </div>  
            @endif

            @foreach($question->answers as $answer)
              <div class="coolSubtitle">
                Ответ: 
              </div>
              <input name='answer-content:{{ $answer->id }}' value='{{ $answer->content }}' class="coolInput">
              
              <div class="coolSubtitle">
                Оценка ответа: 
              </div>
              <input name='answer-value:{{ $answer->id }}' value='{{ $answer->value}}' class="coolInput">
              <input hidden name='answer-id' value='{{ $answer->id }}'>
              <a href='/answer-delete/{{ $answer->id }}'>удалить ответ</a>

            @endforeach
            </div>
            </div>            
          @endforeach
        
        
        <div class='coolForm'><div class='coolWindow'>  
        <div class='coolSubmit'>
            <a href='/create-new-test/{{ $test->id }}'>добавить вопрос</a>
        </div>                
        <input type="submit" value="изменить" class="coolSubmit">
        <div class='coolSubmit'>
            <a href='/show/all'>выйти не меняя ничего</a>
        </div>
        </div></div>
    </form>
    
</x-app-layout>