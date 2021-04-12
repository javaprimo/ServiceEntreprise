<?php
	try
	{
		if(!isset($_GET['id']))
		{
			header('location: index.php?page=employe/emp_list&success=2');
			return;
		}

		$idEmp = $_GET['id'];

		//Connexion
		require("./dbconnexion.php");
		$req = "delete from employe where idemploye = $idEmp";

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
	header('location: index.php?page=employe/emp_list&success='.$success);
?>
