<x-app-layout>
    <div class="coolForm">
    <div class="coolWindow">
        
        <div class="coolTitle">
            Просмотр теста
        </div>

        <div class="coolSubtitle">        
            @if($user->id == $test->user->id)
                Этот тест создан Вами
                <a href="/change/{{ $test->id }}">изменить</a>
                <a href="/delete/{{ $test->id }}">удалить</a>
            @else
                Создатель теста:
                <a href="/user/{{ $test->user->id }}"> 
                {{ $test->user->name }}
                </a>              
            @endif
        </div>
        <div class="coolSubtitle">
            Тест называется: {{ $test->name }}
        </div>
        <div class="coolSubtitle">
            Описание теста: {{ $test->text }}
        </div>    
    </div>
    </div>
    <form action='' method="POST">
    @csrf   
    @foreach($test->questions as $question)
    <div class='coolForm'>
    <div class="coolWindow">
        <div class="coolTitle">
        ВОПРОС: {{ $question->question }}
        </div>
        @if($question->pic != '')
        <img src="{{ Storage::url('image/'.$question->pic) }}" alt="question_image" class='coolImg'>
        @endif    
                
        @if($question->type == 'oneAnswer')
          @foreach($question->answers as $answer)
          <div class="input-container ic2">              
            <div class="coolSubtitle">
              {{ $answer->content }}
            </div>              
              <input name="questionBox{{ $question->id }}" type="radio" value="{{ $answer->value }}" class="">
          </div>
          
          @endforeach          
        
        @elseif($question->type == 'manyAnswers')        
          @foreach($question->answers as $answer)
          <div class='input-container ic2'>
            <div class='coolSubtitle'>
                {{ $answer->content }}
            </div>              
            <input name="questionBox{{ $question->id }}-{{ $answer->id }}" type="checkbox" value="{{ $answer->value }}">
          </div>
          @endforeach                    
                
        @else
          
          <div class='coolSubtitle'>
             Введите ответ:
          </div>              
          <div class='input-container c2'>
              <input name="questionInput{{ $question->id }}" class='coolInput' placeholder=' '>
          </div>
        @endif                
    </div>    
    </div>    
     @endforeach
     
    <input hidden name='check' value="push">
    <input hidden name='test_id' value="{{ $test->id }}">        
    <input type="submit" value="отправить тест!" class='coolSubmit width'>
    </form>
        
        
    
</x-app-layout>