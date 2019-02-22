<?php
    header("Content-Type:text/html;charset=UTF-8");
?>
<?php
include "dbConnect.php";

$userName=$_POST['userName'];
$userId=$_POST['userId'];
$userPw=$_POST['userPw'];
$userEmail=$_POST['userEmail'];

if(!isset($userId) || !isset($userPw) || !isset($userName) || !isset($userEmail)){
    echo 
    "<script>
        alert('회원가입 오류!');
        location.href='join.php';
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
if($userName==null || $userName==""){
    echo "
    <script>
        alert('이름을 입력하세요!');
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

$query="insert into project(userName,userId,userPw,userEmail) values('$userName','$userId','$userPw','$userEmail')";

$result=$conn->query($query);
if($result==false){
    echo "
    <script>
        alert('가입실패!');
        loctaion.href='join.php';
    </script>";
    exit;
}

echo "
<script>
    alert('".$userId."님! 가입을 환영합니다~');
    location.href='../contents/main.php';
</script>";
exit;
$conn->close();
?>