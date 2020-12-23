<?php

    mb_internal_encoding("utf8");
    session_start();

    if(empty($_SESSION['id'])) {

        try {
            $pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","root");
        } catch(PDOException $e) {
            die("<p>申し訳ございません。現在サーバーが混み合っており一時的にアクセスが出来ません。<br>しばらくしてから再度ログインをして下さい。</p>
            <a href='http://localhost:80/login_mypage/login.php'>ログイン画面へ</a>");
        }

        $stmt = $pdo -> prepare("select * from login_mypage where mail=? && password=?");

        $stmt -> bindValue(1,$_POST['mail']);
        $stmt -> bindValue(2,$_POST['password']);

        $stmt -> execute();
        $pdo = NULL;

            while($row = $stmt -> fetch()) {
                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['mail'] = $row['mail'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['picture'] = $row['picture'];
                $_SESSION['comments'] = $row['comments'];
            }
        
    if(empty($_SESSION['id'])) {
        header("location:login_error.php");
    }
        
    if(!empty($_POST['login_keep'])) {
        $_SESSION['login_keep'] = $_POST['login_keep'];
    }
        
    if(!empty($_SESSION['id']) && !empty($_SESSION['login_keep'])) {
        setcookie('mail',$_SESSION['mail'],time()+60*60*24*7);
        setcookie('password',$_SESSION['password'],time()+60*60*24*7);
        setcookie('login_keep',$_SESSION['login_keep'],time()+60*60*24*7);
    } else if(empty($_SESSION['login_keep'])) {
        setcookie('mail','',time()-1);
        setcookie('password','',time()-1);
        setcookie('login_keep','',time()-1);
    }
    }

?>

<!DOCTYPE html>
<html lang="ja">
        
    <head>
        <meta charset="utf-8">
        <title>マイページ</title>
        <link rel="stylesheet" type="text/css" href="mypage.css">
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
                
                <div class="info">
                    <div class="picture">
                            <img src="<?php echo $_SESSION['picture'];?>">
                    </div>

                    <div class="profile">
                        
                        <p>氏名:
                            <?php echo $_SESSION['name'];?>
                        </p>

                        <p>メール:
                            <?php echo $_SESSION['mail'];?>
                        </p>

                        <p>パスワード:
                            <?php echo $_SESSION['password'];?>
                        </p>
                   
                    </div>
                </div>
                
                <div class="comments">
                    <div class="comments_box">
                        <?php echo $_SESSION['comments'];?>
                    </div>
                </div>
                
            
                <form action="mypage_hensyu.php" method="post">
                    <input type="hidden" value="<?php echo rand(1,10);?>" name="from_mypage">
                
                    <div class="hensyu">
                        <input type="submit" class="submit" value="編集する">
                    </div>
               
                </form>
                
            </div>
        
        </main>
        
        <footer>
            ©︎2018 Internous.inc All rights reserved
        </footer>
    
    </body>
    
</html>