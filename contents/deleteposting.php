<?php

$num=$_GET['num'];

include "../member/dbConnect.php";

$query="delete from image_content where num='$num'";

$result=$conn->query($query);

if($result==false){
	echo "
	<script>
	alert('삭제 오류');
	</script>";
}
else{
echo "
<script>
alert('삭제 완료');
location.href='mypage.php';
</script>";
}
exit;

?>