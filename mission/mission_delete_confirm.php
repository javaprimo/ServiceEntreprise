<?php
	if(!isset($_GET['id']))
	{
		header('location: index.php?page=mission/mission_list&success=2');
		return;
	}

	$idMission = $_GET['id'];

	require("./dbconnexion.php");
	$req = "select * from mission where idmission = $idMission";
	$res = mysql_query($req);
	$data = mysql_fetch_array($res);
	mysql_close($con);
	?>

	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Suppression d'une mission</h3>
		</div>
		<div class="panel-body">
			<div class="media position-relative">
			<img src="images/warning.png" class="col col-lg-2" alt="...">
				<div class="media-body">
					<h5 class="mt-0">Attention la mission "<?php echo $data['TITREMISSION']; ?>" ainsi que ses données seront définitivement supprimées.</h5>
					<p>Etes-vous sûr de vouloir procéder avec cette operation ?</p>
					<a href="index.php?page=mission/mission_delete&id= <?php echo $idMission; ?>" class="btn btn-primary stretched-link">Supprimer</a>
					<a href="index.php?page=mission/mission_list&success=2" class="btn btn-success stretched-link">Annuler</a>
				</div>
			</div>
		</div>
	</div>
	