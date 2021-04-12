<?php
	if(!isset($_GET['id']))
	{
		header('location: index.php?page=avoir_mission/avoir_mission_list&success=2');
		return;
	}

	$idAvoirMission = $_GET['id'];
	
	require("./dbconnexion.php");
	$r = "SELECT `IDAM`, a.`IDCHEFDESERVICE`, a.`IDMISSION`, s.ACRONYME, s.IDSERVICE, e.IDEMPLOYE, s.NOMSERVICE, e.NOM, e.PRENOM, m.TITREMISSION, m.DDM, m.DFTM, m.DFRM FROM `avoirmission` as a left join chefdeservice as c on a.IDCHEFDESERVICE = c.IDCHEFDESERVICE left join employe as e on c.IDEMPLOYE = e.IDEMPLOYE left join service as s on c.IDSERVICE = s.IDSERVICE left join mission as m on a.idmission = m.IDMISSION where a.idam = $idAvoirMission";
	$res = mysql_query($r);
	$dataAvoirMission = mysql_fetch_array($res);
	mysql_close($con);
?>


<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Mise à jour des données de l'affectation de la mission de Mme/Mr <?php echo strtoupper($dataAvoirMission['NOM']) . " " . $dataAvoirMission['PRENOM']; ?></h3>
	</div>
	<div class="panel-body">
		<form method="POST" action="index.php?page=avoir_mission/avoir_mission_update">
			<div class="form-row">
				<div class="form-group col-md-4">
					<label for="inputServiceAffectation">Service d'affectation</label>
					<select id="inputServiceAffectation" class="form-control" disabled>
						<option selected value="<?php echo $dataAvoirMission['IDSERVICE']; ?>">
						<?php
							echo $dataAvoirMission['ACRONYME'] . " | " . $dataAvoirMission['NOMSERVICE'];
						?>
						</option>
					</select>
				</div>
				<div class="form-group col-md-4">
					<label for="inputEmploye">Employ&eacute;</label>
					<select id="inputEmploye" name="inputEmploye" class="form-control" disabled>
						<option value="<?php echo $dataAvoirMission['IDEMPLOYE'];?>">
						<?php
							echo strtoupper($dataAvoirMission['NOM']) . " " . $dataAvoirMission['PRENOM'];
						?>
						</option>
					</select>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-4">
					<label for="inputIDMission">Mission</label>
					<select id="inputIDMission" name="inputIDMission" class="form-control">
						<?php
						require("./dbconnexion.php");
						$reqMission = "SELECT IDMISSION, TITREMISSION FROM mission ORDER BY TITREMISSION";
						$resMission = mysql_query($reqMission);
						while ($dataMission = mysql_fetch_array($resMission)) {
						?>
							<option value="<?php echo $dataMission['IDMISSION'];?>" 
							<?php
							if($dataAvoirMission['IDMISSION'] == $dataMission['IDMISSION'])
							{
								echo " selected";
							}
							?>>
							<?php
								echo $dataMission['TITREMISSION'];
							?>
							</option>
						<?php
						}
						mysql_close($con);
						?>
					</select>
				</div>
			<input type="hidden" name="idAvoirMission" value=<?php echo $dataAvoirMission['IDAM']; ?> />
			<div class="form-row">
				<div class="form-group col-md-6">
					<button type="submit" class="btn btn-primary stretched-link">Sauvegarder</button>
					<a type="submit" href="index.php?page=avoir_mission/avoir_mission_list&success=2" class="btn btn-success stretched-link">Annuler</a>
				</div>
			</div>
		</form>
	</div>
</div>
