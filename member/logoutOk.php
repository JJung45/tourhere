<?php
    header("Content-Type:text/html;charset=UTF-8");
?>
<?php

session_start();
session_destroy();

echo "
<script>
	alert('로그아웃 완료!');
	location.href='../contents/main.php';
</script>";
exit;


?>