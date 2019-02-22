<?php
session_start();
$num=2;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tourhere</title>
    <link rel="stylesheet" href="../css/grid.css">
    <link rel="stylesheet" href="../css/select.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
     <script>
		 window.onload=function(){			
			  <?php
		if(isset($_GET['search'])){
			 ?>
		 showHint("<?= $_GET['search'] ?>");
		 <?php
		 }else{
			 ?>
		 showHint("*");	 
			 <?php
		}
			?>
		 }
		 
		 function showHint(key){			
			 if(key=="1"){
				 var form_data={key:"accomodation"};
			 }else if(key=="2"){
				 form_data={key:"restaurant"};
			 }else if(key=="3"){
				 form_data={key:"landmark"};
			 }else{
				 var form_data={key: $("#key").val()};
			 }
			 $.ajax({
				 type: "GET",
				 url: "selectOk.php",
				 data: form_data,
				 success: function(response){
					 var inputData=$("#ul");
					 inputData.html(response);
				 },
				 fail: function(){
					 alert('로딩 실패');
				 }
			 })			
		 }
	</script>
</head>
<body>
    <div id="wrap">
        <div class="header">
          <div class="center headerContent">
            <div class="selectMenu">
            <div class="selectMenul">
            <div class="accomodation">
            <img src="../img/accomodation.svg" alt="accomodation" onclick="showHint(1)"></div>
            <div class="Restaurant"><img src="../img/restaurant.svg" alt="restaurant" onclick="showHint(2)"></div>
            <div class="Attractions"><img src="../img/see.svg" alt="see" onclick="showHint(3)"></div>
           </div>
             </div>
              <div class="search">
            <input type="search" name="key" id="key" onkeyup="showHint(this.value)" placeholder="검색">
            </div>
            <div class="loginjoin">
            	<?php
				if(!isset($_SESSION['userId'])){
					?>
					<a href="../member/login.php?num=<?= $num ?>">로그인</a>
			<?php		
			}
			else{
				?>
			<a href="mypage.php">my page</a>	
			<?php
			
			}
				?>
            </div>
            </div>
        </div>
        <div class="selectMain">
            <div class="center selectContent">
            <ul id="ul">
				</ul>
            </div>
        </div>
    </div>
</body>
<script>
   var gallery=$('.gallery'); 
    var gallerArr=[];
    for(var i=0; i<gallery.size(); i++){
        gallerArr.push('url(../img/bg'+i+'.jpg) no-repeat 50%');
        gallery.eq(i).css({
            background: gallerArr[i],
            backgroundSize: 'cover'
        })
    }
</script>
</html>