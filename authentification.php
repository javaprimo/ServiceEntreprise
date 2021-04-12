<?php 
	session_start();
	extract($_POST);
	
	require("dbconnexion.php");
	$r = "SELECT * FROM employe as emp LEFT JOIN chefdeservice as chef ON emp.IDEMPLOYE = chef.IDEMPLOYE where emp.login = '$login' and motdepasse = '$password'";
	$res = mysql_query($r);
	$n = mysql_num_rows($res);
	
	if ($n == 1)
	{
		$user = mysql_fetch_array($res);
		$_SESSION['SESSION_ID'] = $user['IDEMPLOYE'];
		echo $_SESSION['SESSION_ID'];

		if($user['LOGIN'] == "admin")
		{
			$_SESSION['CODE_AUTORISATION'] = 0;
		}
		else if(!is_null($user['IDCHEFDESERVICE']))
		{
			$_SESSION['CODE_AUTORISATION'] = 1;
		}
		else
		{
			$_SESSION['CODE_AUTORISATION'] = 2;
		}

		header('location: index.php?page=accueil');
	}
	else
	{
		header('location: index.php?page=connexion');	
	}
	
?>