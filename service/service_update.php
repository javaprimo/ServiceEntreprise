<?php
	try
	{
		//Récupérer les données
		extract($_POST);

		if(!isset($idService))
		{
			header('location: index.php?page=service/service_list&success=2');
			return;
		}

		//Connexion
		require("./dbconnexion.php");
		$r = "UPDATE service
		SET 
			ACRONYME = '$inputAcronyme',
			NOMSERVICE = '$inputNomService'
		WHERE IDSERVICE = '$idService'";
		
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
	header('location: index.php?page=service/service_list&success='.$success);
?>
