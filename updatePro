<?php
//session_start();
//$userid=$_SESSION['userid'];

$id=$_REQUEST["id"];
$pw=$_REQUEST["pw"];
$name=$_REQUEST["name"];
$dept_id=$_REQUEST["dept_id"];
$std_id=$_REQUEST["std_id"];
$phone=$_REQUEST["phone"];
$email=$_REQUEST["email"];
$period=$_REQUEST["period"];

require_once("mydb.php");
$pdo=db_connect();

try{
	$pdo->beginTransaction();
	$sql="update member set pw=?, name=?, dept_id=?, std_id=?, phone=?, email=?, period=? where id=?";
	$stmh=$pdo->prepare($sql);
	$stmh->bindValue(1, $pw,PDO::PARAM_STR);
	$stmh->bindValue(2, $name,PDO::PARAM_STR);
	$stmh->bindValue(3, $dept_id,PDO::PARAM_STR);
	$stmh->bindValue(4, $std_id,PDO::PARAM_STR);
	$stmh->bindValue(5, $phone,PDO::PARAM_STR);
	$stmh->bindValue(6, $email,PDO::PARAM_STR);
	$stmh->bindValue(7, $period,PDO::PARAM_STR);
	$stmh->bindValue(8, $id,PDO::PARAM_STR);

	$pw_len = mb_strlen($pw, 'utf-8');
	if ($pw_len > 20 || $pw_len < 8) {
	?>
	<script>alert("비밀번호는 8~20자리입니다.");
		history.back();
	</script>
	<?php
	}
	else
	{
	$std_id_len = mb_strlen($std_id, 'utf-8');
	if ($std_id_len > 10) {
	?>
	<script>alert("학번은 10자리까지입니다.");
		history.back();
	</script>
	<?php
	}

	else if(preg_match("/-/", $phone)){
	?>
	<script>alert("'-'를 입력하지마세요.");
		history.back();
	</script>
	<?php
	}

	else{

	$stmh->execute();
	$pdo->commit();
	header("Location:http://ec2-52-78-54-133.ap-northeast-2.compute.amazonaws.com/index.php");
	}
}

} catch (PDOException $Exception) {
	$pdo->rollBack();
	print "오류 :".$Exception->getMessage();
}
?>
