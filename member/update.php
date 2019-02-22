<?php
    header("Content-Type:text/html;charset=UTF-8");

include "dbConnect.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
    <link rel="stylesheet" href="../css/grid.css">
    <link rel="stylesheet" href="../css/join.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
    </script>
</head>
<body>
   <?php

	include "../contents/mypage.php";
	$userId=$_SESSION['userId'];
$query="select * from project where userId='$userId'";

$result=$conn->query($query);
while($row=$result->fetch_assoc()){
	$userName=$row['userName'];
	$userId=$row['userId'];
}?>
    <div id="bodyLayer">
        <div class="loginLayer">
           <a href="#" onclick="history.go(-1)">x</a>
            <div class="loginContent">
             <div class="loginTop">
                 <h2>update</h2>
               </div>
                <form action="updateOk.php" method="post">
                 이름 <br>
                 <input type="text" name="userName" value="<?= $userName ?>" disabled><br>
                  아이디 <br>  <input type="text" name="userId" value="<?= $userId ?>" disabled><br>
                  비밀번호  <br><input type="password" name="userPw"><br>
                  이메일 <br> <input type="email" name="userEmail"><br>
                  <input type="submit" value="수정완료">
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