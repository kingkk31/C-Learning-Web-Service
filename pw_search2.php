<meta charset="UTF-8">
<?php 
	$conn = mysqli_connect("localhost","root","kkiinngg31") ; 
	$dbname="temp";

	mysqli_select_db($conn,$dbname); //데이터베이스에 연결
	mysqli_set_charset($conn, "utf8");

	 $sql ="select * from user where name='{$_POST['name']}' AND ID='{$_POST['id']}'";
	 $result = mysqli_query($conn, $sql);
	 $row = mysqli_fetch_array($result); //가져온 쿼리 결과를 담음
	 if(!empty($row)){
		$pw = base64_decode($row['password']);
		$pw = shell_exec("sudo ./simpleDES decrypt ".$pw);
	  	echo "<script>alert('회원님의 비밀번호는 ".$pw."입니다. 로그인해주세요'); location.href='login.php';</script>";
	 }
	 else{
	  echo "<script>alert('비밀번호 찾기 실패. 다시 입력해주세요'); location.href='pw_search.php';</script>";
	 }

	mysqli_close($conn);
?>
