<form action="./funcs/addCar.php" method="post" class="flex column g10 ai-c">
    <h1>Новый автомобиль</h1>
    <span>ПТС</span>
    <div><input required type="text" name="transport" class="accent ctrl-e" placeholder="00 00 000000" pattern="\d{2} \d{2} \d{6}"></div>
    <span>Модель</span>
    <div><input required type="text" name="model" class="accent ctrl-e" placeholder="ГАЗ 2301"></div>
    <span>Госномер</span>
    <div><input required type="text" name="number" class="accent ctrl-e" placeholder="х000хх" pattern="[а-яА-Я]{1}\d{3}[а-яА-Я]{2}"></div>
    <span>Цвет</span>
    <div><input required type="text" name="number" class="accent ctrl-e" placeholder="Жёлтый"></div>
    <button class="accent">Сохранить</button>
</form>