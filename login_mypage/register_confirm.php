<?php
    mb_internal_encoding("utf8");

    $temp_pic_name = $_FILES['picture']['tmp_name'];

    $original_pic_name = $_FILES['picture']['name'];
    $path_filename = './image/'.$original_pic_name;

    move_uploaded_file($temp_pic_name,'./image/'.$original_pic_name);

?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>会員登録確認</title>
    <link rel="stylesheet" href="register_confirm.css">
</head>

<body>
        
        <header>
                <img src="4eachblog_logo.jpg">
                <div class="login"><a href="login.php">ログイン</a></div>
        </header>
    
        <main>
        
            <div class="confirm">
                <h2>会員登録　確認</h2>
                <p>こちらの内容で登録してもよろしいですか？</p>

                <p>名前:
                    <?php echo $_POST['name'];?>
                </p>

                <p>メール:
                    <?php echo $_POST['mail'];?>
                </p>

                <p>パスワード:
                    <?php echo $_POST['password'];?>
                </p>

                <p>プロフィール写真:
                    <?php echo $_FILES['picture']['name'];?>
                </p>

                <p>コメント:
                    <?php echo $_POST['comments'];?>
                </p>

                <div class="buttons">
                    <div class="modoru">
                        <a href="register.php">戻って修正する</a>
                    </div>
                
                    <div class="submit">
                        <form action="register_insert.php" method="post">
                            <input type="hidden" value="<?php echo $_POST['name'];?>" name="name">
                            <input type="hidden" value="<?php echo $_POST['mail'];?>" name="mail">
                            <input type="hidden" value="<?php echo $_POST['password'];?>" name="password">
                            <input type="hidden" value="<?php echo $path_filename;?>" name="path_filename">
                            <input type="hidden" value="<?php echo $_POST['comments'];?>" name="comments">
                            <input type="submit" class="submit_button" value="登録する">
                        </form>
                    </div>
                </div>
            </div>
    </main>
    
    <footer>
            ©︎2018 Internous.inc All rights reserved
    </footer>
      
    
    
</body>


</html>