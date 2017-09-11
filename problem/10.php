<? session_start();?>
<meta charset="UTF-8">
<?php 
$con = mysqli_connect("localhost","root","kkiinngg31","temp") ; 
if(mysqli_connect_error()){ echo "연결실패 : " . mysqli_connect_errno(); }
mysqli_set_charset($con, "utf8");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<script language="JavaScript">
			function insertTab(obj, event){
        			if(event.keyCode == 9){
                			var val = obj.value, start = obj.selectionStart, end = obj.selectionEnd;
                        		obj.value = val.substring(0, start) + '\t' + val.substring(end);
                        		obj.selectionStart = obj.selectionEnd = start + 1;
                      			event.returnValue = false;
           		    	}
        		}

        function compFormPost(frmObj) {
            var str = '';
            var elm;
            var endName = '';
            for (i = 0, k = frmObj.length; i < k; i++) {
                elm = frmObj[i];
                switch (elm.type) {
                case 'text':
                case 'hidden':
                case 'password':
                case 'textarea':
                case 'select-one':
                    str += elm.name + '=' + encodeURIComponent(elm.value) + '&';
                    break;
                case 'select-multiple':
                    sElm = elm.options;
                    str += elm.name + '='
                    for (x = 0, z = sElm.length; x < z; x++) {
                        if (sElm[x].selected) {
                            str += encodeURIComponent(sElm[x].value) + ',';
                        }
                    }
                    str = str.substr(0, str.length - 1) + '&';
                    break;
                case 'radio':
                    if (elm.checked) {
                        str += elm.name + '=' + encodeURIComponent(elm.value) + '&';
                    }
                    break;
                case 'checkbox':
                    if (elm.checked) {
                        if (elm.name == endName) {
                            if (str.lastIndexOf('&') == str.length - 1) {
                                str = str.substr(0, str.length - 1);
                            }
                            str += ',' + encodeURIComponent(elm.value);
                        } else {
                            str += elm.name + '=' + encodeURIComponent(elm.value);
                        }
                        str += '&';
                        endName = elm.name;
                    }
                    break;
                }
            }
            return str.substr(0, str.length - 1);
        }

        function insertTxt(){
		document.getElementById("answer").innerHTML = "채점중...";

		var content = document.getElementById("form");
                var param = compFormPost(content);
                var request = new XMLHttpRequest();

                request.onreadystatechange = function(){
                        if (request.readyState == 4){
                              if (request.status == 200){
                                  document.getElementById("answer").innerHTML = request.responseText;
                              }else if (xmlHttp.status == 400){
                                  alert("404 Error : " + request.responseText);
                              }
                           }
                };

                request.open("POST", "grader.php", true);
                request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=UTF-8");
                request.setRequestHeader("Cache-Control", "no-cache, must-revalidate");
                request.setRequestHeader("Pragma", "no-cache");
                request.send(param);

        }
        
	function execute(){
		document.getElementById("answer").innerHTML = "실행중...";

		var content = document.getElementById("form");
                var param = compFormPost(content);
                var request = new XMLHttpRequest();

                request.onreadystatechange = function(){
                        if (request.readyState == 4){
                              if (request.status == 200){
                                  document.getElementById("answer").innerHTML = request.responseText;
                              }else if (xmlHttp.status == 400){
                                  alert("404 Error : " + request.responseText);
                              }
                           }
                };

                request.open("POST", "compile.php", true);
                request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=UTF-8");
                request.setRequestHeader("Cache-Control", "no-cache, must-revalidate");
                request.setRequestHeader("Pragma", "no-cache");
                request.send(param);

        }
		</script>


		<link rel="stylesheet" type="text/css" href="../style.css">
		<title>문제 10</title>
		<?php include("../main_q.php"); ?>
		<style>
			/*aside 설정*/
			aside {
				padding-top:22px;
				background-color: white;
				width: 30%;
				height:600px;
				margin: 0px 0px 10px 0px;
				padding-left:20px;
				float: left;
				border:1px solid #232323;
			}

			section {
				padding-top:20px;
				background-color:#4d4d4d;
				border:1px solid #232323;
				color:white;
				width: 67.6%;
				height: 603px;
				margin: 0px 10px 10px 395px;
			}
			#solve{
				width:820px;
				height:330px;
				margin: 0 10px 10px 10px;
			}
			#answer{
				width:820px;
				height:80px;
				margin: 0 10px 10px 10px;
			}	
			#input{
				width:820px;
				height:60px;
				margin: 0 10px 10px 10px;
			}	
			.button{
				font-size:20pt;
			}
			a:link{
				color:black;
				text-decoration:none;
			}
			a:visited{
				color:black;
				text-decoration:none;
			}
			a:hover{
				color:#646eff;
				text-decoration:none;
			}	
			.bottomButton{
				list-style-type:none;
				padding-left:590px;
			}
			input{
				border-style:none;
				font-size:18pt;
				background-color:#4d4d4d;
			}
			#name{
				border : 1px solid #4b4b4b;
				margin-top:-16px;
				width:1238px;
				height:50px;
				text-align:center;
				background-color:#4b4b4b;
				color:white;
				padding-bottom:16px;
			}
		</style>
	</head>
	<body>
	<form action="grader.php" method="post" id="form">
		<div id="name"><h2>문제<input name="no" value="<?php $url = basename($_SERVER['PHP_SELF']); $tok = explode('.', $url);	echo trim($tok[0]); ?>
					" readonly="readonly" size="1" style="font-size:20px;background-color:transparent;border:0px;margin-right:-3%;color:white;"> -
					<?php 
						$q = "select distinct name from problem where p_no = ".$tok[0];
						$query = $q.";";
						$data = mysqli_query($con, $query);
						while($row = mysqli_fetch_array($data))
						{
							echo $row[name];
						}
					?></h2></div>
		<aside>
			<p style="margin:2%;margin-right:6%;font-size:13px;line-height:1.5em;"><strong style="font-size:16px;">[문 제]</strong><br/><br/>방학 시즌이 되어 여름 캠프가 열렸고 여전히 봉사시간이 부족한 한신이는 이 여름 캠프의 스태프로 참여하게 되었다. 이 캠프는 청소년 캠프로 청소년만 참여해야 하기 때문에 당연히 나이 제한이 존재한다. (여기서 청소년은 14세 이상, 19세 이하를 말한다.)<br/>한신이가 해야하는 일은 캠프를 신청한 사람들 중 청소년인 사람들을 추려내는 것이다.<br/><br/>입력으로 4명의 사람들의 이름과 나이가 한 줄씩 주어진다. 나이는 0보다 큰 정수이다.<br/><br/>출력으로 캠프에 참여 가능한 사람의 이름을 한 줄씩 출력한다. 출력 시 입력 순서에 맞게 출력해야 하며, 만약 청소년인 사람이 없다면 아무것도 출력하면 안된다.</p>
<br/>
					<p style="margin:2%;font-size:16px;line-height:1.5em;"><strong>[예제 입력]<br/></strong>Tom 16<br/>Sana 19<br/>Lynn 28<br/>Peter 11<br/></p>
					<br/>
					<p style="margin:2%;font-size:16px;line-height:1.5em;"><strong>[예제 출력]<br/></strong>Tom<br/>Sana<br/></p>
					<br/><br/>
		</aside>
		<section>
				&nbsp;&nbsp;&nbsp;문제푸는 곳<br/>
				<textarea STYLE="font-size:18px" id="solve" name="code" onkeydown=insertTab(this,event) spellcheck="false">
#include <stdio.h>
int main(void)
{


}
				</textarea>
				&nbsp;&nbsp;&nbsp;입력<br/>
				<textarea STYLE="font-size:18px" id="input" name="input" placeholder="입력이 필요한 경우 입력하세요." spellcheck="false"></textarea>
				&nbsp;&nbsp;&nbsp;실행 및 채점 결과<br/>
				<textarea STYLE="font-size:18px" readonly="readonly" id="answer" placeholder="실행결과가 여기에 표시됩니다." spellcheck="false"></textarea>
				
			<div class="bottomButton">
				<input type="reset" style="color:white;" value="초기화"></input>&nbsp;&nbsp;&nbsp;
				<a class="button" href="javascript:void(0);" onclick="execute();" style="color:white;">실행</a>&nbsp;&nbsp;&nbsp;
				<a class="button" href="javascript:void(0);" onclick="insertTxt();" style="color:white;">제출</a>&nbsp;&nbsp;&nbsp;
			</div>
		</section>
	</form>	
	</body>
</html>
