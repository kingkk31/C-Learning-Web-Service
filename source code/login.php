<?php
	include("/session.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>login</title>
		<script src = "http://code.jquery.com/jquery-1.11.0.min.js"></script>
		<!--link rel="stylesheet" href="style.css"/-->

		<?php include ("./main_menu.php"); ?>
		<style>
			nav {
				margin-top: 8%;
			}
			section {
				width: 1000px;
				height:280px;
				margin-top: 5%;
				margin-left: 10%;
				margin-right: auto;
				position: relative;
				z-index: 100;
			}
			.loginForm {
				position: relative;
				width: 700px;
				height: 200px;
				border: 1px solid #999999;
			}
			.loginForm .box {
				width: 326px;
				padding-top: 40px;
			}
			.loginForm .box .iText {
				width: 250px;
				margin: 3px 0;
				padding: 10px 0px;
				border: 1px solid #e1e1e1;
			}
			.loginForm .box p {
				margin-top: 1em
			}
			.loginForm .box p span, .loginForm .box p input {
				height: 18px;
				font-size: 11px;
				color: #737373;
				line-height: 18px;
				vertical-align: middle;
			}
			.loginForm .loginBtn {
				display: block;
				position: absolute;
				top: 0;
				right: 0;
				width: 80px;
				height: 85px;
				padding: 10px;
				border-radius: 5px;
				font-size: 14px;
				font-weight: 700;
				color: #fff;
				line-height: 60px;
				text-align: center;
				text-shadow: 1px 1px 1px #004773;
				background: #333;
				margin-right: 90px;
				margin-top: 45px;
			}
			.login_img {
				float: left;
				width: 150px;
				padding-top: 55px;
				padding-left: 60px;
			}
		</style>
	</head>
	<body>
		<section>
			<center>

				<div class="loginForm" >
					<form method="post" name="login_form" action="login2.php">
						<img src="login2.png" class="login_img"/>
						<div class="box">
							<input type="text" name="id" class="iText" autofocus required placeholder="아이디를 입력하세요.">
							<br>
							<input type="password" name="pw" class="iText" required placeholder="비밀번호를 입력하세요.">
							<br>
							<p>
								<span class="fright"><a href="javascript:location.href='join.php'">회원가입</a>
								&nbsp;&nbsp;|&nbsp;&nbsp; 
								<a href="javascript:location.href='id_search.php'">아이디 찾기</a>
								&nbsp;&nbsp;|&nbsp;&nbsp; 
								<a href="javascript:location.href='pw_search.php'">비밀번호 찾기</a></span>
							</p>
						</div>
						<input type="submit" value="로그인" class="loginBtn">
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
				권태희&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;김지영&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(주)한신대학교 정보통신학교
				<br/>
				Kwon TaeHee&nbsp;&nbsp;Kim Jiyeong&nbsp;&nbsp;&nbsp;&nbsp;Hanshin University
			</div>
		</footer>
	</body>
</html>
