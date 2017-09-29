<?php
	
	$con = mysqli_connect("localhost", "root", "kkiinngg31");
	$dbname = "temp";
	mysqli_select_db($con, $dbname);
	mysqli_set_charset($con, "utf8");


	$id = $_SESSION['id'];
	echo "아이디 : ".$id."<br/><br/><br/>";


	$q1 = "select distinct t1.p_no, t1.name from problem as t1 join (select * from marking_board where ID = \"".$id."\" and result = \"Correct\") as t2 on t1.p_no = t2.p_no";
	$query = $q1.";";

	$data = mysqli_query($con, $query);

	echo "맞은 문제 : ";
	while($row = mysqli_fetch_array($data))
		echo $row[p_no].". ".$row[name]."&nbsp;&nbsp;&nbsp;";
	echo "<br/><br/><br/>";



	$q1 = "select distinct p_no from marking_board as m2 where m2.ID = \"".$id."\" and m2.result = \"Correct\"";
	$q2 = "select distinct p_no from marking_board as m1 where m1.ID = \"".$id."\" and m1.p_no not in (".$q1.")";
	$q3 = "select distinct t2.p_no, t2.name from (".$q2.") as t1 join problem as t2 on t1.p_no = t2.p_no";
	$query = $q3.";";

	$data = mysqli_query($con, $query);

	echo "틀린 문제 : ";
	while($row = mysqli_fetch_array($data))
		echo $row[p_no].". ".$row[name]."&nbsp;&nbsp;&nbsp;";
	echo "<br/><br/><br/>";



	$q4 = "select distinct t1.type from problem as t1 join (".$q3.") as t2 on t1.p_no = t2.p_no";
	$query = $q4.";";
	$data = mysqli_query($con, $query);

	echo "[추천 유형 및 문제] <br/><br/>";
	while($row = mysqli_fetch_array($data))
	{
		echo $row[type]."  :  ";
		$q5 = "select distinct p_no, name from problem where type = \"".$row[type]."\"";
		$query2 = $q5.";";
		$data2 = mysqli_query($con, $query2);
		
		while($row2 = mysqli_fetch_array($data2))
			echo $row2[p_no].". ".$row2[name]."&nbsp;&nbsp;&nbsp;";
		echo "<br/>";
	}
	echo "<br/><br/><br/>";

	mysqli_close($con);
?>
