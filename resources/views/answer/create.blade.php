<x-app-layout>
    <div class="coolForm">
        <div class="coolWindow">
            <div class="coolTitle">
                Вы создали вопрос
            </div>
            <div class="coolSubtitle">
                {{ $question->question }}
            </div>
            @if($question->pic != '')
            <img src="{{ Storage::url('image/'.$question->pic) }}" alt="question_image" class='coolImg'>
            @else
            <div class="coolSubtitle">
                Вопрос без картинки
            </div>                
            @endif            
        </div>
    </div>                
        
    <form action="" method="POST" class='coolForm'>
        @csrf
        <div class='coolWindow'>
            <div class='coolTitle'>Создаем ответы на вопросы</div>
            
            
            <div class='coolSubtitle'>У ответа есть значение - оно может быть как "правильным" - положительная цифра, так и "не правильным" - отрицательная цифра соотвественно!</div>
            
            @php
            for ($i = 1; $i <= $countAnswer; $i++ ) {
            @endphp
            <div class='input-container ic1'>                
                <input name='content#{{ $i }}' placeholder=" " class='coolInput'>
                <div class='cut'></div>
                <label for="content#{{ $i }}" class='placeholder'>ответ на вопрос</label>
            </div>
            
            <div class='input-container ic2'>
                <input name="value#{{ $i }}" class='coolInput' placeholder=" ">
                <div class='cut'></div>
                <label for='value#{{ $i }}' class='placeholder'>значение ответа</label>
            </div>    
            @php
            }
            @endphp
            
            <input hidden name="countAnser" value="{{ $countAnswer }}">
            <input hidden name="question_id" value="{{ $question->id }}">
            <input hidden name="test_id" value="{{ $test_id }}">
        
            <input type="submit" value="еще один вопрос" class='coolSubmit'>
        </div>
    </form>        
</x-app-layout>