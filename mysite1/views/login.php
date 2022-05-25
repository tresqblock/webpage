<?php 
    $flag=false;
    if(!empty($_POST)){ 
        $result = $mysqli->query("SELECT * FROM users WHERE login = '$_POST[log]';");
        $user = $result->fetch_assoc();
        if($user && password_verify($_POST["password"],$user["password"])){  
            $_SESSION["user"] = ["id"=>$user["id"], "login"=>$user["login"], "isAdmin"=>$user["admin"]];
            $flag=true;
            header("Location: index.php?action=index");
        }
        if(!$flag){
            ?>
                <div class="error">
                    <p class="error3">
                        Невірні дані для входу. Повторіть спробу 
                    </p>
                </div>
            <?php
        }
    }

?>


<div class="inside5">
    <div class="inside1">
        <h1 class="title">Авторизація</h1>
    </div>
    <div class="inside2">
    <form action="index.php?action=login" method="POST">
        <label class="">Логін</label>
        <input class="input text-field__input" type="text" name="log">
        <br/>
        <label>Пароль</label>
        <input class="input text-field__input" type="password" name="password">
        <br/>
        <input class="btn" type="submit" value="Увійти"/>
        <br/>
        <p>Дізнайся про акторів тут<br>
            Поспіши, зареєструйся!
        </p>
        <button class="btn1"><a href="index.php?action=registration"><div class="textbtn">Зареєструватись</div></a></button>
        
    </form>
    </div>
</div>