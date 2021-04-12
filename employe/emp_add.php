<?php
	try
	{
		//Récupérer les données
		extract($_POST);

		//formatter les dates
		$newInputDDN = date("Y-m-d", strtotime($inputDDN));
		$newInputDDR = date("Y-m-d", strtotime($inputDDR));

		//Connexion
		require("./dbconnexion.php");
		$r = "INSERT INTO employe
		(
			NOM, 
			PRENOM,
			CIN, 
			DDN,
			ADRESSE, 
			VILLE,
			SPECIALITE,
			DDR,
			EMAIL
			)
		VALUES
		(
			'$inputNom',
			'$inputPrenom', 
			'$inputCIN',
			'$newInputDDN',
			'$inputAdresse',
			'$inputVille',
			'$inputSpecialite',
			'$newInputDDR',
			'$inputEmail'
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
	header('location: index.php?page=employe/emp_list&success='.$success);
?>
