<!DOCTYPE html>
<html lang="ja">

    <head>
        
        <meta charset="utf-8">
        <title>会員登録</title>
        <link rel="stylesheet" type="text/css" href="register.css">
        
    </head>
    
    <body>
        
        <header>
                <img src="4eachblog_logo.jpg">
                <div class="login"><a href="login.php">ログイン</a></div>
        </header>
        
        <main>
            <h2>会員登録</h2>
            
            <form method="post" action="register_confirm.php" enctype="multipart/form-data">
                
                <div>
                    <label><span>必須</span>氏名</label><br>
                        <input type="text" class="text" size="35" name="name" required>
                </div>
                
                <div>
                    <label><span>必須</span>メールアドレス</label><br>
                        <input type="text" class="text" size="35" name="mail" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                </div>
                
                <div>
                    <label><span>必須</span>パスワード</label><br>
                        <input type="password" class="password" size="35" name="password" id="password" pattern="^[a-zA-Z0-9]{6,}+$" required>
                </div>
                
                <div>
                    <label><span>必須</span>パスワード確認</label><br>
                        <input type="password" class="confirmPassword" size="35" name="passwordConfirm" id="confirm" oninput="ConfirmPassword(this)" required>
                </div>
                
                <div>
                    <label>プロフィール写真</label><br>
                        <input type="hidden" name="max_file_size" value="1000000">
                        <input type="file" name="picture" size="50">
                </div>
                
                <div>
                    <label>コメント</label><br>
                        <textarea rows="4" cols="45" name="comments"></textarea>
                </div>
                
                <div class="submit_button">
                    <input type="submit" class="submit" value="登録する">
                </div>
                
            </form>        

        </main>
        
        <footer>
            ©︎2018 Internous.inc All rights reserved
        </footer>
        
        <script>
            
            function ConfirmPassword(confirm) {
                var input1 = password.value;
                var input2 = confirm.value;
                
                    if(input1 != input2) {
                        confirm.setCustomValidity("パスワードが一致しません。");
                    } else {
                        confirm.setCustomValidity("");
                    }
            }
        
        </script>
    
    </body>

</html>