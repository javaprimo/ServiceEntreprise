<?php
	try
	{
		//Récupérer les données
		extract($_POST);

		//Connexion
		require("./dbconnexion.php");
		
		//Connexion
		require("./dbconnexion.php");
		$r = "
		INSERT INTO avoirmission
		( 
			IDCHEFDESERVICE,
			IDMISSION
			)
		values
		(
			'$inputIDChefDeService',
			'$inputIDMission'
			)
			";

		$res = mysql_query($r);
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
	header('location: index.php?page=avoir_mission/avoir_mission_list&success='.$success);
?>
