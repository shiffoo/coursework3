<?php
session_name('inSystem');
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Сервис онлайн тестирования</title>
    <link rel="stylesheet" href="protected/style.css">
    <style>
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
    <ul class="cards">
      <li>
        <a href="maths.php" class="card">
          <img src="https://i.imgur.com/oYiTqum.jpg" class="card__image" alt="" />
          <div class="card__overlay">
            <div class="card__header">
              <svg class="card__arc" xmlns="http://www.w3.org/2000/svg">
                <path />
              </svg>
              <div class="card__header-text">
                <h3 class="card__title">Тестирование по предмету:</h3>
                <span class="card__status">Математика</span>
              </div>
            </div>
            <p class="card__description">В данном тесте Вам предлагается пройти тестирование по математике.</p>
          </div>
        </a>
      </li>
      <li>
        <a href="BackendTest.php" class="card">
          <img src="https://i.imgur.com/2DhmtJ4.jpg" class="card__image" alt="" />
          <div class="card__overlay">
            <div class="card__header">
              <svg class="card__arc" xmlns="http://www.w3.org/2000/svg">
                <path />
              </svg>
              <div class="card__header-text">
                <h3 class="card__title">Тестирование по предмету:</h3>
                <span class="card__status">Разработка серверных частей интернет-ресурсов</span>
              </div>
            </div>
            <p class="card__description">В данном тесте Вам предлагается пройти тестирование по разработке серверных частей интернет-ресурсов.</p>
          </div>
        </a>
      </li>
      <li>
        <a href="LifeSafety.php" class="card">
          <img src="https://i.imgur.com/2DhmtJ4.jpg" class="card__image" alt="" />
          <div class="card__overlay">
            <div class="card__header">
              <svg class="card__arc" xmlns="http://www.w3.org/2000/svg">
                <path />
              </svg>
              <div class="card__header-text">
                <h3 class="card__title">Тестирование по предмету:</h3>
                <span class="card__status">Безопасность жизнедеятельности</span>
              </div>
            </div>
            <p class="card__description">В данном тесте Вам предлагается пройти тестирование по безопасности жизнедеятельности.</p>
          </div>
        </a>
      </li>
    </ul>
  </body>
</html>