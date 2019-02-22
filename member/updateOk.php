<?php
    header("Content-Type:text/html;charset=UTF-8");
?>
<?php
include "dbConnect.php";

session_start();
$userId=$_SESSION['userId'];
$userPw=$_POST['userPw'];
$userEmail=$_POST['userEmail'];

if(!isset($userPw) || !isset($userEmail)){
    echo 
    "<script>
        alert('업데이트 오류!');
        location.href='update.php';
    </script>";
    exit;
}
if($userPw==null || $userPw==""){
    echo "
    <script>
        alert('비밀번호를 입력하세요!');
        history.go(-1);
    </script>";
    exit;
}
if($userEmail==null || $userEmail==""){
    echo "
    <script>
        alert('이메일을 입력하세요!');
        history.go(-1);
    </script>";
    exit;
}

$query="update project set userPw='$userPw',userEmail='$userEmail' where userId='$userId'";

$result=$conn->query($query);

if($result==false){
    echo "
    <script>
        alert('오류로 인해 수정이 안됐어요!');
        loctaion.href='update.php';
    </script>";
    exit;
}

echo "
<script>
    alert('정상적으로 수정되었습니다~');
    location.href='../contents/mypage.php';
</script>";
exit;
$conn->close();
?>