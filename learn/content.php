<?php
	$page = $_GET["page"];
	$sub = $_GET["sub"];
	$add = $_GET["add"];

	if($page == "")
	{ 
		$page = 1;
		$sub = 1;
		$add = 0;
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	</head>

	<body>
		<img src="./img/ch<?php echo $page; ?>/<?php echo $page."-".$sub; ?>.png" width="870" style="height:auto;margin-bottom:-3px;"><br/>
		<?php	if($add == 1){
				$url = "./img/ch".$page."/".$page."-".$sub."_2.png";
				$style = "style=\"height:auto;margin-bottom:-3px;\"";

				echo "<img src=\"".$url."\" width=\"870\" ".$style.">";
			}
		?>
	</body>
</html>
