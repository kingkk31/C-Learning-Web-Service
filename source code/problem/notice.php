<meta charset="UTF-8">
<?php 
	if($_SESSION['id'] == null)
	{
		echo "<script>alert('로그인 후 이용해주세요.');</script>";
		echo "<script>window.location.replace(\"/home.php\");</script>";
	}


	$conn = mysqli_connect("localhost","root","kkiinngg31") ; 
	$dbname="temp";
	mysqli_select_db($conn,$dbname); //데이터베이스에 연결
	mysqli_set_charset($conn, "utf8");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
		<link rel="stylesheet" type="text/css" href="../style.css">
		<title>문제풀이</title>
		<?php include ("../main.php"); ?>
	</head>
	<style>
		section{	
			width: 1000px;
			margin-top: 10px;
			margin-left: 9.8%;
			margin-bottom:20%;
			margin-right: auto;
			position: relative;
			z-index: 100;
		}
		#main_table{
			height:40px; 
			background-color:#becdff;
		}
	</style>
<body>
	<section>
		<center>
			
			<br>
			<table border="0" width="1000" >
				<tr><td colspan="3" align="left"><h2>문제풀이 목록</h2></td></tr>

				<tr id="main_table">
				 <th>번&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;호</th>
				 <th>제&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;목</th>
				 <th>유&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;형</th>
				</tr>

				<tr>
				<td colspan="3" height="1"><hr size="3" color="black"></td>
				</tr>

				<?php
					$page = $_GET["page"];
					if($page == "") $page = 1;

					$end_row = 6;
					$start_row = ($page - 1) * $end_row;
					$sql ="select distinct p_no,name from problem";
					$result = mysqli_query($conn, $sql); 
					$row_num = mysqli_num_rows($result);
					$max_page = ceil($row_num / $end_row);


					$sql ="select distinct p_no,name from problem limit ".$start_row.",".$end_row;
				$sql = $sql.";";
				$result = mysqli_query($conn, $sql);


				 while($row = $result->fetch_assoc())
				{  ?>
				
	
				<tr height="40">
				 <td   width="100" align="center"><?php echo $row[p_no]?></td>
				 <td align="left">
	    			 	<a href="./<?php echo $row[p_no]?>.php"><?php echo $row[name]?></a>
				 </td>
				 <td   width="330" align="center">
					<?php 
						$q = "select type from problem where p_no = ".$row[p_no];
						$query = $q.";";
						$data = mysqli_query($conn, $query);
						while($row2 = mysqli_fetch_array($data))
						{	
							echo $row2[type]."  ";
						}
					?>
				</td>

				</tr>

				<tr>
				<td colspan="3" height="1"><hr>
				</td>
				</tr>
				<?php  } ?>

				<tr align = "center">
		 			<td colspan="4" align="center">

						<?php
							$paging = "";

		  					if(($page-1)!=0 && ($page-1)<$max_page){
			  			   		$paging = $paging."<a href=\"?page=".($page-1)."\">[이전] </a>";
							}		
							
							for($i=1;$i<=$max_page;$i++)
			  			   		$paging = $paging."<a href=\"?page=".($i)."\">[".$i."] </a>";

							if(($page+1)<=$max_page)
								$paging = $paging."<a href=\"?page=".($page+1)."\">[다음]</a>";


							echo $paging;
				  		?>
		 			</td>
		 		</tr>
			</table>
		</center>
	</section>
</body>
</html>
