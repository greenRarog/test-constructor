<x-app-layout>
    <form action="" method="POST">
        @csrf
        <h1>Создание нового теста</h1>
        <br>
        <p>Для начала добавим название теста</p>
        <input name="name"><br>
        <p>Теперь напишите небольшое описание теста:</p>
        <textarea name="text"></textarea><br>
        <select name='private'>
            <option value='1' selected>публичный</option>
            <option value='0'>для для пользователей сайта</option>
        </select><br>    
        <hr><p>По результату прохождения теста пользователь должен получить оценку. Изначально предполагается 4 вида оценки - тест не пройдет, удовлетворительно, хорошо, отлично. Иногда сложно сразу подсчитать результат баллов - тогда вы можете не заполнять оценку сейчас, а изменить тест позже. Для создания теста с оценкой зачет(сдан/не сдан) поставьте условие баллов только для оценки ОТЛИЧНО</p><hr>
        количество баллов до которого тест НЕ СДАН: <input name='low_mark'><br>
        количество баллов до которого тест сдан оценка УДОВЛЕТВОРИТЕЛЬНО: <input name='midle_mark'><br>
        количество баллов до которого тест сдан оценка ХОРОШО(выше этого показателя - оценка ОТЛИЧНО или ЗАЧЕТ): <input name='high_mark'><br>
        <br>
        <input type="submit" value="ПРОДОЛЖИТЬ">
    </form>
</x-app-layout>    