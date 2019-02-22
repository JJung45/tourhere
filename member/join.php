<?php
    header("Content-Type:text/html;charset=UTF-8");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>join</title>
    <link rel="stylesheet" href="../css/grid.css">
    <link rel="stylesheet" href="../css/join.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
    </script>
</head>
<body>
   <?php
	if($_GET['num']==1){
	include "../contents/main.php";}
	else{
	include "../contents/select.php";} ?>
    <div id="bodyLayer">
        <div class="loginLayer">
           <a href="#" onclick="history.go(-1)">x</a>
            <div class="loginContent">
             <div class="loginTop">
                 <h2>join</h2>
               </div>
                <form action="joinOk.php" method="post">
                 이름 <br>
                 <input type="text" name="userName"><br>
                  아이디 <br>  <input type="text" name="userId"><br>
                  비밀번호  <br><input type="password" name="userPw"><br>
                  이메일 <br> <input type="email" name="userEmail"><br>
                  <input type="submit" value="회원가입">
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