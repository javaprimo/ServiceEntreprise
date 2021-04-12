<?php
	if(!isset($_GET['id']))
	{
		header('location: index.php?page=affectation/affectation_list&success=2');
		return;
	}

	$idAffectation = $_GET['id'];

	require("./dbconnexion.php");
	$req = "SELECT a.IDAFFECTATION, a.IDEMPLOYE, a.IDSERVICE, a.DDA, a.DFA, a.FONCTION, e.NOM, e.PRENOM, s.NOMSERVICE, s.ACRONYME FROM affectation as a inner join service as s on a.idservice = s.idservice inner join employe as e on a.idemploye = e.idemploye where a.IDAFFECTATION = $idAffectation ORDER BY a.IDAFFECTATION";
	$res = mysql_query($req);
	$data = mysql_fetch_array($res);
	mysql_close($con);
	?>

	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Suppression d'une affectation de service</h3>
		</div>
		<div class="panel-body">
			<div class="media position-relative">
			<img src="images/warning.png" class="col col-lg-2" alt="...">
				<div class="media-body">
					<h5 class="mt-0">Attention l'affectation de Mme/Mr "<?php echo strtoupper($data['NOM']) . " " . $data['PRENOM']; ?>
					" au service "<?php echo strtoupper($data['ACRONYME']) . " | " . $data['NOMSERVICE']; ?>" ainsi que ses données seront définitivement supprimées.</h5>
					<p>Etes-vous sûr de vouloir procéder avec cette operation ?</p>
					<a href="index.php?page=affectation/affectation_delete&id= <?php echo $idAffectation; ?>" class="btn btn-primary stretched-link">Supprimer</a>
					<a href="index.php?page=affectation/affectation_list&success=2" class="btn btn-success stretched-link">Annuler</a>
				</div>
			</div>
		</div>
	</div>
	