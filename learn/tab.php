<?php
	$page=$_GET['page'];
	$sub=$_GET['sub'];
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<script src="https://code.jquery.com/jquery-1.10.2.js?ver=1"></script>
		<link rel="stylesheet" type="text/css" href="../style.css">
		<title>이론</title>
		<style>
			section {
				float: right;
				padding-bottom:10px;
			}
			ul{ list-style:nne;}
			img{border:0 none; vertical-align:top;}
			a{text-decoration:none; color:#555;}
			a:hover{text-decoration:underline;}
			#treeMenu{margin:30px 0 0 30px;}
			#treeMenu li{line-height:18px; padding:0px 0px 10px 0px; position:relative; font-size:13px; background-image:url('./bg_tree.gif') no-repeat 4px top;}
			#treeMenu li.end{background-image:url('./bg_treeEnd.gif') no-repeat 4px 0;}
			#treeMenu li button{ width:9px; height:9px; border:0 none; display:block; position:absolue; left:0; top:3px; overflow:hidden; text-indent:-9999em; }
			#treeMenu li button.open{ background-image:url('./treeOpen.gif') no-repeat 0 0;}
			#treeMenu li button.close{ background-image:url('./treeClose.gif') no-repeat 0 0;}
		</style>
		<?php include("../main.php"); ?>
	</head>
	<body>
		<aside>
			<ul id="treeMenu">
				<li class="menu">
					<a href="#submenu1" class="open">1. C언어의 기본사항</a>
					<ul id="subMenu1">
						<li>
							<a href="?page=1&sub=1">1-1 프로그램의 기본 틀</a>
						</li>
						<li>
							<a href="?page=1&sub=2&add=1">1-2 printf 함수</a>
						</li>
						<li>
							<a href="?page=1&sub=3">1-3 변수</a>
						</li>
						<li>
							<a href="?page=1&sub=4&add=1">1-4 scanf 함수</a>
						</li>
						<li>
							<a href="?page=1&sub=5">1-5 주석의 특성과 의미</a>
						</li>
					</ul>
				</li>
				<li class="menu">
					<a href="#submenu1" class="open">2. 자료형</a>
					<ul id="subMenu1">
						<li>
							<a href="?page=2&sub=1">2-1 변수</a>
						</li>
						<li>
							<a href="?page=2&sub=2">2-2 자료형</a>
						</li>
					</ul>
				</li>
				<li class="menu">
					<a href="#submenu1" class="open">3. 연산자</a>
					<ul id="subMenu1">
						<li>
							<a href="?page=3&sub=1&add=1">3-1 이항연산자</a>
						</li>
						<li>
							<a href="?page=3&sub=2">3-2 관계연산자</a>
						</li>
						<li>
							<a href="?page=3&sub=3">3-3 논리연산자</a>
						</li>
					</ul>
				</li>
				<li class="menu">
					<a href="#submenu1" class="open">4. 분기와 비교문</a>
					<ul id="subMenu1">
						<li>
							<a href="?page=4&sub=1&add=1">4-1 if-else문</a>
						</li>
						<li>
							<a href="?page=4&sub=2">4-2 switch문</a>
						</li>
					</ul>
				</li>
				<li class="menu">
					<a href="#submenu1" class="open">5. 반복문</a>
					<ul id="subMenu1">
						<li>
							<a href="?page=5&sub=1">5-1 while문</a>
						</li>
						<li>
							<a href="?page=5&sub=2">5-2 do-while문</a>
						</li>
						<li>
							<a href="?page=5&sub=3">5-3 for문</a>
						</li>
					</ul>
				</li>
				<li class="menu">
					<a href="#submenu1" class="open">6. 배열</a>
					<ul id="subMenu1">
						<li>
							<a href="?page=6&sub=1">6-1 배열</a>
						</li>
						<li>
							<a href="?page=6&sub=2">6-2 2차원배열</a>
						</li>
					</ul>
				</li>
				<li class="menu">
					<a href="#submenu1" class="open">7. 함수</a>
					<ul id="subMenu1">
						<li>
							<a href="?page=7&sub=1">7-1 함수</a>
						</li>
					</ul>
				</li>
				<li class="menu">
					<a href="#submenu1" class="open">8. 포인터</a>
					<ul id="subMenu1">
						<li>
							<a href="?page=8&sub=1">8-1 포인터</a>
						</li>
					</ul>
				</li>
				<li class="menu">
					<a href="#submenu1" class="open">9. 구조체</a>
					<ul id="subMenu1">
						<li>
							<a href="?page=9&sub=1&add=1">9-1 구조체</a>
						</li>
					</ul>
				</li>
				<li class="menu">
					<a href="#submenu1" class="open">10. 기타</a>
					<ul id="subMenu1">
						<li>
							<a href="?page=10&sub=1">10-1 아스키코드</a>
						</li>
					</ul>
				</li>
			</ul>
		</aside>
		<section>
			<div id="container">
				<ul class="tab">
					<li class="current" data-tab="tab1">
						<a href="#">이론</a>
					</li>
					<li data-tab="tab2">
						<a href="#">실습</a>
					</li>
				</ul>

				<div id="tab1" class="tabcontent current">
					<h3></h3>
					<p>
						<?php include("./content.php"); ?>
					</p>
				</div>

				<div id="tab2" class="tabcontent">
					<h3></h3>
					<p>
						<?php include("./index.php"); ?>
					</p>
				</div>

			</div>
		</section>

		<script type="text/javascript">
			$(function(){
				$('ul.tab li').click(function(){
					var activeTab=$(this).attr('data-tab');
					$('ul.tab li').removeClass('current');
					$('.tabcontent').removeClass('current');
					$(this).addClass('current');
					$('#'+activeTab).addClass('current');
				})
			});
			var opener = $("a.open");
			var nested = $("a.open").parent().find("li");
			var nestedCont = $("li > ul > li").parent();
			var that;
			var page="<?php echo($page); ?>";
			var tree = {
				init : function(){
					nestedCont.hide();
					$("li:last-child").addClass("end");
					$("a.open").each(function(){
						$(opener).click(function(target)						{
							tree.click(this);
						});
						return false;
					})
					l=".menu:eq("+(page-1)+")>a";
					$(l).click();
				},
				click : function(_tar){
					that=_tar;
					$(that).next().show();
					$(that).prev().toggleClass("close");
					$(that).toggleClass("close");
					if(!$(that).hasClass("close")){
						$(that).next().hide();
					}
				}
			}
			tree.init();
		</script>
	</body>
</html>
