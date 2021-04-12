<?php
	try
	{
		//Récupérer les données
		extract($_POST);

		if(!isset($idEmp))
		{
			header('location: index.php?page=accueil&success=2');
			return;
		}

		//formatter les dates
		$newInputDDN = date("Y-m-d", strtotime($inputDDN));
		$newInputDDR = date("Y-m-d", strtotime($inputDDR));

		//Connexion
		require("./dbconnexion.php");
		$r = "UPDATE employe
		SET 
			NOM = '$inputNom', 
			PRENOM = '$inputPrenom', 
			CIN = '$inputCIN', 
			DDN = '$newInputDDN',
			ADRESSE = '$inputAdresse', 
			VILLE = '$inputVille', 
			SPECIALITE = '$inputSpecialite', 
			DDR = '$newInputDDR',
			EMAIL = '$inputEmail'
		WHERE IDEMPLOYE = '$idEmp'";
		
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
	header('location: index.php?page=accueil&success='.$success);
?>
