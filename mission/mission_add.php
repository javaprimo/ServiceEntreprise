<?php
	try
	{
		//Récupérer les données
		extract($_POST);

		//Connexion
		require("./dbconnexion.php");
		
		$newInputDDM = date("Y-m-d", strtotime($inputDDM));
		$newInputDFTM = date("Y-m-d", strtotime($inputDFTM));
		$newInputDFRM = date("Y-m-d", strtotime($inputDFRM));
		
		//Connexion
		require("./dbconnexion.php");
		$r = "
		INSERT INTO mission
		( 
			TITREMISSION,
			DDM,
			DFTM,
			DFRM,
			COMMENTAIRE
			)
		values
		(
			'$inputTitreMission',
			'$newInputDDM',
			'$newInputDFTM',
			'$newInputDFRM',
			'$inputCommentaire'
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
	header('location: index.php?page=mission/mission_list&success='.$success);
?>
