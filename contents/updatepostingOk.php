<?php
@session_start();
$userId=$_SESSION['userId'];
$userTxt=$_POST['userTxt'];
$num=$_POST['num'];
include "../member/dbConnect.php";

$imageKind=array('image/pjeg','image/jpeg','image/jpg','image/png','image/x-png');
$dir="./imgs/";

for($i=0; $i<$_POST['image_count']; $i++){
	$image_id="image_".$i;
	$image_file=time().$i.".jpg";
	
	if(isset($_FILES[$image_id]) && !$_FILES[$image_id]['error']){
		if(in_array($_FILES[$image_id]['type'], $imageKind)){
			if(move_uploaded_file($_FILES[$image_id]['tmp_name'],$dir.$image_file)){			
				$image=$dir.$image_file;
				$imageArr[$i]=$image;

			}else{
				echo "
				업로드 실패!";
			}
		}
		else{
				echo "
				타입이 맞지 않아요!";
			}
	}
}
$imageStr=implode(',',$imageArr);
$query="update image_content set userimage='$imageStr',userTxt='$userTxt' where num='$num'";
$result=$conn->query($query);
if($result!=0){
	echo "수정성공";
}
else{
	echo "수정실패";
}
exit;$conn->close();	?>