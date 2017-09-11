<meta charset="UTF-8">
<?php 
	include "./crypt.php";

	$conn = mysqli_connect("localhost","root","kkiinngg31") ; 
	$dbname="temp";

	mysqli_select_db($conn,$dbname); //데이터베이스 연결
	mysqli_set_charset($conn, "utf8");


	if(mysqli_connect_errno()){ //연결실패시
	   echo "MySQL로의 연결에 실패했습니다.:".mysqli_connect_error();
	}

	$sql="select * from user where ID='{$_POST['id']}'"; 

	//입력받은 id값과 pw값이  데이터베이스에 있는지 찾은 후 있다면, 그 row의 값을 다 가져옴.​

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result); //해당 row의 값을 다 가지고 있다.	 

	if(!empty($row) && ($_POST['pw'] == aes_decrypt($row['password'], "encoding"))){ //row가 비어있지 않다면, 가져온 정보가 데이터베이스에 있다는 것
		
		//session_register('session_name');
		$_SESSION['name']=$row['name'];
		$_SESSION['id']=$row['ID'];

		echo "<script>alert('$_SESSION[name]님 로그인 되었습니다.');</script>"; //알람창을 띄운 뒤 다음 화면으로 넘어간다.
		echo "<script>window.location.replace(\"/home.php\");</script>";
	}
	else 
	{
	   echo "<script>alert('아이디와 비밀번호를 확인해 주세요.'); location.href=('/login.php');</script>"; //정보가 없다면, 다시 로그인화면으로 돌아간다.
	}
	mysqli_close($conn);
?>
