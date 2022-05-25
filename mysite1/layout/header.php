<html>
<head>
    <meta charset="UTF-8" />
    <title>Lab1</title>
    <link href="https://fonts.googleapis.com/css?family=Inter:400,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/styles.css" />
</head>
<body>
<header>       
    <ul class="menu-main">
        <li><a href="index.php?action=main" class="current">Головна</a></li>
        <li><a href="index.php?action=about">Про сайт</a></li>
        <li><a href="index.php?action=registration">Реєстрація</a></li>
        <?php
        if(!empty($_SESSION["user"]) && !empty($_SESSION["user"]["login"])){
      ?>
      <a href="index.php?action=logout">Вийти</a>
      <?php
      } 
        else{
      ?>
      <a href="index.php?action=login">Увійти</a>
      <?php
  
      }?>
      
    </ul>
</header>