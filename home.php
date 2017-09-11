<?php
	include("/session.php");
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>home</title>
		<script src = "http://code.jquery.com/jquery-1.11.0.min.js"></script>
		<link rel="stylesheet" href="style.css"/>

		<style>
			.sec {
				width: 1000px;
				margin-top: 50px;
				margin-left: 12%;
				margin-right: auto;
				position: relative;
				z-index: 100;
			}
			.sec li {
				list-style: none;
			}
			.main_img {
				width: 100px;
			}
			.sec div{
				width: 300px;
				height: 250px;
				color: black;
				float: left;
				background-color: #E6E6E6;
				margin: 0 5px 5px 0;
				text-align: center;
				padding: 35px 0px 0px 10px;
				-webkit-transition: .4s;
			}

			#box1:hover {
				-webkit-transform: scale(1.2);
				-webkit-transition: .4s;
				background: #ffa7a7;
				color: black;
			}
			#box2:hover{
				-webkit-transform: scale(1.2);
				-webkit-transition:.4s;
				background:#86e57f;
				color:black;
			}
			#box3:hover{
				-webkit-transform:scale(1.2);
				-webkit-transition:.4s;
				background:#b2ccff;
				color:black;
			}

		</style>
		<?php include("./main.php"); ?>
	</head>
	<body id="all">

		<section class="sec">
			<li>
				<a href="./learn/tab.php">
				<div id="box1">
					<img src="이론.png" class="main_img"/>
					<h2><span>이론</span></h2>
					<p>
						이론부터 차근차근 배워가기!
						<br/>
						이론을 배워가며 실습까지 한번에!
					</p>
				</div> </a>
			</li>
			<li>
				<a href="./problem/notice.php">
				<div id="box2">
					<img src="문제풀기 (2).png" class="main_img"/>
					<h2><span>문제 풀기</span></h2>
					<p>
						매일매일 이론에서 배운 문제를 하나씩!
						<br/>
						C언어 문제풀기~
					</p>
				</div></a>
			</li>
			<li>
				<a href="./myPage/myPage.php">
				<div id="box3">
					<img src="추천 (1).png" class="main_img"/>
					<h2><span>내 문제 관리</span></h2>
					<p>
						그동안 풀었던 문제들 모두~
						<br/>
						추천 이론 및 문제까지!
					</p>
				</div></a>
			</li>
		</section>
    <footer>
        <div class="footer_logo">
		<img src="logo.png" style="width:60px"/>
        	<div>C Language</div>
        </div>
        <div class="footer_comments" style="text-align:left">
            권태희&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;김지영&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(주)한신대학교 정보통신학교<br/>
Kwon TaeHee&nbsp;&nbsp;Kim Jiyeong&nbsp;&nbsp;&nbsp;&nbsp;Hanshin University
        </div>
    </footer>
	</body>
</html>
