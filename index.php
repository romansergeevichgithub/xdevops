<!doctype html>
<html>

<head>
 <title>Запись в БД через форму на php</title>
</head>

<body>

  <?php
      $host = 'localhost';  // Хост, у нас все локально
      $user = 'qwerty';    // Имя созданного вами пользователя
      $pass = 'qwerty'; // Установленный вами пароль пользователю
      $db_name = 'mysql';   // Имя базы данных
      $link = mysqli_connect($host, $user, $pass, $db_name); // Соединяемся с базой
      // Ругаемся, если соединение установить не удалось
      if (!$link) {
        echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
        exit;
      }

      //Если переменная Name передана
  if (isset($_POST["Name"])) {
    //Вставляем данные, подставляя их в запрос

    $one=$_POST['Name'];
    $two=$_POST['Text'];

    $sql = mysqli_query($link, "INSERT INTO `mytable` (`name`, `text`) VALUES ('$one','$two')") ;


    //Если вставка прошла успешно
    if ($sql) {
      echo '<p>Данные успешно добавлены в таблицу.</p>';
    } else {
      echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
    }
  }

    ?>

<form method="POST" action="">
     <input name="Name" type="text" placeholder="Имя"/>
     <input name="Text" type="text" placeholder="Текст"/>
     <input type="submit" value="Отправить"/>
</form>


<h1> тяжело в учении - легко в бою </h1>



</body>

</html>
