<?php
	try
	{
		if(!$_GET['id'])
		{
			header('location: index.php?page=service/service_list&success=2');
			return;
		}

		$idEmp = $_GET['id'];

		require("./dbconnexion.php");
		$req = "delete from service where idservice = $idEmp";
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
	header('location: index.php?page=service/service_list&success='.$success);
?>
