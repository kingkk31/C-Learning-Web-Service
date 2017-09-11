<?php
	include "./crypt.php";

	$con = mysqli_connect("localhost", "root", "kkiinngg31");
	$dbname = "temp";
	mysqli_select_db($con, $dbname);
	mysqli_set_charset($con, "utf8");

	//보안을 위해서 특수 문자 제거
	$id=mysqli_real_escape_string($con, $_POST['id']);
	$name=mysqli_real_escape_string($con, $_POST['name']);
	$pw=mysqli_real_escape_string($con, $_POST['pw']);

	/*if(!mysqli_query($con, $sql)){
		die('Error:'.mysqli_error($con));
	}*/
	$query = "select * from user where ID='$id'";
	$result = mysqli_query($con, $query);
	$rows = mysqli_fetch_array($result);
	if(!$rows){

		$encrypt = aes_encrypt($pw, "encoding");

		$query = "insert into user(ID,password,name) values('$id','$encrypt','$name')";
		mysqli_query($con, $query);
?>
		<script>
			alert("회원가입을 축하합니다. 로그인 후 이용해주세요");
			location.replace("login.php");
		</script>
<?php
	}
	else {
?>
		<script> 
			alert("이미 존재하는 아이디입니다.");
			history.back();
		</script>
<?php
	}
	mysqli_close($con);//db연결끊기
?>
