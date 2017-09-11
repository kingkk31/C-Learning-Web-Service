<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8" />
		<title>join</title>
		<script src = "http://code.jquery.com/jquery-1.11.0.min.js"></script>
		<link rel="stylesheet" href="style.css"/>

		<?php include ("./main_menu.php");?>
		<style>
			img{
				width:100px;
			}
			nav {
				margin-top: 8%;
			}
			section {
				width: 1000px;
				margin-top: 7%;
				margin-left: 9%;
				margin-right: auto;
				position: relative;
				z-index: 100;
				margin-bottom:15%;
			}
			.leftBt {
				border: 1px solid #999999;
				width: 150px;
				height: 30px;
				margin-left:-300px;
				margin-right: -6px;
			}
			.rightBt {
				border: 1px solid #999999;
				width: 150px;
				height: 30px;
				margin-left: -6px;
			}
			.joinForm{
				border: 1px solid #999999;
				width:700px;
				height:550px;
			}
			.joinForm .box {
				width: 326px;
				padding-top: 40px;
			}
			.joinForm .box .textbox {
				width: 250px;
				padding: 3px 0px;
				border: 1px solid #e1e1e1;
			}
		</style>

		<script>
			function check() {
				if (!document.join_form.id.value) {
					alert("아이디를 입력하세요");
					document.join_form.id.focus();
					return false;
				}
				if (!document.join_form.pw.value) {
					alert("비밀번호를 입력하세요");
					document.join_form.pw.focus();
					return false;
				}
				if (document.join_form.pw.value != document.join_form.pw2.value) {
					alert("비밀번호가 일치하지 않습니다");
					document.pw2.focus();
					return false;
				}
			}
		</script>

	</head>
	<section>
		<center>	
			<div class="joinForm">
				<br/><br/>
				<img src="coding.png"/>
				<br/><h2>회원가입</h2>
				<form onsubmit="return check()" name="join_form" method="post" action="join2.php">
					<div class="box">
					<table border="0" width="500" cellspacing="1" cellpadding="4" >
						<tr>
							<td>아이디</td>
							<td>
							<input type="text" class="textbox" size="35" maxlength="16" name="id" placeholder="7~16자의 영문, 숫자를 혼용하세요" autofocus required pattern="[A-Za-z0-9][A-Za-z0-9]{7,15}" style="height:30px;">
							</td>
						</tr>

						<tr>
							<td>비밀번호</td>
							<td>
							<input type="password" class="textbox" size="35" maxlength="15" name="pw" placeholder="7~16자의 영문, 숫자를 혼용하세요" autofocus required pattern="[A-Za-z0-9][A-Za-z0-9]{7,15}" style="height:30px;">
							</td>
						</tr>
						<tr>
							<td>비밀번호확인</td>
							<td>
							<input type="password" class="textbox" size="35" maxlength="15" name="pw2" placeholder="7~16자의 영문, 숫자를 혼용하세요" autofocus required pattern="[A-Za-z0-9][A-Za-z0-9]{7,15}" style="height:30px;">
							</td>
						</tr>
						<tr>
							<td>이름</td>
							<td>
							<input type="text" class="textbox" size="35" maxlength="15" name="name" required style="height:30px;">
							</td>
						</tr>
					</div>
					</table>
					<br/>
					<br/>
					<table border="0" width="640">
						<tr>
							<td align="center">
							<input type="submit" class="leftBt" value="확인" style="width:150px; height:30px; border-color:black; background:white">
							<input type="reset" value="다시작성" class="rightBt" style="width:150px; height:30px; border-color:black; background:white">
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
			권태희&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;김지영&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(주)한신대학교 정보통신학교
			<br/>
			Kwon TaeHee&nbsp;&nbsp;Kim Jiyeong&nbsp;&nbsp;&nbsp;&nbsp;Hanshin University
		</div>
	</footer>
	</body>
</html>
