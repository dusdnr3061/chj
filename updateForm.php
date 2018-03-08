<?php

$authority=0;

session_start();
include("config.php");

$now = (int)date("Ymd");

$userid=$_SESSION['userid'];
$_SESSION['ID']=$userid;

$result = mysqli_query($con,"select * from member where id='$userid'");

while($row = mysqli_fetch_array($result)){

  $authority = $row[authority];
  $name = $row[name];

}

$schedule_id = $_SERVER['QUERY_STRING'];

$month_day=array();
$month_day[1]=31;
$month_day[2]=28;
$month_day[3]=31;
$month_day[4]=30;
$month_day[5]=31;
$month_day[6]=30;
$month_day[7]=31;
$month_day[8]=31;
$month_day[9]=30;
$month_day[10]=31;
$month_day[11]=30;
$month_day[12]=31;

$result = mysqli_query($con,"select * from schedule where id=$schedule_id");
while($row=mysqli_fetch_array($result)){

  $title = $row['title'];
  $month = $row['month'];
  $year = $row['year'];
  $day = $row['day'];
  $content = $row['content'];

}

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $input_title = $_POST['title'];
  $input_month = $_POST['month'];
  $input_year = $_POST['year'];
  $input_day = $_POST['day'];
  $input_content = $_POST['content'];

  if ((1>$input_month || $input_month>12) || (1>$input_day || $input_day>$month_day[$input_month])) {
    echo("<script> alert(\"잘못된입력입니다.다시입력하세요.\") </Script>");
  }else{
    mysqli_query($con,"UPDATE schedule SET title='$input_title',year=$input_year,month=$input_month,day=$input_day,content='$input_content' WHERE id=$schedule_id");
    header("Location: ../index.php");
  }
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <title></title>
    <style>
    *{
      font-size: 15px;
    }
    #font_size10{
      font-size: 10px;
    }
    #font_size12{
      font-size: 12px;
    }
    #font_size13{
      font-size: 13px;
    }
    #font_size14{
      font-size: 14px;
    }
    #font_size17{
      font-size: 17px;
    }
    .float_left{
      float: left;
    }
    .float_right{
      margin-top: 3.5px;
      float: right;
    }
    /* 스마트폰 세로 */
    @media only screen and (max-width : 767px) {
      .schedule_1{
        /* NOTE: big box */
        margin: 1.250em;
        width: auto;
        height: 12.500em;
        /* border: 0.063em solid black;
        color: black; */
        min-width: 300px;
      }
      .schedule_2{

        /* NOTE: title box */
        float: left;
        margin: 1.250em;
        width: auto;
        height: 2.188em;
        /* border: 0.063em solid black;
        color: black; */
        min-width: 170px;
      }
      .schedule_3{
        float: right;
        /* NOTE: date box */
        margin-top: 1.5px;
        width: auto;
        height: 2.188em;
        /* border: 0.063em solid black;
        color: black; */
      }
      .schedule_4{
        float: left;
        /* NOTE: box */
        margin: 0em 1.250em 1.250em 1.250em;
        width: auto;
        height: 6.500em;
        /* border: 0.063em solid black;
        color: black; */
        min-width: 170px;
      }
      .schedule_5{
        float: right;
        /* NOTE: add,delete */
        margin: 0px 0px 0px 0px;
        width: auto;
        height: 1.563em;
        /* border: 1px solid black;
        color: black; */
        min-width: 20px;
      }
      .schedule_6{
        float: left;
        /* NOTE: add,delete */
        margin: 0px 0px 0px 0px;
        width: auto;
        /* height: 25px;
        border: 1px solid black;
        color: black; */
        min-width: 20px;
      }
      .schedule_7{
        float: right;
        /* NOTE: add,delete */
        /* width: 65px;
        height: 25px;
        border: 1px solid black;
        color: black; */
      }
      .schedule_8{
        /* NOTE: big box */
        margin-left: 20px;
        width: 18.500em;
        height: auto;
      }
    }

    /* 데스크탑 브라우저 가로 */
    @media only screen and (min-width : 1224px) {
      .schedule_1{
        /* NOTE: big box */
        margin: 20px;
        width: 913px;
        height: 213px;
      }
      .schedule_2{

        /* NOTE: title box */
        float: left;
        margin: 20px;
        width: 630px;
        height: 35px;
        padding: 5.5px;
        /* border: 1px solid black;
        color: black; */
      }
      .schedule_3{
        float: right;
        /* NOTE: date box */
        margin-top: 18px;
        width: 200px;
        height: 35px;
        padding: 7px;
        /* border: 1px solid black;
        color: black; */
      }
      .schedule_4{
        float: left;
        /* NOTE: box */
        margin: 0px 20px 20px 20px;
        width: 630px;
        height: 104px;
        padding: 5.5px;
        /* border: 1px solid black;
        color: black; */
      }
      .schedule_5{
        float: right;
        /* NOTE: add,delete */
        margin: 80px 0px 0px 80px;
        width: 65px;
        height: 25px;
        /* border: 1px solid black;
        color: black; */
      }
      .schedule_6{
        float: left;
        /* NOTE: add,delete */
        margin: 59px 0px 0px 18px;
        width: 65px;
        /* height: 25px;
        border: 1px solid black;
        color: black; */
      }
      .schedule_7{
        float: right;
        /* NOTE: add,delete */
        /* width: 65px;
        height: 25px;
        border: 1px solid black;
        color: black; */
      }
      .schedule_8{
        /* NOTE: big box */
        margin-left: 20px;
        width: 913px;
        height: auto;
      }
    }

    /* 큰 모니터 */
    @media only screen and (min-width : 1824px) {
      .schedule_1{
        /* NOTE: big box */
        margin: 20px;
        width: 913px;
        height: 213px;
        /* border: 1px solid black;
        color: black; */
      }
      .schedule_2{

        /* NOTE: title box */
        float: left;
        margin: 20px;
        width: 630px;
        height: 35px;
        padding: 5.5px;
        /* border: 1px solid black;
        color: black; */
      }
      .schedule_3{
        float: right;
        /* NOTE: date box */
        margin-top: 18px;
        width: 200px;
        height: 35px;
        padding: 7px;
        /* border: 1px solid black;
        color: black; */
      }
      .schedule_4{
        float: left;
        /* NOTE: box */
        margin: 0px 20px 20px 20px;
        width: 630px;
        height: 104px;
        padding: 5.5px;
        /* border: 1px solid black;
        color: black; */
      }
      .schedule_5{
        float: right;
        /* NOTE: add,delete */
        margin: 80px 0px 0px 80px;
        width: 65px;
        height: 25px;
        /* border: 1px solid black;
        color: black; */
      }
      .schedule_6{
        float: left;
        /* NOTE: add,delete */
        margin: 59px 0px 0px 18px;
        width: 65px;
        /* height: 25px;
        border: 1px solid black;
        color: black; */
      }
      .schedule_7{
        float: right;
        /* NOTE: add,delete */
        /* width: 65px;
        height: 25px;
        border: 1px solid black;
        color: black; */
      }
      .schedule_8{
        /* NOTE: big box */
        margin-left: 20px;
        width: 913px;
        height: auto;
      }
    }
    .add_box{
      margin-right: 4px;
    }
    .insert_delete_box{
      padding: 2px;
    }
    .w3-sidebar a {font-family: "Roboto", sans-serif}
    body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}

    .stressNo{
      color: #FF0000;
    }
    </style>
  </head>
  <body class="w3-content w3-theme-l5" style="max-width:1200px">
  <!-- Sidebar/menu -->
  <nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
    <div class="w3-container w3-display-container w3-padding-16">
      <a href="../index.php"><img src="../img/main_logo.png"/></a>
      <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-large w3-padding w3-hover-grey" title="close menu">
        <i class="fa fa-remove"></i>
      </a>
    </div>
    <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
        <?php // NOTE: 회원정보 수정
        if(isset($_SESSION["userid"])){?>
          <a href="../notice/noticemain.php" class="w3-bar-item w3-button">공지사항</a>
          <a href="../resume/resume.php" class="w3-bar-item w3-button" target="_blank">이력서</a>
          <a href="../portfolio/portfolio_form.php" class="w3-bar-item w3-button">포트폴리오</a>
          <a href="../picture/pic_list.php" class="w3-bar-item w3-button">사진관</a>
          <a href="../login/updateForm.php" class="w3-bar-item w3-button">회원정보수정</a>
          <?php
          }?>

      <?php
      if ($authority == 1 || $authority == 2){
          echo "
          <a href=\"../portfolio/download.php\" class=\"w3-bar-item w3-button\">이력서 포트폴리오 다운</a>
        ";
      }
      if ($authority == 2){
          echo "
          <a href=\"../login/list.php\" class=\"w3-bar-item w3-button\">멤버관리</a>";
        }?>
    </div>
  </nav>

  <!-- !PAGE CONTENT! -->
  <div class="w3-main" style="margin-left:250px">
    <!-- Push down content on small screens -->
    <div class="w3-hide-large" style="margin-top:83px"></div>
    <!-- Top header -->
    <header class="w3-container w3-large">
      <!-- <p class="w3-left" style="font-weight:bold">청해진</p> -->
      <h4 class="w3-hide-large w3-center"><a href="../index.php"><img src="../img/main_logo.png"/></a></h4>
      <span class="w3-left w3-button w3-hide-large w3-xlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>

      <p class="w3-right" id="font_size12">
        <?php // NOTE: 우측 위 로그인
        if(!isset($_SESSION["userid"])){
          echo "<a href=\"../login/login_form.php\"><img src=\"../img/main_login.png\">로그인</a>
          <a href=\"../login/insertForm.php\"><img src=\"../img/main_login.png\">회원가입</a>";
        }
        else{
          echo $name."님 환영합니다.
        	<a href=\"../login/logout.php\" id=\"font_size12\">로그아웃</a>";
        }
        ?>
      </p>
    </header>

    <!-- Image header -->
    <div class="w3-display-container w3-container">
      <img src="../img/main_chj.png" alt="" style="width:100%">
    </div>

<!DOCTYPE html>

<?php
	session_start();
	$id = $_SESSION["userid"];

	require_once("mydb.php");
	$pdo=db_connect();
?>

<html>
	<head>
		<meta charset="UTF-8">
		<title>회원정보수정</title>
	</head>

	<body>
	<?php
		try{
			$sql="select * from member where id=?";
			$stmh=$pdo->prepare($sql);
			$stmh->bindValue(1, $id);
			$stmh->execute();

			$count=$stmh->rowCount();

		} catch (PDOException $Exception) {
			print "오류 :".$Exception->getMessage();
		}

		if($count<1)
			print "수정자가 없습니다.<br>";
		else{
			$row=$stmh->fetch(PDO::FETCH_ASSOC);
	?>
	<center>
		<form method="get" action="updatePro.php">
			<tr><td><b>정보수정</b></td></tr>
			<table border="1">
				<tr>
					<td><b>아이디</b></td>
					<td><?=$row['id']?></td>
				</tr>

				<tr>
					<td><b>비밀번호</b></td>
					<td><input type="text" name="pw" size="20" value="<?=$row['pw']?>" required></td>
				</tr>

				<tr>
					<td><b>이름</b></td>
					<td><input type="text" name="name" size="20" value="<?=$row['name']?>" required></td>
				</tr>

				<tr>
					<td><b>학과</b></td>
					<td><input type="text" name="dept_id" size="20" value="<?=$row['dept_id']?>" required></td>
				</tr>

				<tr>
					<td><b>학번</b></td>
					<td><input type="text" name="std_id" size="20" value="<?=$row['std_id']?>" required></td>
				</tr>

				<tr>
					<td><b>전화번호</b></td>
					<td><input type="text" name="phone" size="20" value="<?=$row['phone']?>" required></td>
				</tr>

				<tr>
					<td><b>이메일</b></td>
					<td><input type="text" name="email" size="20" value="<?=$row['email']?>" required></td>
				</tr>

				<tr>
					<td><b>청해진 기수</b></td>
					<td><input type="text" name="period" size="20" value="<?=$row['period']?>" required></td>
				</tr>

				<tr>
					<td colspan="2" align="center"><input type="submit" value="수정하기">
					</td>
				</tr>
			</table>
			<input type="hidden" name="id" value="<?=$id?>">
		</form>
		</center>
		<?php
		}
		?>
	</body>
</html>
