<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>논문</title>
		<script src = "http://code.jquery.com/jquery-1.11.0.min.js"></script>
		<link rel="stylesheet" href="style.css"/>
		<style>
			#logo img{
				margin-top:-15px;
				width:50px;
			}
			#logo span{
				color: white;
				font-size:25px;
			}
			.user2 ul {
				background-color: black;
				color: white;
				width: 1200px;
				height: 40px;
				list-style-type: none;
				padding-top: 25px;
				opacity:0.7;
			}
			.user2 ul #logo {
				float: left;
			}
			.user2 ul li {
				float: right;
				margin: 0 12px 0 0;
			}
		</style>
	</head>

	<body>
		<?php if($_SESSION['id']==null){?>
		<div class="user2">
			<ul>
				<li id="logo">
					<img src="/run-dog2.png" style="width:50px"/>
					<span>C Language</span>
				</li>
				<li><a class="topLink" href="/join.php">회원가입</a></li>
				<li><a>｜</a></li>
				<li><a class="topLink" href="/login.php">로그인</a></li>
				<li><a>｜</a></li>
				<li><a class="topLink" href="/home.php">홈으로</a></li>
			</ul>
		</div>
		<?php }else {?>
		<div class="user2">
			<ul>
				<li id="logo">
					<img src="/run-dog2.png" style="width:50px"/>
					<span>C Language</span>
				</li>
				<li><a class="topLink" href="/logout.php">로그아웃</a></li>
				<li><a>｜</a></li>
				<li><a class="topLink" href="/home.php">홈으로</a></li>
				<li><a>｜</a></li>
				<li><?php echo $_SESSION['name']." 회원님"; ?></li>
			</ul>
		</div>
		<?php }?>
	</body>
</html>
