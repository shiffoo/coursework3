<?php
session_name('inSystem');
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
  <title>Математика</title>
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
  <p>1. Что из перечисленного является определением предела функции?</p>
  <input type="radio" name="question1" value="0"> Отношение прироста функции к приросту аргумента <br>
  <input type="radio" name="question1" value="1"> Значение, к которому стремится функция при стремлении аргумента к определенной точке <br>
  <input type="radio" name="question1" value="0"> Множество всех точек плоскости <br>

  <p>2. Какой из перечисленных методов используется для нахождения производной?</p>
  <input type="radio" name="question2" value="1"> Правило дифференцирования сложной функции <br>
  <input type="radio" name="question2" value="0"> Метод математической индукции <br>
  <input type="radio" name="question2" value="0"> Метод интервалов <br>

  <p>3. Что такое интеграл?</p>
  <input type="radio" name="question3" value="0"> Производная функции <br>
  <input type="radio" name="question3" value="1"> Основная антипроизводная функции <br>
  <input type="radio" name="question3" value="0"> Лимит функции <br>

  <p>4. Что представляет собой ряд Тейлора?</p>
  <input type="radio" name="question4" value="1"> Представление функции в виде бесконечной суммы степеней <br>
  <input type="radio" name="question4" value="0"> Сумма ряда Фурье <br>
  <input type="radio" name="question4" value="0"> Ряд, состоящий из повторяющихся элементов <br>

  <p>5. Что такое матрица?</p>
  <input type="radio" name="question5" value="0"> Числовая функция нескольких переменных <br>
  <input type="radio" name="question5" value="1"> Прямоугольная таблица чисел <br>
  <input type="radio" name="question5" value="0"> График функции <br>

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