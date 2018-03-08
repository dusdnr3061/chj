<?php
session_start();

$userid = $_REQUEST["userid"];
$pw = $_REQUEST["pw"];

require_once("mydb.php");
$pdo=db_connect();

try{
	$sql="select pw from member where id=?";
	$stmh=$pdo->prepare($sql);
	$stmh->bindValue(1, $userid);
	$stmh->execute();

	$count=$stmh->rowCount();
} catch (PDOException $Exception) {
			print "오류 :".$Exception->getMessage();
}

$row=$stmh->fetch(PDO::FETCH_ASSOC);

if($count<1){
?>

<script>alert("ID가 없습니다.");
	history.back();
</script>

<?php
}
else if($pw!=$row["pw"]){
?>

<script>alert("PASSWORD가 다릅니다.");
	history.back();
</script>

<?php
}
else {



	$_SESSION["userid"]=$userid;
	header("Location:http://ec2-52-78-54-133.ap-northeast-2.compute.amazonaws.com/index.php");
	exit;
}
?>