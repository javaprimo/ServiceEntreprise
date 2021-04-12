<?php
	try
	{
		if(!$_GET['id'])
		{
			header('location: index.php?page=affectation/affectation_list&success=2');
			return;
		}

		$idAffectation = $_GET['id'];
		
		require("./dbconnexion.php");
		$req = "delete from affectation where idaffectation = $idAffectation";
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
	header('location: index.php?page=affectation/affectation_list&success='.$success);
?>
