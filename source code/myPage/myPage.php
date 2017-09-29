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
    <meta charset="utf-8" />
    <title>my page</title>
    <script src = "http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<link rel="stylesheet" href="../style.css"/>
		
    <style>
    	nav{
    		margin-top:8%;
    	}
	aside{
		margin-left:5%;
		margin-top:20px;
		margin-bottom:20%;
		margin-right:3%;
	}
	aside ul li{
		list-style:none;
	}
	section{	
		width: 1000px;
		margin-bottom:30%;
		margin-top:80px;
		z-index: 100;
	}
	section li{
		list-style:none;
	}
	textarea{
		height:130px;
		font-size:18px;
	}
	.head{
		background:#e7e7e7;
		padding-left:10px;
	}
	.body{
		text-align:center;
	}
	table{
		width:200px;
		height:150px;
		border-bottom:1px solid black;
		border-top: 1px solid black;
		border-collapse:collapse;
		rules:rows;
		frame:hsides;
	}
	</style>
   <?php include("../main_q.php"); ?>
</head>
<body>
	<aside>
		<h1><?php echo $_SESSION["name"]."님"; ?></h1>
		<table>
			<tr>
				<td class="head" width = "120">도전한 문제 수</td>
				<td class="body"><?php 
					$id = $_SESSION['id'];
					$query = "select count(distinct p_no) from marking_board where ID = \"".$id."\"";
					$data = mysqli_query($conn, $query);
					$row = mysqli_fetch_array($data);
					echo $row['count(distinct p_no)'];
				?>
				</td>
			</tr>
			<tr>
				<td class="head">제출한 횟수</td>
				<td class="body"><?php
                                        $query = "select count(no) from marking_board where ID = \"".$id."\"";
                                        $data = mysqli_query($conn, $query);
                                        $row = mysqli_fetch_array($data);
                                        echo $row['count(no)'];
                                ?>
				</td>
			</tr>
			<tr>
				<td class="head">맞은 문제 수</td>
				<td class="body"><?php
					$query = "select count(distinct p_no) from marking_board where ID = \"".$id."\" and result = \"Correct\"";
                                        $data = mysqli_query($conn, $query);
                                        $row = mysqli_fetch_array($data);
                                        echo $row['count(distinct p_no)'];
				?>
				</td>
			</tr>
			<tr>
				<td class="head">틀린 문제  수</td>
				<td class="body"><?php
					$query = "select count(distinct p_no) from marking_board as m1 where m1.ID = \"".$id."\" and m1.p_no not in (select distinct p_no from marking_board as m2 where m2.ID = \"".$id."\" and m2.result = \"Correct\")";

                                        $data = mysqli_query($conn, $query);
                                        $row = mysqli_fetch_array($data);
                                        echo $row['count(distinct p_no)'];
				?>
				</td>
			</tr>
		</table>
	</aside>
	<section> 
		<li class="box2">
		   	<h3>맞은 문제</h3>
  			<textarea readonly="readonly"><?php
					//$id = $_SESSION['id'];

				        $q1 = "select distinct t1.p_no, t1.name from problem as t1 join (select * from marking_board where ID = \"".$id."\" and result = \"Correct\") as t2 on t1.p_no = t2.p_no";
      					$query = $q1.";";

     					$data = mysqli_query($conn, $query);
        				while($row = mysqli_fetch_array($data))
                				echo $row[p_no].". ".$row[name]."&nbsp;&nbsp;";
				?>
			</textarea>
		</li>
		
		<li class="box2">
		   	<h3>틀린 문제</h3>
  			<textarea readonly="readonly"><?php
					$q1 = "select distinct p_no from marking_board as m2 where m2.ID = \"".$id."\" and m2.result = \"Correct\"";
        				$q2 = "select distinct p_no from marking_board as m1 where m1.ID = \"".$id."\" and m1.p_no not in (".$q1.")";
        				$q3 = "select distinct t2.p_no, t2.name from (".$q2.") as t1 join problem as t2 on t1.p_no = t2.p_no";
        				$query = $q3.";";

        				$data = mysqli_query($conn, $query);
        				while($row = mysqli_fetch_array($data))
                				echo $row[p_no].". ".$row[name]."&nbsp;&nbsp;";
				?>
			</textarea>
		</li>
		
		<li class="box2">
		   	<h3>추천 이론 및 문제</h3>
  			<textarea readonly="readonly"><?php
					$q4 = "select distinct t1.type from problem as t1 join (".$q3.") as t2 on t1.p_no = t2.p_no";
        				$query = $q4.";";
        				
					$data = mysqli_query($conn, $query);
        				while($row = mysqli_fetch_array($data))
        				{
                				echo "[".$row[type]."]\n";
                				$q5 = "select distinct p_no, name from problem where type = \"".$row[type]."\"";
                				$query2 = $q5.";";
                				
						$data2 = mysqli_query($conn, $query2);
				                while($row2 = mysqli_fetch_array($data2))
                       					echo $row2[p_no].". ".$row2[name]."&nbsp;&nbsp;";
						echo "\n\n";
        				}

				        mysqli_close($con);
				?>
			</textarea>
		</li>
	</section>
</body>
</html>
