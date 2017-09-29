<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" />
    <title>아이디 찾기</title>
    <script src = "http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<link rel="stylesheet" href="style.css"/>
	<?php include ("./main_menu.php");?>
	<style>
		section .login_div {
			margin-top: 80px;
			margin-bottom: 170px;
		}
		nav {
			margin-top: 8%;
		}
		section {
			width: 1000px;
			margin-left: 10%;
			margin-right: auto;
			margin-bottom: 15%;
			margin-top: 1%;
			position: static;
			z-index: 100;
		}
		img {
			width: 100px;
		}
		.id {
			border: 1px solid #999999;
		}
		.pw {
			margin-top: -2px;
			border: 1px solid #999999;
		}
		.leftBt {
			border: 1px solid #999999;
			width: 150px;
			height: 30px;
			margin-right: -6px;
		}
		.rightBt {
			border: 1px solid #999999;
			width: 150px;
			height: 30px;
			margin-left: -6px;
		}
		.login_div {
			border: 1px outset #999999;
			width: 500px;
			height: 450px;
		}
	</style>
</head>
<body>

    <section>
        <center>
			<div class="login_div">
				<br/><br/>
				<img src="find-user.png"/>
				<h2>아이디찾기</h2> 
				<form name="id_form" action="id_search2.php" method="post">
					<table border="0" cellspacing="0"  height="200" width="500">
					<tr>
						<td  style="text-align:center">
							<input type="text" name="name" class="id" autofocus required placeholder="이름" style="text-align:center; width:300px; height:40px;">
							<input type="password" name="pw" class="pw" required placeholder="비밀번호" style="text-align:center; width:300px; height:40px;">
						</td>
					</tr>
					
					<tr>
						<td height="50" style="text-align:center">
							<input type="submit"  class="leftBt" value="확인">
							<input type="button" onclick="javascript:location.href='login.php'" class="rightBt" value=" 취소 ">						
						</td>						
					</tr>
					</table>
				</form>
			</div>
        </center>
    </section>
    <footer>
        <div class="footer_logo">
		<img src="logo.png" style="width:60px; padding-left:40px"/>
		<div>C Language</div>
        </div>
        <div class="footer_comments">
            권태희&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;김지영&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(주)한신대학교 정보통신학교<br/>
Kwon TaeHee&nbsp;&nbsp;Kim Jiyeong&nbsp;&nbsp;&nbsp;&nbsp;Hanshin University
        </div>
    </footer>
</body>
</html>
