<?php
	if(!isset($_GET['id']))
	{
		header('location: index.php?page=mission/mission_list&success=2');
		return;
	}

	$idMission = $_GET['id'];
	
	require("./dbconnexion.php");
	$r = "select * from mission where idmission = $idMission";
	$res = mysql_query($r);
	$dataMission = mysql_fetch_array($res);
	mysql_close($con);
?>


<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Mise à jour des données de la mission <?php echo $dataMission['TITREMISSION']; ?></h3>
	</div>
	<div class="panel-body">
		<form method="POST" action="index.php?page=mission/mission_update">
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputTitreMission">Titre</label>
					<input type="text" class="form-control" id="inputTitreMission" name="inputTitreMission" value="<?php echo strtoupper($dataMission['TITREMISSION']); ?>" />
				</div>
				<div class="form-group col-md-6">
					<label for="inputCommentaire">Commentaire</label>
					<input type="text" class="form-control" id="inputCommentaire" name="inputCommentaire" value="<?php echo $dataMission['COMMENTAIRE']; ?>" />
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputDDM">Date D&eacute;but</label>
					<input type="text" class="form-control" id="inputDDM" name="inputDDM" placeholder="jj/mm/aaaa" value="<?php echo date("d/m/Y", strtotime($dataMission['DDM'])); ?>" />
				</div>
				<div class="form-group col-md-6">
					<label for="inputDFTM">Date Fin Th&eacute;orique</label>
					<input type="text" class="form-control" id="inputDFTM" name="inputDFTM" placeholder="jj/mm/aaaa" value="<?php echo date("d/m/Y", strtotime($dataMission['DFTM'])); ?>" />
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputDFRM">Date Fin R&eacute;elle</label>
					<input type="text" class="form-control" id="inputDFTM" name="inputDFRM" placeholder="jj/mm/aaaa" value="<?php echo date("d/m/Y", strtotime($dataMission['DFRM'])); ?>" />
				</div>
			</div>
			<input type="hidden" name="idMission" value=<?php echo $dataMission['IDMISSION']; ?> />
			<div class="form-row">
				<div class="form-group col-md-6">
					<button type="submit" class="btn btn-primary stretched-link">Sauvegarder</button>
					<a type="submit" href="index.php?page=mission/mission_list&success=2" class="btn btn-success stretched-link">Annuler</a>
				</div>
			</div>
		</form>
	</div>
</div>
