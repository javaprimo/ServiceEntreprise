<?php
	try
	{
		//Récupérer les données
		extract($_POST);

		if(!isset($idAffectation))
		{
			header('location: index.php?page=affectation/affectation_list&success=2');
			return;
		}

		$newInputDDA = date("Y-m-d", strtotime($inputDDA));
		$newInputDFA = date("Y-m-d", strtotime($inputDFA));

		//Connexion
		require("./dbconnexion.php");
		$r = "UPDATE affectation
		SET 
			IDEMPLOYE = '$inputEmploye',
			DDA = '$newInputDDA',
			DFA = '$newInputDFA',
			FONCTION = '$inputFonction'
		WHERE IDAFFECTATION = '$idAffectation'";
		echo $r;
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
	header('location: index.php?page=affectation/affectation_list&success='.$success);
?>
