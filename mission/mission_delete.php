<?php
	try
	{
		if(!$_GET['id'])
		{
			header('location: index.php?page=mission/mission_list&success=2');
			return;
		}

		$idMission = $_GET['id'];

		require("./dbconnexion.php");
		$req = "delete from mission where idmission = $idMission";
		$res = mysql_query($req);
		if($res)
		{
			$success = 1;
		}
		else
		{
			echo mysql_error($con);
			$success = 0;
		}
	}
	catch(Exception $ex)
	{
		echo $ex;
		$success = 0;
	}

	mysql_close($con);	
	header('location: index.php?page=mission/mission_list&success='.$success);
?>
