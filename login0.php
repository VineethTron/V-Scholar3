<html lang="en">
    <head>
        <link rel="shortcut icon" href="favicon_io/favicon.ico" type="image/x-icon">
        <title>Login to VardhamanScholor</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="LoginStyle.css" rel="stylesheet">
    </head>
    <body>
    <div class="box">
        <div class="box-header">
        <p style="font-size: 25px; font-weight: 700; ">Login</p>
        <form action="login1.php" method="POST">
            <input type="text" value="<?php if(!empty($_COOKIE['usercookie'])) echo $_COOKIE['usercookie']?>" name="userid" placeholder="Roll Number" id="userid" required><br>
            <input type="password" value="<?php if(!empty($_COOKIE['passwordcookie'])) echo $_COOKIE['passwordcookie']?>"name="password" placeholder="Web Access Key" id="password" required><br>
            <?php if(!empty($_COOKIE['usercookie']) && !empty($_COOKIE['passwordcookie'])){ ?>
            <input checked type="checkbox" name="c" style="margin-left: auto;">Remember Me <br>
            <?php }else{ ?>
                <input type="checkbox" name="c" style="margin-left: auto;">Remember Me <br>
            <?php } ?>
            <button type="submit" name="submit" value="submit">Login</button>
        </form>
        <a href="index.html"><img class="logo-btm"src="images/logo-1.png" alt="Vardhaman-Scholor"></a>
    </div>
    </div>
    </body>
</html>


