<?php
	try
	{
		//Récupérer les données
		extract($_POST);

		if(!isset($idMission))
		{
			header('location: index.php?page=mission/mission_list&success=2');
			return;
		}

		$newInputDDM = date("Y-m-d", strtotime($inputDDM));
		$newInputDFTM = date("Y-m-d", strtotime($inputDFTM));
		$newInputDFRM = date("Y-m-d", strtotime($inputDFRM));


		//Connexion
		require("./dbconnexion.php");
		$r = "UPDATE mission
		SET 
			TITREMISSION = '$inputTitreMission',
			DDM = '$newInputDDM',
			DFTM = '$newInputDFTM',
			DFRM = '$newInputDFRM',
			COMMENTAIRE = '$inputCommentaire'
		WHERE idmission = '$idMission'";
		
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
