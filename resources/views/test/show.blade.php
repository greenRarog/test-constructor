<x-app-layout>
    <div class="message">Просмотр теста!<div>

    <div class="header">        
        <span class="header__item">Создатель теста:
            <a href="/user/{{ $test->user->id }}"> 
                {{ $test->user->name }}
            </a>
        </span><br>
        <span class="header__item">Тест называется: {{ $test->name }}</span><br>
        <span class="header__item">Описание теста: {{ $test->text }}</span><br>
    </div>
        <br><br><br>
        <form action='' method="POST">    
        @csrf   
    @foreach($test->questions as $question)
    <div class="question">
        <span class="question__item">ВОПРОС: {{ $question->question }}</span><br>
        @if(isset($question->pic))
        {{ $question->pic }}<br>
        @endif        
    </div>    
                
        @if($question->type == 'oneAnswer')
          @foreach($question->answers as $answer)
          {{ $answer->content }}<input name="questionBox{{ $question->id }}" type="radio" value="{{ $answer->value }}"><br>
          @endforeach          
        
        @elseif($question->type == 'manyAnswers')
          @foreach($question->answers as $answer)
          {{ $answer->content }}<input name="questionBox{{ $question->id }}-{{ $answer->id }}" type="checkbox" value="{{ $answer->value }}"><br>
          @endforeach                    
                
        @else
          Введите ответ:<input name="questionInput{{ $question->id }}"><br>
                
        @endif                
        <hr><br>
        @endforeach
        <input hidden name='check' value="push">
        <input hidden name='test_id' value="{{ $test->id }}">        
        <input type="submit" value="отправить тест!">
        </form>
        
        
    
</x-app-layout>