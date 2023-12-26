<?php
session_name('inSystem');
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
  <title>Безопасность жизнедеятельности</title>
    <link rel="stylesheet" href="protected/style.css">
    <style>
  /* Стили для меню */
  ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
  }
  li {
    float: left;
  }
  li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
  }
  li a:hover:not(.active) {
    background-color: #22baba;
  }
  .active {
    background-color: #04AA6D;
  }
  .active:hover {
    background-color: #22baba;
  }
  .active_logout {
    background-color: #a11616;
  }
  
  /* Новые стили для теста */
  #mathTest {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin: 20px auto; /* Центрирование теста на странице */
    width: 80%; /* Ширина теста, может быть изменена в зависимости от дизайна */
    max-width: 700px; /* Максимальная ширина для больших экранов */
  }

  #mathTest h1 {
    color: #333;
    text-align: center;
    margin-bottom: 30px; /* Добавляем пространство под заголовком */
  }

  #mathTest p {
    color: #666;
    font-size: 16px; /* Установка размера шрифта для вопросов */
  }

  #mathTest button {
    background-color: #5cb85c;
    color: #fff;
    border: none;
    border-radius: 4px;
    padding: 10px 20px;
    cursor: pointer;
    display: block;
    width: 100%; /* Кнопка тянется на всю ширину контейнера */
    margin-top: 20px; /* Добавляем пространство над кнопкой */
  }

  #mathTest button:hover {
    background-color: #4cae4c;
  }

  #result {
    text-align: center;
    display: none; /* Скрываем до завершения теста */
    margin-top: 20px; /* Добавляем пространство над результатами */
  }

  #result h2 {
    color: #333;
  }

  #result #score {
    color: #5cb85c;
    font-size: 1.2em;
    font-weight: bold;
  }
</style>
  </head>
  <body class="mainpagebody">
    <ul>
      <li><a href="mainpage.php">Мои тесты</a></li>
      <li style="float:right"><a class="active_logout" href="logout.php">Выйти</a></li>
      <li style="float:right"><a class="active" href="">
          <?php
          $email = $_SESSION['session_username'];
          echo $email;
          ?></a></li>
    </ul>

    <form id="mathTest">
      <!-- Вопрос 1 -->
    <p>1. Какое оборудование используется для защиты органов дыхания?</p>
    <input type="radio" name="question1" value="1"> Респираторы <br>
    <input type="radio" name="question1" value="0"> Сапоги <br>
    <input type="radio" name="question1" value="0"> Шлемы <br>

    <!-- Вопрос 2 -->
    <p>2. Какой документ регулирует вопросы охраны труда?</p>
    <input type="radio" name="question2" value="0"> Уголовный кодекс РФ <br>
    <input type="radio" name="question2" value="1"> Трудовой кодекс РФ <br>
    <input type="radio" name="question2" value="0"> Гражданский кодекс РФ <br>

    <!-- Вопрос 3 -->
    <p>3. Что такое эвакуационный план?</p>
    <input type="radio" name="question3" value="1"> Схема для эвакуации людей при чрезвычайных ситуациях <br>
    <input type="radio" name="question3" value="0"> План мероприятий по тушению пожара <br>
    <input type="radio" name="question3" value="0"> Инструкция по оказанию первой помощи <br>

    <!-- Вопрос 4 -->
    <p>4. Какой знак безопасности обозначает предупреждение об опасности?</p>
    <input type="radio" name="question4" value="0"> Синий круг <br>
    <input type="radio" name="question4" value="1"> Жёлтый треугольник <br>
    <input type="radio" name="question4" value="0"> Красный квадрат <br>

    <!-- Вопрос 5 -->
    <p>5. Какой орган отвечает за надзор и контроль в сфере охраны труда в РФ?</p>
    <input type="radio" name="question5" value="0"> Министерство здравоохранения РФ <br>
    <input type="radio" name="question5" value="1"> Роструд <br>
    <input type="radio" name="question5" value="0"> Роспотребнадзор <br>


  <button type="button" onclick="checkTest()">Проверить тест</button>
</form>

<div id="result" style="display:none;">
  <h2>Ваши результаты:</h2>
  <p id="score"></p>
</div>

<script>
function checkTest() {
  var score = 0;
  var totalQuestions = 5;
  
  for (var i = 1; i <= totalQuestions; i++) {
    var radios = document.getElementsByName('question' + i);
    for (var j = 0; j < radios.length; j++) {
      var radio = radios[j];
      if (radio.value === "1" && radio.checked) {
        score++;
      }
    }
  }
  
  var resultText = "Вы ответили правильно на " + score + " из " + totalQuestions + " вопросов. ";
  switch(score) {
    case 5:
      resultText += "Отлично!";
      break;
    case 4:
      resultText += "Хорошо!";
      break;
    case 3:
      resultText += "Удовлетворительно.";
      break;
    default:
      resultText += "Попробуйте еще раз.";
      break;
  }
  
  var result = document.getElementById('result');
  result.style.display = 'block';
  var scoreParagraph = document.getElementById('score');
  scoreParagraph.textContent = resultText;
}
</script>

  </body>
</html>