<?php
$id=$_POST["userid"];
$authority=$_POST["authority"];

require_once("mydb.php");
$pdo=db_connect();

try{
	$pdo->beginTransaction();
	$sql="update member set authority=? where id=?";
	$stmh=$pdo->prepare($sql);
	$stmh->bindValue(1, $authority,PDO::PARAM_STR);
	$stmh->bindValue(2, $id,PDO::PARAM_STR);

	$stmh->execute();
	$pdo->commit();
	header("Location:http://ec2-52-78-54-133.ap-northeast-2.compute.amazonaws.com/login/list.php");

} catch (PDOException $Exception) {
	$pdo->rollBack();
	print "오류 :".$Exception->getMessage();
}
?>
