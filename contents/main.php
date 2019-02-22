<?php
session_start();
$num=1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>main</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/grid.css">
	<link rel="stylesheet" href="../css/main.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
    </script>
</head>
<body>
	<div id="wrap">
		<div class="clearfix hMenu">
			<div class="center gnb">
			<h1><a href="main.php">Tourhere</a></h1>
			<ul>
				<li class="mainM"><a href="select.php?search=1">Accomodation</a></li>
				<li class="mainM"><a href="select.php?search=2">Restaurant</a></li>
				<li class="mainM"><a href="select.php?search=3">Attractions</a></li>
									<li class="loginjoin">
							<?php 
			if(!isset($_SESSION['userId'])){
				?>
			<a href="../member/login.php?num=<?= $num ?>">LOGIN</a>
			<?php		
			}
			else{
				?>
			<a href="mypage.php">My Page</a>	
			<?php
			
			}
				?>
						</li>
				<li class="sub">
				<img src="../img/menubar.png" alt="menu">
					<ul class="submenu">
						<li><a href="select.php?search=1">Accomodation</a></li>
				<li><a href="select.php?search=2">Restaurant</a></li>
				<li><a href="select.php?search=3">Attractions</a></li>
					<li>
			<?php 
			if(!isset($_SESSION['userId'])){
				?>
			<a href="../member/login.php?num=<?= $num ?>">LOGIN</a>
			<?php		
			}
			else{
				?>
			<a href="mypage.php">My Page</a>	
			<?php
			
			}
				?>
			</li>
		
					</ul>
				</li>
			</ul>
			</div>
		</div>
		<div class="hMain">
			<ul>
				<li class="col-fit col-4 section sec1">       <div class="overlap">
                   <a  href="select.php" class="mainTxt">
                       <p class="txtTop2">America</p></a>
                    <div class="txtMap">
                        <div class="location"></div>
                        <a href="map0.html">Oakland Bay Bridge, <br> san Francisco, CA, America</a>
                    </div>
                </div>
                </li>
				<li class="col-fit col-4 section sec2">
				<div class="overlap">
				<div class="mainTxt">
					<a  href="select.php" class="txtTop2">Europe</a></div>
                    <div class="txtMap">
                        <div class="location"></div>
                        <a href="map1.html">Champ de Mars, <br> 5 Avenue Anatole France, 75007 Paris </a>
					</div>
					</div>
				</li>
				<li class="col-fit col-4 section sec3">
					<div class="overlap">
					<div class="mainTxt">
                        <a  href="select.php" class="txtTop2">Asia</a></div>
                    <div class="txtMap">
                        <div class="location"></div>
                        <a href="map2.html">Indo-282001 Uthar Prasl- aagrata <br> ganands Forest Colonia</a>
                        </div>
					</div>
				</li>
			</ul>
		</div>
	</div>
</body>
<script>
    var section=$('.section');
    var overlap=$('.overlap');
    section.on('mouseover',function(){
        var idx=$(this).index();
        overlap.eq(idx).css({
            display: 'block'
        });
        $(this).css({
            backgroundSize: '150%'
        });
    })
    section.on('mouseout',function(){
        var idx=$(this).index();
         overlap.eq(idx).css({
            display: 'none'
        });
        $(this).css({
            backgroundSize: 'cover'
        });
    })
	
	var subLi=$('li.sub>img');
	var submenu=$('ul.submenu');
	subLi.on('click', function(){
		submenu.animate({
			height: "toggle"
		},1000);
	})
</script>
</html>