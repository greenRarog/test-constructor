<x-app-layout>
    <form action="" method="POST" class='coolForm'>
        @csrf
        <div class='coolWindow'>
            
            <div class="coolTitle">Создание нового теста</div>
            
            <div class='input-container ic1'>
                <input name="name" class='coolInput' placeholder=" ">
                <div class='cut'></div>
                <label for='name' class='placeholder'>название теста</label>
            </div>   
            
            <div class='input-container ic2'>
                <textarea name="text" class='coolInput font-family' placeholder=' '></textarea>
                <div class='cut'></div>
                <label for='text' class='placeholder'>описание теста</label>
            </div>    
            
            <select name='private' class="coolInput input_container ic2">
                <option value='1' selected>публичный</option>
                <option value='0'>для для пользователей сайта</option>
            </select>
            
            <div class='coolSubtitle'>
                По результату прохождения теста пользователь должен получить оценку. Изначально предполагается 4 вида оценки - тест не пройден, удовлетворительно, хорошо, отлично. Иногда сложно сразу подсчитать результат баллов - тогда вы можете не заполнять оценку сейчас, а изменить тест позже. Для создания теста с оценкой зачет(сдан/не сдан) поставьте условие баллов только для оценки ОТЛИЧНО
            </div>
            
            <div class="coolSubtitle">
                количество баллов до которого тест НЕ СДАН:
            </div>                            
            
            <div class='input-container ic2'>
                <input name='low_mark' class='coolInput' placeholder=' '>
                <div class='cut'></div>
                <label for='low_mark' class='placeholder'>тест сдан "3"</label>                
            </div>
            
            <div class="coolSubtitle">
                количество баллов до которого тест сдан оценка УДОВЛЕТВОРИТЕЛЬНО: 
            </div>            
            
            <div class='input-container ic2'>                                
                <input name='midle_mark' class='coolInput' placeholder=" " />
                <div class='cut'></div>            
                <label for='midle_mark' class='placeholder'>тест сдан "4"</label>
            </div>

            <div class="coolSubtitle">
                количество баллов до которого тест сдан оценка ХОРОШО(выше этого показателя - оценка ОТЛИЧНО или ЗАЧЕТ): 
            </div>
            
            <div class='input-container ic2'>
                <input name='high_mark' class="coolInput" placeholder=" " />
                <div class="cut"></div>
                <label for="high_makk" class="placeholder">тест сдан "5"/ЗАЧЕТ</label>            
            </div>
            
            <input type="submit" class="coolSubmit" value="ПРОДОЛЖИТЬ">
                        
        </div>
    </form>
</x-app-layout>    