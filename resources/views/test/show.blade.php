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
            
    @foreach($test->questions as $question)
    <div class="question">
        <span class="question__item">ВОПРОС: {{ $question->question }}</span><br>
        @if(isset($question->pic)
        {{ $question->pic }}<br>
        @endif        
    </div>    
        <hr>
        @if($question->type == 'oneAnswer')
        
        
    
</x-app-layout>