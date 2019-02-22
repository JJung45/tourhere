<?php
    header("Content-Type:text/html;charset=UTF-8");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="../css/grid.css">
    <link rel="stylesheet" href="../css/login.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
    </script>
</head>
<body>
    <?php
	if($_GET['num']==1){
	include "../contents/main.php";}
	else{
	include "../contents/select.php";}
    $num=$_GET['num'];
    ?>
    <div id="bodyLayer">
        <div class="loginLayer">
           <a href="#" onclick="history.go(-1)">x</a>
            <div class="loginContent">
             <div class="loginTop">
                 <h2>Login</h2>
               </div>
                <form action="loginOk.php" method="post">
              <div class="loginMain">
                  아이디:  <input type="text" name="userId"><br>
                  비밀번호: <input type="password" name="userPw">
                  <input type="submit" value="로그인">
              </div>
              <div class="loginBottom">
                  <p>아직 회원이 아니세요?</p>
                  <a href="join.php?num=<?=$num?>">회원가입</a>
                </div>
                  </form>
            </div>
        </div>
    </div>
</body>
<script>
    var bodyLayer=$('#bodyLayer');
    
    var loginLayer=$('.loginLayer');
    
    var loginLayerLeft=(bodyLayer.width())/2-(loginLayer.width())/2;
    
    var loginLayerTop=(bodyLayer.height())/2-(loginLayer.height())/2;
    
    loginLayer.css({
        left: loginLayerLeft,
        top: loginLayerTop
    });
</script>
</html>