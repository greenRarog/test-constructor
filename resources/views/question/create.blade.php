<x-app-layout>
    <form action="" enctype="multipart/form-data" method="POST" class="coolForm">
        @csrf
        <div class="coolWindow">
            <div class="coolTitle">Добавляем вопрос в тест</div>
                        
            <div class='input-container ic1'>                        
                <input name="question" class="coolInput" placeholder=" " />
                <div class="cut"></div>
                <label for='question' class='placeholder'>Текст вопроса</label>
            </div>
            
            <div class='input-container ic2'>
                <div class='coolSubtitle'>Добавить картинку</div>
                <input type="hidden" name="MAX_FILE_SIZE" value="1000000" /><input type='file' name='pic' class='coolSubtitle'>
            </div>

            
            <div class='input-container ic2'>
                <div class='coolSubtitle'>Теперь определимся с типом вопроса. Предлагается три типа вопросов:</div>                
                <select name="type" class='coolInput'>
                    <option value="inputAnswer">вопрос с ПОЛЕМ для ответа, куда тестируемый напишет ответ</option>
                    <option value="oneAnswer">вопрос с выбором ОДНОГО варианта ответа из предложенных</option>
                    <option value="manyAnswers">вопрос с выбором НЕСКОЛЬКИХ вариантов ответа</option>
                </select>
            </div>
            


            <div class='input-container ic2'>
                <div class='coolSubtitle'>Количество ответов:</div>
                <select name="countAnswer" class='coolInput'>
                    <option selected value="1">1 ответ</option>
                    <option value="3">3 ответа</option>`
                    <option value="4">4 ответа</option>
                    <option value="5">5 ответов</option>
                </select>        
            </div>
            
            <input hidden name="test_id" value="{{ $test_id }}">
            <input type="submit" value="перейдем к ответам" class='coolSubmit'>
            <div class='coolSubmit'>
                <a href='/show/{{ $test_id }}'>посмотреть результат</a>
            </div>
        </div>    
    </form>
</x-app-layout>    