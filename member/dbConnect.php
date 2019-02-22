<?php

$hostName='localhost';
$dbId='root';
$dbPw='1111';
$dbName='project';

$conn=new mysqli($hostName,$dbId,$dbPw,$dbName);

$conn->query("SET NAMES UTF8");

if($conn->connect_error){
	die("연결실패");
}
?>