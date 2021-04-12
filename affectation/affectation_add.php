<?php
	try
	{
		//Récupérer les données
		extract($_POST);

		$newInputDDA = date("Y-m-d", strtotime($inputDDA));
		$newInputDFA = date("Y-m-d", strtotime($inputDFA));

		//Connexion
		require("./dbconnexion.php");
		$r = "INSERT INTO affectation
		(
			IDSERVICE, 
			IDEMPLOYE,
			DDA,
			DFA,
			FONCTION
			)
		VALUES
		(
			'$inputServiceAffectation',
			'$inputEmploye',
			'$newInputDDA',
			'$newInputDFA',
			'$inputFonction'
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
	header('location: index.php?page=affectation/affectation_list&success='.$success);
?>
