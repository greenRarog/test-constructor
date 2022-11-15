<x-app-layout>
    <form action="" method="POST">
        @csrf
        <h1>Создание нового теста</h1>
        <br>
        <p>Отлично! пора добавить в наш тест вопрос</p>
        Текст вопроса:<br>
        <input name="question"><br>
        нужна ли картинка???<br><br>
        <p>Теперь определимся с типом вопроса. Предлагается три типа вопросов:<p>
        <select name="type">
            <option value="inputAnswer">вопрос с ПОЛЕМ для ответа, куда тестируемый напишет ответ</option>
            <option value="oneAnswer">вопрос с выбором ОДНОГО варианта ответа из предложенных</option>
            <option value="manyAnswers">вопрос с выбором НЕСКОЛЬКИХ вариантов ответа</option>
        </select><br>
        <select name="countAnswer">
            <option selected value="1">1 ответ</option>
            <option value="3">3 ответа</option>`
            <option value="4">4 ответа</option>
            <option value="5">5 ответов</option>
        </select><br>        
        <input hidden name="test_id" value="{{ $test_id }}">
        <input type="submit" value="перейдем к ответам">                
    </form>
    <a href="/show/{{ $test_id }}">закончить тест</a>
</x-app-layout>    