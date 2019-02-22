<?php
$num=$_GET['num'];
include "../member/dbConnect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>view</title>
	<link rel="stylesheet" href="../css/grid.css">
	<link rel="stylesheet" href="../css/posting.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div id="wrap">
		<div class="center contents">
			<a href="select.php" class="arrow"><img src="../img/mybackarrow.png" alt="back"></a>
			<?php
$query="select * from image_content where num='$num'";
$result=$conn->query($query);

	if($result->num_rows!=0){
    while($row=$result->fetch_assoc()){
		
		$image=explode(",",$row['userimage']);
		$cnt=count($image);
		
		?>
			<div class="center gall viewgall">
			<?php
			for($i=0; $i<$cnt; $i++){
				?>
				<img src="<?=$image[$i]?>" alt="" width="150px" height="150px" class="galllview">
			<?php } ?>
			</div>
			<div class="popUp">
				<div class="popupContents"></div>
			</div>
			
			<div class="center userTxts">
			<textarea name="" id="userTxt" cols="30" rows="10" disabled><?= $row['userTxt'] ?></textarea>
			</div>
			<?php
	}
	}
			?>
	</div>
	</div>
</body>
<?php
	echo "
<script>
	var arrImg=[];
	var lightBoxLi=$('.gall img');
	";
	for($i=0; $i<$cnt; $i++){
				
echo"arrImg.push('url(".$image[$i].") no-repeat 50%');
		lightBoxLi.eq(".$i.").css({
		background: arrImg[".$i."],
		backgroundSize: 'cover'
		});";
	}
	echo "
	lightBoxLi.on('click',function(e){
		var thisBg=$(this).css('background');
		$('.popUp').fadeIn();
		$('.popupContents').css({
		background:thisBg
		});
	})
	
	$('.popupContents').on('click',function(){
		$('.popUp').fadeOut();
	})
</script>";exit;	
	?>
</html>
