<?php

include "../member/dbConnect.php";

session_start();
if(!isset($_SESSION['userId'])){
	echo"
	<script>
		alert('접근오류');
		location.href='main.php';
	</script>";
	exit;
}
$userId=$_SESSION['userId'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>my page</title>
	<link rel="stylesheet" href="../css/grid.css">
	<link rel="stylesheet" href="../css/mypage.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
    </script>
</head>
<body>
<div id="wrap">
	<div class="center header">
	<a href="select.php" class="arrow"><img src="../img/mybackarrow.png" alt="back"></a>
		<div class="image">
			<div class="galler">
				<img src="../img/person.png" alt="test">
			</div>
		</div>
		<div class="userInfo">
			<div class="userup">
				<p class="userId"><?= $_SESSION['userId'] ?>님</p>
			</div>
			<ul class="userDown">
				<li><a href="posting.php">글 작성</a></li>
				<li><a href="../member/update.php">회원정보수정</a></li>
				<li><a href="../member/logoutOk.php">로그아웃</a></li>
			</ul>
		</div>
	</div>
	<div class="section">
                  <div class="center sectionContent">
                   <ul>
                   <?php
					$query="select * from image_content where userId='$userId' order by num desc ";
					
					$result=$conn->query($query);
					
					if($result->num_rows!=0){
						while($row=$result->fetch_assoc()){
							
							$image=explode(",",$row['userimage']);
							
							echo"
						<li class='col-4'>
                        <div class='gallery' style='background:url(".$image[0].") no-repeat 50%; background-size:cover'><a href='deleteposting.php?num=".$row['num']."'>글삭제</a><a href='updateposting.php?num=".$row['num']."'>글수정</a>
                        </div>
                        <div class='selectxt'>
                            
                            <div class='selectxts'>".$row['userTxt']."</div>
							<p>written by ".$row['userId']."</p>
							<span >".$row['postingtime']."</span>
                        </div>
                    </li>";
						}
					}
					   ?>
                </ul>
		</div>
		</div>
		<div class="goTop">
			<img src="../img/upward.svg" alt="">
		</div>
	</div>
</body>
<script>
	var goTop=$('.goTop');
	goTop.on('click',function(){
		$('html,body').animate({
			scrollTop: 0
		},400);
	})

</script>
</html>