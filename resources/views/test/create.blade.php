<x-app-layout>
    <form action="" method="POST">
        @csrf
        <h1>Создание нового теста</h1>
        <br>
        <p>Для начала добавим название теста</p><br>
        <input name="name"><br>
        <p>Теперь напишите небольшое описание теста:</p><br>
        <textarea name="text"></textarea><br>
        <br>
        <input type="submit" value="ПРОДОЛЖИТЬ">
    </form>
</x-app-layout>    