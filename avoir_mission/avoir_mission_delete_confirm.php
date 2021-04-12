<?php
	if(!isset($_GET['id']))
	{
		header('location: index.php?page=avoir_mission/avoir_mission_list&success=2');
		return;
	}

	$idAvoirMission = $_GET['id'];

	require("./dbconnexion.php");
	$req = "SELECT `IDAM`, a.`IDCHEFDESERVICE`, a.`IDMISSION`, s.ACRONYME, s.NOMSERVICE, e.NOM, e.PRENOM, m.TITREMISSION, m.DDM, m.DFTM, m.DFRM FROM `avoirmission` as a left join chefdeservice as c on a.IDCHEFDESERVICE = c.IDCHEFDESERVICE left join employe as e on c.IDEMPLOYE = e.IDEMPLOYE left join service as s on c.IDSERVICE = s.IDSERVICE left join mission as m on a.idmission = m.IDMISSION where IDAM = $idAvoirMission";
	$res = mysql_query($req);
	$data = mysql_fetch_array($res);
	mysql_close($con);
	?>

	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Suppression d'une affectation de mission</h3>
		</div>
		<div class="panel-body">
			<div class="media position-relative">
			<img src="images/warning.png" class="col col-lg-2" alt="...">
				<div class="media-body">
					<h5 class="mt-0">Attention l'affectation de la mission "<?php echo $data['TITREMISSION']; ?>" au chef de service Mme/Mr "<?php echo strtoupper($data['NOM']) . " " . $data['PRENOM']; ?>" ainsi que ses données seront définitivement supprimées.</h5>
					<p>Etes-vous sûr de vouloir procéder avec cette operation ?</p>
					<a href="index.php?page=avoir_mission/avoir_mission_delete&id= <?php echo $idAvoirMission; ?>" class="btn btn-primary stretched-link">Supprimer</a>
					<a href="index.php?page=avoir_mission/avoir_mission_list&success=2" class="btn btn-success stretched-link">Annuler</a>
				</div>
			</div>
		</div>
	</div>
	