<?php
	if(!isset($_GET['id']))
	{
		header('location: index.php?page=service/service_list&success=2');
		return;
	}

	$idService = $_GET['id'];
	
	require("./dbconnexion.php");
	$r = "select * from service where idservice = $idService";
	$res = mysql_query($r);
	$dataService = mysql_fetch_array($res);
	mysql_close($con);
?>


<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Mise à jour des données du service <?php echo strtoupper($dataService['ACRONYME']) . " " . $dataService['NOMSERVICE'] ?></h3>
	</div>
	<div class="panel-body">
		<form method="POST" action="index.php?page=service/service_update">
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputAcronyme">Acronyme</label>
					<input type="text" class="form-control" id="inputAcronyme" name="inputAcronyme" value="<?php echo strtoupper($dataService['ACRONYME']); ?>" />
				</div>
				<div class="form-group col-md-6">
					<label for="inputNomService">Nom service</label>
					<input type="text" class="form-control" id="inputNomService" name="inputNomService" value="<?php echo $dataService['NOMSERVICE']; ?>" />
				</div>
				<input type="hidden" name="idService" value=<?php echo $dataService['IDSERVICE']; ?> />
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<button type="submit" class="btn btn-primary stretched-link">Sauvegarder</button>
					<a type="submit" href="index.php?page=service/service_list&success=2" class="btn btn-success stretched-link">Annuler</a>
				</div>
			</div>
		</form>
	</div>
</div>
