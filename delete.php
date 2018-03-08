<?php
$id=$_REQUEST["id"];

require_once("mydb.php");
$pdo=db_connect();

try{
	$pdo->beginTransaction();
	$sql="delete from member where id=?";
	$stmh=$pdo->prepare($sql);
	$stmh->bindValue(1, $id,PDO::PARAM_STR);

	$stmh->execute();
	$pdo->commit();
	header("Location:http://ec2-52-78-54-133.ap-northeast-2.compute.amazonaws.com/login/list.php");
} catch (PDOException $Exception) {
	$pdo->rollBack();
	print "오류 :".$Exception->getMessage();
}
?>