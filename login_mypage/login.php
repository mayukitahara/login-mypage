<?php

    session_start();
        if(isset($_SESSION['id'])) {
            header("location:mypage.php");
        }

?>


<!DOCTYPE html>
<html lang="ja">
    
    <head>
        
        <meta charset="utf-8">
        <title>login</title>
        <link rel="stylesheet" type="text/css" href="login.css">
        
    </head>
    
    <body>
        
        <header>
                <img src="4eachblog_logo.jpg">
                <div class="login"><a href="login.php">ログイン</a></div>
        </header>
        
        <main>
            
            <form method="post" action="mypage.php">
        
                <div>
                    <label>メールアドレス</label><br>
                        <input type="text" class="mail" size="40px" name="mail" value="<?php echo $_COOKIE['mail'];?>" required>
                </div>
                
                <div>
                    <label>パスワード</label><br>
                        <input type="password" class="password" size="40px" value="<?php echo $_COOKIE['password'];?>" name="password" required>
                </div>
            
                <div>
                    <label><input type="checkbox" name="login_keep" value="login_keep"
                        <?php
                            if(isset($_COOKIE['login_keep'])) {
                                echo "checked = 'checked'"; }
                        ?> >ログイン状態を保持する</label>
                </div>

                <div class="submit_button">
                    <input type="submit" class="submit" name="submit" value="ログイン">
                </div>
                    
            </form>
        </main>
        
        
        <footer>
            ©︎2018 Internous.inc All rights reserved
        </footer>
    
    </body>
</html>