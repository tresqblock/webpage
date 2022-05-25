<?php 
    if(!empty($_POST)){ 
        $flag = true;
        if(isset($_POST["login"]) && (preg_match("/[!,.@#$%^&*()+=~?`><№;:]/",$_POST["login"])||strlen($_POST["login"]) < 4)){
        ?>
            <div class='error'>
                <p class="error2">Введіть коректний логін. Логін може містити 
                лише латинські та кириличні літери (великі та малі), цифри,
                нижнє підкреслення та дефіс. Мінімальна довжина логіну - 4 символи.
                </p>
            </div>
        <?php
            $flag = false;
        }

        if(isset($_POST["password"]) && (!preg_match("/[A-ZА-Я]/",$_POST["password"])||!preg_match("/[a-zа-я]/",$_POST["password"])||!preg_match("/\d/",$_POST["password"])||strlen($_POST["password"]) < 7)){
        ?>
            <div class='error'>
                <p class="error2">Пароль має містити в собі малі та великі літери, а також цифри.
                    Довжина паролю має бути не менше 7 символів. 
                </p>
            </div>
        <?php
            $flag = false;
        }

        if(isset($_POST["repeatpassword"]) && !($_POST["password"]==$_POST["repeatpassword"])){
        ?>
            <div class='error'>
                <p class="error2">
                    Паролі не співпадають
                </p>
            </div>
        <?php
            $flag=false;
        }

        if(isset($_POST["email"]) && !preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i",$_POST["email"])){
        ?>
            <div class='error'>
                <p class="error2">
                    Введіть коректну електронну пошту
                </p>
            </div>
        <?php  
        $flag=false;
        }
        
        if(!isset($_POST["radio"]) ){
        ?>
            <div class='error'>
                <p class="error2">
                    Оберіть стать
                </p>
            </div>
        <?php  
        $flag=false;
        }
        if($flag){
       
            $hash_password = password_hash($_POST["password"],PASSWORD_BCRYPT);
            $query = "INSERT INTO users(email,password,radio,login)
                VALUES(".'"'.$_POST["email"].'","'.$hash_password.'","'.$_POST["radio"].'","'.$_POST["login"].'");'; 
            $mysqli->query($query);
            $mysqli->close();
            require_once("./views/registration_successful.php");
            die;
        }
    }
?>
<div>
  <h1 class="move">Реєстрація</h1>
<form class="form" action="index.php?action=registration" method="post">
    
<div class="move2">
      <div class="custom-radio">
    <label>
        <input type="radio" name="radio">
        <div class="custom-radio__label move6">
           Чоловіча
        </div>
    </label>
</div>

<div class="clear"></div>

<div class="custom-radio">
    <label>
        <input type="radio" name="radio">
        <div class="custom-radio__label move5">
            Жіноча
        </div>
    </label>
</div>
<p>Стать:</p>

  <div class="up2">
  <label for="name">Логін</label>
</div>
  <input class="input text-field__input" type="loginuser" pattern="^[а-яА-ЯёЁa-zA-Z0-9]+$" placeholder="Логін" name="login">
  <br>
  <br>
  <div class="up2">
  <label for="email"><div class="up2">Email</div></label>
  <input class="input text-field__input" type="email" placeholder="Email" name="email">
    <br>
  <br>
   <label for="name"><div class="up2">Пароль</div></label>
  <input class="input move4 text-field__input" type="password" placeholder="Пароль" name="password">
  <br>
  <br>
  <label class="repeat" for="name" ><div class="up2">Повторіть пароль</div></label>
  <input class="input move3 text-field__input" type="password" placeholder="Повторіть Пароль" name="repeatpassword">
    <br>
    <br>
  <button class="btn" type="submit">Рестрація</button>
</div>
</form>
</div>