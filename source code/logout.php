
<?php
	session_start();
	if(session_destroy()) // destroy the session
	{
		header("Location: login.php");
	}

/*
 2. 모든 세션값을 빈값으로 
$_SESSION[user_idx] = "";
$_SESSION[user_id] = "";
$_SESSION[user_name] = "";


 session_start( ); // $_SESSION 를 사용할수있게 해줌 

 session_destroy( ); // $_SESSION 을 지움 
 echo"<h1>";
 echo"로그아웃되었습니다~~";
 echo"<meta http-equiv='Refresh' content='3;URL=Login_Check.php'>";

*/
?>