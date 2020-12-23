<?php

    mb_internal_encoding("utf8");

    session_start();

    if(empty($_POST{'from_mypage'})) {
        header("location:login.php");
    }

?>

<!DOCTYPE html>
<html lang="ja">
        
    <head>
        <meta charset="utf-8">
        <title>マイページ編集</title>
        <link rel="stylesheet" type="text/css" href="mypage_hensyu.css">
    </head>
    
    <body>
        
        <header>
            <img src="4eachblog_logo.jpg">
            <div class="logout"><a href="log_out.php">ログアウト</a></div>
        </header>
    
        <main>
        
            <div class="mypage">
                <h2>会員情報</h2>
                
                <div class="hello">
                    <?php echo $_SESSION['name']."さん。こんにちは。";?>
                </div>
                
                <form method="post" action="mypage_update.php">
                    <div class="info">
                            <div class="picture">
                                    <img src="<?php echo $_SESSION['picture'];?>" name="picture">
                            </div>

                            <div class="profile">
                                <p>氏名:
                                   <input type="text" size="35" class="text" value="<?php echo $_SESSION['name'];?>" name="name">
                                </p>

                                <p>メール:
                                   <input type="text" size="35" class="text" value="<?php echo $_SESSION['mail'];?>" name="mail">
                                </p>

                                <p>パスワード:
                                   <input type="text" size="35" class="text" value="<?php echo $_SESSION['password'];?>" name="password">
                                </p>
                            </div>
                    </div>

                    <div class="comments">
                        <textarea rows="5" cols="90" name="comments"><?php echo $_SESSION['comments'];?></textarea>
                    </div>

                    <div class="hensyu">
                        <input type="submit" class="submit" value="この内容に変更する">
                    </div>
              </form>
            </div>
        
        </main>
        
        <footer>
            ©︎2018 Internous.inc All rights reserved
        </footer>
    
    </body>
    
</html>