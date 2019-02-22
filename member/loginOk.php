<?php
    header("Content-Type:text/html;charset=UTF-8");
?>
<?php
include "dbConnect.php";

$userId=$_POST['userId'];
$userPw=$_POST['userPw'];

if(!isset($userId) || !isset($userPw)){
    echo 
    "<script>
        alert('로그인 오류!');
        location.href='login.php';
    </script>";
    exit;
}

if($userId==null || $userId==""){
    echo "
    <script>
        alert('아이디를 입력하세요!');
        history.go(-1);
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

session_start();

$query="select * from project where userId='$userId' and userPw='$userPw'";
$result=$conn->query($query);

if($result->num_rows==0){
    echo "
    <script>
        alert('존재하지 않는 아이디입니다');
        history.go(-1);
    </script>";
    exit;
}
else{
$_SESSION['userId']=$userId;
echo "
<script>
    alert('".$userId."님! 환영합니다~');
	history.go(-2);
	</script>";
exit;
}
$conn->close();
?>