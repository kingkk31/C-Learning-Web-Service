<?php
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta charset="utf-8">
<script language="javascript" src="index.js"></script>
</head>

<body>
  <div id="wrapper">
    <div id="content">
	<table class="code">
           <td class="code">
               <form action="compile.php" method="post" id="form">
                   실행 코드<br/>
                   <textarea name="code" rows=15 cols=128 onkeydown=insertTab(this,event) id="code" style="font-size:11pt" spellcheck="false"  placeholder="실행시킬 소스 코드를 작성하세요."></textarea><br/>
                   <span id="errorCode" class="error"></span><br/>
                   입력<br/>
                   <textarea name="input" style="font-size:11pt" rows=7 cols=128 onkeydown=inserTab(this,event) id="input" spellcheck="false" placeholder="입력으로 사용할 데이터를 작성하세요."></textarea><br/><br/>
                   <input type="button" value="submit" id="submit" onclick="insertTxt();">
               </form>
               <br/>
               <div id="txtHint">실행결과</div>
           </td>
   	</table>
    </div>
  </div>
</body>
</html>
