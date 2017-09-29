<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>논문</title>
		<script src = "http://code.jquery.com/jquery-1.11.0.min.js"></script>
		<link rel="stylesheet" href="style.css"/>
		<style>
			header{
				height:100px;
			}
		</style>
	</head>

	<body>
		<?php if($_SESSION['id']==null){?>
		<div class="user">
			<ul>
				<li><a class="topLink" href="/join.php">회원가입</a></li>
				<li><a>｜</a></li>
				<li><a class="topLink" href="/login.php">로그인</a></li>
				<li><a>｜</a></li>
				<li><a class="topLink" href="/home.php">홈으로</a></li>
			</ul>
		</div>
		<?php }else {?>
		<div class="user">
			<ul>
				<li><a class="topLink" href="/logout.php">로그아웃</a></li>
				<li><a>｜</a></li>
				<li><a class="topLink" href="/home.php">홈으로</a></li>
				<li><a>｜</a></li>
				<li><?php echo $_SESSION['name']." 회원님"; ?></li>
			</ul>
		</div>
		<?php }?>
		<header>
			<div>
				<img src="/logo.png" style="width:50px"/>
				<span>C Language</span>
			</div>
		</header>		
		
	</body>
</html>
